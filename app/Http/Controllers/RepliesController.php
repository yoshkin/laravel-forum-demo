<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $categorySlug
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($categorySlug, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);
        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }
}
