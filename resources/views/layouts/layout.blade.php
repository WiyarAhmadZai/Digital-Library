<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous" defer></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased" dir="rtl">

<div x-data="{ open: true }" class="flex h-screen">

    <!-- Sidebar -->
    <div
        :class="open ? 'w-64' : 'w-16'"
        class="bg-gray-800 text-white transition-all duration-300 flex flex-col justify-between"
    >
        <div class="p-5">
            <h3 x-show="open" class="text-xl text-center mb-6">Library System</h3>

            <ul>
                <li class="relative group">
                    <a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">
                        <i class="fas fa-home"></i>
                        <span x-show="open" class="ml-2">Home</span>
                    </a>
                </li>
                <li class="relative group">
                    <a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">
                        <i class="fas fa-book"></i>
                        <span x-show="open" class="ml-2">Books</span>
                    </a>
                </li>

                <!-- Dropdown for Catalog -->
                <li x-data="{ openDropdown: false }" class="relative group">
                    <button @click="openDropdown = !openDropdown" class="block py-2 px-3 rounded w-full hover:bg-gray-700 flex justify-between items-center">
                        <div class="flex items-center">
                            <i class="fas fa-list"></i>
                            <span x-show="open" class="ml-2">Catalog</span>
                        </div>
                        <i :class="openDropdown ? 'fas fa-chevron-down' : 'fas fa-chevron-right'" x-show="open"></i>
                    </button>

                    <ul
                        x-show="openDropdown"
                        x-transition
                        class="bg-gray-700 w-full py-2 mt-2 rounded"
                    >
                        <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Authors</a></li>
                        <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Genres</a></li>
                        <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Publishers</a></li>
                    </ul>
                </li>

                <li class="relative group">
                    <a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">
                        <i class="fas fa-book-reader"></i>
                        <span x-show="open" class="ml-2">Borrowed Books</span>
                    </a>
                </li>
                <li class="relative group">
                    <a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">
                        <i class="fas fa-chart-line"></i>
                        <span x-show="open" class="ml-2">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Toggle Button -->
<button
    @click="open = !open"
    class="bg-blue-500 text-white p-2 rounded-md mb-4 text-center transition-all duration-300"
>
    <i :class="open ? 'fas fa-times' : 'fas fa-bars'"></i>
</button>



        <!-- Page Content -->
        @yield('content')
    </div>
</div>

</body>
</html>
