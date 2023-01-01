<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AboutController extends Controller
{
    public function index()
    {
        $categories_description = Category::all();

        return view('layouts.website.about', compact('categories_description'));        
    }
}
