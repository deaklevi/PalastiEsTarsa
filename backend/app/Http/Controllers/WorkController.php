<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Http\Resources\WorkResource;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function index()
    {
        return WorkResource::collection(Work::orderBy('order')->get());
    }

    public function store(StoreWorkRequest $request)
    {
        $data = $request->validated();

        $work = DB::transaction(function () use ($data) {
            Work::where('order', '>=', $data['order'])->increment('order');
            return Work::create($data);
        });

        return new WorkResource($work);
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $work) {
            if ($data['order'] != $work->order) {
                Work::where('order', '>=', $data['order'])
                    ->where('id', '!=', $work->id)
                    ->increment('order');
            }
            $work->update($data);
        });

        return new WorkResource($work);
    }

    public function destroy(Work $work)
    {
        DB::transaction(function () use ($work) {
            $deletedOrder = $work->order;
            $work->delete();
            Work::where('order', '>', $deletedOrder)->decrement('order');
        });

        return response()->noContent();
    }
}