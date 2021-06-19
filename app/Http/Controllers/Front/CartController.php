<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Logo_Offer;
use App\Wishlist;
use App\Category;

class CartController extends Controller
{
    public function cart(){
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $cartCollection = \Cart::getContent();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();


        return view('frontEnd.cart', compact('logo', 'offer', 'cartCollection', 'wishlist', 'nav_category'));
    }

    public function add(Request$request){
		\Cart::add(array(
			'id' => $request->id,
			'name' => $request->name,
			'price' => $request->price,
			'quantity' => $request->quantity,
			'attributes' => array(
				'image' => $request->img,

			)
		));
        Toastr::success('Item Add 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
	}

    public function update(Request $request){
		\Cart::update($request->id,
			array(
				'quantity' => array(
					'relative' => false,
					'value' => $request->quantity
				),
			));
        Toastr::success('Successully Updated 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
	}

    public function remove(Request $request){

		\Cart::remove($request->id);
        Toastr::warning('Successully Deleted 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
	}

    public function clear(){
        
		\Cart::clear();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
		return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
	}


	// public function wishlist($id){
		
		
	// 	if(Auth::check() && Auth::user()->role_id == 2){
	// 		Wishlist::insert([
	// 			'user_id' => Auth::id(),
	// 			'product_id' => $id,
	// 		]);
	
	// 		return redirect()->back()->with('success_msg', 'Item added into wishlist');
	
	// 	}else{
	// 		return redirect()->route('customer_dashoard.login')->with('Login error', 'Login first');
	// 	}
	
	// }
	
	// public function wishlist_detail(){
	// 	$logo = Logo_Offer::where('logo_offer', '1')->first();
    //     $offer = Logo_Offer::where('logo_offer', '0')->first();
    //     $wishlist = Wishlist::count();
    //     $nav_category = Category::all();
	
	// 	return view('front.wishlist', compact('logo','offer', 'wishlist', 'nav_category'));
	// }







}



