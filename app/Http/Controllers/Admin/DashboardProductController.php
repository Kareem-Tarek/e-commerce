<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardProductController extends Controller
{

    public function index()
    {
        if(auth()->user()->user_type == 'supplier'){
            $products = Product::where('brand_name', auth()->user()->id)->orderBy('created_at','asc')->paginate(30);
        }
        else{
            $products = Product::orderBy('created_at','asc')->paginate(30);
        }

        return view('dashboard.products.index',compact('products'));
    }

    public function single_product_page_dashboard($id, $clothing_type = null, string $name = null) // SPA (Single Page Application)
    {
        $product = Product::find($id); // OR $product = Product::findOrFail($id); //no need to use it because the error blade (404) is handled & customized manually "dashboard.products.productsErrors.404-product-page-not-found"
        if($product == null){
            return view('dashboard.products.productsErrors.404-product-page-not-found-dashboard');
        }

        // if($name != null){
        //     Product::where('name', $name);
        //     return view('website.products.single-product' , compact('product'));
        // }

        return view('dashboard.products.single-product-dashboard' , compact('product'));
    }

    public function dashboardSearch(Request $request, $id)
    {
        $dashboard_search_text_input     = $request->dashboard_search_query;
        if(auth()->user()->user_type == 'supplier'){
            $dashboard_products_result = Product::where('name','LIKE',"%{$dashboard_search_text_input}%")
                                                    ->orWhere('brand_name','LIKE',"%{$dashboard_search_text_input}%")->where('brand_name', auth()->user()->id)->get();
        }
        else{
            $dashboard_products_result = Product::where('name','LIKE',"%{$dashboard_search_text_input}%")
                                                    ->orWhere('brand_name','LIKE',"%{$dashboard_search_text_input}%")->get();
        }

        $dashboard_products_result_count = $dashboard_products_result->count();

        return view('dashboard.products.products-search.search-dashboard', compact('dashboard_products_result' , 'dashboard_search_text_input' , 'dashboard_products_result_count'))
            ->with('i' , ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {

        // $product = Product::create([
        //     'name' => $input['name'],
        //     'slug' => $input['slug'],
        //     'description' => $input['description'],
        //     'image' => $input['image'],
        //     'price' => $input['price'],
        //     'sale_price' => $input['sale_price'],
        //     'clothing_type' => $input['clothing_type'],
        //     'is_accesory' => $input['is_accesory'],
        //     'product_category' => $input['product_category'],
        // ]);

        // $request->validate([
        //     'name'             => 'required',
        //     'description'      => 'required',
        //     'image'       => 'required',
        //     'price'            => 'required',
        //     'clothing_type'    => 'required',
        //     'is_accesory'      => 'required',
        //     'product_category' => 'required',
        // ]);

        $products                      = new Product();
        $products->name                = $request->name;
        $products->description         = $request->description;
        $products->brand_name          = $request->brand_name;
        // if($request->hasFile('image')){
        //     $file       = $request->file('image');
        //     $extension  = $file->getClientOriginalExtension();
        //     $filename   = time().'.'.$extenstion;
        //     $file->move('/assets/images/' , $filename);
        //     $products->image = $filename;
        // }
        // else{
        //     return $request;
        //     $products->image = '';
        // }
        $products->image         = "/assets/images/".$request->image;
        $products->price              = $request->price;
        $products->discount           = $request->discount;
        // $products->size               = $request->size;
        $products->clothing_type      = $request->clothing_type;
        $products->available_quantity = $request->available_quantity;
        $products->is_accessory       = $request->is_accessory;
        $products->product_category   = $request->product_category;
        $products->create_user_id     = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Added successfully!"]);
    }


    public function edit($id)
    {
        $model = Product::findOrFail($id);

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier"){
            return view('dashboard.products.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/products');
        }
    }


    public function update(Request $request, $id)
    {
        $products                     = Product::findOrFail($id);
        $products->name               = $request->name;
        $products->description        = $request->description;
        $products->brand_name         = $request->brand_name;
        ////////////////////////--------- START image's request ---------////////////////////////
        if($request->hasFile("image")){
            $products->image = "/assets/images/".$request->image;
        }
        ////////////////////////--------- END image's request ---------////////////////////////
        $products->price              = $request->price;
        $products->discount           = $request->discount;
        // $products->size               = $request->size;
        $products->clothing_type      = $request->clothing_type;
        $products->available_quantity = $request->available_quantity;
        $products->is_accessory       = $request->is_accessory;
        $products->product_category   = $request->product_category;
        $products->update_user_id     = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Edited successfully!"]);
    }


    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Deleted successfully!"]);
    }

    public function delete()
    {
        if(auth()->user()->user_type == 'supplier'){
            $products = Product::where('brand_name', auth()->user()->id)->orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        }
        else{
            $products = Product::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        }

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.products.delete',compact('products'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $products = Product::findOrFail($id);
        return redirect()->route('products.delete')
            ->with(['message' => "($products->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Product::where('id', $id)->forceDelete();
        return redirect()->route('products.delete')
            ->with(['message' => 'Permanently deleted successfully!']);
    }

}
