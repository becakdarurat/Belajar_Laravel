<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class PostController extends Controller
{
    
    public function index(){
        // dd(request('search')); <- cara menangkap form method yang dikirimkan

        // Mendapatkan data yang terbaru
        // $posts = Post::latest();

        // if(request('search')){
    /* 
        title = kita ambil post->title
        like = pencarian SQL
        request('search') = mencari dalam Requestnya
        % = mengambil di awal kata dan akhir kata   
        
    kalau misalnya tidak ada pencarian dia akan masuk ke post->get(), tapi kalau ada di kasih where dulu atua di seleksi dulu baru di get()
    */
            // $posts->where('title', 'like' , '%' . request('search') . '%')
            // Kita akan cari misalkan ada di bodynya tidak di judul nya
                //   ->orWhere('body', 'like' , '%' . request('search') . '%'); }

        $title = '';
        if(request('category')){
            // cari slug yang sama dengan category
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('authors')){
            $author =  User::firstWhere('username', request('authors'));
            $title = ' by ' . $author->name;
        }

        return view('Blog',[
            "title" => "All Posts" . $title,
            "Halaman" => "Blog",
            "active" => "blog",
            // "posts" => Post::all(), mengabil semua
            // di bawah ini akan mengurutkan postingan berdasarkan kapan di buatnya

            // with() function untuk mengurangi query yang berulang di database / Eager Loading
// "posts" => Post::with(['user','category'])->latest()->get(), kita coba agar with tidak ikut di panggil
            // "posts" => Post::latest()->get(),
            // Filter yang diambil dari scopeFilter() class / model Post
            // latest == dibuatnya kapan dimulai dari akhir
            "posts" => Post::latest()->Filter(request(['search','category','authors']))->paginate(7)->withQueryString(),
            "identitas" => Post::singleMahasiswa(),
        ]);
    }
    // post ini adalah instance dari CLass object Post
    public function slug(Post $post){
        return view('posts',[
            "Halaman" => "Single-post",
            "active" => "blog",
            "post" => $post
        ]);
    }
    public function about(){
        return view('About',[
            "name" => "Sofyan Tanjung",
            "email" => "sofyan@gmail.com",
            "active" => "about",
            "img" => "tre.jpg",
            "Halaman" => "About",
            "Judul" => "Selamat datang di Halaman Home"
        ]);
    }
    public function home(){
        return view('Home',[
            "Judul" => "Selamat datang di Halaman Home",
            "active" => "home",
            "Halaman" => "Home"
        ]);
    }
    public function Categories(){
        return view('categories',[
            "title" => "Post Categories",
            "active" => "categories",
            "Halaman" => "Categories",
            "categories" => Category::all(),
        ]);
    }
    public function Category( Category $category){
        return view('blog',[
            'title' => "Post By Category : $category->name",
            'Halaman' => "Category",
            "active" => "categories",
            'posts' => $category->posts->load('category','user'),
            "identitas" => Post::singleMahasiswa(),
        ]);
    }
}
