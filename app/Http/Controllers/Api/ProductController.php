<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use App\Subcategory;
use App\Banner;
use App\Logo_Offer;
use App\Product;
use App\Stock;
use App\Store;
use App\Shipping;
use App\Wishlist;
use App\Cart;
<<<<<<< HEAD
use App\Mainorder;
use App\Order;
=======
>>>>>>> 3e9c31b0b0dd839ccf98b63a8e5d1275ea7d9d06

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\FeatureProductResource;
use App\Http\Resources\Product\CatProductResource;
use App\Http\Resources\Product\SubCatProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ProductResource::collection(Product::latest()->paginate(5));
    }
    
        public function banner(){

        // return BannerResource::collection(Banner::)

        $banner = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()->limit(1)
                ->get();
        $bannersecond = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()->skip(1)->take(2)
                ->get();

                return response()->json([
        
                    'banner' => $banner,
                    'bannersecond' => $bannersecond,
                
                    
                    ],200);
    }
    
    
    public function feature_product()
    {
       return FeatureProductResource::collection(Product::where('status',1)->latest()->limit(6)->paginate(2));
    }
    
    
    
    public function pmenunew($slug)
    {
       return CatProductResource::collection(Product::where('category_slug',$slug)->latest()->paginate(2));
    }
    
    
    public function pmenusub($slug)
    {
       return SubCatProductResource::collection(Product::where('subcategory_slug',$slug)->latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'dd';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $product)
    {
        return new ProductResource($product);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    public function searchMember(Request $request)
{
    $search = $request->search;
    
        $product = Product::query()
            ->where('name','LIKE','%'.$search.'%')
            ->orWhere('desp','LIKE','%'.$search.'%')
            ->oRwhere('category_slug','LIKE','%'.$search.'%')
            ->oRwhere('subcategory_slug','LIKE','%'.$search.'%')
            ->latest()->paginate(2);

    return Response()->json([
        'status' => 'success',
        'search' => $product
    ], 200);
}

public function pmenu($slug){
    
    $cat_pro_info = Item::where('cat_slug',$slug)->latest()->get();

    return Response()->json([
        'status' => 'success',
        'slug' => $cat_pro_info
    ], 200);
    
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
     public function cart()  {
        $cartCollection = \Cart::getContent();
        
        return Response()->json([
                'status' => 'success',
                'cart' => $cartCollection
            ], 200);
    }

     public function add(Request $request){
        //  $product_id = $request->id;
       \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'slug' => $request->slug
            )
        ));
      
        return Response()->json([
        'status' => 'success'
        
    ], 200);
    }


     public function remove1(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update1(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));

        return redirect()->route('cart1.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear1(){
        \Cart::clear();
        return redirect()->route('cart1.index')->with('success_msg', 'Car is cleared!');
    }
    
       public function product_detail($id){
        
        // $slug = substr($product_slug,3);
        
        //dd($slug);
        
           
            $products = DB::table('products')->where('id', $id)->first();
            $related_fish = Product::all();
            
            return response()->json([
          
                'products' => $products,
                'related_fish' => $related_fish,
               
                
                ],200);
        
    }
    
    
    
        public function shipping_show($id){

        $products = DB::table('shippings')->where('user_id', $id)->get();
        return Response()->json([
            'Shippping info' => $products,
        ], 200);
    }
    
    public function shipping_store(Request $request, $user_id){
        $user_id = $request->user_id;
        $customer = new Shipping();
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->phone_num = $request->phone_num;
        $customer->address = $request->address;
        $customer->message = $request->message;
        $customer->user_id = $user_id;
        $customer->save();

        $shippingId = $customer->id;
		$userId = $customer->user_id;
		// if(Auth::check() && Auth::user()->role_id == 2){

        //   $user_id = $request->user_id;
            $cart_product = Cart::where('user_id', $user_id)->get();
            $total = $cart_product->sum('subtotal');

            $mainOrder = new Mainorder();
            $mainOrder->user_id = $userId;
            $mainOrder->shipping_id =  $shippingId;
            $mainOrder->pin ='Fish and Shrimp-'.rand('10000000','99999999');
            $mainOrder->order_total=$total;
            $mainOrder->save();

            
              $orderId=$mainOrder->id;
              foreach ($cart_product as $cartProduct){
		   
                $order= new Order();
                $order->user_id = $userId;
                $order->shipping_id =  $shippingId;
                $order->product_id = $cartProduct->id;
                $order->order_id = $orderId;
                $order->product_name = $cartProduct->name;
                $order->product_price = $cartProduct->price;
                $order->product_quantity =$cartProduct->qty;
                $order->order_total = $cartProduct->qty * $cartProduct->price;
                
                $order->save();
                
                
              }


            
             

            $cart_item_delete = DB::table('carts')->where('user_id', $user_id)->delete();


            return Response()->json([
                'shipping info' => $customer,
            ], 200);

        // }
    }

    public function wishlist_store(Request $request, $user_id){
        
        // $user_id = Auth::user()->id;
        $wishlist = new Wishlist();
        $wishlist->user_id = $user_id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        return Response()->json([
            'wishlist' => $wishlist,
        ], 200);

    }

    public function wishlist_detail($user_id){

        // $user_id = Auth::user()->id;
        $all_wishlist = DB::table('wishlists')
        ->join('products','products.product_slug','=','wishlists.product_id')
        ->select('products.*','wishlists.product_id')
        ->where('user_id', $user_id)
        ->get();

        return response()->json([

            'userId' => $user_id,
            'wishlist' => $all_wishlist,
            
            ],200);
    }

    public function user_detail($id){
        
        $user_id = DB::table('users')->where('id', $id)->get();

        return response()->json([
            'userId' => $user_id,
            ],200);

    }
    
     public function user_pending_order($id){

        // $order_history = DB::table('orders')->where('user_id', $id)->get();
        $orders =DB::table('main_orders')
        ->join('users','main_orders.user_id','=','users.id')
        ->join('shippings','main_orders.shipping_id','=','shippings.id')
        ->select('main_orders.*','users.name as Username','shippings.customer_name','shippings.address')
        ->where('main_orders.status','=',0)
        ->where('main_orders.user_id','=',$id)
        ->get();

        return response()->json([
            'orders' => $orders,
            ],200);
        }
        
        public function order_history($id){
            // $order_history = Auth::user()->id;
      
            $orders =DB::table('main_orders')
            ->join('users','main_orders.user_id','=','users.id')
            ->join('shippings','main_orders.shipping_id','=','shippings.id')
            ->select('main_orders.*','users.name as Username','shippings.customer_name','shippings.address')
            ->where('main_orders.status','=',1)
            ->where('main_orders.user_id','=',$id)
            ->get();

            return response()->json([
                'orders' => $orders,
                ],200);
        }

        public function order_detail($id){
            // $order_history = Auth::user()->id;
      
              $order_info = DB::table('main_orders')
                          ->join('users','main_orders.user_id','=','users.id')
                          ->join('shippings','main_orders.shipping_id','=','shippings.id')
                          ->select('main_orders.*','users.name as Username','users.phone as Userphone','shippings.customer_name','shippings.address','shippings.email','shippings.phone_num','shippings.message')
                          ->where('main_orders.user_id','=',$id)
                          ->first();
        // $order_details = DB::table('orders')->where('user_id', $id)->get();

                 $order = Order::where('order_id','=',$id)->get();
                
                 return response()->json([
                    'order_info' => $order_info,
                    'order' => $order,
                    ],200);
        }
        
        
        
        public function custom_cart_view($user_id){
            // $user_id = Auth::id();
            $cart_product = Cart::where('user_id', $user_id)->get();

            $total = $cart_product->sum('subtotal');

            return response()->json([
                'Cart item' => $cart_product,
                'Total' => $total,
            ]);
        }

        public function custome_cart_add(Request $request, $id){
            $user_id = Auth::id();
            $check = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id);
            
            // if($check){
            //     return response()->json([
            //         'cart' => 'Item already in your cart'
            //     ]);
            // }else{
               
                $cart = new Cart();
                $cart->product_id = $id;
                $cart->user_id = $request->user_id;
                $cart->image = $request->image;
                $cart->name = $request->name;
                $cart->price = $request->price;
                $cart->qty = $request->qty;
                $cart->subtotal = $request->qty * $request->price;
                
                $cart->save();

                return response()->json([
                    'Cart' => $cart,
                ], 200);
            // }
        }

        public function custome_cart_update(Request $request, $id){
           $user_id = $request->user_id;
            $check = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id)->first();

            if ($check){
                $checkId = $check->id;
                $cart = array();
                 $cart['user_id'] = $request->user_id;
                $cart['qty'] = $request->qty;
                $cart['subtotal'] = $request->qty * $check->price;

                DB::table('carts')->where('id', $checkId)->update($cart);
               
            
    
                return response()->json([
                    'cart' => 'updated',
                ]);
            }
        }

        public function custome_cart_remove($id){
            $cart = Cart::find($id);
            $cart->delete();

            return response()->json([
                'cart' => 'Cart item deleted'
            ]);
        }

        public function custome_cart_clear(){
           DB::table('carts')->delete();

            return response()->json([
                'cart' => 'Cart flash'
            ]);
        }


    // custome cart
    public function custom_cart_view($user_id){
        // $user_id = Auth::id();
        $cart_product = Cart::where('user_id', $user_id)->get();

        return response()->json([
            'Cart item' => $cart_product,
        ]);
    }

    public function custome_cart_add(Request $request, $id){
        $user_id = Auth::id();
        $check = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id);
        
        // if($check){
        //     return response()->json([
        //         'cart' => 'Item already in your cart'
        //     ]);
        // }else{
           
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->user_id = $request->user_id;
            $cart->image = $request->image;
            $cart->name = $request->name;
            $cart->price = $request->price;
            $cart->qty = $request->qty;
            $cart->subtotal = $request->qty * $request->price;
            $cart->save();

            return response()->json([
                'Cart' => $cart,
            ], 200);
        // }
    }

    public function custome_cart_update(Request $request, $id){
        $user_id = $request->user_id;
        $check = DB::table('carts')->where('user_id', $user_id)->where('product_id', $id)->first();

        if ($check){
            $checkId = $check->id;
            $cart = array();
            $cart['user_id'] = $request->user_id;
            $cart['qty'] = $request->qty;
            $cart['subtotal'] = $request->qty * $check->price;

            DB::table('carts')->where('id', $checkId)->update($cart);
            }
        

       return response()->json([
           'cart' => $cart,
       ]);
    }

    public function custome_cart_remove(Request $request, $id){
        // $user_id = $request->user_id;
        // $cart = Cart::find($id);
        // $cart->product_id = $id;
        // $cart->delete();

        $cart = array();
        $cart['product_id'] = $id;
        $cart['user_id'] = $request->user_id;

        DB::table('carts')->where('id', $id)->delete($cart);

        return response()->json([
            'cart' => 'Cart item deleted'
        ]);
    }

    public function custome_cart_clear(){
        $user_id = Auth::id();
        DB::table('carts')->where('user_id', $user_id)->delete();

        return response()->json([
            'cart' => 'Cart flash'
        ]);
    }



}
