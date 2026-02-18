<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Http\Requests\StoreAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Http\Resources\AccessoryResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Importálva a piros aláhúzás ellen

class AccessoryController extends Controller
{
    /**
     * Összes kiegészítő listázása sorrend szerint.
     */
    public function index()
    {
        return AccessoryResource::collection(Accessory::orderBy('order')->get());
    }

    /**
     * Új kiegészítő mentése.
     */
    public function store(StoreAccessoryRequest $request)
{
    $data = $request->validated();
    
    try {
        $accessory = DB::transaction(function () use ($data, $request) {
            // Sorrend kezelése
            $newOrder = $data['order'] ?? (Accessory::max('order') + 1);
            Accessory::where('order', '>=', $newOrder)->increment('order');
            $data['order'] = $newOrder;

            // Képkezelés
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('accessories', 'public');
                $data['image_url'] = Storage::url($path);
            }

            // Alapértelmezett accessory_id ha üres
            if (empty($data['accessory_id'])) {
                $data['accessory_id'] = 'ACC-' . rand(100, 999);
            }

            return Accessory::create($data);
        });

        return new AccessoryResource($accessory);
    } catch (\Exception $e) {
        Log::error("Mentési hiba: " . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    /**
     * Egy konkrét kiegészítő megtekintése.
     */
    public function show(Accessory $accessory)
    {
        return new AccessoryResource($accessory);
    }

    /**
     * Szerkesztés mentése.
     */
    public function update(UpdateAccessoryRequest $request, Accessory $accessory)
    {
        $data = $request->validated();

        try {
            DB::transaction(function () use ($data, $request, $accessory) {
                // Sorrend frissítése, ha változott
                if (isset($data['order']) && $data['order'] != $accessory->order) {
                    $newOrder = $data['order'];
                    Accessory::where('order', '>=', $newOrder)
                        ->where('id', '!=', $accessory->id)
                        ->increment('order');
                }

                // Kép frissítése és a régi törlése, ha van új
                if ($request->hasFile('image')) {
                    if ($accessory->image_url) {
                        $oldPath = str_replace('/storage/', '', $accessory->image_url);
                        Storage::disk('public')->delete($oldPath);
                    }

                    $path = $request->file('image')->store('accessories', 'public');
                    $data['image_url'] = Storage::url($path);
                }

                $accessory->update($data);
            });

            return new AccessoryResource($accessory->fresh());

        } catch (\Exception $e) {
            Log::error("Accessory frissítési hiba: " . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Törlés és sorrend újraszervezése.
     */
    public function destroy(Accessory $accessory)
    {
        try {
            DB::transaction(function () use ($accessory) {
                // Kép törlése a tárhelyről
                if ($accessory->image_url) {
                    $oldPath = str_replace('/storage/', '', $accessory->image_url);
                    Storage::disk('public')->delete($oldPath);
                }

                $deletedOrder = $accessory->order;
                $accessory->delete();

                // A mögötte lévők előrébb hozása
                Accessory::where('order', '>', $deletedOrder)->decrement('order');
            });

            return response()->noContent();

        } catch (\Exception $e) {
            Log::error("Accessory törlési hiba: " . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}