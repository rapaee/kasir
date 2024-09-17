<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .filter-white {
            filter: brightness(0) invert(1);
        }
        .fixed-nav {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh; /* Full viewport height */
        z-index: 1000; /* Ensure it stays above other content */
         }

    </style>
</head>
<body>
    <main class="flex">
        <nav class="bg-sky-400 w-96 h-screen ">
            <div class="flex items-start p-3 bg-sky-600">
                <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="" class="w-32 ml-5 mr-4">
                <div class="mt-5 text-2xl font-bold text-white">
                    <h1>SMK NEGERI</h1>
                    <h1>1 BANTUL</h1>
                    <h1>CAFETARIA</h1>
                </div>
            </div>
            <ul class="">
                <div class="flex items-center p-10  hover:bg-sky-300 hover-transition">
                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828791.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'home' }}" class="text-white text-xl list-none">Dashboard</a></li>
                </div>
                <div class="flex items-center p-10 bg-sky-500 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/9542/9542653.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'data-barang' }}" class="text-white text-xl list-none">Product</a></li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ '' }}" class="text-white text-xl list-none">Transaksi</a></li>
                    <li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/4400/4400629.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline-block ml-54">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-sm text-white">
                                {{ __('Log Out') }}
                                
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </div>
        </ul>
        </nav>
        <div id="content" class="w-[1325px] mt-10 p-6 bg-white shadow-md rounded-lg">
            <form action="{{ route('add-data-barang') }}" method="POST" class="space-y-6">
                <h1 class="text-xl font-bold">Tambah Product</h1>
                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-700">Nama Product:</label>
                    <input type="text" id="fname" name="nama" placeholder="Masukan Nama Product" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
        
                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="text" id="lname" name="harga" placeholder="Masukan Harga" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-700">Kategori:</label>
                    <input type="text" id="lname" name="kategori" placeholder="Masukan Jenis Kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-700">Stok:</label>
                    <input type="text" id="lname" name="stok" placeholder="Masukan Stok" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="text-right">
                    <input type="submit" value="Submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                </div>
            </form>
        </div>
        
    </main>
</body>
</html>