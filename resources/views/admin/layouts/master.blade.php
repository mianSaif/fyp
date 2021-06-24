
<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('title')
    <!-- General CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://fonts.googleapis.com/css?family=font+awesome') }}">

    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin-assets/img/favicon.ico') }}' />
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    @yield('style')
</head>



<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Including Navbar -->
      @include('admin.partial.navbar')
      <!-- Including pages -->
      @include('admin.partial.sidebar')

      <!-- Main Content -->
        @yield('content')

      <!-- including footer -->
         @include('admin.partial.footer')
         @yield('script')
</body>

</html>

