<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post}', function ($slug) {

    // $path = __dir__ . '/../resources/posts/'.$slug.'.html';

    // if (! file_exists($path = __dir__ . "/../resources/posts/{$slug}.html")) {
    //     // abort(404);
    //     return redirect('/');
    // }

    // $post =  cache()->remember("posts.{$slug}", now()->addMinutes(1), function () use ($path) {
    //     // var_dump('get the file again');
    //     return file_get_contents($path);
    // });

    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[a-zA-Z_\-]+');

// whereAlpha('post')
// whereNumber
// whereAlphaNumeric
// whereIn
