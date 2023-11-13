@extends("layouts/main")
{{-- skip(1) mengskip postingan 1 --}}
{{-- $posts->skip(1) --}}
@section("container")
<div class="container">
  <h1 class="text-center mb-3">{{ $title }}</h1>
  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/Blog">
        @if (request('category'))
        {{-- kalau di url nya ada CATEGORY maka kita ambil dan berikan nilai value nya category --}}
          <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
        @if (request('authors'))
          <input type="hidden" name="authors" value="{{ request('authors') }}">
        @endif
      <div class="input-group mb-3">
        {{-- default method="" formnya adalah get , jadi tidak perlu di ketik --}}
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit" id="button-addon2">Button</button>
        </div>
      </form>
    </div>
  </div>


  {{-- akan true jika ada datanya , 1 jiak false 0 --}}
  @if($posts->count())
          {{-- Card start --}}
      <div class="card mb-3">
        <img src="https://source.unsplash.com/random/1200x400?{{ $posts[0]->category->name }}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->name }}">
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <small>
            By. <a href="/Blog?authors={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/Blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>{{ $posts[0]->created_at->diffForHumans() }}
           </small>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts?authors={{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
      </div>
    {{-- Card End --}}


  <div class="container">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="position-absolute px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7)"><a href="/Blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->Category->name }}</a></div>
          <img src="https://source.unsplash.com/random/500x500?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <small>
              By. <a href="/Blog?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}{{ $post->created_at->diffForHumans() }}
             </small>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @else 
  <p class="text-center fs-4">No Post Found</p>
@endif
    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
  </div>
@endsection
