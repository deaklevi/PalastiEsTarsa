<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Http\Requests\StoreAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Http\Resources\AccessoryResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AccessoryController extends Controller
{
    /**
     * Összes kiegészítő listázása csoport és sorrend szerint.
     */
    public function index()
    {
        return AccessoryResource::collection(Accessory::orderBy('group')->orderBy('order')->get());
    }

    /**
     * Új kiegészítő mentése csoporton belüli sorrendezéssel.
     */
    public function store(StoreAccessoryRequest $request)
    {
        $data = $request->validated();
        
        try {
            $accessory = DB::transaction(function () use ($data, $request) {
                // Sorrend kezelése az adott csoporton belül
                $group = $data['group'];
                $newOrder = $data['order'] ?? (Accessory::where('group', $group)->max('order') + 1);
                
                Accessory::where('group', $group)
                    ->where('order', '>=', $newOrder)
                    ->increment('order');
                
                $data['order'] = $newOrder;

                // Képkezelés
                if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('accessories', 'public');
                    $data['image_url'] = '/storage/' . $path;
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
            return response()->json(['error' => 'Hiba történt a mentés során.'], 500);
        }
    }

    public function show(Accessory $accessory)
    {
        return new AccessoryResource($accessory);
    }

    /**
     * Szerkesztés és intelligens sorrendváltás (csoportváltást is kezelve).
     */
    public function update(UpdateAccessoryRequest $request, Accessory $accessory)
    {
        $data = $request->validated();
        $oldGroup = $accessory->group;
        $newGroup = $data['group'] ?? $oldGroup;
        $oldOrder = $accessory->order;
        $newOrder = $data['order'] ?? $oldOrder;

        try {
            DB::transaction(function () use ($data, $request, $accessory, $oldGroup, $newGroup, $oldOrder, $newOrder) {
                
                // 1. ESET: Csoporton belüli mozgatás
                if ($oldGroup === $newGroup) {
                    if ($newOrder > $oldOrder) {
                        Accessory::where('group', $oldGroup)
                            ->whereBetween('order', [$oldOrder + 1, $newOrder])
                            ->decrement('order');
                    } elseif ($newOrder < $oldOrder) {
                        Accessory::where('group', $oldGroup)
                            ->whereBetween('order', [$newOrder, $oldOrder - 1])
                            ->increment('order');
                    }
                } 
                // 2. ESET: Csoportváltás
                else {
                    // Régi csoportban lyuk bezárása
                    Accessory::where('group', $oldGroup)
                        ->where('order', '>', $oldOrder)
                        ->decrement('order');

                    // Új csoportban hely felszabadítása
                    Accessory::where('group', $newGroup)
                        ->where('order', '>=', $newOrder)
                        ->increment('order');
                }

                // Kép frissítése
                if ($request->hasFile('image')) {
                    if ($accessory->image_url) {
                        $oldPath = ltrim(str_replace('/storage/', '', $accessory->image_url), '/');
                        Storage::disk('public')->delete($oldPath);
                    }

                    $path = $request->file('image')->store('accessories', 'public');
                    $data['image_url'] = '/storage/' . $path;
                }

                $accessory->update($data);
            });

            return new AccessoryResource($accessory->fresh());

        } catch (\Exception $e) {
            Log::error("Accessory frissítési hiba: " . $e->getMessage());
            return response()->json(['error' => 'Hiba történt a frissítés során.'], 500);
        }
    }

    /**
     * Törlés és sorszám korrekció a csoporton belül.
     */
    public function destroy(Accessory $accessory)
    {
        try {
            DB::transaction(function () use ($accessory) {
                if ($accessory->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $accessory->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $deletedOrder = $accessory->order;
                $deletedGroup = $accessory->group;
                
                $accessory->delete();

                // Csak az adott csoportban hozzuk előrébb a mögötte lévőket
                Accessory::where('group', $deletedGroup)
                    ->where('order', '>', $deletedOrder)
                    ->decrement('order');
            });

            return response()->noContent();

        } catch (\Exception $e) {
            Log::error("Accessory törlési hiba: " . $e->getMessage());
            return response()->json(['error' => 'Hiba történt a törlés során.'], 500);
        }
    }
}