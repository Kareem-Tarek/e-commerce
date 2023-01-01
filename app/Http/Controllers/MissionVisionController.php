<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    public function index()
    {
        return view('layouts.website.mission-vision');
    }
}
