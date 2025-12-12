<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Http\Requests\StoreAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Http\Resources\AccessoryResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AccessoryResource::collection(Accessory::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccessoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccessoryRequest $request)
    {
        //$data = $request->validated();
        //$newOrder = $data['order'];

        //$accessory = DB::transaction(function () use ($data, $request, $newOrder) {
        //    Accessory::where('order', '>=', $newOrder)->increment('order');

        //    if ($request->hasFile('image')) {
        //        $path = $request->file('image')->store('accessories', 'public');
        //        $data['image_url'] = '/storage/' . $path;
        //    }

        //    return Accessory::create($data);
        //});

        //return new AccessoryResource($accessory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        //return new AccessoryResource($accessory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccessoryRequest  $request
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccessoryRequest $request, Accessory $accessory)
    {
        //$data = $request->validated();
        //$newOrder = $data['order'];

        //DB::transaction(function () use ($data, $request, $newOrder, $accessory) {
        //    if ($newOrder != $accessory->order) {
        //        Accessory::where('order', '>=', $newOrder)
        //            ->where('id', '!=', $accessory->id)
        //            ->increment('order');
        //    }

        //    if ($request->hasFile('image')) {
        //        if ($accessory->image_url) {
        //            $oldPath = ltrim(str_replace('/storage/', '', $accessory->image_url), '/');
        //            Storage::disk('public')->delete($oldPath);
        //        }

        //        $path = $request->file('image')->store('accessories', 'public');
        //        $data['image_url'] = '/storage/' . $path;
        //    }

        //    $accessory->update($data);
        //});

        //return new AccessoryResource($accessory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessory $accessory)
    {
        //DB::transaction(function () use ($accessory) {
        //    if ($accessory->image_url) {
        //        $oldPath = ltrim(str_replace('/storage/', '', $accessory->image_url), '/');
        //        Storage::disk('public')->delete($oldPath);
        //    }

        //    $deletedOrder = $accessory->order;
        //    $accessory->delete();

        //    Accessory::where('order', '>', $deletedOrder)->decrement('order');
        //});

        //return response()->noContent();
    }
}
