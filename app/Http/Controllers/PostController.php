<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'user']))
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        // The following code is moved to a middleware
        // if (auth()->guest()) {
        //     abort(403);
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if (auth()->user()->username !== 'admin') {
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        return view('posts.create');
    }

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['slug'] = Str::slug(request('title'));
        $attributes['excerpt'] = Str::length(request('body')) > 100 ? Str::limit(request('body'), 100) : request('body');
        $attributes['user_id'] = auth()->id();

        // dd($attributes);

        Post::create($attributes);
        return redirect('/')->with('success', 'Your Post has been created successfully');
    }
}