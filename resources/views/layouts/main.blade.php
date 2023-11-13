<!doctype html>
<html lang="en">

<head>
  <title>Web Blog | {{ $Halaman }}</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {{-- Icon Bootstrap5 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> 

  {{-- CSS external native --}}
  <link rel="stylesheet" href="css/style.css">

  {{-- CSS Bootstrap 5 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

</head>

<body>

  @include('partials/navbar')

  {{-- Main Start --}}
  <main>
    <section class="section_content">
      <div class="container mt-4">
        @yield('container')
      </div>
    </section>
  </main>
  {{-- Tutup Main --}}

  <footer>
    <!-- place footer here -->
  </footer>

  {{-- Script Bootstrap 5 --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Script native external --}}
  <script src="js/script.js"></script>
</body>

</html>