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
        $user_id = Auth::user()->id;
        $customer = new Shipping();
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->phone_num = $request->phone_num;
        $customer->address = $request->address;
        $customer->message = $request->message;
        $customer->user_id = $user_id;
        $customer->save();
        return Response()->json([
            'order_detail' => $customer,
        ], 200);

    }

    public function wishlist_store(Request $request){
        
        return Response()->json([
            // 'userId' => $user_id,
            'order_detail' => $customer,
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


}
