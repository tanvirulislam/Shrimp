@extends('frontEnd.master.master')
@section('title')
Success | Fish & Shrimp E-commerce
@endsection

@section('body')
<br>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3 style="text-shadow: 0px 2px 3px #2c976b;">
				Congratulations!!! 
			</h3>
			<br>
			<p>
			You have successfully ordered your item.
			</p>
			<p>
				Your order id is {{$pinNum->pin}}
			</p>
			<br>
			<a href="{{route('index')}}" class="btn btn-primary" title="">Continue shopping</a>
			<br>
			<br>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
@endsection