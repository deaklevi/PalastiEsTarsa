<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Http\Resources\WorkResource;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WorkResource::collection(Work::orderBy('order')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        $work = DB::transaction(function () use ($data, $newOrder) {

            Work::where('order', '>=', $newOrder)->increment('order');

            return Work::create($data);
        });

        return new WorkResource($work);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return new WorkResource($work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        $data = $request->validated();
        $newOrder = $data['order'];

        DB::transaction(function () use ($data, $work, $newOrder) {

            if ($newOrder != $work->order) {
                Work::where('order', '>=', $newOrder)
                    ->where('id', '!=', $work->id)
                    ->increment('order');
            }

            $work->update($data);
        });

        return new WorkResource($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        DB::transaction(function () use ($work) {
            $deletedOrder = $work->order;
            $work->delete();

            Work::where('order', '>', $deletedOrder)
                ->decrement('order');
        });

        return response()->noContent();
    }
}
