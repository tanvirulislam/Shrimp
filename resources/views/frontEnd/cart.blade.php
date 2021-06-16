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
                    @foreach($cartCollection as $item)
                    <div class="row">

                        <div class="col-md-3 col-3">
                            <img src="{{ $item->attributes->image }}" class="img-thumbnail" alt="image" width="200 px" height="200 px">
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="pc-title">
                                <h6>{{$item->name}}</h6>

                                <p class="mt-3">Price (TK)</p>
                                <p>Weight (KG)</p>
                                <p>Subtotal (TK)</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-3 ">
                            <div class="pc-title">
                                <form action="{{ route('cart.remove') }}" method="POST" class="form-inline">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button style="margin-left: -14px;background: transparent; border: none; color: black;" class="btn btn-primary py-2 px-3"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                                <p>{{$item->price}} </p>
                                <form action="{{ route('cart.update') }}" method="POST" class="form-inline">
                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <!-- <div class="quy-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                            <input type="text" value="{{ $item->quantity }}" id="quantity" name="quantity">
                                        </div>
                                    </div>
                                </div> -->

                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm cart-input-field" value="{{ $item->quantity }}" id="quantity" name="quantity" style="width:70px;">
                                    </div>
                                    &nbsp;
                                    <button style=" color: #000000; background: transparent; border: none;" class="btn btn-primary cart-update-btn">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <p>{{ \Cart::get($item->id)->getPriceSum() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <p>Total <span>(including vat)</span> </p>
                        </div>
                        <div class="col-md-6 col-6">
                            <h6>Total <span>BDT. {{ \Cart::getTotal() }}</span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <form class="promo-code-form">
                    <input type="text" placeholder="Enter promo code">
                    <button>Submit</button>
                </form>
               
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