<?php

namespace App\Http\Controllers;

use App\Models\UrnaTombstone;
use App\Http\Requests\StoreUrnaTombstoneRequest;
use App\Http\Requests\UpdateUrnaTombstoneRequest;
use App\Http\Resources\UrnaTombstoneResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UrnaTombstoneController extends Controller
{
    public function index()
    {
        return UrnaTombstoneResource::collection(
            UrnaTombstone::orderBy('order')->get()
        );
    }

    public function store(StoreUrnaTombstoneRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        $urnaTombstone = DB::transaction(function () use ($data, $request, $newOrder) {
            UrnaTombstone::where('order', '>=', $newOrder)->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return UrnaTombstone::create($data);
        });

        return new UrnaTombstoneResource($urnaTombstone);
    }

    public function show(UrnaTombstone $urnaTombstone)
    {
        return new UrnaTombstoneResource($urnaTombstone);
    }

    public function update(UpdateUrnaTombstoneRequest $request, UrnaTombstone $urnaTombstone)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use ($data, $request, $newOrder, $urnaTombstone) {
            if ($newOrder != $urnaTombstone->order) {
                UrnaTombstone::where('order', '>=', $newOrder)
                    ->where('id', '!=', $urnaTombstone->id)
                    ->increment('order');
            }

            if ($request->hasFile('image')) {
                if ($urnaTombstone->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $urnaTombstone->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $urnaTombstone->update($data);
        });

        return new UrnaTombstoneResource($urnaTombstone);
    }

    public function destroy(UrnaTombstone $urnaTombstone)
    {
        DB::transaction(function () use ($urnaTombstone) {
            if ($urnaTombstone->image_url) {
                $oldPath = ltrim(str_replace('/storage/', '', $urnaTombstone->image_url), '/');
                Storage::disk('public')->delete($oldPath);
            }

            $deletedOrder = $urnaTombstone->order;
            $urnaTombstone->delete();

            UrnaTombstone::where('order', '>', $deletedOrder)->decrement('order');
        });

        return response()->noContent();
    }
}
