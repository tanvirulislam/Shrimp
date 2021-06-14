<!DOCTYPE html>
<html>
<head>
	<title> Receipt of {{ $order->name }}</title>
</head>
<style >
	
</style>
<body>
	<div class="head">
		<div>
			<center><img src="{{ asset('public/logo.jpg') }}" alt="" height="60px">
				<div><b>Address:</b>LEVEL 7, HOUSE 44, ROAD 12, BLOCK E, BANANI, DHAKA 1213</div>
				<div><b>Phone:</b> +8801745932059</div>
				<div><b>Email:</b>gg@gmail.com</div>
			</center>
		</div>
		
	</div><br><br>
	<div class="body">

		<div class="part-1" style="float: left;overflow: hidden;">
			<div><b><u>Customaer Information</u></b></div>
			<div><b>Name:</b> {{ $order->Username }}</div>
			<div><b>Phone:</b> {{ $order->Userphone }}</div>
		</div>

		<div class="part-2" style="float: left;overflow: hidden;margin-left:300px">
			<div><b><u>Delivary  Address</u></b></div>
			<div><b>Name:</b> {{ $order->name }}</div>
			<div><b>Phone:</b> {{ $order->phone }}</div>
			<div><b>Email:</b> {{ $order->email }}</div>
			<div><b>Address:</b> {{ $order->address }}</div>

		</div>
		
	</div>
	<br><br><br><br><br><br><br>
	<div class="main">
		<center><div><h2><u>Order detail</u></h2></div></center>
		<table>
			 <tr >

                  <th style="padding:5px;">Id</th>
                  <th style="padding:5px;">Item Name</th>
                  <th style="padding:5px;">Item Quantity</th>
                  <th style="padding:5px;">Item Size</th>
                  <th style="padding:5px;">Item Price</th>
                  <th style="padding:5px;">Item sub-total</th>
                  
             </tr>
             @foreach($details as $key=>$category)
                <tr>
                  <td style="padding:5px;">{{ $key + 1 }}</td>
                  <td style="padding:5px;">{{ $category->product_name }} </td>
                  <td style="padding:5px;">{{ $category->product_quantity }} </td>
                  <td style="padding:5px;">{{ $category->size }} </td>
                  <td style="padding:5px;">
                    {{ $category->product_price }}
                  </td>
             <td style="padding:5px;">{{ $category->order_total }}</td>
               </tr>
              @endforeach
		</table>
		<h4> Total Price: {{ $order->order_total }}</h4>
	</div>

</body>
</html>