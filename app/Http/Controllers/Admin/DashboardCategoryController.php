<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at','asc')->paginate(30);
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.categories.index',compact('categories'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function create()
    {
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.categories.create');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function store(Request $request)
    {
        $categories                 = new Category();
        $categories->name           = $request->name;
        $categories->description    = $request->description;
        $categories->create_user_id = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Added successfully!"]);
    }

    public function show()
    {
        return abort('404');
    }

    public function edit($id)
    {
        $model = Category::findOrFail($id);

        if(auth()->user()->user_type == "admin"){
            return view('dashboard.categories.edit',compact('model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/categories');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function update(Request $request, $id)
    {
        $categories                 = Category::findOrFail($id);
        $categories->name           = $request->name;
        $categories->description    = $request->description;
        $categories->update_user_id = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Edited successfully!"]);
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete_user_id = auth()->user()->id; 
        $categories->delete();
        return redirect()->route('categories.index')
            ->with(['message' => "($categories->name) - Deleted successfully!"]);
    }

    public function delete()
    {
        $categories = Category::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.categories.delete',compact('categories'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        $categories = Category::findOrFail($id);
        return redirect()->route('categories.delete')
            ->with(['message' => "($categories->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('categories.delete')
            ->with(['message' => "Permanently deleted successfully!"]);
    }
}
