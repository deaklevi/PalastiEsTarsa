<?php

namespace App\Http\Controllers;

use App\Models\Architecture;
use App\Http\Requests\StoreArchitectureRequest;
use App\Http\Requests\UpdateArchitectureRequest;
use App\Http\Resources\ArchitectureResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArchitectureController extends Controller
{
    public function index()
    {
        // Csoportok szerint, majd azon belül sorrend szerint rendezve
        return ArchitectureResource::collection(
            Architecture::orderBy('group')->orderBy('order', 'asc')->get()
        );
    }

    public function store(StoreArchitectureRequest $request)
    {
        $data = $request->validated();

        $architecture = DB::transaction(function () use ($data, $request) {
            // Csak az adott csoportban szabadítunk fel helyet
            Architecture::where('group', $data['group'])
                ->where('order', '>=', $data['order'])
                ->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('architectures', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Architecture::create($data);
        });

        return new ArchitectureResource($architecture);
    }

    public function update(UpdateArchitectureRequest $request, Architecture $architecture)
    {
        $data = $request->validated();
        
        $oldGroup = $architecture->group;
        $newGroup = $data['group'] ?? $oldGroup;
        $oldOrder = $architecture->order;
        $newOrder = $data['order'] ?? $oldOrder;

        DB::transaction(function () use ($data, $request, $architecture, $oldGroup, $newGroup, $oldOrder, $newOrder) {
            
            // 1. ESET: Csoporton belüli sorszám változás
            if ($oldGroup === $newGroup) {
                if ($newOrder > $oldOrder) {
                    Architecture::where('group', $oldGroup)
                        ->whereBetween('order', [$oldOrder + 1, $newOrder])
                        ->decrement('order');
                } elseif ($newOrder < $oldOrder) {
                    Architecture::where('group', $oldGroup)
                        ->whereBetween('order', [$newOrder, $oldOrder - 1])
                        ->increment('order');
                }
            } 
            // 2. ESET: Csoportváltás (áthelyezés másik kategóriába)
            else {
                // Régi csoportban lyuk bezárása
                Architecture::where('group', $oldGroup)
                    ->where('order', '>', $oldOrder)
                    ->decrement('order');

                // Új csoportban hely felszabadítása
                Architecture::where('group', $newGroup)
                    ->where('order', '>=', $newOrder)
                    ->increment('order');
            }

            // Képkezelés
            if ($request->hasFile('image')) {
                if ($architecture->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $architecture->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('architectures', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $architecture->update($data);
        });

        return new ArchitectureResource($architecture);
    }

    public function destroy(Architecture $architecture)
    {
        DB::transaction(function () use ($architecture) {
            if ($architecture->image_url) {
                $oldPath = ltrim(str_replace('/storage/', '', $architecture->image_url), '/');
                Storage::disk('public')->delete($oldPath);
            }

            $oldOrder = $architecture->order;
            $oldGroup = $architecture->group;
            
            $architecture->delete();

            // Csak az adott csoportban toljuk vissza a sorszámokat
            Architecture::where('group', $oldGroup)
                ->where('order', '>', $oldOrder)
                ->decrement('order');
        });

        return response()->noContent();
    }
}