<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrondendRouteController extends Controller
{
    //
    public function home()
    {
        return view('frontend.home.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }
    public function shoplist()
    {
        return view('frontend.shop.shopList');
    }

    public function shopdetails()
    {
        return view('frontend.shop.shopDetails');
    }

    public function shopcart()
    {
        return view('frontend.shop.shopCart');
    }
    public function blog()
    {
        return view('frontend.blog.index');
    }
    public function about()
    {
        return view('frontend.about.index');
    }
    public function author()
    {
        return view('frontend.author.author');
    }
    public function error()
    {
        return view('frontend.error.index');
    }
}
