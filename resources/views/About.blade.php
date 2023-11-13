@extends('layouts/main')

@section('container')
    <h1>Halaman {{ $Judul }}</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $img }}" alt="" class="img-fluid img-thumbnail rounded-circle" style="width: 200px;">
@endsection