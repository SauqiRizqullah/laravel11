<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    // public static function all()
    // {
    //     return [
    //     [
    //         'id' => 1,
    //         'slug' => 'judul-artikel-1',
    //         'title' => 'Judul Artikel 1',
    //         'author' => 'Sauqisan',
    //         'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam cum aliquid inventore? kokoaki ainaisakdajosdjausau'
    //     ],
    //     [
    //         'id' => 2,
    //         'slug' => 'judul-artikel-2',
    //         'title' => 'Judul Artikel 2',
    //         'author' => 'Sauqisan',
    //         'body' => 'Lorem, ipsum dolor.'
    //     ]
    //     ];
    // }

    // public static function find($slug): array{
    //     // return Arr::first(static::all(), function($post) use ($slug) {
    //     //     return $post['slug'] == $slug;
    //     // });

    //     $post =  Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

    //     if(! $post){
    //         abort(404);
    //     }

    //     return $post;

    // }
    // protected $table = 'blog_posts';
    // protected $primaryKey = 'post_id';
    protected $fillable = ['title', 'author', 'slug', 'body'];
}
