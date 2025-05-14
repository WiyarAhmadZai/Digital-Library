<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SalesChart;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // ✅ Create the chart instance
        $salesChart = new SalesChart();
        $salesChart->title('کلني پلور');
        $salesChart->labels(['2019', '2020', '2021', '2022', '2023']);

        // ✅ Add dataset
        $salesChart->dataset('پلور مقدار', 'bar', [15000, 23000, 18000, 22000, 27000])
                   ->options(['backgroundColor' => '#3490dc']);

        // ✅ Extract labels and data for JavaScript rendering
        $labels = $salesChart->labels;
        $dataset = $salesChart->datasets[0]->values;

        return view('admin.dashboard', compact('labels', 'dataset'));
    }
}
