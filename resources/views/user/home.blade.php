    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <script src="https://cdn.tailwindcss.com">
            
        </script>
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
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Lihat Profil</a>
        
                        </li>
                    </ul>
                </div>
                
            
            </div>
        </div>

    <div class="ml-96 flex gap-5">
        <div>
            <a href="#" class=" max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-20 mb-4">
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">Prodcut</p>


            </a>
        </div>
        <div>
            <a href="#" class=" max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-20 mb-4">
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">Pendapatan</p>
            </a>
        </div>
        <div>
            <a href="#" class=" max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-20 mb-4">
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">Transaksi</p>
            </a>
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
