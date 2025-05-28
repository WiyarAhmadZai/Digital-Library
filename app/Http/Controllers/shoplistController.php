<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shoplistController extends Controller
{
    public function index(){
        return view('frontend.shop.shopList');

    }
}
