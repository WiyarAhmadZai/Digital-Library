@extends('layouts.layout')
<style>
    .dashboard-divs{
        width: 200px;
        height: 150px;
        color: white;
        font-weight: bold;
        text-align: center;
        align-content: center
    }
    .dashboard-divs:hover{
        transform: translateY(-10px);
        transition: ease-in-out 500ms;
    }
    .card1{
        background-color: red;
    }
    .card2{
        background-color: goldenrod;
    }
    .card3{
        background-color: dodgerblue;
    }
    .card4{
        background-color: green;
    }
</style>

@section('content')

    <h1 class="text-2xl mb-4">مديريت ډېشبورډ</h1>

    <div class="grid grid-cols-4 gap-4 mb-6 " style="display: flex; justify-content: center; gap: 1rem;">
        <div class="shadow-lg rounded dashboard-divs card1" >
            <h3>ټول کتابونه
                <span class="text-xl">{{ $totalBooks ?? 0 }}</span>
            </h3>
        </div>
        <div class="shadow-sm rounded dashboard-divs card2">
            <h3>کاروونکي
                <span class="text-xl">{{ $totalUsers ?? 0 }}</span>
            </h3>

        </div>
        <div class="shadow-sm rounded dashboard-divs card3">
            <h3>ليکوالان
                <span class="text-xl">{{ $totalAuthors ?? 0 }}</span>
            </h3>
        </div>
        <div class="shadow-sm rounded dashboard-divs card4">
            <h3>ټول پلور
                <span class="text-xl">${{ $totalSales ?? 0 }}</span>
            </h3>
        </div>
    </div>

    <div class="bg-white p-4 shadow-sm rounded ">
        <h3 class="mb-4">پلور چارت</h3>
        <div class="row" style=" display: flex; justify-content: center; align-items: baseline; height: 100%; gap: 1rem;">
            <div class="col-md-6" style="width:50%;">
                <canvas id="salesChart" class="w-3"></canvas>
            </div>
            <div class="col-md-6" style="width:50%;">
                <canvas id="salesChart" class="w-3"></canvas>
            </div>
        </div>
    </div>

    {{-- Include Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [
                    {
                        label: 'پلور مقدار',
                        data: {!! json_encode($dataset) !!},
                        backgroundColor: '#3490dc'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
