@extends('admin.master.master')

@section('title')
{{ $order->Username }} | Fish And Shrimp
@endsection


@section('body')
<div class="content">

<section class="content">
<br>
    <br>
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
          <li class="breadcrumb-item"><a href="javascript:void(0);">order</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Order List</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $order->Username }}</li>
          </ol>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          
        </div>
        <div class="col-sm-6">
          
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 
    <div class="row">
      <div class="col-12">
       <div class="card">
        <div class="card-header">
          <h4 class="card-title">Order From {{ $order->Username }} </>
            @if($order->status == 1)
            <span class="badge badge-success">Confirmed</span>
            @endif
          </h4>
        </div>
        <!-- /.card-header -->
        
      </div>
      <!-- /.card -->
    </div>
  </div>

  <div class="row">
    <div class="col-6">
     <div class="card">
      <div class="card-header">
        <h4 class="card-title">Customer Information</h4>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <ul>
          <li><b>Name:</b> {{ $order->Username }}</li>
          <!-- <li><b>Phone:</b> {{ $order->Userphone }}</li> -->
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-6">
   <div class="card">
    <div class="card-header">
      <h3 class="card-title">Shipping Information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <ul>
        <li><b>Name:</b> {{ $order->customer_name }}</li>
        <li><b>Phone:</b> {{ $order->phone_num }}</li>
        <li><b>Email:</b> {{ $order->email }}</li>
        <li><b>Address:</b> {{ $order->address }}</li>
        <li style="color:red;"><b>Message:</b> {{ $order->message }}</li>
      </ul>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
     <div class="card">
      <div class="card-header">
        <h3 class="card-title">Order Information</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Item Name</th>
              <th>Item Quantity</th>
              <th>Item Price</th>
              <th>Item sub-total</th>
              
            </tr>
          </thead>
          <tbody>
           @foreach($details as $key=>$category)
           <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category->product_name }} </td>
            <td>{{ $category->product_quantity }} </td>
            <td>
              {{ $category->product_price }}
            </td>
            <td>{{ $category->order_total }}</td>
          </tr>
          @endforeach
        </tbody>
        
        
      </table>
      <h5 class="text-left" > Total Price: {{ $order->order_total }}</h5>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="row">
        @if($order->status == 0)
        <div class="col-md-6"> 
         <form action="{{ route('admin.order.update') }}" id="form_validation" method="POST">
          @csrf
          <div class="form-group">
           <input type="hidden" class="form-control" name="id" value="{{ $order->id }}" id="exampleInputEmail1" placeholder="Enter Name">
           <input type="hidden" class="form-control" name="status" value="1" id="exampleInputEmail1" placeholder="Enter Name">
         </div>
         
         <button type="submit" class="btn btn-success">Confirm</button>
         
       </form>
     </div>
     @endif
     <div class="col-md-6 text-left"><a href="{{ route('admin.order.print',['id'=>$order->id]) }}" type="button" class="btn btn-info">Print</a></div>
   </div>
   
   
 </div>
</div>
<!-- /.card -->
</div>
</div>
</section>
</div>
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