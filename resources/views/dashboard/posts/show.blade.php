@extends('dashboard.partials.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            {{-- artinya kita ingin di jalankan dengan htmlspecial charnya juga --}}
            <h1 class="mb-3">{{ $posts->title }} </h1>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
            <a href="" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="x-circle"></span>Delete</a>
            
            <img src="https://source.unsplash.com/random/1200x400?{{ $posts->category->name }}" alt="{{ $posts->category->name }}" class="img-fluid mt-3">

            {{-- artinya kita akan menjalankan tag html didalamnya , pastikan bebas dari karakter jahat --}}
            <article class="my-3 fs-5">
                <p>{!! $posts->body !!}</p>
            </article>
            <a href="/Blog">Back to posts</a>
        </div>
    </div>
</div>
@endsection