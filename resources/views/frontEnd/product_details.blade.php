@extends('frontEnd.master.master')
@section('title')
{{$products->name}}
@endsection

@section('body')

<!-- product section -->
<section class="product-section">
    <div class="container">
        <!-- <div class="back-link">
            <a href="./category.html"> &lt;&lt; Back to Category</a>
        </div> -->
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img src="{{asset('/')}}{{$products->image}}" alt="image" />
                </div>
                <!-- <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                    <div class="product-thumbs-track">
                        <div class="pt active" data-imgbigurl="img/single-product/1.jpg"><img
                                src="img/single-product/thumb-1.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/2.jpg"><img
                                src="img/single-product/thumb-2.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/3.jpg"><img
                                src="img/single-product/thumb-3.jpg" alt=""></div>
                        <div class="pt" data-imgbigurl="img/single-product/4.jpg"><img
                                src="img/single-product/thumb-4.jpg" alt=""></div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{$products->name}}</h2>
                <h3 class="p-price">{{$products->sell_price}} TK</h3>

                <!-- <h4 class="p-stock">Available: <span>In Stock</span></h4> -->

                @if($products->status == 1)
                Available: <span style="background: #007BFF;" class="badge badge-primary"> In stock</span>
                @else
                Available: <span style="background: #FFC107;" class="badge badge-warning"> Out of stock</span>
                @endif

                <div class="p-rating">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                </div>
                <!-- <div class="p-review">
                    <a href="">3 reviews</a>|<a href="">Add your review</a>
                </div> -->
                
                    <span>Weight
                    {{$products->weight}} &nbsp; KG </span>

                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $products->product_slug }}" id="id" name="id">
                    <input type="hidden" value="{{ $products->name }}" id="name" name="name">
                    <input type="hidden" value="{{ $products->sell_price }}" id="price" name="price">
                    <input type="hidden" value="{{ $products->image }}" id="img" name="img">

                    <input type="hidden" id="quantity" name="quantity" class="quantity form-control input-number"
                        value="1" min="1" max="100">
                    <br>
                    <button style="" class="site-btn"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </form>

                <!-- <a href="#" class="site-btn">SHOP NOW</a> -->

                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>{!!$products->desp!!}</p>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="social-sharing">
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-pinterest"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->


<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
    <div class="container">
        <div class="section-title">
            <h2>RELATED PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($related_fish->shuffle() as $item)
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
                            <a href="{{route('wishlist', $item->product_slug)}}" class="wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
            @endforeach
        </div>
    </div>
</section>
<!-- RELATED PRODUCTS section end -->

@endsection