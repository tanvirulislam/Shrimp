<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Product;
use App\Banner;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index(){   

        $category = DB::table('banners')
        ->join('products', 'banners.product_id', 'products.id')
        ->select('products.name as Productname', 'banners.*')
        ->get();
        $product = Product::all();
        return view('admin.banner.index', compact('category', 'product'));
    }

    public function create()
    {
        $product = Product::all();
        return view('admin.banner.create', compact('product'));
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'image' => 'required',
            'status' => 'required',
            'title' => 'required',
            'desp' => 'required',
            'product_id' => 'required',

        ]);

       $category = new Banner();
       $category->title = $request->title;
       $category->product_id = $request->product_id;
       $category->desp = $request->desp;
       $category->status = $request->status;

       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('public/upload/',$filename);
        $category->image ='public/upload/'. $filename;
    }

        $category->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        $banner = Banner::find($id);
        $product = Product::all();
        return view('admin.banner.edit', compact('banner', 'product'));
        
    }

   
    public function update(Request $request){

        $category = Banner::find($request->id);
        $category->title = $request->title;
        $category->product_id = $request->product_id;
        $category->desp = $request->desp;
        $category->status = $request->status;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/upload/',$filename);
            $category->image ='public/upload/'. $filename;
        }

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.banner');
    }

    
    public function destroy($id)
    {
        $catagory = Banner::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.banner');
    }
}
