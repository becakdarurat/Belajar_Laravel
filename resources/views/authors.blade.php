@extends('layouts.main')
@section('container')
@foreach ($posts as $post)
        {{-- artinya kita ingin di jalankan dengan htmlspecial charnya juga --}}
        <h1>{{ $post->title }} </h1>
        <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/Blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

        <p>{{ $post->author }}</p>
        {{-- artinya kita akan menjalankan tag html didalamnya , pastikan bebas dari karakter jahat --}}
        <p>{!! $post->excerpt !!}</p>
    <a href="/Blog">Back to posts</a>
    
      @endforeach
@endsection