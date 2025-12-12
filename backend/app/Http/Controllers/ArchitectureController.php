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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ArchitectureResource::collection(Architecture::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArchitectureRequest $request)
    {
        //$data = $request->validated();
        //$newOrder = $data['order'];

        //$architecture = DB::transaction(function () use ($data, $request, $newOrder) {
        //    Architecture::where('order', '>=', $newOrder)->increment('order');

        //    if ($request->hasFile('image')) {
        //        $path = $request->file('image')->store('architectures', 'public');
        //        $data['image_url'] = '/storage/' . $path;
        //    }

        //    return Architecture::create($data);
        //});

        //return new ArchitectureResource($architecture);
    }

    /**
     * Display the specified resource.
     */
    public function show(Architecture $architecture)
    {
        //return new ArchitectureResource($architecture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArchitectureRequest $request, Architecture $architecture)
    {
        //$data = $request->validated();
        //$newOrder = $data['order'];

        //DB::transaction(function () use ($data, $request, $newOrder, $architecture) {
        //    if ($newOrder != $architecture->order) {
        //        Architecture::where('order', '>=', $newOrder)
        //            ->where('id', '!=', $architecture->id)
        //            ->increment('order');
        //    }

        //    if ($request->hasFile('image')) {
        //        if ($architecture->image_url) {
        //            $oldPath = ltrim(str_replace('/storage/', '', $architecture->image_url), '/');
        //            Storage::disk('public')->delete($oldPath);
        //        }

        //        $path = $request->file('image')->store('architectures', 'public');
        //        $data['image_url'] = '/storage/' . $path;
        //    }

        //    $architecture->update($data);
        //});

        //return new ArchitectureResource($architecture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Architecture $architecture)
    {
        //DB::transaction(function () use ($architecture) {
        //    if ($architecture->image_url) {
        //        $oldPath = ltrim(str_replace('/storage/', '', $architecture->image_url), '/');
        //        Storage::disk('public')->delete($oldPath);
        //    }

        //    $deletedOrder = $architecture->order;
        //    $architecture->delete();

        //    Architecture::where('order', '>', $deletedOrder)->decrement('order');
        //});

        //return response()->noContent();
    }
}
