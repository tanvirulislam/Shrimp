@extends('frontEnd.master.master')
@section('title')
Search Item | Fish & Shrimp E-commerce
@endsection

@section('body')
<br>
<div class="container">
    @if($product->isNotEmpty())
    <div class="row">
        @foreach( $product as $cat_product)
        <div class="col-lg-9  order-2 order-lg-2 mb-5 mb-lg-0">
            <div class="row">

                <div class="col-lg-4 col-sm-6">
                    <a class="gg" style="background:transparent"
                        href="{{route('product_details', $cat_product->product_slug)}}">

                        <div class="product-item">
                            <div class="pi-pic">
                                <div class="tag-sale">ON SALE</div>
                                <img src="{{asset('/')}}{{$cat_product->image}}" alt="image">
                                <div class="pi-links">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $cat_product->product_slug }}" id="id" name="id">
                                        <input type="hidden" value="{{ $cat_product->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $cat_product->sell_price }}" id="price"
                                            name="price">
                                        <input type="hidden" value="{{ $cat_product->image }}" id="img" name="img">

                                        <input type="hidden" id="quantity" name="quantity"
                                            class="quantity form-control input-number" value="1" min="1" max="100">
                                       


                                        <a href="{{route('wishlist', $cat_product->product_slug)}}" style="    margin-left: 11px;" class="wishlist-btn"><i
                                                class="fa fa-heart" aria-hidden="true"></i></a>
                                                
                                                <button type="submit" class="add-card"><i class="fa fa-shopping-cart"></i>
                                <span >ADD TO CART</span></button>
                                
                                    </form>
                                </div>
                            </div>
                            <div class="pi-text">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6>{{$cat_product->name}} </h6>

                                    </div>
                                    <div class="col-md-7">
                                        <span>{{$cat_product->sell_price}} TK</span> &nbsp;
                                        <span style="float: right">{{$cat_product->weight}} KG</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class=" w-100 pt-3 mb-5">

                </div>


            </div>
        </div>
        @endforeach
    </div>
    @else
    <div>
        <p>No item found</p>
    </div>
    @endif
</div>

@endsection