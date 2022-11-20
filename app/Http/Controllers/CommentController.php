<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        // dd(auth()->id());
        // validations
        request()->validate([
            'body' => ['required']
        ]);

        $post->comments()->create([
            // 'post_id' => request()->post->id,
            'post_id' => $post->id,
            // 'user_id' => request()->user()->id,
            // 'user_id' => auth()->user()->id,
            'user_id' => auth()->id(),
            'body' => request()->body
        ]);

        return back();
    }
}