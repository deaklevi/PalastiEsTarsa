<?php

namespace App\Http\Controllers;

use App\Models\UrnaTombstone;
use App\Http\Requests\StoreUrnaTombstoneRequest;
use App\Http\Requests\UpdateUrnaTombstoneRequest;
use App\Http\Resources\UrnaTombstoneResource;

class UrnaTombstoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UrnaTombstoneResource::collection(UrnaTombstone::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUrnaTombstoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrnaTombstoneRequest $request)
    {
        $data = $request->validated();
        $urnaTombstone = UrnaTombstone::create($data);
        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UrnaTombstone  $urnaTombstone
     * @return \Illuminate\Http\Response
     */
    public function show(UrnaTombstone $urnaTombstone)
    {
        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrnaTombstoneRequest  $request
     * @param  \App\Models\UrnaTombstone  $urnaTombstone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrnaTombstoneRequest $request, UrnaTombstone $urnaTombstone)
    {
        $data = $request->validated();
        $urnaTombstone->update($data);
        return new UrnaTombstoneResource($urnaTombstone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UrnaTombstone  $urnaTombstone
     * @return \Illuminate\Http\Response
     */
    public function destroy(UrnaTombstone $urnaTombstone)
    {
        if($urnaTombstone->delete()){
            return response()->noContent();
        }
        else {
            return abort(500);
        }
    }
}
