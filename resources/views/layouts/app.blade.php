<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
  <link rel="stylesheet" crossorigin="" href="{{ asset("/assets/compiled/css/app.css") }}">
  <link rel="stylesheet" crossorigin="" href="{{ asset("/assets/compiled/css/app-dark.css") }}">
  <link rel="stylesheet" crossorigin="" href="{{ asset("/assets/compiled/css/iconly.css") }}">
  <link rel="stylesheet" crossorigin="" href="{{ asset("/assets/compiled/css/auth.css") }}">
  <link rel="stylesheet" href="{{ asset("/assets/extensions/sweetalert2/sweetalert2.min.css") }}">
  <link rel="stylesheet" crossorigin href="{{ asset("/assets/compiled/css/extra-component-sweetalert.css") }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  
</head>
<body>

  
@include('sweetalert::alert')
    
  @if ($message = session('success'))
  <div class="alert alert-light-success color-success alert-dismissible show fade">
      <i class="bi bi-check-circle"></i> {{ $message[0] }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

    @yield('content')
    
  



    <script src="{{ asset("/assets/extensions/sweetalert2/sweetalert2.min.js") }}"></script>
    <script src="{{ asset("/assets/static/js/pages/sweetalert2.js") }}"></script>
    <script src="{{ asset("/assets/static/js/initTheme.js") }}"></script>
    <script src="{{ asset("/assets/static/js/components/dark.js") }}"></script>
    <script src="{{ asset("/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("/assets/compiled/js/app.js") }}"></script>
    <script src="{{ asset("/assets/extensions/apexcharts/apexcharts.min.js") }}"></script>
    <script src="{{ asset("/assets/static/js/pages/dashboard.js") }}"></script>

</body>

</html>