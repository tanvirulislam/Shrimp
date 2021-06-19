<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Logo_Offer;
use App\Shipping;
use Cart;
use App\Order;
use App\OrderDetails;
use App\Wishlist;
use App\Mainorder;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
	public function index(){
		$logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

        
        return view('frontEnd.login', compact('logo', 'offer', 'wishlist', 'nav_category'));
    }

	public function customer_dashoard_login(){
		$logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

        
        return view('frontEnd.customer_dashoard_login', compact('logo', 'offer', 'wishlist', 'nav_category'));
    }

	public function register(Request $request){
		$customer = new User();
		$customer->name = $request->name;
		$customer->email = $request->email;
		$customer->phone = $request->phone;
		$customer->password = Hash::make($request->password);
		$customer->save();

		$customerId = $customer->id;
		Session::put('customerId',$customerId);
		Session::put('customerName',$customer->name);

	   return redirect('/shipping_info');
	}

	public function login(Request $request){
	
		$request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);
		
		// shipping status check
		$shipping_check = 1;
		if($shipping_check == $request->shipping_status){
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				// Redirect to dashboard
				Toastr::success('Successully login :)' ,'Success');
				return redirect('/shipping_info');
			} else {
				// error
			  Toastr::error('Invalid email and password :)' ,'Error');
				return back();
			}
		}
		else{
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				// Redirect to dashboard
				Toastr::success('Successully add :)' ,'Success');
				return redirect()->back();
			} else {
				// error
			  Toastr::error('Invalid email and password :)' ,'Error');
				return back();
			}
		}
     
	}

	public function customer_dashoard(){
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

        
        return view('frontEnd.customer.dashoard_login', compact('logo', 'offer', 'wishlist', 'nav_category'));
    }

    public function c_dashoard(){
		$logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

        return view('frontEnd.customer.dashboard', compact('logo', 'offer', 'wishlist', 'nav_category'));
		// return redirect('/');
    }
      

    public function shipping(){

        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();


		return view('frontEnd.shipping_info', compact('offer', 'logo', 'wishlist', 'nav_category'));
	}

    
	public function shipping_store(Request $request){
		
		$user= Session::get('customerId');
		if(Auth::check() && Auth::user()->role_id == 2){
		  $customer = new Shipping();
		  $customer->customer_name = $request->customer_name;
		  $customer->email = $request->email;
		  $customer->user_id = Auth::user()->id;
		  $customer->phone_num = $request->phone_num;
		  $customer->address = $request->address;
		  $customer->message = $request->message;
		  $customer->save();
		}else{
		  
		  $customer = new Shipping();
		  $customer->customer_name = $request->customer_name;
		  $customer->email = $request->email;
		  $customer->user_id = $user;
		  $customer->phone_num = $request->phone_num;
		  $customer->address = $request->address;
		  $customer->message = $request->message;
		  $customer->save();
		  
		}
		$shippingId = $customer->id;
		$userId = $customer->user_id;
		if(Auth::check() && Auth::user()->role_id == 2){
		  
		  $mainOrder = new Mainorder();
		  $mainOrder->user_id = Auth::user()->id;
		  $mainOrder->shipping_id =  $shippingId;
		  $mainOrder->pin ='Fish and Shrimp-'.rand('10000000','99999999');
		  $mainOrder->order_total=\Cart::getTotal();
		  $mainOrder->save();
		  
		  $orderId=$mainOrder->id;
		  
		  $cartCollection = \Cart::getContent();
						// dd($cartCollection);
		  foreach ($cartCollection as $cartProduct){
		   
		   $order= new Order();
		   $order->user_id = Auth::user()->id;
		   $order->shipping_id =  $shippingId;
		   $order->product_id = $cartProduct->id;
		   $order->order_id = $orderId;
		   $order->product_name = $cartProduct->name;
		   $order->product_price = $cartProduct->price;
		   $order->product_quantity =$cartProduct->quantity;
		   $order->order_total = \Cart::get($cartProduct->id)->getPriceSum();
		   
		   $order->save();
		   
		   
		 }
		 
	   }else{
			$mainOrder = new Mainorder();
			$mainOrder->user_id = $userId;;
			$mainOrder->shipping_id =  $shippingId;
			$mainOrder->pin ='Fish and Shrimp-'.rand('10000000','99999999');
			$mainOrder->order_total=\Cart::getTotal();
			$mainOrder->save();
			
			$orderId=$mainOrder->id;
			$cartCollection = \Cart::getContent();
			// dd($cartCollection);
			foreach ($cartCollection as $cartProduct){
				$order= new Order();
				$order->user_id = $userId;
				$order->shipping_id =  $shippingId;
				$order->product_id = $cartProduct->id;
				$order->order_id = $orderId;
				$order->product_name = $cartProduct->name;
				$order->product_price = $cartProduct->price;
				$order->product_quantity =$cartProduct->quantity;
				$order->order_total = \Cart::get($cartProduct->id)->getPriceSum();
				$order->save();
	   		}
	   
	 	}
	 
	 
		\Cart::clear();
						// dd('ok');
		$pinNum = Mainorder::where('id',$orderId)->first();
		$user = User::where('id', 1)->get();
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

		return view('frontEnd.success', compact('offer', 'logo', 'wishlist', 'pinNum', 'user', 'nav_category'));
    }

	

}