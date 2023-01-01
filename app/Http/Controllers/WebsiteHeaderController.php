<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class WebsiteHeaderController extends Controller
{
    public function index()
    {
        $my_uuid = Uuid::uuid4();
        
        printf("Your UUID is: %s", $myuuid->toString());

        return view('layouts.website.header', compact('my_uuid'));        
    }
}
