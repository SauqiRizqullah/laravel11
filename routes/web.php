<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});


Route::get('/about', function () {
    return view('about', ['name' => 'Ultimate Attack', 'title' => 'About']);
});

Route::get('/posts', function () {
    // $posts = Post::with(['author','category'])->latest()->get();

    // dump(request('search'));

    // $posts = Post::latest(); // select * from
    // if (request('search')) { //jika ada request dari search bar
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    // $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()]); // kalau gak ada request, tampilkan semua (->get())
});

Route::get('/posts/{post:slug}', function(Post $post){


    // $post = Post::find($slug); // find mencari berdasarkan id
    // // dd($post);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user){
    // $posts = $user->posts->load('category', 'author');

    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    // $posts = $category->posts->load('category', 'author');

    return view('posts', ['title' => 'Articels in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

