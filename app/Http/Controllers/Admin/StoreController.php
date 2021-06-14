<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Store;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index(){   
        $store = Store::all();
        return view('admin.store.index', compact('store'));
    }

    public function create()
    {
        return view('admin.store.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'name' => 'required',
            'address' => 'required',

        ]);

       $store = new Store();
       $store->name = $request->name;
       $store->address = $request->address;
       $store->slug = Str::slug($request->name);
      
        $store->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        $category = Store::find($id);
        return view('admin.store.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $store = store::find($request->id);
        $store->name = $request->name;
        $store->address = $request->address;
        $store->slug = Str::slug($request->name);

        $store->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.store');
    }

    
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.store');
    }
}
