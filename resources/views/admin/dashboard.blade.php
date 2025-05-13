@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl mb-4">مديريت ډېشبورډ</h1>

    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 shadow-sm rounded">
            <h3>ټول کتابونه</h3>
            <p class="text-xl">{{ $totalBooks ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 shadow-sm rounded">
            <h3>کاروونکي</h3>
            <p class="text-xl">{{ $totalUsers ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 shadow-sm rounded">
            <h3>ليکوالان</h3>
            <p class="text-xl">{{ $totalAuthors ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 shadow-sm rounded">
            <h3>ټول پلور</h3>
            <p class="text-xl">${{ $totalSales ?? 0 }}</p>
        </div>
    </div>

    <div>
        {{-- {!! $salesChart->render() !!} --}}
    </div>
@endsection

