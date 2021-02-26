<!DOCTYPE html>
<html lang="en">

<head>
  <title>Anyday Money</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <meta name="keywords" content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  
  <meta name="author" content="Anyday Money">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">  
  <link href="{{ asset('assets/css/nouislider.min.css')}}" rel="stylesheet">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('assets/css/slick.css')}}" rel="stylesheet">   
  <link href="{{ asset('assets/css/slick-theme.css')}}" rel="stylesheet">   
  <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">

  <script src="{{ asset('assets/js/jquery-2.2.0.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
  <style>
      .help-block{
          color:red;
      }
  </style>
</head>
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>

<body class="">
  @include('user.include.header')
  @yield('content')
  @include('user.include.footer')

@yield('srpt-extjs')
@yield('script')
<script>

$.fn.equalHeights = function(){
  var max_height = 0;
  $(this).each(function(){
    max_height = Math.max($(this).height(), max_height);
  });
  $(this).each(function(){
    $(this).height(max_height);
  });
};

$(document).ready(function(){
$('.left, .right').equalHeights();  


 $(".pan .attach-files").click(function(){
    $(".right, .left").css("min-height", "620px");        
 });

 $(".Current-add .attach-files, .permanent-add .attach-files").click(function(){
    $(".right, .left").css("min-height", "855px");        
 });

 $(".bank-statement .attach-files").click(function(){
    $(".right, .left").css("min-height", "710px");        
 });

 $(".back").click(function(){
    $(".right, .left").css("min-height", "650px");        
 });

 });   
$(window).resize(function(){
    $('.left, .right').equalHeights();
});
</script>
</body>

</html>