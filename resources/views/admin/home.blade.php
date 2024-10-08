<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>

    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    @extends('navbar-admin.dashboard')

    @section('navbar-admin')
    <div class="nav-content flex justify-between items-center p-4">
        <div class="flex-grow flex items-center justify-center text-center">
            <div class=" absolute mt-[650px] ml-[400px]">
                <h1 class="text-5xl font-bold">SMK NEGERI 1 BANTUL <span class="text-sky-400">CAFETARIA</span></h1>
                <h1 class="text-5xl font-bold">HELLO ADMIN WELCOME TO CAFETARIA</h1>
            </div>
        </div>
        
        <div class="relative">
            <!-- Tampilkan nama pengguna -->
            <button onclick="toggleDropdown()" class="flex items-center text-black font-semibold py-2 px-4 rounded">
                <span>{{ auth()->user()->name }}</span>
                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        
            <!-- Dropdown menu -->
            <ul id="dropdownMenu" class="absolute hidden bg-white text-gray-700 pt-1 right-0 w-40 shadow-lg rounded z-50">
                <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Lihat Profil</a>

                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class=" block px-4 py-2 text-sm cursor-pointer hover:bg-gray-200 onclick="this.closest('form').submit();">
                        @csrf
                        <div class="" onclick="this.closest('form').submit();">
                            <li>
                                Logout
                            </li>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

     
    </div>

    <!-- SweetAlert Notifications -->
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif
    
    @endsection
    <!-- untuk dropdown -->
    <script>
        function toggleDropdown() {
            var menu = document.getElementById("dropdownMenu");
            menu.classList.toggle("hidden"); // Toggle class hidden
        }
    
        window.onclick = function(event) {
            if (!event.target.closest('.relative')) {
                var dropdownMenu = document.getElementById("dropdownMenu");
                if (!dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.add('hidden');
                }
            }
        };
    </script>
</body>
</html>

