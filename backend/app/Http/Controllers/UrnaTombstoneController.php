<?php

namespace App\Http\Controllers;

use App\Models\UrnaTombstone;
use App\Http\Requests\StoreUrnaTombstoneRequest;
use App\Http\Requests\UpdateUrnaTombstoneRequest;
use App\Http\Resources\UrnaTombstoneResource;
use Illuminate\Http\Request;
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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
            $data['image_url'] = asset('storage/' . $path);
        }

        $urnaTombstone = UrnaTombstone::create($data);

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

        // Ha új kép érkezik, feltöltjük és frissítjük az URL-t
        if ($request->hasFile('image')) {
            // Régi kép törlése, ha létezik
            if ($urnaTombstone->image_url) {
                $oldPath = str_replace(asset('storage/'), '', $urnaTombstone->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('tombstones/urna_tombstones', 'public');
            $data['image_url'] = asset('storage/' . $path);
        }

        $urnaTombstone->update($data);

        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UrnaTombstone $urnaTombstone)
    {
        // Ha van kép, töröljük a storage-ból
        if ($urnaTombstone->image_url) {
            $oldPath = str_replace(asset('storage/'), '', $urnaTombstone->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        $urnaTombstone->delete();

        return response()->noContent();
    }
}
