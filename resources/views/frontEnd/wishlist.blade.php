@extends('frontEnd.master.master')
@section('title')
Wishlist | Fish & Shrimp E-commerce
@endsection

@section('body')

<div class="container">
    @foreach($all_wishlist as $cat_product)
    <a href="{{route('product_details', $cat_product->product_slug)}}">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="product-image-wrapper"
                style="box-shadow: 0px 4px 8px 0px rgb(0 0 0 / 20%); border-radius: 5px;">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img class="feature_item_img" src="{{asset('/')}}{{$cat_product->image}}" alt="" />
                        <h2>{{$cat_product->sell_price}} TK</h2>
                        <p>{{$cat_product->name}}</p>
                        <p>{{$cat_product->weight}} KG</p>

                        <span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>

                        <div class="row" style="">
                            <!-- <div class="col-6 col-sm-6">
												<a style="margin-bottom: 0px; padding: 9px 11px;color: white; background: #fe980f;" href="#" class="btn btn-default add-to-cart cart_color_hover"><i class="fa fa-shopping-cart"></i>cart</a>

											</div> -->
                            <div class="col-md-12">

                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $cat_product->product_slug }}" id="id" name="id">
                                    <input type="hidden" value="{{ $cat_product->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $cat_product->sell_price }}" id="price" name="price">
                                    <input type="hidden" value="{{ $cat_product->image }}" id="img" name="img">

                                    <input type="hidden" id="quantity" name="quantity"
                                        class="quantity form-control input-number" value="1" min="1" max="100">

                                    <div class="row">
                                        <!-- <div class="col-6 col-md-6">
												<a href="{{route('wishlist', $cat_product->product_slug)}}" style="" 
												class="btn btn-default add-to-cart "><i class="fa fa-heart" aria-hidden="true"></i>
												</a>
												
												</div> -->
                                        <div class="col-12">
                                            <button style="" class="btn btn-default add-to-cart "><i
                                                    class="fa fa-shopping-cart"></i>
                                            </button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                          
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection