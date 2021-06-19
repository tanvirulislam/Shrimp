@extends('frontEnd.master.master')
@section('title')
Wishlist | Fish & Shrimp E-commerce
@endsection

@section('body')
<br>
<div class="container">
    <div class="section-title">
            <h2>Your wishlist item</h2>
        </div>
        <br>
        <div class="row">
            @foreach ($all_wishlist as $item)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('/')}}{{$item->image}}" alt="image">
                        <div class="pi-links">
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->product_slug }}" id="id" name="id">
                                <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $item->sell_price }}" id="price" name="price">
                                <input type="hidden" value="{{ $item->image }}" id="img" name="img">

                                <input type="hidden" id="quantity" name="quantity"
                                    class="quantity form-control input-number" value="1" min="1" max="100">

                                <button type="submit" class="add-card"><i class="fa fa-shopping-cart"></i>
                                <span >ADD TO CART</span></button>
                            </form>

                        </div>
                    </div>
                    <div class="pi-text">
                        <div class="row">
                            <div class="col-md-5">
                                <h6>{{$item->name}} </h6>

                            </div>
                            <div class="col-md-7">
                                <span>{{$item->sell_price}} TK</span> &nbsp;
                                <span style="float: right">{{$item->weight}} KG</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
<br>
@endsection