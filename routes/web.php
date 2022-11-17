<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


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
