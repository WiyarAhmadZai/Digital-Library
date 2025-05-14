<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            direction: rtl;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex">

        <!-- Sidebar Menu -->
        <aside class="w-100 bg-gray-800 text-white p-4 " style="position: fixed; height: 100vh; width: 200px;">
            <h2 class="text-xl mb-4">کتابتون</h2>
            <ul class="space-y-2">
                <li><a href="{{ route('admin.dashboard') }}" class="block p-2 bg-gray-700 rounded">ډېشبورډ</a></li>
                <li><a href="#" class="block p-2">کتابونه</a></li>
                <li><a href="#" class="block p-2">کاروونکي</a></li>
                <li><a href="#" class="block p-2">ليکوالان</a></li>
                <li><a href="#" class="block p-2">پلور</a></li>
                <li><a href="#" class="block p-2">راپورونه</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100" style="padding-right:230px ">
            @yield('content')
        </main>
    </div>
</body>
</html>
