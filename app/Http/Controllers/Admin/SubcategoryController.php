<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Subcategory;
use Illuminate\Support\Str;
use App\Category;

class SubcategoryController extends Controller
{
    public function index()
    {   
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.subcategory.index', compact('category', 'subcategory'));
    }

    public function create(){
        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
    }

    
    public function store(Request $request)
    {
     $request->validate([

        'name' => 'required',
        'category_id' => 'required',
        'status' => 'required',

    ]);

     $subcategory = new Subcategory();
     $subcategory->name = $request->name;
     $subcategory->category_id = $request->category_id;
     $subcategory->status = $request->status;
     $subcategory->slug = Str::slug($request->name);

    $subcategory->save();
    Toastr::success('Successully Add 🙂' ,'Success');
    return redirect()->back()->with('message','Registered succesfully');
    
}



public function edit($id)
{
    $category = Category::all();
    $subcategory = Subcategory::find($id);
    return view('admin.subcategory.edit', compact('category', 'subcategory'));
    
}


public function update(Request $request){

    $subcategory = Subcategory::find($request->id);
    $subcategory->category_id = $request->category_id;
    $subcategory->name = $request->name;
    $subcategory->status = $request->status;
    $subcategory->slug = Str::slug($request->name);
    $subcategory->save();

    Toastr::success('Successully Updated 🙂' ,'Success');
    return redirect()->route('admin.subcategory');
}


public function destroy($id)
{
    $subcategory = Subcategory::find($id);
    $subcategory->delete();
    Toastr::warning('Successully Deleted 🙂' ,'Success');
    return redirect()->route('admin.subcategory');
}
}
