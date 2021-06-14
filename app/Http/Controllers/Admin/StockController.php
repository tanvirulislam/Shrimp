<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Stock;
use Illuminate\Support\Str;
use App\Product;


class StockController extends Controller
{
    public function index()
    {   
        $stock = DB::table('stocks')
                ->join('products', 'stocks.product_id', 'products.id')
                ->select('products.name as productname', 'stocks.*')
                ->get();
        $product = product::all();
        return view('admin.stock.index', compact('stock', 'product'));

    }

    public function create(){
        $product = Product::all();
        return view('admin.stock.create', compact('product'));
    }

    
    public function store(Request $request)
    {
     $request->validate([

        'product_id' => 'required',
        'stock' => 'required',
        'date' => 'required',

    ]);

     $stock = new Stock();
     $stock->date = $request->date;
     $stock->product_id = $request->product_id;
     $stock->stock = $request->stock;

    $stock->save();
    Toastr::success('Successully Add 🙂' ,'Success');
    return redirect()->back()->with('message','Registered succesfully');


    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        $product = product::all();
        return view('admin.stock.edit', compact('stock', 'product'));
        
    }


    public function update(Request $request){

        
     $stock = new Stock();
     $stock->date = $request->date;
     $stock->product_id = $request->product_id;
     $stock->stock = $request->stock;

    $stock->save();

        Toastr::success('Successully Updated 🙂' ,'Success');
        return redirect()->route('admin.stock');
    }


    public function destroy($id)
    {
        $subcategory = Stock::find($id);
        $subcategory->delete();
        Toastr::warning('Successully Deleted 🙂' ,'Success');
        return redirect()->route('admin.stock');
    }
}
