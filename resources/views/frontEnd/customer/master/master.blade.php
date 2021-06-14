<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <link href="{{asset('/')}}public/frontEnd/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/frontEnd/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('/')}}public/frontEnd/css/price-range.css" rel="stylesheet">
    <link href="{{asset('/')}}public/frontEnd/css/animate.css" rel="stylesheet">
	<link href="{{asset('/')}}public/frontEnd/css/main.css" rel="stylesheet">
	<link href="{{asset('/')}}public/frontEnd/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" 
    integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" 
    crossorigin="anonymous" /> -->
     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>

@include('frontEnd.layout.header')

@yield('body')

    

@include('frontEnd.layout.footer')



<script src="{{asset('/')}}public/frontEnd/js/jquery.js"></script>
	<script src="{{asset('/')}}public/frontEnd/js/bootstrap.min.js"></script>
	<script src="{{asset('/')}}public/frontEnd/js/jquery.scrollUp.min.js"></script>
	<script src="{{asset('/')}}public/frontEnd/js/price-range.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/jquery.prettyPhoto.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/fontawesome.min.js" integrity="sha512-EoO/pFlXO+SljyHyQFeFD2ln3nJWQh0SL9CsEaZnGwpuwbC8nB1LvhJg+tN3gC+FRDMnR6k2/e2la2ZuLAo+2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>
</body>