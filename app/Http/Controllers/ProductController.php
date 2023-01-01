<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products         = Product::all();
        $clothes_men      = Product::all()->where('is_accessory','no')->where('product_category', '=', 'men'); //same as => Product::all()->where('product_category', 'men');
        $clothes_women    = Product::all()->where('is_accessory','no')->where('product_category', '=', 'women'); //same as => Product::all()->where('product_category', 'women');
        $clothes_kids     = Product::all()->where('is_accessory','no')->where('product_category', '=', 'kids'); //same as => Product::all()->where('product_category', 'kids');
        $accessories      = Product::all()->where('is_accessory','yes'); //sample of some accessories

        return view('website.products.product', compact('products','clothes_men','clothes_women','clothes_kids','accessories'));
    }

    public function search(Request $request)
    //public function search()
    {
        $search_text_input     = $request->search_query; //Laravel method (1) //also same result for "$search_text_input = $_GET['query'];" or "$request->query;"  //and here is the entered query (word) in the text input (the search bar)
        // $search_text_input     = $request->get('search_query'); //Laravel method (2)
        // $search_text_input     = $_GET['search_query']; // Native

        $products_result = Product::where('name','LIKE',"%{$search_text_input}%")->get(); ////first way for the search functionality. The SQL statement that will check the entered query from the DB (used as a filteration for products in search by an entered query "$search_text")
                                    // ->orWhere('discount','LIKE',"%{$search_text_input}%")->get();
        // $products_result       = Product::when(!empty($search_text), function($query) use ($search_text){
        //     return $query->where('name', 'like', '%'.$search_text.'%');
        //     })->get(); //another second way for the search functionality on the entered query
        $products_result_count = $products_result->count(); //same code result as the following => $products_result = Product::where('name','LIKE',"%{$search_text}%")->count();

        // if($search_text_input == ""){
        //     $search_text_input = "There is no query!";
        //     return view('products.search', compact('products_result' , 'search_text' , 'products_result_count'));
        // }

        return view('website.products.search', compact('products_result' , 'search_text_input' , 'products_result_count'))
            ->with('i' , ($request->input('page', 1) - 1) * 5);

    }

    // public function search_bar_discounts_announcements()
    // {
    //     $products_41per_50per= Product::all()->where('discount','>=',0.41)->where('discount','<=',0.50);

    //     return view('layouts.website.search-bar', compact('products'));
    // }

    public function all_product_items()
    {
        $all_product_items       = Product::all();
        $all_product_items_count = $all_product_items->count();

        return view('website.products.all-product-items', compact('all_product_items' , 'all_product_items_count'));
    }

    public function latest_items()
    {
        $latest_items       = Product::orderBy('id' , 'DESC')->orderBy('created_at' , 'DESC')->paginate(15);
        $latest_items_count = $latest_items->count();

        return view('website.products.latest-items' , compact('latest_items' , 'latest_items_count'));
    }

    public function clothes_all_filter()
    {
        $clothes_all       = Product::all()->where('is_accessory','no');
        $clothes_all_count = $clothes_all->count();

        return view('website.products.clothes.clothes-filter.clothes_all_filter', compact('clothes_all' , 'clothes_all_count'));
    }

    public function clothes_kids_filter()
    {
        $clothes_kids       = Product::all()->where('is_accessory','no')->where('product_category', '=', 'kids');
        $clothes_kids_count = $clothes_kids->count();

        return view('website.products.clothes.clothes-filter.clothes_kids_filter', compact('clothes_kids' , 'clothes_kids_count'));
    }

    public function clothes_men_filter()
    {
        $clothes_men       = Product::all()->where('is_accessory','no')->where('product_category', '=', 'men');
        $clothes_men_count = $clothes_men->count();

        return view('website.products.clothes.clothes-filter.clothes_men_filter', compact('clothes_men' , 'clothes_men_count'));
    }

    public function clothes_women_filter()
    {
        $clothes_women       = Product::all()->where('is_accessory','no')->where('product_category', '=', 'women');
        $clothes_women_count = $clothes_women->count();

        return view('website.products.clothes.clothes-filter.clothes_women_filter', compact('clothes_women' , 'clothes_women_count'));
    }

    public function formal_clothes_all_filter()
    {
        $formal_all       = Product::all()->where('is_accessory','no')->where('clothing_type', '=', '1'); //1 = Formal
        $formal_all_count = $formal_all->count();

        return view('website.products.clothes.clothing_type_filter.formal_all_filter', compact('formal_all' , 'formal_all_count'));
    }

    public function casual_clothes_all_filter()
    {
        $casual_all       = Product::all()->where('is_accessory','no')->where('clothing_type', '=', '2'); //2 = Casual
        $casual_all_count = $casual_all->count();

        return view('website.products.clothes.clothing_type_filter.casual_all_filter', compact('casual_all' , 'casual_all_count'));
    }

    public function sports_wear_clothes_all_filter()
    {
        $sports_wear_all       = Product::all()->where('is_accessory','no')->where('clothing_type', '=', '3'); //3 = Sports Wear
        $sports_wear_all_count = $sports_wear_all->count();

        return view('website.products.clothes.clothing_type_filter.sports_wear_all_filter', compact('sports_wear_all' , 'sports_wear_all_count'));
    }

    public function accessories_all_filter()
    {
        $accessories_all       = Product::all()->where('is_accessory','yes');
        $accessories_all_count = $accessories_all->count();

        return view('website.products.accessories.accessories-filter.accessories_all_filter', compact('accessories_all' , 'accessories_all_count'));
    }

    public function accessories_kids_filter()
    {
        $accessories_kids       = Product::all()->where('is_accessory','yes')->where('product_category', '=', 'kids');
        $accessories_kids_count = $accessories_kids->count();

        return view('website.products.accessories.accessories-filter.accessories_kids_filter', compact('accessories_kids' , 'accessories_kids_count'));
    }

    public function accessories_men_filter()
    {
        $accessories_men       = Product::all()->where('is_accessory','yes')->where('product_category', '=', 'men');
        $accessories_men_count = $accessories_men->count();

        return view('website.products.accessories.accessories-filter.accessories_men_filter', compact('accessories_men' , 'accessories_men_count'));
    }

    public function accessories_women_filter()
    {
        $accessories_women       = Product::all()->where('is_accessory','yes')->where('product_category', '=', 'women');
        $accessories_women_count = $accessories_women->count();

        return view('website.products.accessories.accessories-filter.accessories_women_filter', compact('accessories_women' , 'accessories_women_count'));
    }

    public function _1_percent_to_10_percent()
    {
        $products    = Product::all()->where('discount','>',0.00)->where('discount','<=',0.10);
        $items_count = $products->count();

        return view('website.products.items-discounts.1percent_10percent', compact('products' , 'items_count'));
    }

    public function _11_percent_to_20_percent()
    {
        $products    = Product::all()->where('discount','>=',0.11)->where('discount','<=',0.20);
        $items_count = $products->count();

        return view('website.products.items-discounts.11percent_20percent', compact('products' , 'items_count'));
    }

    public function _21_percent_to_30_percent()
    {
        $products    = Product::all()->where('discount','>=',0.21)->where('discount','<=',0.30);
        $items_count = $products->count();

        return view('website.products.items-discounts.21percent_30percent', compact('products' , 'items_count'));
    }

    public function _31_percent_to_40_percent()
    {
        $products    = Product::all()->where('discount','>=',0.31)->where('discount','<=',0.40);
        $items_count = $products->count();

        return view('website.products.items-discounts.31percent_40percent', compact('products' , 'items_count'));
    }

    public function _41_percent_to_50_percent()
    {
        $products    = Product::all()->where('discount','>=',0.41)->where('discount','<=',0.50);
        $items_count = $products->count();

        return view('website.products.items-discounts.41percent_50percent', compact('products' , 'items_count'));
    }



    public function _51_percent_to_60_percent()
    {
        $products    = Product::all()->where('discount','>=',0.51)->where('discount','<=',0.60);
        $items_count = $products->count();

        return view('website.products.items-discounts.51percent_60percent', compact('products' , 'items_count'));
    }

    public function _61_percent_to_70_percent()
    {
        $products    = Product::all()->where('discount','>=',0.61)->where('discount','<=',0.70);
        $items_count = $products->count();

        return view('website.products.items-discounts.61percent_70percent', compact('products' , 'items_count'));
    }

    public function _71_percent_to_80_percent()
    {
        $products    = Product::all()->where('discount','>=',0.71)->where('discount','<=',0.80);
        $items_count = $products->count();

        return view('website.products.items-discounts.71percent_80percent', compact('products' , 'items_count'));
    }

    public function _81_percent_to_90_percent()
    {
        $products    = Product::all()->where('discount','>=',0.81)->where('discount','<=',0.90);
        $items_count = $products->count();

        return view('website.products.items-discounts.81percent_90percent', compact('products' , 'items_count'));
    }

    public function _91_percent_to_100_percent()
    {
        $products    = Product::all()->where('discount','>=',0.91)->where('discount','<=',1.00);
        $items_count = $products->count();

        return view('website.products.items-discounts.91percent_100percent', compact('products' , 'items_count'));
    }

    public function single_product_page(int $id, $clothing_type = null, string $name = null) // SPA (Single Page Application)
    {
        $product                      = Product::find($id); // OR $product = Product::findOrFail($id); //no need to use it because the error blade (404) is handled & customized manually "website.products.productsErrors.404-product-page-not-found"
        $productItem_for_image_slider = Product::where('id', $id)->get(); //this is just a temporary variable that will be used in the single page for product image sldier

        if($product == null){
            return view('website.products.productsErrors.404-product-page-not-found');
        }

        // if($name != null){
        //     Product::where('name', $name);
        //     return view('website.products.single-product' , compact('product' , 'productItem_for_image_slider'));
        // }
        if($clothing_type != null){
                Product::where('clothing_category', $clothing_type);
                if($clothing_type == 1){
                    $clothing_type = "Formal";
                }
                elseif($clothing_type == 2){
                    $clothing_type = "Casual";
                }
                elseif($clothing_type == 3){
                    $clothing_type = "Sports Wear";
                }
                return view('website.products.single-product' , compact('product' , 'productItem_for_image_slider'));
            }

        return view('website.products.single-product' , compact('product' , 'productItem_for_image_slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
