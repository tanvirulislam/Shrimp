@extends('admin.master.master')
@section('title')
All order
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
          <li class="breadcrumb-item"><a href="javascript:void(0);">size</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid">
   <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-4">
      <!-- @if (Auth::guard('admin')->user()->can('size.create')) -->
      <!-- <a href="{{ route('admin.size.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect" >Add size</a> -->
      <!-- @endif -->
    </div>

  </div>
  
  <div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card">
        <div class="header">
          <h2> order List</h2>
          
        </div>
        <div class="body">
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
              <tr>
               <th>Id</th>
               <th>OrderId</th>
               <th>Customer name</th>
               <th>Total price</th>
               <th>Shipping name</th>
               <th>Shipping address</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
           </thead>
           <tfoot>
            <tr>
            <th>Id</th>
            <th>OrderId</th>
               <th>Customer name</th>
               <th>Total price</th>
               <th>Shipping name</th>
               <th>Shipping address</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            
          @foreach($orders as $key=>$category)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td> 
                {{$category->pin}}
              </td>
              <td> 
                {{$category->Username}}
              </td>
              <td> 
                {{$category->order_total}}
              </td>
              
              <td> 
                {{$category->customer_name}}
              </td>
              <td> 
                {{$category->address}}
              </td>

              <td> 
               
                @if($category->status == 0)
                <span class="badge badge-danger">Pending</span>
                @else
                <span class="badge badge-success">Delivaried</span>
                @endif
                
              </td>
              

              <td><button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $category->id }})"><i class="material-icons">delete</i></button>
                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.order.destroy',$category->id) }}" method="POST" style="display: none;">
                  @csrf
                  
                </form>
                <a href="{{ route('admin.order.detail',$category->id) }}" type="button" class="btn btn-info text-light"><i class="material-icons">visibility</i></a>
                
                
              </td>
            </tr>
            @endforeach

        </tbody>
      </table>
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
       }
     </script>

     <script type="text/javascript">
      function deleteTag(id) {
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
    </script> 
    @endsection