<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Product;

class DashboardSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $product                    = Product::find($id);
        $all_sizes_for_each_product = Size::where('product_id', $product->id)->paginate(5);

        return view('dashboard.products.product-sizes.index', compact('product', 'all_sizes_for_each_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        $size    = Size::where('product_id', $product->id)->find($id);
        return view('dashboard.products.product-sizes.create', compact('product', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $size             = new Size();
        $size->size_value = $request->size_value;
        $product_id       = Product::find($id);
        $size->product_id = $product_id->id;
        $size->save();

        // return redirect()->route('products.index');
        return redirect()->route('products.index');
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
        $product = Product::find($id);
        $size    = Size::where('product_id', $product->id)->find($id);
        return view('dashboard.products.product-sizes.edit', compact('product', 'size'));
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
        $size             = Size::find($id);
        $size->size_value = $request->size_value;
        $product_id       = Product::find($id);
        // $product_id       = Product::where('size_id', $size->id)->find($id);
        $size->product_id = $product_id->id;
        $size->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        //$size->delete_user_id = auth()->user()->id; 
        $size->delete();
        return redirect()->back();
    }
}
