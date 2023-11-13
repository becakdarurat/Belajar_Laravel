<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog">
    <meta name="author" content="Sofyan Tanjung">
    <meta name="generator" content="Hugo 0.84.0">
    <title>WEB Blog | Sofyan Tanjung</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

      {{-- Icon Bootstrap5 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> 

  {{-- CSS external native --}}
  <link rel="stylesheet" href="css/dashboard.css">

  {{-- CSS Bootstrap 5 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

  </head>
  <body>
    
@include('dashboard.partials.header')

<div class="container-fluid">
  <div class="row">
    
    @include('dashboard.partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
      </div>
    </main>
  </div>
</div>

  {{-- Script Bootstrap 5 --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Script native external --}}
  <script src="js/dashboard.js"></script>

  {{-- feather icon --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css">


      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script>
        feather.replace();
      </script>
  </body>
</html>
