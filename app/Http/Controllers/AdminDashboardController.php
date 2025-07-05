<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SalesChart;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
