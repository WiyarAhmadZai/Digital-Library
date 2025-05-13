<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SalesChart extends Chart
{
    public function __construct()
    {
        parent::__construct();
        $this->labels(['January', 'February', 'March', 'April']);
        $this->dataset('Sales', 'bar', [150, 200, 300, 400])
             ->backgroundColor(['#4CAF50', '#2196F3', '#FF9800', '#F44336']);
    }
}
