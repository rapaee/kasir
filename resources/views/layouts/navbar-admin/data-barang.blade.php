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
                <div class="flex z-10 items-center p-10 hover:bg-sky-300 hover-transition">
                    <img src="https://cdn-icons-png.flaticon.com/128/25/25694.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'home' }}" class="text-white text-xl list-none">Dashboard</a></li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/456/456212.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'data-kasir' }}" class="text-white text-xl list-none">Kasir</a></li>
                </div>
                <div class="flex items-center  bg-sky-500 p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/8633/8633559.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'data-barang' }}" class="text-white text-xl list-none">Product</a></li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'transaksi' }}" class="text-white text-xl list-none">Transaksi</a></li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
                    <img src="https://cdn-icons-png.flaticon.com/128/1450/1450932.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'laporan-keuangan' }}" class="text-white text-xl list-none">Report</a></li>
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

        <!-- Content on the right -->
        <div class="flex-1 p-10">
            @yield('navbar-admin')
        </div>
        
    </div>
</body>
</html>
