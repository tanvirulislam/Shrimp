<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Store;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){   
        $category = Category::all();
        $subcategory = Subcategory::all();
        $store = Store::all();
        $product = Product::all();
        return view('admin.product.index', compact('category', 'subcategory', 'product', 'store'));
    }

    public function findProductName(Request $request){
        $data = Subcategory::select('name','slug')->where('category_id',$request->id)->get();
        return response()->json($data);
    }

    public function create()
    {
        $category = Category::all();
        $store = Store::all();
        return view('admin.product.create', compact('category', 'store'));
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'category_slug' => 'required',
            'subcategory_slug' => 'required',
            'name' => 'required',
            'desp' => 'required',
            'weight' => 'required',
            'purchase_price' => 'required',
            'sell_price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'store_id' => 'required'

        ]);

       $product = new Product();
       $product->category_slug = $request->category_slug;
       $product->subcategory_slug = $request->subcategory_slug;
       $product->name = $request->name;
       $product->desp = $request->desp;
       $product->weight = $request->weight;
       $product->purchase_price = $request->purchase_price;
       $product->sell_price = $request->sell_price;
       $product->stock = $request->stock;
       $product->status = $request->status;
       $product->store_id = $request->store_id;
       $product->product_slug = Str::slug($request->name);

       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('public/upload/',$filename);
        $product->image ='public/upload/'. $filename;
    }
// dd($category);
        $product->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit(Request $request)
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $store = Store::all();
        $product = Product::where('id', $request->fish_id)->first();
        return view('admin.product.edit', compact('category', 'subcategory', 'product', 'store'));
        
    }

   
    public function update(Request $request){

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_slug = $request->category_slug;
        $product->subcategory_slug = $request->subcategory_slug;
        $product->product_slug = Str::slug($request->name);
        $product->desp = $request->desp;
        $product->weight = $request->weight;
        $product->purchase_price = $request->purchase_price;
        $product->sell_price = $request->sell_price;
        $product->stock = $request->stock;
       $product->store_id = $request->store_id;
        $product->status = $request->status;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/upload/',$filename);
            $product->image ='public/upload/'. $filename;
        }

        $product->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.product');
    }

    public function product_details(Request $request){
        $store = Store::all();
        $product = Product::where('id', $request->fish_id)->first();
        return view('admin.product.product_details', compact('product', 'store'));

    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.product');
    }
}
