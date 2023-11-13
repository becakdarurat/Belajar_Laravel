<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage. jika methodnya post otomatis masuknya ke sini 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'posts' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function checkSlug(Request $request)
    {
        // $slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');


        // class nya Post, kebetulan sama, mengambil field nya slug, request di ambil dari fetch api yang dikirm dari create.blade.php
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // kita berikan response nya dalam bentuk json, array associative
        return response()->json(['slug' => $slug]);
    }
}
