<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('/')}}public/frontEnd/images/logo.png" type="image/x-icon" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/flaticon.css" /> -->
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/slicknav.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/animate.css" />
    <link rel="stylesheet" href="{{asset('/')}}public/frontEnd/css/style.css" />

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="{{asset('/')}}public/frontEnd/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('frontEnd.layout.header')

    @yield('body')

    <!-- <div class="small_screen_footer">
        <div class="row text-center">
            <div class="col-3">
            <a href="{{route('index')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <div class="col-3">
            <i style="color:white" class="fa fa-search search_icon" aria-hidden="true"></i>
            </div>
            <div class="col-3">
            <a href="{{route('cart.index')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <sup style="left: -25px;">{{ Cart::getContent()->count()}}</sup></a>
            </div>
            <div class="col-3">
            @if(Auth::check())
            <a href="{{route('user_pending_order')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
            @else
            <a href="{{route('customer_dashoard_login')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
            @endif
            </div>
        </div>
    </div> -->
    @include('frontEnd.layout.footer')



    <script src="{{asset('/')}}public/frontEnd/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/jquery.slicknav.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/owl.carousel.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/jquery.nicescroll.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/jquery.zoom.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/jquery-ui.min.js"></script>
    <script src="{{asset('/')}}public/frontEnd/js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.error('{{ $error }}', 'Error', {
        closeButton: true,
        progressBar: true,
    });
    @endforeach
    @endif
    </script>
    
    <script>
    $(document).ready(function() {
        $(".search_icon").click(function() {
            $(".small_screen_search").slideToggle("fast");
        });
    });
    </script>
    
</body>