@extends('admin.master.master')
@section('title')
Edit banner
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner') }}">Banner</a></li>

                    <li class="breadcrumb-item">Edit banner</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit banner</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$banner->id}}" class="form-control" id="name" name="id" placeholder="Enter Name">

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">FIsh Image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="banner Image">
                                <img src="{{asset('/')}}{{$banner->image}}" width="70px" height="70px">
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Fish Name</label>
                                <select name="product_id" class="form-control" id="exampleFormControlSelect1" >
                                @foreach($product as $products)
                                <option value="{{$products->id}}"  {{$products->id == $banner->product_id ? 'selected' : '' }}>
                                {{$products->name}}
                                </option>
                                @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name"><b>Title</b></label>
                                <input type="text" class="form-control" id="name" name="title" value="{{$banner->title}}" placeholder="Enter Name">
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name"><b>Description</b></label>
                                <input type="text" class="form-control" id="name" name="desp" value="{{$banner->desp}}" placeholder="Enter Name">
                            </div>
                           
                        </div>

          
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                
                                <option value="1" {{$banner->status == 1 ? 'selected' : ''}} >Active</option>
                                <option value="0" {{$banner->status == 0 ? 'selected' : ''}} >Inactive</option>

                                </select>
                            </div>
                           
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>

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

 
  

