@extends('layouts.main')
@section('container')
   
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            {{-- artinya kita ingin di jalankan dengan htmlspecial charnya juga --}}
            <h1 class="mb-3">{{ $post->title }} </h1>
            <p>By. <a href="/posts?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/Blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

            <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">

            {{-- artinya kita akan menjalankan tag html didalamnya , pastikan bebas dari karakter jahat --}}
            <article class="my-3 fs-5">
                <p>{!! $post->body !!}</p>
            </article>
            <a href="/Blog">Back to posts</a>
        </div>
    </div>
</div>
        
@endsection