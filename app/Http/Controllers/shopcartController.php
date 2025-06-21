<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopcartController extends Controller
{
    public function index(){
        return view('frontend.shop.shopCart');
    }
}
