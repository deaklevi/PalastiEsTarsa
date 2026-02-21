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
        // Egyszerű globális sorrendezés
        return WorkResource::collection(Work::orderBy('order')->get());
    }

    public function store(StoreWorkRequest $request)
    {
        $data = $request->validated();

        $work = DB::transaction(function () use ($data) {
            // Minden elemet eltolunk, ami az új elem sorszámánál nagyobb vagy egyenlő
            Work::where('order', '>=', $data['order'])->increment('order');

            return Work::create($data);
        });

        return new WorkResource($work);
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $data = $request->validated();
        
        $oldOrder = $work->order;
        $newOrder = $data['order'] ?? $oldOrder;

        DB::transaction(function () use ($data, $work, $oldOrder, $newOrder) {
            
            // Csak akkor rendezünk át, ha változott a sorszám
            if ($newOrder != $oldOrder) {
                if ($newOrder > $oldOrder) {
                    // Lefelé mozgatás: a köztes elemeket felfelé (vissza) toljuk
                    Work::whereBetween('order', [$oldOrder + 1, $newOrder])
                        ->decrement('order');
                } else {
                    // Felfelé mozgatás: a köztes elemeket lefelé (előre) toljuk
                    Work::whereBetween('order', [$newOrder, $oldOrder - 1])
                        ->increment('order');
                }
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

            // A törölt elem mögötti összes elemet egyel előrébb hozzuk a lyuk betöméséhez
            Work::where('order', '>', $deletedOrder)
                ->decrement('order');
        });

        return response()->noContent();
    }
}