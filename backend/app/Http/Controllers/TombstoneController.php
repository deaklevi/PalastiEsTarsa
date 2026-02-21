<?php

namespace App\Http\Controllers;

use App\Models\Tombstone;
use App\Http\Requests\StoreTombstoneRequest;
use App\Http\Requests\UpdateTombstoneRequest;
use App\Http\Resources\TombstoneResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TombstoneController extends Controller
{
    public function index()
    {
        // Érdemes csoporton belüli sorrendre is rendezni
        return TombstoneResource::collection(Tombstone::orderBy('group')->orderBy('order')->get());
    }

    public function store(StoreTombstoneRequest $request)
    {
        $data = $request->validated();

        $tombstone = DB::transaction(function () use ($data, $request) {
            // Csak az adott csoporton belül toljuk el a sorszámokat
            Tombstone::where('group', $data['group'])
                ->where('order', '>=', $data['order'])
                ->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Tombstone::create($data);
        });

        return new TombstoneResource($tombstone);
    }

    public function update(UpdateTombstoneRequest $request, Tombstone $tombstone)
    {
        $data = $request->validated();
        $oldGroup = $tombstone->group;
        $newGroup = $data['group'] ?? $oldGroup;
        $oldOrder = $tombstone->order;
        $newOrder = $data['order'] ?? $oldOrder;

        DB::transaction(function () use ($data, $request, $tombstone, $oldGroup, $newGroup, $oldOrder, $newOrder) {
            
            // 1. ESET: Csoporton belüli sorszám változás
            if ($oldGroup === $newGroup) {
                if ($newOrder > $oldOrder) {
                    Tombstone::where('group', $oldGroup)
                        ->whereBetween('order', [$oldOrder + 1, $newOrder])
                        ->decrement('order');
                } elseif ($newOrder < $oldOrder) {
                    Tombstone::where('group', $oldGroup)
                        ->whereBetween('order', [$newOrder, $oldOrder - 1])
                        ->increment('order');
                }
            } 
            // 2. ESET: Csoportváltás
            else {
                // Régi csoportban a rés lezárása
                Tombstone::where('group', $oldGroup)
                    ->where('order', '>', $oldOrder)
                    ->decrement('order');

                // Új csoportban hely felszabadítása
                Tombstone::where('group', $newGroup)
                    ->where('order', '>=', $newOrder)
                    ->increment('order');
            }

            // Képkezelés
            if ($request->hasFile('image')) {
                if ($tombstone->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $tombstone->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $tombstone->update($data);
        });

        return new TombstoneResource($tombstone);
    }

    public function destroy(Tombstone $tombstone)
    {
        DB::transaction(function () use ($tombstone) {
            if ($tombstone->image_url) {
                $oldPath = ltrim(str_replace('/storage/', '', $tombstone->image_url), '/');
                Storage::disk('public')->delete($oldPath);
            }

            $deletedOrder = $tombstone->order;
            $deletedGroup = $tombstone->group;
            
            $tombstone->delete();

            // Csak az adott csoportban lévő hátralévő elemeket léptetjük vissza
            Tombstone::where('group', $deletedGroup)
                ->where('order', '>', $deletedOrder)
                ->decrement('order');
        });

        return response()->noContent();
    }
}