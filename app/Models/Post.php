<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    use HasFactory, Notifiable;

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

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //query scope

    public function scopeFilter(Builder $query, array $filters):void

    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' .request('search') . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query)=> $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query)=> $query->where('username', $author))
        );
    }
}
