<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo_Offer;
use App\Wishlist;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();

        return view('home', compact('logo', 'offer', 'wishlist', 'nav_category'));
    }
}
