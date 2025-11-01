<?php

namespace App\Http\Controllers;

use App\Models\UrnaTombstone;
use App\Http\Requests\StoreUrnaTombstoneRequest;
use App\Http\Requests\UpdateUrnaTombstoneRequest;
use App\Http\Resources\UrnaTombstoneResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UrnaTombstoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UrnaTombstoneResource::collection(UrnaTombstone::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrnaTombstoneRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use (&$data, $request, $newOrder, &$urnaTombstone) {
            // Ha már létezik ez az order, növeljük az érintett rekordok orderét
            UrnaTombstone::where('order', '>=', $newOrder)->increment('order');

            // Kép feltöltés, ha van
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path; // relatív útvonal
            }

            $urnaTombstone = UrnaTombstone::create($data);
        });

        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Display the specified resource.
     */
    public function show(UrnaTombstone $urnaTombstone)
    {
        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUrnaTombstoneRequest $request, UrnaTombstone $urnaTombstone)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use (&$data, $request, $newOrder, $urnaTombstone) {
            // Ha változott az order, kezeljük az ütközést
            if ($newOrder != $urnaTombstone->order) {
                UrnaTombstone::where('order', '>=', $newOrder)
                    ->where('id', '!=', $urnaTombstone->id)
                    ->increment('order');
            }

            // Ha új kép érkezik, feltöltjük és frissítjük az URL-t
            if ($request->hasFile('image')) {
                if ($urnaTombstone->image_url) {
                    $oldPath = str_replace('/storage/', '', $urnaTombstone->image_url);
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
                $data['image_url'] = '/storage/' . $path; // relatív útvonal
            }

            $urnaTombstone->update($data);
        });

        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UrnaTombstone $urnaTombstone)
    {
        DB::transaction(function () use ($urnaTombstone) {
            // Ha van kép, töröljük a storage-ból
            if ($urnaTombstone->image_url) {
                $oldPath = str_replace('/storage/', '', $urnaTombstone->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $urnaTombstone->delete();
        });

        return response()->noContent();
    }
}
