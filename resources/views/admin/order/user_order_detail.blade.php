@extends('frontEnd.master.master')

@section('title')
{{ $order->Username }} | Fish And Shrimp
@endsection


@section('body')
<br>
<section>
    <div class="container">
        <section class="content">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{route('user_pending_order')}}" type="button" class="btn btn-success">Pending
                                order</a>
                            <a href="{{route('order_history')}}" type="button" class="btn btn-info">Order history</a>

                            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons"></i>Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <br>
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
                                <li><b>Phone:</b> {{ $order->Userphone }}</li>
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
                            <div class="table-responsive">
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
                            </div>
                            <h5 class="text-left"> Total Price:BDT {{ $order->order_total }}</h5>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
</section>


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
            document.getElementById('delete-form-' + id).submit();
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