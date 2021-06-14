@extends('admin.master.master')
@section('title')
Dashboard
@endsection


@section('body')
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard
                <small class="text-muted">Welcome to Admin Panel</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i>Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="alert bg-teal alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            You Have 2 new Order   <b>Click Here</b>
                        </div>
            </div>
        </div>
        <div class="row clearfix mt-4">

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2 l-pink">
             
                <div class="body">
                  <div class="icon col-12">
                    <div class="chart chart-pie"><i class="material-icons">assignment</i></div>
                  </div>
                  <div class="content col-12">
                    <div class="text">Total Category</div>
                    <div class="number">98</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2 l-parpl">
                <div class="body">
                  <div class="icon col-12  m-b-5">
                    <div class="chart chart-bar"><i class="material-icons">insert_drive_file</i></div>
                  </div>
                  <div class="content col-12">
                    <div class="text">Total Item</div>
                    <div class="number">457,512</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2 l-turquoise">
                <div class="body">
                  <div class="icon col-12 ">
                    <span class="chart chart-line"><i class="material-icons">insert_drive_file</i></span>
                  </div>
                  <div class="content col-12">
                    <div class="text">Available Item</div>
                    <div class="number">125,543</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2 l-amber">
                <div class="body">
                  <div class="icon col-12  m-b-5">
                    <div class="chart chart-bar"><i class="material-icons">insert_drive_file</i></div>
                  </div>
                  <div class="content col-12">
                    <div class="text">Sold Item</div>
                    <div class="number">1,063</div>
                  </div>
                </div>
              </div>
            </div>
        </div>        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card product-report">
                    <div class="header">
                        <h2>Product Report</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix m-b-25">
                            <div class="col-lg-4 col-md-4 col-sm-4 text-center m-b-20">                               
                                <h3 class="counter m-b-0">$4,516</h3>
                                <small class="text-muted">Sales Report</small>
                                <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="3" data-bar-Spacing="6" data-bar-Color="rgb(134, 139, 239)">7,5,3,1,5,9,8,5,2,6,5,4,2,5,8,4,5,6,3,5,7,8</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 text-center m-b-20">
                                <h3 class="counter m-b-0">$6,481</h3>
                                <small class="text-muted">Annual Revenue </small>
                                <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="3" data-bar-Spacing="6" data-bar-Color="rgb(25, 161, 183)">2,5,8,4,5,6,3,5,7,8,4,6,7,5,3,1,5,9,8,5,5,4</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 text-center m-b-20">
                                <h3 class="counter m-b-0">$3,915</h3>
                                <small class="text-muted">Monthly Revenue</small>
                                <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="3" data-bar-Spacing="6" data-bar-Color="rgb(254, 191, 15)">6,5,4,3,2,1,9,8,7,8,5,2,2,5,8,4,5,6,7,8,4,6</div>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            
        </div>
      
        <div class="row clearfix">
            <div class="col-sm-12">
                 <div class="card">
                    <div class="header">
                        <h2>Latest Order</h2>
                       
                    </div>
                    <div class="body">
                        <div class="table-responsive social_media_table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Adress</th>
                                        <th>Order Id</th>
                                        <th>Action</th>                                                
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
       
      
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <p class="m-b-0">© 2021 Admin Panel Developed by <a href="https://codetreebd.com/" target="black" style="color:#6DBD44;"><b>CODETREE</b></a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    /*global $ */
    $(document).ready(function() {
        "use strict";
        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI
      
        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
      
        $(".menu > ul > li").hover(function(e) {
          if ($(window).width() > 943) {
            $(this).children("ul").stop(true, false).fadeToggle(150);
            e.preventDefault();
          }
        });
        //If width is more than 943px dropdowns are displayed on hover    
        $(".menu > ul > li").on('click',function() {
          if ($(window).width() <= 943) {
            $(this).children("ul").fadeToggle(150);
          }
        });
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
      
        $(".h-bars").on('click',function(e) {
          $(".menu > ul").toggleClass('show-on-mobile');
          e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
      
      });
    </script>  