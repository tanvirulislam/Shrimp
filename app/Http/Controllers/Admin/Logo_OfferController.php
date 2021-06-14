<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Logo_Offer;
use Illuminate\Support\Str;

class Logo_OfferController extends Controller
{
    public function index(){   
        $category = Logo_Offer::all();
        return view('admin.logo_offer.index', compact('category'));
    }

    public function create()
    {
        return view('admin.logo_offer.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'image' => 'required',
            'status' => 'required',
            'logo_offer' => 'required',

        ]);

       $category = new Logo_Offer();
       $category->logo_offer = $request->logo_offer;
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
        $category = Logo_Offer::find($id);
        return view('admin.logo_offer.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $category = Logo_Offer::find($request->id);
        $category->status = $request->status;
        $category->logo_offer = $request->logo_offer;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/upload/',$filename);
            $category->image ='public/upload/'. $filename;
        }

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.logo_offer');
    }

    
    public function destroy($id)
    {
        $catagory = Logo_Offer::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.logo_offer');
    }
}
