<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Dashboard">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>@yield('title')</title>
<!-- Favicon-->

<link rel="shortcut icon" type="image/png" href="{{asset('/')}}public/admin/assets/images/logo.png">
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/bootstrap/css/bootstrap.min.css">

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css"/>
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/morrisjs/morris.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/main.css">
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/color_skins.css">
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/multi-select/css/multi-select.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">        
        <div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30"><img src="{{asset('/')}}public/admin/assets/images/logo.png" width="48" height="48" alt="Nexa"></div>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
@include('admin.include.header')

<!-- Left Sidebar -->
@include('admin.include.leftsidebar')

<!-- Right Sidebar -->


<!-- Chat-launcher -->


<!-- Main Content -->
@yield('body')
<!-- Jquery Core Js --> 

<script src="{{asset('/')}}public/admin/assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('/')}}public/admin/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{asset('/')}}public/admin/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('/')}}public/admin/assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="{{asset('/')}}public/admin/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('/')}}public/admin/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('/')}}public/admin/assets/bundles/mainscripts.bundle.js"></script>
<script src="{{asset('/')}}public/admin/assets/js/pages/index.js"></script>
<script src="{{asset('/')}}public/admin/assets/js/pages/charts/jquery-knob.min.js"></script>

<!-- Jquery DataTable Plugin Js --> 
<script src="{{asset('/')}}public/admin/assets/bundles/datatablescripts.bundle.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{asset('/')}}public/admin/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>


<script src="{{asset('/')}}public/admin/assets/js/pages/tables/jquery-datatable.js"></script>

<script src="{{asset('/')}}public/admin/assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js --> 

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
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
        function deleteAgent(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
function approveAgent(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to Active This User ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, active it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The Agent  Remain Inactive :)',
                        'info'
                    )
                }
            })
        }

         function inactiveAgent(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to Inactive This User ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, inactive it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('inactive-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The Agent  Remain Active :)',
                        'info'
                    )
                }
            })
        }
    </script>

    

    @yield('scripts')
</body>
</html>