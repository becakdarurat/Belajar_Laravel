@extends('dashboard.partials.main')

@section('container')
    <h1 class="mb-4">Create New Post</h1>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control" id="slug" name="slug" disabled readonly>
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach( $Categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Body</label>
              <input id="body" type="hidden" name="body">
              <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
    </div>
   
    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      // kalau ada respons ke route ini, maka kita akan ambil isinya
      //  membuat permintaan HTTP GET ke endpoint /dashboard/posts/createSlug
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
      //  memproses respons dari server. Fungsi response.json() digunakan untuk mengonversi data respons ke format JSON.
        .then(response => response.json())
        // menetapkan nilai dari elemen input slug dengan nilai slug yang diperoleh dari respons.
        .then(data => slug.value = data.slug)

        // penjelesan singkatnya, slug.value mendapatkan nilai dari slug, yang disimpan di data => , data.slug adalah nilai yang sudah di dapat dari slug.value , title.value diambil dari #title, dan berisi data yang sudha di dapatkan dari data.slug 
    })

    </script>
@endsection