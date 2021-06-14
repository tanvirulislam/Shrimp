@extends('frontEnd.master.master')
@section('title')
DESH BANGLA FISH & SHRIMP
@endsection

@section('body')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Your cart</h4>
                <div class="site-pagination">
                    <a href="{{ route('index') }}">Home</a> /
                    <a href="">Your cart</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel-heading">
                    @if(\Cart::getTotalQuantity()>0)
                    <h4 class="text-center" style="color:#2C976B"><b>{{ Cart::getContent()->count()}} Item`s In Your
                            Cart<b>
                    </h4><br>
                    @else
                    <h4>No Item(s) In Your Cart</h4><br>
                    <a href="{{ route('index') }}" class="btn btn-info">Continue Shopping</a>
                    @endif
                </div>
            </div>
        </div>



    </div>
</div>
<!-- Page info end -->


<!-- cart section end -->
<section class="cart-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table">
                    <h3>Your Cart</h3>
                    <div class="cart-table-warp">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-th">Product</th>
                                    <th class="quy-th">Weight (KG)</th>
                                    <th class="quy-th"> Subtotal (TK)</th>
                                    <th class="size-th">Action</th>
                                    <!-- <th class="total-th">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartCollection as $item)
                                <tr>
                                    <td class="product-col">
                                        <img src="{{ $item->attributes->image }}" class="img-thumbnail" alt="image"
                                            width="200" height="200">
                                        <div class="pc-title">
                                            <h4>{{$item->name}}</h4>
                                            <p>{{$item->price}}</p>
                                        </div>
                                    </td>
                                    <td class="quy-col">
                                        <div class="quantity">
                                            <!-- <div class="pro-qty"> -->
                                            <form action="{{ route('cart.update') }}" method="POST" class="form-inline">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                                    <input type="number" class="form-control form-control-sm"
                                                        value="{{ $item->quantity }}" id="quantity" name="quantity"
                                                        style="width:70px;">
                                                </div>
                                                &nbsp;
                                                <button style="margin-top: inherit;"
                                                    class="btn btn-primary ">Update</button>
                                            </form>
                                            <!-- </div> -->
                                        </div>
                                    </td>
                                    <td class="size-col">
                                        <h4>{{ \Cart::get($item->id)->getPriceSum() }}</h4>
                                    </td>
                                    <td class="total-col">
                                        <form action="{{ route('cart.remove') }}" method="POST" class="form-inline">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <button style="margin-top: inherit;" class="btn btn-primary py-2 px-3"
                                                style="">Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="total-cost">
                        <h6>Total <span>BDT. {{ \Cart::getTotal() }}</span></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <form class="promo-code-form">
                    <input type="text" placeholder="Enter promo code">
                    <button>Submit</button>
                </form>
                <!-- <a href="" class="site-btn">Proceed to checkout</a>
                <a href="" class="site-btn sb-dark">Continue shopping</a> -->
                @if(count($cartCollection)>0)
                <a href="{{ route('index') }}" style="margin-top: inherit;" class="site-btn">Continue
                    Shopping</a>

                @if(Auth::check() && Auth::user()->role_id == 2 || Session::get('customerId'))
                <a href="{{route('shipping_info')}}" class="site-btn">Proceed To Checkout</a>
                @else
                <a href="{{route('loginPage')}}" class="site-btn">Proceed To Checkout</a>

                @endif
                @endif
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->
@endsection