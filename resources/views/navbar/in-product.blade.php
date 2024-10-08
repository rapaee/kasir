<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
        .filter-white {
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body>
    <!-- Parent div to hold the navbar and content -->
    <div class="flex">

        <!-- Navbar on the left -->
        <nav class="bg-sky-400 w-96 h-screen fixed">
            <div class="flex items-start p-3 bg-sky-600">
                <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="" class="w-32 ml-5 mr-4">
                <div class="mt-5 text-2xl font-bold text-white">
                    <h1>SMK NEGERI</h1>
                    <h1>1 BANTUL</h1>
                    <h1>CAFETARIA</h1>
                </div>
            </div>
            <ul class="">
                <div class="flex z-10 items-center p-10 -500 hover:bg-sky-300 hover-transition cursor-pointer" onclick="window.location='{{ route('user.home') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/25/25694.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <span class="text-white text-xl">Dashboard</span>
                </div>
                <div class="flex items-center p-10 bg-sky-500 hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('data-barang-user') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/8633/8633559.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <span class="text-white text-xl">Product</span>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('transaksi-user') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <span class="text-white text-xl">Transaksi</span>
                </div>
                <div class="flex items-center p-10  hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('laporan-keuangan-user') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/1450/1450932.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <span class="text-white text-xl">Report</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <div class="flex items-center p-10 hover:bg-sky-300 cursor-pointer w-96" onclick="this.closest('form').submit();">
                        <li>
                            <button type="submit" class="flex items-center text-lg text-white" style="pointer-events: none;">
                                <img src="https://cdn-icons-png.flaticon.com/128/4400/4400629.png" alt="" class="w-8 h-8 mr-4 filter-white">
                                Logout
                            </button>
                        </li>
                    </div>
                </form>
            </ul>
        </nav>

        <!-- Content on the right -->
        <div class="flex-1 p-10">
            @yield('navbar')
        </div>
        
    </div>
</body>
</html>