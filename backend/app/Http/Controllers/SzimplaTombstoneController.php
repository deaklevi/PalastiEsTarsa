<?php

namespace App\Http\Controllers;

use App\Models\SzimplaTombstone;
use App\Http\Requests\StoreSzimplaTombstoneRequest;
use App\Http\Requests\UpdateSzimplaTombstoneRequest;
use App\Http\Resources\SzimplaTombstoneResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SzimplaTombstoneController extends Controller
{
    public function index()
    {
        return SzimplaTombstoneResource::collection(
            SzimplaTombstone::orderBy('order')->get()
        );
    }

    public function store(StoreSzimplaTombstoneRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        $szimplaTombstone = DB::transaction(function () use ($data, $request, $newOrder) {
            SzimplaTombstone::where('order', '>=', $newOrder)->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('tombstones/szimpla_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return SzimplaTombstone::create($data);
        });

        return new SzimplaTombstoneResource($szimplaTombstone);
    }

    public function show(SzimplaTombstone $szimplaTombstone)
    {
        return new SzimplaTombstoneResource($szimplaTombstone);
    }

    public function update(UpdateSzimplaTombstoneRequest $request, SzimplaTombstone $szimplaTombstone)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use ($data, $request, $newOrder, $szimplaTombstone) {
            if ($newOrder != $szimplaTombstone->order) {
                SzimplaTombstone::where('order', '>=', $newOrder)
                    ->where('id', '!=', $szimplaTombstone->id)
                    ->increment('order');
            }

            if ($request->hasFile('image')) {
                if ($szimplaTombstone->image_url) {
                    $oldPath = str_replace('/storage/', '', $szimplaTombstone->image_url);
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('tombstones/szimpla_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $szimplaTombstone->update($data);
        });

        return new SzimplaTombstoneResource($szimplaTombstone);
    }

    public function destroy(SzimplaTombstone $szimplaTombstone)
    {
        DB::transaction(function () use ($szimplaTombstone) {
            if ($szimplaTombstone->image_url) {
                $oldPath = str_replace('/storage/', '', $szimplaTombstone->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $deletedOrder = $szimplaTombstone->order;
            $szimplaTombstone->delete();

            SzimplaTombstone::where('order', '>', $deletedOrder)->decrement('order');
        });

        return response()->noContent();
    }
}
