<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // Manual Debugging
    //
    //    \Illuminate\Support\Facades\DB::listen(function ($query){
    //        // \Illuminate\Support\Facades\Log::info($query->sql, $query->bindings);
    //        logger($query->sql, $query->bindings);
    //    });

    return view('posts', [
        // 'posts' => Post::all()
        'posts' => Post::with(['category','user'])->get(),
        'categories' => Category::all()
    ]);
})->name('home');

// Illustration of route-model binding
// mapping a route key "post" to a model "Post"
// wild card name {post} has to match the variable name $post

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);
});

//Route::get('/posts/{post}', function ($id) {
//
//    return view('post', [
//        'post' => Post::findOrFail($id)
//    ]);
//});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts->load(['category','user']),
        'categories' => Category::all(),
        'currentCategory' => $category
//        'posts' => Post::with(['category','user'])->where('category_id', $category->id)->get()
    ]);
})->name('category');

Route::get('/users/{user:username}', function (User $user) {

    return view('posts', [
        'posts' => $user->posts->load(['category','user']),
        'categories' => Category::all()
//        'posts' => Post::with(['category','user'])->where('user_id', $user->id)->get()
    ]);
});
