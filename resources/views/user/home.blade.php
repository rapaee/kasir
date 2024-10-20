<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .icon {
            filter: invert(100%) brightness(100%); /* Membuat ikon menjadi putih */
        }

    </style>
</head>
<body>

@extends('navbar.dashboard')
@section('navbar')
<div class="nav-content mb-5">
            <div id="header" class="ml-96 flex ">
                <h1 class="font-bold text-xl">DASHBOARD</h1>
                <div class="relative justify-end ml-auto">
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
                            <a href="{{ route('edit-profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Lihat Profil</a>

        
            <!-- Dropdown menu -->
            <ul id="dropdownMenu" class="absolute hidden bg-white text-gray-700 pt-1 right-0 w-40 shadow-lg rounded z-50">
                <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Lihat Profil</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Dashboard Cards Section -->
<div class="ml-96 grid grid-cols-4 gap-4 mb-5">
    <!-- Food and Drink Card -->
   <a href="{{ route('detail-f&d') }}">
    <div class="flex items-center bg-blue-200 text-black rounded-lg p-4 shadow-md">
        <!-- Container for SVG with red square background -->
        <div class="bg-blue-500 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white">
                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
            </svg>
        </div>
        <div>
            <p class="font-semibold text-base">Food And Drink</p>
            <p class="text-xl font-bold">{{ $productCount }}</p>
        </div>
    </div>
   </a>
    

    <!-- Suppliers Card -->
   <a href="">
    <div class="flex items-center bg-green-200 text-black rounded-lg p-4 shadow-md">
        <div class="bg-green-500 p-2 mr-3">
         <img src="https://cdn-icons-png.flaticon.com/128/4492/4492321.png" alt="" srcset="" class="h-8 w-8 mr-3 icon">
        </div>
        <div>
            <p class="font-semibold text-base">TRANSAKSI</p>
            <p class="text-xl font-bold">5</p>
        </div>
    </div>
   </a>

    <!-- Customers Card -->
   <a href="">
    <div class="flex items-center bg-red-200 text-black rounded-lg p-4 shadow-md">
        <div class="bg-red-500 p-2 mr-3">
        <img src="https://cdn-icons-png.flaticon.com/128/4492/4492321.png" alt="" srcset="" class="h-8 w-8 mr-3 icon">
        </div>
        <div>
            <p class="font-semibold text-base">CUSTOMERS</p>
            <p class="text-xl font-bold">3</p>
        </div>
    </div>
   </a>

   <a href="">
    <div class="flex items-center bg-yellow-200 text-black rounded-lg p-4 shadow-md">
        <div class="bg-yellow-500 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white">
                <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
              </svg>
              
        </div>
        <div>
            <p class="font-semibold text-base">CUSTOMERS</p>
            <p class="text-xl font-bold">3</p>
        </div>
    </div>
   </a>
</div>


<!-- SweetAlert Notifications -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil',
        text: '{{ session('success') }}',
        timer: 1000,
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
        timer: 1000,
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
