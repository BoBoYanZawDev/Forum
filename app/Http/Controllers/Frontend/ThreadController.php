<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\ThreadService;

class ThreadController extends Controller
{
    protected $threadService;
    public function __construct(ThreadService $threadService)
    {
       $this->threadService = $threadService ;
    }
    public function index(Request $request)
    {
        [$threads] = $this->threadService->list($request);
        return Inertia::render('home',['threads'=>$threads]);
    }
}
