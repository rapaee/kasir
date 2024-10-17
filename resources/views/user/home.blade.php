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
        * {
            margin: 0;
            padding: 0;
        }
        .filter-black {
            filter: grayscale(100%); /* Mengubah gambar menjadi grayscale */
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
            from { width: 0; }
            to { width: 100%; }
        }
    </style>
</head>
<body>

@extends('navbar.dashboard')


        
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
    <div class="flex items-center bg-blue-200 text-black rounded-lg p-4 shadow-md">
        <!-- Container for SVG with red square background -->
        <div class="bg-blue-500 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white">
                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
            </svg>
        </div>
        <div>
            <p class="font-semibold text-base">Food And Drink</p>
            <p class="text-xl font-bold">7</p>
        </div>
    </div>
    

    <!-- Suppliers Card -->
    <div class="flex items-center bg-green-200 text-black rounded-lg p-4 shadow-md">
        <div class="bg-green-500 p-2 mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 mr-3 text-white">
            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
        </svg>
        </div>
        <div>
            <p class="font-semibold text-base">SUPPLIERS</p>
            <p class="text-xl font-bold">5</p>
        </div>
    </div>

    <!-- Customers Card -->
    <div class="flex items-center bg-red-200 text-black rounded-lg p-4 shadow-md">
        <div class="bg-red-500 p-2 mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 mr-3 text-white">
            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
        </svg>
        </div>
        <div>
            <p class="font-semibold text-base">CUSTOMERS</p>
            <p class="text-xl font-bold">3</p>
        </div>
    </div>
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
