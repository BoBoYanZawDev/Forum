<?php

namespace App\Services\Frontend;

use App\Models\Thread;

class ThreadService
{
    /**
     * Display a listing of the resource.
     */
    public function list($request)
    {
        $threads = Thread::with(['category','tags','user'])->latest()->paginate(10);
        return [$threads];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData($request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showData($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData($id, $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteData($id)
    {
        //
    }}
