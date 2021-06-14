@extends('frontEnd.master.master')
@section('title')
Shipping | Fish & Shrimp E-commerce
@endsection

@section('body')
<section class="checkout-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2 order-lg-1">
                <form action="{{route('shippinginfo_store')}}" method="post" class="checkout-form">
                    {{ csrf_field() }}
                    <div class="cf-title">Billing Address</div>
                    <!-- <div class="row">
                        <div class="col-md-7">
                            <p>*Billing Information</p>
                        </div>
                        <div class="col-md-5">
                            <div class="cf-radio-btns address-rb">
                                <div class="cfr-item">
                                    <input type="radio" name="pm" id="one">
                                    <label for="one">Use my regular address</label>
                                </div>
                                <div class="cfr-item">
                                    <input type="radio" name="pm" id="two">
                                    <label for="two">Use a different address</label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row address-inputs">
                        <div class="col-md-12">
                            <input name="customer_name" type="text" placeholder="Name" required>

                            <!-- <input name="phone_num" type="number" placeholder="Mobile number" required> -->
                            <input name="address" type="text" placeholder="Address" required>
                            <input name="message" type="text" placeholder="Message" required>

                        </div>
                        <div class="col-md-6">
                            <input name="email" type="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <input name="phone_num" type="text" placeholder="Phone no.">
                        </div>
                    </div>

                    <!-- <div class="cf-title">Delievery Info</div> -->
                  

                    <div class="cf-title">Payment Method</div>
                    <ul class="payment-list">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                            Debit & Cards / Online Payments
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            Cash on Delivery
                            </label>
                        </div>
                        <li>Pay when you get the package</li>
                    </ul>
                    <button class="site-btn submit-order-btn">Place Order</button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection