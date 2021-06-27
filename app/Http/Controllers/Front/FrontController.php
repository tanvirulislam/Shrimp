<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logo_Offer;
use App\Product;
use App\Banner;
use App\Category;
use App\Wishlist;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class FrontController extends Controller
{
    public function index() {

        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $nav_category = Category::all();

        $banner = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()
                ->get();
        $bannersecond = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()->skip(1)->take(2)
                ->get();
        $feature_item = DB::table('products')->latest()->get();
        $category_fish = Category::all();


        $category_fish_desi = Category::limit(1)->first();
        $category_fish_desi_skip = Category::skip(1)->limit(1)->first();
        $category_fish_desi_skip2 = Category::skip(2)->limit(1)->first();
        $category_fish_desi_skip3 = Category::skip(3)->limit(1)->first();
        $category_fish_desi_skip4 = Category::skip(6)->limit(1)->first();

        $category_desi_fish = Product::where('category_slug', 'deshi-fish')->limit(4)->get();
        $category_sea_fish = Product::where('category_slug', 'sea-fish')->limit(4)->get();
        $tab_product_fish3 = Product::where('category_slug', 'imported-fish')->limit(4)->get();
        $tab_product_fish4 = Product::where('category_slug', 'fresh-fish')->limit(4)->get();
        $tab_product_fish5 = Product::where('category_slug', 'dry-fish')->limit(4)->get();
        
        $cat_wise_product = DB::table('products')->latest()->limit(7)->get();
        $category_fish_second = Category:: latest()->skip(1)->take(2)->get();
        
		$wishlist = Wishlist::count();


        return view('frontEnd.index', compact('logo', 'banner', 'bannersecond', 'feature_item',
         'category_fish', 'cat_wise_product', 'category_fish_second', 'offer', 'wishlist', 'category_fish_desi',
        'category_desi_fish', 'category_fish_desi_skip', 'category_sea_fish', 'category_fish_desi_skip2',
        'tab_product_fish3', 'category_fish_desi_skip3', 'tab_product_fish4', 'category_fish_desi_skip4',
        'tab_product_fish5', 'nav_category'));

    }

    public function all_products(){

        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();


        $category_fish = Category::all();
        $cat_wise_product = DB::table('products')->latest()->limit(7)->get();

        $cat_wise_all_product = DB::table('categories')->first();
        
        return view('frontEnd.category_wise_product', compact( 'logo','offer', 'wishlist', 'cat_wise_product', 'category_fish',
    'cat_wise_all_product', 'nav_category'));
    }

    public function cat_wise_all_products($id){

        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $wishlist = Wishlist::count();
        $nav_category = Category::all();


        $category_fish = Category::where('slug', $id)->get();
        $cat_wise_product = DB::table('products')->latest()->limit(7)->get();
        $cat_wise_product_all = DB::table('products')->latest()->get();


        return view('frontEnd.category_wise_all_product', compact('category_fish', 'logo', 'offer', 'cat_wise_product',
    'cat_wise_product_all', 'wishlist', 'nav_category'));
    }

    public function product_details($id) {

        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();


        $category_fish = Category::all();
        $cat_wise_product = DB::table('products')->latest()->limit(7)->get();
        $products = DB::table('products')->where('product_slug', $id)->first();
        $related_fish = Product::all();

        return view('frontEnd.product_details', compact('logo', 'offer', 'category_fish',
         'cat_wise_product', 'products', 'wishlist', 'related_fish', 'nav_category'));
    }
    

   

    public function wishlist_customer_login() {
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $wishlist = Wishlist::count();
        $nav_category = Category::all();


        return view('frontEnd.wishlist_login' , compact('logo','offer', 'wishlist', 'wishlist', 'nav_category'));
    }

    public function wishlist($id){
		if(Auth::check() ){

            $user_id = Auth::id();
            $check = DB::table('wishlists')->where('user_id', $user_id)->where('product_id', $id)->first();
            if($check){
                Toastr::info('Item already Added 🙂' ,'Info');
                return redirect()->route('index');
            }
            else{
                Wishlist::insert([
                    'user_id' =>Auth::id(),
                    'product_id' => $id,
                ]);
        
                return redirect()->route('index')->with('success_msg', 'Item added into wishlist');
            }
			
	
		}elseif( Session::get('customerId')){
            Wishlist::insert([
				'user_id' =>Session::get('customerId'),
				'product_id' => $id,
			]);
	
			return redirect()->route('index')->with('success_msg', 'Item added into wishlist');
        }
        
        else{
			return redirect()->route('wishlist_customer_login')->with('Login error', 'Login first');
		}

		
	}

    public function wishlist_detail(){
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $wishlist = Wishlist::count();
        $nav_category = Category::all();


        $user_id = Auth::user()->id;
        $all_wishlist = DB::table('wishlists')
        ->join('products','products.product_slug','=','wishlists.product_id')
        ->select('products.*','wishlists.product_id')
        ->where('user_id', $user_id)
        ->get();
// dd($all_wishlist);
        $w_products = Product::all();
        return view('frontEnd.wishlist', compact('logo','offer', 'wishlist', 'all_wishlist', 'w_products', 'nav_category'));
    }

    public function customer_dashoard(){
		$logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $wishlist = Wishlist::count();
        $nav_category = Category::all();

        
        return view('frontEnd.customer.dashoard_login', compact('logo', 'offer', 'wishlist', 'nav_category'));
    }
    
     public function search(Request $request){
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
        $wishlist = Wishlist::count();
        $nav_category = Category::all();

        
        // Get the search value from the request
        $search = $request->search;
    
        $product = Product::query()
            ->where('name','LIKE','%'.$search.'%')
            ->orWhere('desp','LIKE','%'.$search.'%')
            ->oRwhere('subcategory_slug','LIKE','%'.$search.'%')
            ->get();
    // dd($cat_product);
        return view('frontEnd.search', compact('product', 'logo', 'offer', 'wishlist', 'nav_category'));
    }
    
    

}
