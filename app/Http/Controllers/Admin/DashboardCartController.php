<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
// use App\Models\Category;
// use App\Models\Product;
use App\Models\Cart;

class DashboardCartController extends Controller
{
    public function index()
    {
        $carts = Cart::orderBy('created_at','asc')->paginate(30);
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.carts.index',compact('carts'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    // public function create()
    // {
    //     return view('dashboard.carts.create');
    // }

    // public function store(Request $request)
    // {
    //     $carts = new Cart();
    //     $carts->save();

    //     return redirect()->route('carts.index')
    //         ->with(['message' => 'Added successfully!']);
    // }

    // public function show()
    // {
    //     return abort('404');
    // }

    public function edit($id)
    {
        $model = Cart::findOrFail($id);
        
        if(auth()->user()->user_type == "admin"){
            return view('dashboard.carts.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/carts');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function update(Request $request, $id)
    {
        $carts = Cart::findOrFail($id);
        $carts->save();

        return redirect()->route('carts.index')
            ->with(['message' => 'Edited successfully!']);
    }

    public function destroy($id)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();
        return redirect()->route('carts.index')
            ->with(['message' => 'Deleted successfully!']);
    }

    public function delete()
    {
        $carts = Cart::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.carts.delete',compact('carts'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        Cart::withTrashed()->find($id)->restore();
        $carts = Cart::findOrFail($id);
        return redirect()->route('carts.delete')
            ->with(['message' => 'Restored successfully!']);
    }

    public function forceDelete($id)
    {
        Cart::where('id', $id)->forceDelete();
        return redirect()->route('carts.delete')
            ->with(['message' => 'Permanently deleted successfully!']);
    }
}
