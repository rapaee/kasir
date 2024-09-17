
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
        <div id="content" class="">
            <button class="bg-sky-400 p-2 rounded ml-[1130px] mt-[20px] text-white hover:bg-sky-500"><a href="{{ route('add-data-barang') }}">Tambah Produk</a></button>
            <table class="ml-[60px] w-[1200px] bg-white mt-[20px]">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">S/N</th>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Nama barang</th>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Harga</th>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Kategori</th>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Stok</th>
                        <th class="px-4 py-2 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows go here -->
                </tbody>
            </table>
            
        </div>        
    </main>
</body>
</html>