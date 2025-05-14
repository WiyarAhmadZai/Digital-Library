<div class="p-5">
    <h3 class="text-xl text-center mb-6">Library System</h3>
    <ul>
        <li><a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">Home</a></li>
       <li><a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">Books</a></li>

        <!-- Dropdown for Catalog -->
        <li x-data="{ openDropdown: false }" class="relative">
            <button @click="openDropdown = !openDropdown" class="block py-2 px-3 rounded w-full text-right hover:bg-gray-700">
                Catalog <span class="ml-2 text-sm">&#9660;</span>
            </button>
            <ul x-show="openDropdown" class="absolute left-0 bg-gray-700 w-full py-2 mt-2 rounded">
                <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Authors</a></li>
                <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Genres</a></li>
                <li><a href="/" class="block py-2 px-3 hover:bg-gray-600">Publishers</a></li>
            </ul>
        </li>

        <li><a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">Borrowed Books</a></li>
        <li><a href="/" class="block py-2 px-3 rounded hover:bg-gray-700">Reports</a></li>
    </ul>
</div>
