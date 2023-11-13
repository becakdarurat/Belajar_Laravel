<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;

// halaman single post
// {} ini namanya whild card , mengambil apapun yang ada didalamnnya
// yang tadinya where id == apa , sekarang where slug == apa

Route::get('/', [PostController::class, 'home']);
Route::get('/About',[PostController::class, 'about']);
Route::get('/Blog', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class, 'slug']);
Route::get('/categories',[PostController::class, 'Categories']);
Route::get('/categories/{category:slug}',[PostController::class, 'Category']);


// Tidak di pakai lagi karena sudah diarahkan ke /Blog
// Route::post('/authors/{author:username}', function (User $author) {
//     // Create a new user
//     return view('Blog',[
//         "title" => "Post By Author : $author->name",
//         "Halaman" => "Authors",
//         "identitas" => Post::singleMahasiswa(),
//         // kita mengurangi query ke database nya , tidak paka with karena ini bukan modelnya kita pakai lazy eager loading
//         "posts" => $author->posts->load('category','user'),
//     ]);
// });

    // kita harus kasih tau dulu mana route kita, jadi name nya adalah login
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth'); 

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');