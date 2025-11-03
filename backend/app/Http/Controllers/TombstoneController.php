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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TombstoneResource::collection(Tombstone::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTombstoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTombstoneRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        $tombstone = DB::transaction(function () use ($data, $request, $newOrder){
            Tombstone::where('order', '>=', $newOrder)->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Tombstone::create($data);
        });

        return new TombstoneResource($tombstone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tombstone  $tombstone
     * @return \Illuminate\Http\Response
     */
    public function show(Tombstone $tombstone)
    {
        return new TombstoneResource($tombstone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTombstoneRequest  $request
     * @param  \App\Models\Tombstone  $tombstone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTombstoneRequest $request, Tombstone $tombstone)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use ($data, $request, $newOrder, $tombstone) {
            if ($newOrder != $tombstone->order) {
                Tombstone::where('order', '>=', $newOrder)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tombstone  $tombstone
     * @return \Illuminate\Http\Response
     */
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
