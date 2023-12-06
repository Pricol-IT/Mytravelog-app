<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') - {{ config('app.name') }}</title>
  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  
@include('approver.parts.links')
  <!-- Vendor CSS Files -->
  
</head>

<body>
    <!-- ======= Header ======= -->
@include('approver.parts.header')
  
  <!-- ======= Sidebar ======= -->
@include('approver.parts.sidebar')
@yield('main')
  

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
@include('approver.parts.script')
@yield('script')
</body>

</html>