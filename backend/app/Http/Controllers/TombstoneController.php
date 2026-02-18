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
        return TombstoneResource::collection(Tombstone::orderBy('order')->get());
    }

    public function store(StoreTombstoneRequest $request)
    {
        $data = $request->validated();

        $tombstone = DB::transaction(function () use ($data, $request) {
            Tombstone::where('order', '>=', $data['order'])->increment('order');

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

        DB::transaction(function () use ($data, $request, $tombstone) {
            if ($data['order'] != $tombstone->order) {
                Tombstone::where('order', '>=', $data['order'])
                    ->where('id', '!=', $tombstone->id)
                    ->increment('order');
            }

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
            $tombstone->delete();

            Tombstone::where('order', '>', $deletedOrder)->decrement('order');
        });

        return response()->noContent();
    }
}