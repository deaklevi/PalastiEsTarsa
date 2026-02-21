<?php

namespace App\Http\Controllers;

use App\Models\Stone;
use App\Http\Requests\StoreStoneRequest;
use App\Http\Requests\UpdateStoneRequest;
use App\Http\Resources\StoneResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoneController extends Controller
{
    public function index()
    {
        // Csoportonként, majd azon belül sorszám szerint rendezve
        return StoneResource::collection(Stone::orderBy('group')->orderBy('order')->get());
    }

    public function store(StoreStoneRequest $request)
    {
        $data = $request->validated();

        $stone = DB::transaction(function () use ($data, $request) {
            // Csak az adott csoporton belül toljuk el a sorszámokat
            Stone::where('group', $data['group'])
                ->where('order', '>=', $data['order'])
                ->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('stones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Stone::create($data);
        });

        return new StoneResource($stone);
    }

    public function update(UpdateStoneRequest $request, Stone $stone)
    {
        $data = $request->validated();
        $oldGroup = $stone->group;
        $newGroup = $data['group'] ?? $oldGroup;
        $oldOrder = $stone->order;
        $newOrder = $data['order'] ?? $oldOrder;

        DB::transaction(function () use ($data, $request, $stone, $oldGroup, $newGroup, $oldOrder, $newOrder) {
            
            // Ha a csoport változatlan, de a sorszám módosult
            if ($oldGroup === $newGroup) {
                if ($newOrder > $oldOrder) {
                    Stone::where('group', $oldGroup)
                        ->whereBetween('order', [$oldOrder + 1, $newOrder])
                        ->decrement('order');
                } elseif ($newOrder < $oldOrder) {
                    Stone::where('group', $oldGroup)
                        ->whereBetween('order', [$newOrder, $oldOrder - 1])
                        ->increment('order');
                }
            } 
            // Ha a kő átkerült egy másik csoportba
            else {
                // Régi csoportban a lyuk bezárása
                Stone::where('group', $oldGroup)
                    ->where('order', '>', $oldOrder)
                    ->decrement('order');

                // Új csoportban hely felszabadítása az új sorszámnak
                Stone::where('group', $newGroup)
                    ->where('order', '>=', $newOrder)
                    ->increment('order');
            }

            // Képkezelés
            if ($request->hasFile('image')) {
                if ($stone->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $stone->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('stones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $stone->update($data);
        });

        return new StoneResource($stone);
    }

    public function destroy(Stone $stone)
    {
        DB::transaction(function () use ($stone) {
            if ($stone->image_url) {
                $oldPath = ltrim(str_replace('/storage/', '', $stone->image_url), '/');
                Storage::disk('public')->delete($oldPath);
            }

            $deletedOrder = $stone->order;
            $deletedGroup = $stone->group;
            
            $stone->delete();

            // Csak az adott csoportban rendezzük újra a sorszámokat a törlés után
            Stone::where('group', $deletedGroup)
                ->where('order', '>', $deletedOrder)
                ->decrement('order');
        });

        return response()->noContent();
    }
}