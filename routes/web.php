<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});


Route::get('/about', function () {
    return view('about', ['name' => 'Ultimate Attack', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Sauqisan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam cum aliquid inventore? kokoaki ainaisakdajosdjausau'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Sauqisan',
            'body' => 'Lorem, ipsum dolor.'
        ]
    ]]);
});

Route::get('/posts/{slug}', function($slug){
    // dd($id);
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Sauqisan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam cum aliquid inventore? kokoaki ainaisakdajosdjausau'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Sauqisan',
            'body' => 'Lorem, ipsum dolor.'
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    // dd($post);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

