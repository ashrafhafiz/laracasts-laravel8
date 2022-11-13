<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $slug, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function all()
    {
        // please give attention to "File" facade, it is helpful
        // please give attention to "collect" new command to create collection object
        $files = File::files(resource_path("/posts"));

        return cache()->rememberForever("posts.all", fn() => collect($files)
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->slug,
                $document->excerpt,
                $document->date,
                $document->body()
            ))
            ->sortByDesc('date')
    );


        // return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        // base_path()
        // app_path()
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException();
        //     // return redirect('/');
        // }
        //
        // return cache()->remember("posts.{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));

        // of all the blog posts find the one with the selected slug
        // return static::all()->firstWhere('slug', $slug);

        return cache()->remember("posts.{$slug}", now()->addMinutes(1), fn() => static::all()->firstWhere('slug', $slug));

    }

    public static function findOrFail($slug)
    {

        $post = static::find($slug);

        if (! $post) throw new ModelNotFoundException();

        return $post;

    }
}
