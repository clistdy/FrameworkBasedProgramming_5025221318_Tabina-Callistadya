<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'newjeans-article-1',
                'title' => 'Newjeans Article 1',
                'author' => 'Tabina Callistadya',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo praesentium quae ipsum temporibus ipsam. 
                Eaque hic mollitia iure laboriosam? Praesentium nemo minima blanditiis officiis repellendus expedita dicta nesciunt 
                onsequatur reprehenderit?'
            ],
            [
                'id' => 2,
                'slug' => 'all-about-blackpink-article-2',
                'title' => 'All about BLACKPINK Article 2',
                'author' => 'Jennie Kim',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Aspernatur amet commodi eaque laborum voluptatibus fugiat magnam voluptatum voluptas! Nemo ex suscipit consequuntur fuga dignissimos saepe molestiae odio delectus iure aperiam.'
            ]
            ];
    }

    public static function find($slug): array
    {
       /* return Arr::first(static::all(), function($post) use ($slug){
            return $post['slug'] == $slug;
        }); */

        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(! $post){
            abort(404);
        }

        return $post;
    }
}
