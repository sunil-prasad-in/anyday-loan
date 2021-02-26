<!DOCTYPE html>
<html lang="en">

<head>
  <title>Anyday Money</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <meta name="keywords" content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  
  <meta name="author" content="Anyday Money">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/admin.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">

  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">

  <script src="{{ asset('assets/js/jquery-2.2.0.min.js') }}" type="text/javascript"></script>
  <!--Tempory css load -->	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nouislider.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">-->
  
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">-->
  
</head>


<body class="">
  @include('dashboard.include.header')
  @yield('content')
  @include('dashboard.include.footer')

@yield('srpt-extjs')
@yield('script')
</body>

</html>