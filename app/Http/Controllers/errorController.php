<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class errorController extends Controller
{
    public function index(){
        return view('frontend.error.index');
    }
}
