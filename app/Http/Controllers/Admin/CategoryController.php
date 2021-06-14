<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller{
    
    public function index(){   
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

   
    public function store(Request $request)
    {
       $request->validate([

            'name' => 'required',
            'image' => 'required',
            'status' => 'required',

        ]);

       $category = new Category();
       $category->name = $request->name;
       $category->status = $request->status;
       $category->slug = Str::slug($request->name);

       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('public/upload/',$filename);
        $category->image ='public/upload/'. $filename;
    }
// dd($category);
        $category->save();
        Toastr::success('Successully Add 🙂' ,'Success');
        return redirect()->back()->with('message','Registered succesfully');
       
    }

  
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
        
    }

   
    public function update(Request $request){

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->slug = Str::slug($request->name);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/upload/',$filename);
            $category->image ='public/upload/'. $filename;
        }

        $category->save();
        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.category');
    }

    
    public function destroy($id)
    {
        $catagory = Category::find($id);
        $catagory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.category');
    }
}
