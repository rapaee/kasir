
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
         .animasi-teks {
            font-size: 30px;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            border-right: 2px solid white; /* Optional: Add a cursor effect */
            animation: animasi-teks 5s steps(70, end);
        }

        @keyframes animasi-teks {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
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
                <div class="flex items-center bg-sky-500 p-10  hover:bg-sky-300 hover-transition">
                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828791.png" alt="" class="w-8 h-8 mr-4 filter-white">
                    <li><a href="{{ 'home' }}" class="text-white text-xl list-none">Dashboard</a></li>
                </div>
                <div class="flex items-center p-10 hover:bg-sky-300">
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
        <div id="icon-right" class="absolute top-4 right-4">
            <a href="../login/login.html" onclick="return confirm('Apakah Anda yakin ingin log out?')"><img src="../gambar/power.png" alt="" srcset="" class="w-8 h-8"></a>
        </div>
        <div id="content" class="ml-96 flex flex-col items-center justify-center h-screen text-center">
            <img src="../gambar/pic-dash.png" alt="">
            <h1 class="text-5xl font-bold">WELCOME TO USER</h1>
            <div class="animasi-teks">
                SMK NEGERI 1 BANTUL <span class="text-sky-400">CAFETARIA</span>
            </div>
        </div>        
    </main>
</body>
</html>