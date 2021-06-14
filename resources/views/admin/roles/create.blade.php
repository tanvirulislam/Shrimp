@extends('admin.master.master')
@section('title')
Dashboard
@endsection


@section('body')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Admin
                <small class="text-muted">Welcome to Admin Panel</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles') }}">All Roles</a></li>

                    <li class="breadcrumb-item">Create Roles</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Role</h2>
                       
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name">
                        </div>

                        <div class="form-group">
<input type="checkbox" id="checkPermissionAll" value="1" class="filled-in" />
                            <label for="checkPermissionAll">ALL</label>
                      </div>
                      <hr>
                       @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                      <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
<!--<input type="checkbox" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" class="filled-in" />-->
                            <label for="checkPermission">{{ $group->name }}</label>
                              </div>
                          </div>
                          <div class="col-md-9 role-{{ $i }}-management-checkbox">
                            @php
                                            $permissions = App\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                          @foreach ($permissions as $permission)
                              <div class="form-group">


                              <input type="checkbox" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" class="filled-in" />
                            <label for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>


                          </div>

                               @php  $j++; @endphp

                              @endforeach
                          </div>
                      </div>
                          @php  $i++; @endphp
                           <hr style="height: 2px;
    background: cornflowerblue;">
                            @endforeach
                       
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
@endsection

@section('scripts')


     <script>
    /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }
        
</script>

@endsection

 
  

