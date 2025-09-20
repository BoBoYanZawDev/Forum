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
        $threads = Thread::with(['category', 'tags', 'user'])->latest()->paginate(10);
        return [$threads];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData($request)
    {
        try {
            $thread = new Thread();
            $thread->title = $request->title;
            $thread->slug = $request->title ? str()->slug($request->title) . '-' . uniqid() : str()->random(10);
            $thread->content = $request->content;
            $thread->category_id = $request->category_id;
            $thread->is_published = $request->is_published ?? false;
            $thread->user_id = auth()->id();
            $thread->save();

            if ($request->has('tags')) {
                $thread->tags()->attach($request->tags);
            }

            return ['success', 'Thread created successfully.'];
        } catch (\Exception $e) {
            return ['error', 'Failed to create thread: ' . $e->getMessage()];
        }
    }

    /**
     * Display the specified resource.
     */
    public function showData($id)
    {
        return Thread::with(['category', 'tags', 'user', 'comments.user'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData($request, $thread)
    {
        try{
            $thread->title = $request->title;
            $thread->slug = $request->title ? str()->slug($request->title) . '-' . uniqid() : str()->random(10);
            $thread->content = $request->content;
            $thread->category_id = $request->category_id;
            $thread->is_published = $request->is_published ?? false;
            $thread->user_id = auth()->id();
            $thread->save();

            if ($request->has('tags')) {
                $thread->tags()->sync($request->tags);
            }

            return ['success', 'Thread updated successfully.'];
        } catch (\Exception $e) {
            return ['error', 'Failed to update thread: ' . $e->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteData($thread)
    {
        try {
            // $id->tags()->detach();
            $thread->delete();
            return ['success', 'Thread deleted successfully.'];
        } catch (\Exception $e) {
            return ['error', 'Failed to delete thread: ' . $e->getMessage()];
        }
    }
}
