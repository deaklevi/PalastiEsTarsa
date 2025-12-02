<?php

namespace App\Http\Controllers;

use App\Models\Stone;
use App\Http\Requests\StoreStoneRequest;
use App\Http\Requests\UpdateStoneRequest;
use App\Http\Resources\StoneResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoneController extends Controller
{
    public function index()
    {
        return StoneResource::collection(Stone::orderBy('order')->get());
    }

    public function store(StoreStoneRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        $stone = DB::transaction(function () use ($data, $request, $newOrder) {
            Stone::where('order', '>=', $newOrder)->increment('order');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('stones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Stone::create($data);
        });

        return new StoneResource($stone);
    }

    public function show(Stone $stone)
    {
        return new StoneResource($stone);
    }

    public function update(UpdateStoneRequest $request, Stone $stone)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use ($data, $request, $newOrder, $stone) {
            if ($newOrder != $stone->order) {
                Stone::where('order', '>=', $newOrder)
                    ->where('id', '!=', $stone->id)
                    ->increment('order');
            }

            if ($request->hasFile('image')) {
                if ($stone->image_url) {
                    $oldPath = ltrim(str_replace('/storage/', '', $stone->image_url), '/');
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('stones', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $stone->update($data);
        });

        return new StoneResource($stone);
    }

    public function destroy(Stone $stone)
    {
        DB::transaction(function () use ($stone) {
            if ($stone->image_url) {
                $oldPath = ltrim(str_replace('/storage/', '', $stone->image_url), '/');
                Storage::disk('public')->delete($oldPath);
            }

            $deletedOrder = $stone->order;
            $stone->delete();

            Stone::where('order', '>', $deletedOrder)->decrement('order');
        });

        return response()->noContent();
    }
}
