@extends('layouts/main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 m-auto ">

          {{-- has akan di cocokan dengan flash yang dikirim dari registrasi controller --}}
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{-- ini mencetak isinya --}}
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          
          @if(session()->has('loginEror'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginEror') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <form action="/login" method="post">
              @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password" required>Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3"> Not Register? <a href="/register">Register Now!</a></small>
          </main>
    </div>
</div>

  
@endsection