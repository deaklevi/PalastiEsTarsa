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
    public function index()
    {
        // Sorrend szerint rendezve adjuk vissza
        return ArchitectureResource::collection(Architecture::orderBy('order', 'asc')->get());
    }

    public function store(StoreArchitectureRequest $request)
    {
        $data = $request->validated();

        $architecture = DB::transaction(function () use ($data, $request) {
            // Ha megadtunk sorrendet, a többit toljuk arrébb
            if (isset($data['order'])) {
                Architecture::where('order', '>=', $data['order'])->increment('order');
            }

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('architectures', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            return Architecture::create($data);
        });

        return new ArchitectureResource($architecture);
    }

    public function update(UpdateArchitectureRequest $request, Architecture $architecture)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request, $architecture) {
            // Sorrend frissítése: ha változik, átrendezzük a többit
            if (isset($data['order']) && $data['order'] != $architecture->order) {
                Architecture::where('order', '>=', $data['order'])
                    ->where('id', '!=', $architecture->id)
                    ->increment('order');
            }

            if ($request->hasFile('image')) {
                // Régi kép törlése
                if ($architecture->image_url) {
                    $oldPath = str_replace('/storage/', '', $architecture->image_url);
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image')->store('architectures', 'public');
                $data['image_url'] = '/storage/' . $path;
            }

            $architecture->update($data);
        });

        return new ArchitectureResource($architecture);
    }

    public function destroy(Architecture $architecture)
    {
        DB::transaction(function () use ($architecture) {
            if ($architecture->image_url) {
                $oldPath = str_replace('/storage/', '', $architecture->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $oldOrder = $architecture->order;
            $architecture->delete();

            // Lyuk betömése a sorrendben
            Architecture::where('order', '>', $oldOrder)->decrement('order');
        });

        return response()->noContent();
    }
}