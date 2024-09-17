{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>
    <header class="bg-sky-500 p-8">
        <nav>
            <ul class="flex mt-0 mb-0 list-none gap-7 justify-center items-center">
                <li><a href="{{ 'home' }}" class="text-white underline hover:text-gray-300">Dashboard</a></li>
                <li><a href="{{ 'data-barang' }}" class="text-white hover:text-gray-300">Data Barang</a></li>
                <li><a href="{{ '' }}" class="text-white hover:text-gray-300">Transaksi</a></li>
                <li><a href="{{ '' }}" class="text-white hover:text-gray-300">Transaksi</a></li>
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
            </ul>
        </nav>
    </header>   
    
    <div id="content" class="ml-67 -mt-[100px] flex flex-col items-center justify-center h-screen text-center">
        <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" class="w-[300px]">
        <h1 class="text-5xl font-bold">WELCOME TO ADMIN</h1>
    </div>        
</body>
</html> --}}

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
                    <li><a href="{{ 'home' }}" class="text-white hover:text-gray-300">Dashboard</a></li>
                <li><a href="{{ 'data-barang' }}" class="text-white hover:text-gray-300">Data Barang</a></li>
                <li><a href="{{ '' }}" class="text-white hover:text-gray-300">Transaksi</a></li>
                
                </ul>
            </nav>
        </aside>

        {{-- <div class="text-right mb-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
            </button>
        </div> --}}

        <!-- Main Content -->
        <div class="flex-grow p-8">
            <!-- Top Bar with Search -->
            <div id="content" class="ml-67 -mt-[100px] flex flex-col items-center justify-center h-screen text-center">
                <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" class="w-[300px]">
                <h1 class="text-5xl font-bold">WELCOME TO ADMIN CANQU</h1>
            </div>        
                   
                    <button class=" text-black absolute right-7 top-5  px-5 rounded">
                        <div class="text-right mb-6">
                            
                                <li class="list-none">
                                    <form method="POST" action="{{ route('logout') }}" class="inline-block ml-54">
                                        @csrf
                                        <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="text-xl text-black">
                                            {{ __('Log Out') }}
                                            
                                        </x-responsive-nav-link>
                                    </form>
                                </li>
                            
                        </div>
                    </button>
                </div>
            </div>

            <!-- Add Product Button -->
           

            <!-- Table -->
            
        </div>
    </div>
</body>
</html>
