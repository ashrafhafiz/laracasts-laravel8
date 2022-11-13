<?php

use App\Models\Post;
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

//    $files = File::files(resource_path('posts'));

//  Method 4
//  Collect will collect an array and wrap it with a collection object
//    $posts = collect($files)
//
//        ->map(fn($file) => YamlFrontMatter::parseFile($file))
//
//        ->map(fn($document) => new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->body()
//        ));


//  Method 3
//    $posts = array_map(function ($file){
//
//        $document = YamlFrontMatter::parseFile($file);
//
//        return new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->body()
//        );
//
//    }, $files);



//    Method 2
//    $posts = [];
//
//    foreach ($files as $file) {
//        $document = YamlFrontMatter::parseFile($file);
//
//        $posts[] = new Post(
//            $document->title,
//            $document->slug,
//            $document->excerpt,
//            $document->date,
//            $document->body()
//        );
//    }


//    Method 1
//    $document = YamlFrontMatter::parseFile(
//        resource_path('/posts/my-forth-post.html')
//    );
//    dd($documents);
//    dd($document->body());
//    dd($document->matter());
//    dd($document->matter('title'));
//    dd($document->title);

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
