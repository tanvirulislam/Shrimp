<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use App\Banner;
use App\Logo_Offer;
use App\Product;
use App\Stock;
use App\Store;
use App\Wishlist;

use App\Subcategory;

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
        'card' => $cartCollection
    ], 200);
    }

     public function add(Request$request){
       \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
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
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear1(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
    
        public function add2(Request $request)
{
    
    
    
        $customer = new Shippinfo();
        $customer->name = $request->name;
        $customer->payment_transection = $request->payment_transection;
        $customer->payment_number = $request->payment_number;
        $customer->bpayment_tran = $request->bpayment_tran;
        $customer->bpayment_number = $request->bpayment_number;
        $customer->payment_type = $request->payment_type;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->msg = $request->msg;
        $customer->p_id = implode(',',(array)$request->p_id);
        $customer->quantity = implode(',',(array)$request->quantity);
        $customer->price = implode(',',(array)$request->price);
        $customer->total_price = $request->total_price;
        $customer->save();
       return Response()->json([
        'status' => 'success',
        'order_detail' => $customer
    ], 200);

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

}
