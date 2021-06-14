 <aside id="leftsidebar" class="sidebar" style="background:black">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">

           
           <img src="{{asset('/')}}public/admin/assets/images/xs/avatar1.jpg" width="48" height="48" alt="User" />




       </div>
       <div class="info-container">
        <div class="name" data-toggle="dropdown">{{ Auth::user()->name }}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
            <ul class="dropdown-menu slideUp">

                <!-- <li><a href="{{ route('admin.profile') }}"><i class="material-icons">person</i>Profile</a></li> -->


                <li class="divider"></li>
                <li>


                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
        <div class="email">{{ Auth::user()->email }}</div>

    </div>
</div>
<!-- #User Info --> 
<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="{{ Route::is('customer_dashoard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span> </a></li> -->

        <li class="nav-item">
                <a href="{{ route('user_pending_order') }}" class="nav-link">
                <i class="zmdi zmdi-label zmdi-hc-fw"></i>
                  <span>Pending Order</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('order_history') }}" class="nav-link">
                <i class="zmdi zmdi-label zmdi-hc-fw"></i>
                  <span>Order history</span>
                </a>
              </li>
         
    </ul>
</div>
<!-- #Menu --> 
</aside>

<i class="zmdi zmdi-assignment zmdi-hc-fw"></i>