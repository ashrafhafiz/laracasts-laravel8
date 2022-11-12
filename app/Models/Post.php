<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        // please give attention to "File" facade, it is helpful
        $files = File::files(resource_path("/posts"));
        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        // base_path()
        // app_path()
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
            // return redirect('/');
        }

        return cache()->remember("posts.{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));
    }
}
