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
        // $sizes    = Size::where('id', $id)->first();
        // $products = Product::where('size_id', $sizes)->get();
        // $product  = Product::find($id);
        
        // $products = Product::where('id', $id)->select('size_id');
        // $sizes    = Size::where('id', '=', $products)->get();

        $product                    = Product::find($id);
        $all_sizes_for_each_product = Size::where('product_id', $product->id)->paginate(5);

        return view('dashboard.products.products-sizes.index', compact('product', 'all_sizes_for_each_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product  = Product::find($id);
        return view('dashboard.products.products-sizes.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = new Size();
        $size->size_value = $request->size_value;
        $size->save();

        //$product  = Product::find($id);

        // return $size->size_value.' is added.';
        return redirect()->back();
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
        $model  = Product::find($id);
        return view('dashboard.products.products-sizes.edit', compact('model'));
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
