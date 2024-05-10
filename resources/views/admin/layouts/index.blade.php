<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | {{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::asset('assets/ui/img/favicon.png') }}" rel="icon">
  <link href="{{ URL::asset('assets/ui/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  @include('admin.layouts.head_css')
  @yield('css')
</head>

<body>
  @include('admin.layouts.header')
  @include('admin.layouts.sidebar')

  <main id="main" class="main">

    @show
    @yield('content')

  </main><!-- End #main -->

  @include('admin.layouts.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('assets/ui/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/quill/quill.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ URL::asset('assets/ui/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::asset('assets/ui/js/main.js') }}"></script>

  @yield('script')
</body>

</html>