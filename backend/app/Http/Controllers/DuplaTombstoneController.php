<?php

namespace App\Http\Controllers;

use App\Models\DuplaTombstone;
use App\Http\Requests\StoreDuplaTombstoneRequest;
use App\Http\Requests\UpdateDuplaTombstoneRequest;

class DuplaTombstoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDuplaTombstoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDuplaTombstoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DuplaTombstone  $duplaTombstone
     * @return \Illuminate\Http\Response
     */
    public function show(DuplaTombstone $duplaTombstone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDuplaTombstoneRequest  $request
     * @param  \App\Models\DuplaTombstone  $duplaTombstone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDuplaTombstoneRequest $request, DuplaTombstone $duplaTombstone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DuplaTombstone  $duplaTombstone
     * @return \Illuminate\Http\Response
     */
    public function destroy(DuplaTombstone $duplaTombstone)
    {
        //
    }
}
