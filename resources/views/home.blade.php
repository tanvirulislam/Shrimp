@extends('frontEnd.master.master')
@section('title')
Products | Fish & Shrimp E-commerce
@endsection

@section('body')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <a href="{{route('user_pending_order')}}" type="button" class="btn btn-success mb-2">Pending
                        order</a>
                    <a href="{{route('order_history')}}" type="button" class="btn btn-info mb-2">Order history</a>

                    <a class="btn btn-danger mb-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons"></i>Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <br>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('You have successfully logged in !!!') }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection