@extends('frontEnd.master.master')
@section('title')
DESH BANGLA FISH & SHRIMP
@endsection

@section('body')

<!-- Category section -->
<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-1 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Categories</h2>
                    <ul class="category-menu">
                        @foreach ($category_fish as $cat_fish)
                        <li><a href="#">{{$cat_fish->name}}</a>
                            <ul class="sub-menu">
                                @foreach ($cat_wise_product as $cat_product)
                                @if ($cat_product->category_slug == $cat_fish->slug)
                                <li><a href="{{route('product_details', $cat_product->product_slug)}}">{{$cat_product->name}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">Price</h2>
                    <div class="price-range-wrap">
                        <!-- <h4>Price</h4> -->
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                            data-min="10" data-max="270">
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;">
                            </div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                style="left: 0%;">
                            </span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                style="left: 100%;">
                            </span>
                        </div>
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="filter-widget mb-0">
                    <h2 class="fw-title">color by</h2>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" name="cs" id="gray-color">
                            <label class="cs-gray" for="gray-color">
                                <span>(3)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="orange-color">
                            <label class="cs-orange" for="orange-color">
                                <span>(25)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="yollow-color">
                            <label class="cs-yollow" for="yollow-color">
                                <span>(112)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="green-color">
                            <label class="cs-green" for="green-color">
                                <span>(75)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="purple-color">
                            <label class="cs-purple" for="purple-color">
                                <span>(9)</span>
                            </label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="blue-color" checked="">
                            <label class="cs-blue" for="blue-color">
                                <span>(29)</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">Size</h2>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xs-size">
                            <label for="xs-size">XS</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="s-size">
                            <label for="s-size">S</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="m-size" checked="">
                            <label for="m-size">M</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="l-size">
                            <label for="l-size">L</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xl-size">
                            <label for="xl-size">XL</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xxl-size">
                            <label for="xxl-size">XXL</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h2 class="fw-title">Brand</h2>
                    <ul class="category-menu">
                        <li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
                        <li><a href="#">Asos<span>(56)</span></a></li>
                        <li><a href="#">Bershka<span>(36)</span></a></li>
                        <li><a href="#">Missguided<span>(27)</span></a></li>
                        <li><a href="#">Zara<span>(19)</span></a></li>
                    </ul>
                </div> -->
            </div>

            @foreach ($category_fish as $category)
           
            <div class="col-lg-9  order-2 order-lg-2 mb-5 mb-lg-0">
                <span>{{$category->name}}</span>
                <div class="row">
                    @foreach ($cat_wise_product as $cat_product)
                    @if ($cat_product->category_slug == $category->slug)
                    <div class="col-lg-4 col-sm-6">
                        <a class="gg" style="background:transparent;"
                            href="{{route('product_details', $cat_product->product_slug)}}">

                            <div class="product-item">
                                <div class="pi-pic">
                                    <div class="tag-sale">ON SALE</div>
                                    <img src="{{asset('/')}}{{$cat_product->image}}" alt="image">
                                    <div class="pi-links">
                                        <form  action="{{ route('cart.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $cat_product->product_slug }}" id="id"
                                                name="id">
                                            <input type="hidden" value="{{ $cat_product->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $cat_product->sell_price }}" id="price"
                                                name="price">
                                            <input type="hidden" value="{{ $cat_product->image }}" id="img" name="img">

                                            <input type="hidden" id="quantity" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1" max="100">
                                                
                                                <a href="{{route('wishlist', $cat_product->product_slug)}}" style="    margin-left: 11px;" class="wishlist-btn"><i class="fa fa-heart"
                                                    aria-hidden="true"></i></a>
                                                    
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

                    @endif
                    @endforeach
                    <div class=" w-100 pt-3 mb-5">
                        <a href="{{route('cat_wise_all_product', $category->slug)}}"
                            class="site-btn sb-line sb-dark">LOAD MORE</a>
                    </div>


                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Category section end -->


@endsection