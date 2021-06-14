 @php
 $usr = Auth::guard('admin')->user();
 @endphp
 <aside id="leftsidebar" class="sidebar">
     <!-- User Info -->
     <div class="user-info">
         <div class="image">

             @if(Auth::guard('admin')->user()->image == NUll)
             <img src="{{asset('/')}}public/admin/assets/images/xs/avatar1.jpg" width="48" height="48" alt="User" />
             @else
             <img src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" width="48" height="48" alt="User" />

             @endif



         </div>
         <div class="info-container">
             <div class="name" data-toggle="dropdown">{{ Auth::guard('admin')->user()->name }}</div>
             <div class="btn-group user-helper-dropdown">
                 <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                     role="button"> keyboard_arrow_down </i>
                 <ul class="dropdown-menu slideUp">

                     @if ( $usr->can('profile.view') || $usr->can('profile.edit'))
                     <li><a href="{{ route('admin.profile') }}"><i class="material-icons">person</i>Profile</a></li>

                     @endif


                     <li class="divider"></li>
                     <li>


                         <a href="{{ route('admin.logout.submit') }}" onclick="event.preventDefault();
                    document.getElementById('admin-logout-form').submit();"><i class="material-icons">input</i>Sign
                             Out</a>
                         <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST"
                             style="display: none;">
                             @csrf
                         </form>

                     </li>
                 </ul>
             </div>
             <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
         </div>
     </div>
     <!-- #User Info -->
     <!-- Menu -->
     <div class="menu">
         <ul class="list">
             <li class="header">MAIN NAVIGATION</li>
             @if ($usr->can('dashboard.view'))
             <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i
                         class="zmdi zmdi-home"></i><span>Dashboard</span> </a></li>
             @endif

             <!-- category button -->
             @if ($usr->can('category.create') || $usr->can('category.view') || $usr->can('category.edit') ||
             $usr->can('category.delete'))
             <li
                 class="{{ Route::is('admin.category') || Route::is('admin.category.create') || Route::is('admin.category.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.category') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Category</span>
                 </a></li>

             @endif

             <!-- end category button -->

             <!-- subcategory button -->
             @if ($usr->can('subcategory.create') || $usr->can('subcategory.view') || $usr->can('subcategory.edit') ||
             $usr->can('subcategory.delete'))
             <li
                 class="{{ Route::is('admin.subcategory') || Route::is('admin.subcategory.create') || Route::is('admin.subcategory.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.subcategory') }}"><i
                         class="zmdi zmdi-label zmdi-hc-fw"></i><span>Subcategory</span> </a></li>

             @endif

             <!-- end subcategory button -->

             <!-- product button -->
             @if ($usr->can('product.create') || $usr->can('product.view') || $usr->can('product.edit') ||
             $usr->can('product.delete'))
             <li
                 class="{{ Route::is('admin.product') || Route::is('admin.product.create') || Route::is('admin.product.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.product') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Product</span>
                 </a></li>

             @endif

             <!-- end product button -->

             <!-- store button -->
             @if ($usr->can('store.create') || $usr->can('store.view') || $usr->can('store.edit') ||
             $usr->can('store.delete'))
             <li
                 class="{{ Route::is('admin.store') || Route::is('admin.store.create') || Route::is('admin.store.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.store') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Store</span> </a>
             </li>

             @endif

             <!-- end store button -->

             <!-- store button -->
             @if ($usr->can('stock.create') || $usr->can('stock.view') || $usr->can('stock.edit') ||
             $usr->can('stock.delete'))
             <li
                 class="{{ Route::is('admin.stock') || Route::is('admin.stock.create') || Route::is('admin.stock.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.stock') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Stock</span> </a>
             </li>

             @endif

             <!-- end store button -->

             <!-- logo_offer button -->
             @if ($usr->can('logo_offer.create') || $usr->can('logo_offer.view') || $usr->can('logo_offer.edit') ||
             $usr->can('logo_offer.delete'))
             <li
                 class="{{ Route::is('admin.logo_offer') || Route::is('admin.logo_offer.create') || Route::is('admin.logo_offer.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.logo_offer') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Logo and
                         offer</span> </a></li>

             @endif

             <!-- end logo_offer button -->

             <!-- banner button -->
             @if ($usr->can('banner.create') || $usr->can('banner.view') || $usr->can('banner.edit') ||
             $usr->can('banner.delete'))
             <li
                 class="{{ Route::is('admin.banner') || Route::is('admin.banner.create') || Route::is('admin.banner.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.banner') }}"><i class="zmdi zmdi-label zmdi-hc-fw"></i><span>Banner</span>
                 </a></li>

             @endif

             <!-- end banner button -->

             <li class="nav-item">
                 <a href="{{ route('admin.new_order') }}" class="nav-link">
                     <i class="zmdi zmdi-label zmdi-hc-fw"></i>
                     <span>New Order</span>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('admin.order') }}" class="nav-link">
                     <i class="zmdi zmdi-label zmdi-hc-fw"></i>
                     <span>All Order</span>
                 </a>
             </li>


             @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') ||
             $usr->can('role.delete'))
             <li
                 class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.roles') }}"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i><span>Role</span>
                 </a></li>

             @endif
             @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') ||
             $usr->can('admin.delete'))
             <li
                 class="{{ Route::is('admin.users') || Route::is('admin.users.create') || Route::is('admin.users.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.users') }}"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i><span>Users</span>
                 </a>
             </li>

             @endif
             @if ($usr->can('permission.create') || $usr->can('permission.view') || $usr->can('permission.edit') ||
             $usr->can('permission.delete'))
             <li
                 class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.permission') }}"><i
                         class="zmdi zmdi-assignment zmdi-hc-fw"></i><span>Permission</span> </a>
             </li>

             @endif
         </ul>
     </div>
     <!-- #Menu -->
 </aside>

 <i class="zmdi zmdi-assignment zmdi-hc-fw"></i>