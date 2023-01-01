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
        $products = Product::orderBy('created_at','asc')->paginate(30);

        return view('dashboard.products.index',compact('products'));
    }

    public function single_product_page_dashboard(int $id, $clothing_type = null, string $name = null) // SPA (Single Page Application)
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
        //     'image_name' => $input['image_name'],
        //     'price' => $input['price'],
        //     'sale_price' => $input['sale_price'],
        //     'clothing_type' => $input['clothing_type'],
        //     'is_accesory' => $input['is_accesory'],
        //     'product_category' => $input['product_category'],
        // ]);

        // $request->validate([
        //     'name'             => 'required',
        //     'description'      => 'required',
        //     'image_name'       => 'required',
        //     'price'            => 'required',
        //     'clothing_type'    => 'required',
        //     'is_accesory'      => 'required',
        //     'product_category' => 'required',
        // ]);

        $products                      = new Product();
        $products->name                = $request->name;
        $products->description         = $request->description;
        // if($request->hasFile('image_name')){
        //     $file       = $request->file('image_name');
        //     $extension  = $file->getClientOriginalExtension();
        //     $filename   = time().'.'.$extenstion;
        //     $file->move('/assets/images/' , $filename);
        //     $products->image_name = $filename;
        // }
        // else{
        //     return $request;
        //     $products->image_name = '';
        // }
        $products->image_name         = "/assets/images/".$request->image_name;
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
        ////////////////////////--------- START image's request ---------////////////////////////
        if($request->hasFile("image_name")){
            $products->image_name = "/assets/images/".$request->image_name;
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
        $products = Product::orderBy('created_at','asc')->onlyTrashed()->paginate(30);

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
