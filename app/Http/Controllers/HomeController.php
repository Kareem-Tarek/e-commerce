<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{

    public function __construct()
    {   
        // $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $products       = Product::orderBy('created_at' , 'DESC')->paginate(10); //sample of some of the products (in the main website's home page)
        $products_count = $products->count();
        $latest_product = Product::orderBy('id' , 'DESC')->latest()->limit(1)->get(); //the latest add product by PK (not by date) because PK's logic is more powerful to bring the newest data

        return view('website.website.home' , compact('products' , 'products_count' , 'latest_product'));
    }

}
