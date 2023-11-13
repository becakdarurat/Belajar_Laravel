@extends('dashboard.partials.main')

@section('container')
<h1 class="mb-4">My Posts</h1>
<div class="table-responsive col-lg-10">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            {{-- kita kirimkan id nya juga, tidak perlu juga kita buatkan route nya karena parameternya sudah langsung di tangani resourcenya , dan langsung di tangani di method show nya--}}
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
  {{-- perlu di ingat kita tidak bisa menggunakan slug, dengan resource sayangnya route model bindingnya secara langsung di resourcenya, tetapi ada cara untuk mengakali nya dengna, menjadikan nilai default --}}
            <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
            <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
    
@endsection