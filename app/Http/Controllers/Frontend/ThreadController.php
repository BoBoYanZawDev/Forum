<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Services\Frontend\ThreadService;

class ThreadController extends Controller
{
    protected $threadService;
    public function __construct(ThreadService $threadService)
    {
        $this->threadService = $threadService;
    }
    public function index(Request $request)
    {
        [$threads] = $this->threadService->list($request);
        return Inertia::render('home', ['threads' => $threads]);
    }

    public function store(Request $request)
    {
        [$status , $message] = $this->threadService->storeData($request);
        return redirect()->back()->with($status , $message);
    }

    public function show($id)
    {
        $thread = $this->threadService->showData($id);
        return Inertia::render('Thread/Show', ['thread' => $thread]);
    }

    public function update(Request $request, Thread $thread)
    {
        [$status , $message] = $this->threadService->updateData($request, $thread);
        return redirect()->back()->with($status , $message);
    }

    public function destroy(Thread $thread)
    {
        [$status , $message] = $this->threadService->deleteData($thread);
        return redirect()->back()->with($status , $message);
    }
}
