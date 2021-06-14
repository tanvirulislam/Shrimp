@extends('admin.master.master')
@section('title')
Product
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
          <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid">
   <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-4">
      @if (Auth::guard('admin')->user()->can('product.create'))
      <a href="{{ route('admin.product.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect" >Add product</a>
      @endif
    </div>

  </div>
  
  <div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card" style="width: fit-content;">
        <div class="header">
          <h2> Product List</h2>
          
        </div>
        <div class="body">
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
            <tr>
              <th >id</th>
              <th >image</th>
              <th >Category </th>
              <th >Subcategory </th>
              <th >Name</th>
              <!-- <th >Description</th> -->
              <th >weight (KG)</th>
              <th >purchase_price(TK)</th>
              <th >sell_price (TK)</th>
              <!-- <th >stock</th>
              <th>Store</th> -->
              <th >status</th>
              <th >action</th>
          </tr>
           </thead>
           <tfoot>
            <tr>
              <th >id</th>
              <th >image</th>
              <th >Category </th>
              <th >Subcategory </th>
              <th >Name</th>
              <!-- <th >Description</th> -->
              <th >weight</th>
              <th >purchase_price</th>
              <th >sell_price</th>
              <!-- <th >stock</th>
              <th>Store</th> -->
              <th >status</th>
              <th >action</th>
            </tr>
          </tfoot>
          <tbody>
            
            @foreach ($product as $products) 
            <tr>
             <td>{{ $loop->index+1 }}</td>

             <td><img src="{{asset('/')}}{{$products->image}}" width="70px" height="70px"></td>

             <td>
              @foreach($category as $cat)
              @if($cat->slug == $products->category_slug)
              {{ $cat->name }}
              @endif
              @endforeach
             </td>

             <td>
              @foreach($subcategory as $subcat)
              @if($subcat->slug == $products->subcategory_slug)
              {{ $subcat->name }}
              @endif
              @endforeach
             </td>

             <td> {{ $products->name }}</td>
             <td> {{ $products->weight }}</td>
             <td> {{ $products->purchase_price }}</td>
             <td> {{ $products->sell_price }}</td>

            <td>
              @if($products->status == 1)
              Active
              @else
              Inactive
              @endif
            </td>

            <td>
            @if(Auth::guard('admin')->user()->can('product.view'))
            <p class="btn btn-info productDetails"  style="cursor:pointer;" title="Product Details" 
            data-pro_id="{{$products->id}}"> <i class="material-icons">visibility</i></p>
            @endif
              @if (Auth::guard('admin')->user()->can('product.edit'))
              <p class="btn btn-success text-white edit-product"  
              data-fish_id="{{$products->id}}"><i class="material-icons">build</i></p>
              @endif
              @if (Auth::guard('admin')->user()->can('product.delete'))
              <button  type="button" class="btn btn-danger text-light" onclick="deleteTag({{ $products->id}})" data-toggle="tooltip" title="Delete"><i class="material-icons">delete</i></button>
              <form id="delete-form-{{ $products->id }}" action="{{ route('admin.product.delete',$products->id) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
                
              </form>
              @endif
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

<!-- product view -->
<div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 modal-data">

    </div>
  </div>
</div>



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

<!-- product view -->
    <script>
          //product details
          $(".productDetails").click(function(){
        var pro_id=$(this).data('pro_id');
        //ajax
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.product_details.view')}}",
		  type:"POST",
		  data:{'fish_id':pro_id},
		        //dataType:'json',
		        success:function(data){
		        	$(".modal-data").html(data);
		          $('.productModal').modal('show'); 
		        },
		        error:function(){
		          toastr.error("Something went Wrong, Please Try again.");
		        }
		      });

		  //end ajax

       });  
    </script>

    <!-- edit product -->
    <script>
          //product details
          $(".edit-product").click(function(){
        var pro_id=$(this).data('fish_id');
        //ajax
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.product.edit')}}",
		  type:"POST",
		  data:{'fish_id':pro_id},
		        //dataType:'json',
		        success:function(data){
		        	$(".modal-data").html(data);
		          $('.productModal').modal('show'); 
		        },
		        error:function(){
		          toastr.error("Something went Wrong, Please Try again.");
		        }
		      });

		  //end ajax

       });  
    </script>



    @endsection