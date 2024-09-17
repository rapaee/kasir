<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>List Product</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col">
            <div class="p-6 text-center">
                <h1 class="text-2xl font-semibold">SB Admin ²</h1>
            </div>
            <nav class="flex-grow">
                <ul class="space-y-4 p-4">
                <li><a href="{{ 'home' }}" class="text-white underline hover:text-gray-300">Dashboard</a></li>
                <li><a href="{{ 'data-barang' }}" class="text-white hover:text-gray-300">Data Barang</a></li>
                <li><a href="{{ '' }}" class="text-white hover:text-gray-300">Transaksi</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow p-8">
            <!-- Top Bar with Search -->
            <div class="flex justify-between mb-6">
                <h1 class="text-3xl font-bold">List Product</h1>
                <div class="relative">
                    <input type="text" placeholder="Search for..." class="border border-gray-300 rounded py-2 px-4">
                    <button class="absolute right-2 top-2">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l4.28 4.29a1 1 0 01-1.42 1.42l-4.28-4.29zM10 16a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Add Product Button -->
            <div class="text-right mb-6">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Product
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
