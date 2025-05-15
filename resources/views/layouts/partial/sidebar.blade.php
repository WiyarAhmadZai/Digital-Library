{{-- ""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            right: 0;
            top: 0;
            z-index: 1030;
            background-color: #343a40;
            color: white;
            width: 250px;
            transition: width 0.3s;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .main-content {
            margin-right: 250px;
            transition: margin-right 0.3s;
        }
        .main-content.collapsed {
            margin-right: 70px;
        }
    </style>
</head>
<body class="bg-light" dir="rtl">

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="p-3 text-center">
        <h4 class="text-white">Library System</h4>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fas fa-home"></i>
                <span class="ms-2">خانه</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fas fa-book"></i>
                <span class="ms-2">کتاب‌ها</span>
            </a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#catalogMenu" role="button" aria-expanded="false">
                <i class="fas fa-list"></i>
                <span class="ms-2">فهرست‌ها</span>
            </a>
            <div class="collapse" id="catalogMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item"><a href="/" class="nav-link">نویسندگان</a></li>
                    <li class="nav-item"><a href="/" class="nav-link">ژانرها</a></li>
                    <li class="nav-item"><a href="/" class="nav-link">ناشران</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fas fa-book-reader"></i>
                <span class="ms-2">کتاب‌های امانت داده شده</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fas fa-chart-line"></i>
                <span class="ms-2">گزارشات</span>
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div id="mainContent" class="main-content p-4">
    <button id="toggleBtn" class="btn btn-primary mb-3">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Page Content -->
    @yield('content')
</div>

<!-- Bootstrap JS Bundle -->
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    const toggleBtn = document.getElementById('toggleBtn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');
    });
</script>

</body>
</html>"" --}}
