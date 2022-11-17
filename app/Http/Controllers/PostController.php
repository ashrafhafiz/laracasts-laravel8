<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        return view('posts', [
            // 'posts' => $this->getPosts(),
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show (Post $post) {

        return view('post', [
            'post' => $post
        ]);
    }


    // to be used inside index method:
    // 'posts' => $this->getPosts(),
    //
    // The better approach is to use Query Scope
    //
    protected function getPosts() {
        $posts = Post::with(['category','user'])->latest();

        if (request('search')) {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return $posts->get();
   }
}
