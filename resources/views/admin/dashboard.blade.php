@extends('layouts.layout')



@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card radius-10">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Books & Downloads Last 7 Days</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown">
                                        <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if (!empty($dropdownItems) && is_array($dropdownItems))
                                            @foreach ($dropdownItems as $item)
                                                @if (isset($item['divider']) && $item['divider'] === true)
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                @else
                                                    <li><a class="dropdown-item"
                                                            href="{{ $item['url'] ?? 'javascript:;' }}">{{ $item['label'] ?? 'Action' }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-0" style="height: 350px;">
                                <canvas id="chart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Books & Downloads</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown"><i
                                            class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($dropdownItems as $item)
                                            @if (isset($item['divider']) && $item['divider'])
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                            @else
                                                <li><a class="dropdown-item"
                                                        href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-0" style="height: 300px;">
                                <canvas id="chart2"></canvas>
                            </div>
                            <p class="mt-3 text-center">
                                <strong>Total Books:</strong> {{ $totalBooks }}<br>
                                <strong>Total Downloaded Books:</strong> {{ $totalDownloadedBooks }}
                            </p>
                        </div>
                    </div>
                </div>
            </div><!--end row-->


            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div>
                                <div id="chart3" style="height:250px;"></div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach (['Pashto', 'English', 'Dari'] as $language)
                                @php
                                    $badgeClass = match ($language) {
                                        'Pashto' => 'bg-danger',
                                        'English' => 'bg-primary',
                                        'Dari' => 'bg-success',
                                        default => 'bg-secondary',
                                    };
                                    $count = $booksByLanguage[$language] ?? 0;
                                @endphp
                                <li
                                    class="list-group-item d-flex bg-transparent justify-content-between align-items-center {{ $loop->first ? 'border-top' : '' }}">
                                    {{ $language }}
                                    <span class="badge {{ $badgeClass }} rounded-pill">{{ $count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 g-3">
                                <div class="col">
                                    <a href="{{ route('admin.user.list') }}">
                                        <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary font-14">Total Users</p>
                                                        <h5 class="my-0">{{ $totalUsers ?? 0 }}</h5>
                                                    </div>
                                                    <div class="text-primary ms-auto font-30">
                                                        <i class="bx bx-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-1" id="chart4"></div>
                                            <div class="position-absolute end-0 bottom-0 m-2">
                                                <span class="text-success">{{ $usersPercentageChange ?? '+0%' }}</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                                <div class="col">
                                    <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary font-14">Total Revenue</p>
                                                    <h5 class="my-0">${{ number_format($totalRevenue ?? 0, 2) }}</h5>
                                                </div>
                                                <div class="text-danger ms-auto font-30">
                                                    <i class="bx bx-dollar"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-1" id="chart5"></div>

                                        <div class="position-absolute end-0 bottom-0 m-2">
                                            <span class="text-success">
                                                @if (isset($revenuePercentageChange))
                                                    {{ $revenuePercentageChange }}%
                                                @else
                                                    +0%
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary font-14">New Users</p>
                                                    <h5 class="my-0">{{ number_format($newUsersCount ?? 0) }}</h5>
                                                </div>
                                                <div
                                                    class="{{ ($newUsersPercentageChange ?? 0) >= 0 ? 'text-success' : 'text-danger' }} ms-auto font-30">
                                                    <i class='bx bx-group'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1" id="chart6"></div>
                                        <div class="position-absolute end-0 bottom-0 m-2">
                                            @if (isset($newUsersPercentageChange))
                                                @if ($newUsersPercentageChange >= 0)
                                                    <span class="text-success">+{{ $newUsersPercentageChange }}%</span>
                                                @else
                                                    <span class="text-danger">{{ $newUsersPercentageChange }}%</span>
                                                @endif
                                            @else
                                                <span class="text-secondary">0%</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary font-14">Sold Items</p>
                                                    <h5 class="my-0">{{ number_format($downloadsCount ?? 0) }}</h5>
                                                </div>
                                                <div
                                                    class="{{ ($downloadsPercentageChange ?? 0) >= 0 ? 'text-success' : 'text-danger' }} ms-auto font-30">
                                                    <i class='bx bx-beer'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1" id="chart7"></div>
                                        <div class="position-absolute end-0 bottom-0 m-2">
                                            @if (isset($downloadsPercentageChange))
                                                @if ($downloadsPercentageChange >= 0)
                                                    <span class="text-success">+{{ $downloadsPercentageChange }}%</span>
                                                @else
                                                    <span class="text-danger">{{ $downloadsPercentageChange }}%</span>
                                                @endif
                                            @else
                                                <span class="text-secondary">0%</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary font-14">Total Visits</p>
                                                    <h5 class="my-0">79</h5>
                                                </div>
                                                <div class="text-info ms-auto font-30"><i class='bx bx-camera-movie'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1" id="chart8"></div>
                                        <div class="position-absolute end-0 bottom-0 m-2"><span
                                                class="text-success">+18%</span></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 overflow-hidden mb-0 shadow-none border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary font-14">Total Returns</p>
                                                    <h5 class="my-0">178</h5>
                                                </div>
                                                <div class="ms-auto font-30"><i class='bx bx-refresh'></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1" id="chart9"></div>
                                        <div class="position-absolute end-0 bottom-0 m-2"><span
                                                class="text-success">+35%</span></div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </div>

            </div><!--end row-->


            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="card radius-10">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Top Selling Country</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                        data-bs-toggle="dropdown"><i
                                            class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="dashboard-map" style="height: 250px"></div>
                            <hr>
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="country-icon">
                                        <img src="{{ asset('assets/img/county/01.png') }}" width="35"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-2">United States <span class="float-end">50%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-gradient-ibiza" role="progressbar"
                                                style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="country-icon">
                                        <img src="{{ asset('assets/img/county/02.png') }}" width="35"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-2">England <span class="float-end">65%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-gradient-deepblue" role="progressbar"
                                                style="width: 65%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="country-icon">
                                        <img src="{{ asset('assets/img/county/03.png') }}" width="35"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-2">England <span class="float-end">75%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-gradient-ohhappiness" role="progressbar"
                                                style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="country-icon">
                                        <img src="{{ asset('assets/img/county/04.png') }}" width="35"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-2">England <span class="float-end">85%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-gradient-orange" role="progressbar"
                                                style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-0">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="country-icon">
                                        <img src="{{ asset('assets/img/county/05.png') }}" width="35"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-2">England <span class="float-end">95%</span></p>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-gradient-blues" role="progressbar"
                                                style="width: 95%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div>
                                    <p class="mb-0 text-secondary font-14">Page Views</p>
                                    <h5 class="my-0">2050</h5>
                                </div>
                                <div class="ms-auto font-30"><i class='bx bx-bookmark-alt'></i>
                                </div>
                            </div>
                            <div class="chart-container-5">
                                <canvas id="chart10"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div>
                                    <p class="mb-0 text-secondary font-14">Bounce Rate</p>
                                    <h5 class="my-0">24.5%</h5>
                                </div>
                                <div class="ms-auto font-30"><i class='bx bx-line-chart'></i>
                                </div>
                            </div>
                            <div class="chart-container-5">
                                <canvas id="chart11"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div>
                                    <p class="mb-0 text-secondary font-14">Total Cliks</p>
                                    <h5 class="my-0">8945</h5>
                                </div>
                                <div class="ms-auto font-30"><i class='bx bx-heart'></i>
                                </div>
                            </div>
                            <div class="chart-container-5">
                                <canvas id="chart12"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--End Row-->


            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Recently Uploaded Books</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Cover</th>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Language</th>
                                    <th>Price</th>
                                    <th>Uploaded At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentBooks as $book)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.book.list', ['id' => $book->id]) }}">
                                                {{ $book->name }}
                                            </a>
                                        </td>

                                        <td>
                                            @php
                                                $cover = json_decode($book->image_paths ?? '[]')[0] ?? null;
                                            @endphp
                                            @if ($cover)
                                                <img src="{{ asset('storage/' . $cover) }}" class="product-img-2"
                                                    style="width: 60px; height: auto;" alt="Book Cover">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>#{{ $book->id }}</td>
                                        <td>{{ $book->author->name ?? 'Unknown' }}</td>
                                        <td>{{ $book->language ?? 'N/A' }}</td>
                                        <td>${{ number_format($book->price, 2) }}</td>
                                        <td>{{ $book->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                                @if ($recentBooks->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No recent books found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chart1').getContext('2d');

        const labels = @json($dates);
        const booksData = @json($booksData);
        const downloadsData = @json($downloadsData);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Books Added',
                        data: booksData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                        tension: 0.3,
                        borderWidth: 2,
                        pointRadius: 4,
                    },
                    {
                        label: 'Books Downloaded',
                        data: downloadsData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        tension: 0.3,
                        borderWidth: 2,
                        pointRadius: 4,
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Books Added and Downloaded Per Day (Last 7 Days)'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chart2').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Books', 'Downloaded Books'],
                datasets: [{
                    data: [{{ $totalBooks }}, {{ $totalDownloadedBooks }}],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>
