<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <div class="flex z-10 items-center p-5 -500 hover:bg-sky-300 hover-transition cursor-pointer" onclick="window.location='{{ route('admin.home') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/25/25694.png" alt="" class="w-6 h-6 mr-4 filter-white">
                    <span class="text-white text-lg">Dashboard</span>
                </div>
                <div class="flex items-center p-5 bg-sky-500 hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('data-barang-user') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/8633/8633559.png" alt="" class="w-6 h-6 mr-4 filter-white">
                    <span class="text-white text-lg">Product</span>
                </div>
                <div class="flex items-center p-5 hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('transaksi-admin') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/2541/2541369.png" alt="" class="w-6 h-6 mr-4 filter-white">
                    <span class="text-white text-lg">Transaksi</span>
                </div>
                <div class="flex items-center p-5  hover:bg-sky-300 cursor-pointer" onclick="window.location='{{ route('laporan-keuangan-admin') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/1450/1450932.png" alt="" class="w-6 h-6 mr-4 filter-white">
                    <span class="text-white text-lg">Report</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <div class="flex items-center p-5 hover:bg-sky-300 cursor-pointer w-96" onclick="confirmLogout();">
                        <li>
                            <button type="button" class="flex items-center text-lg text-white" style="pointer-events: none;">
                                <img src="https://cdn-icons-png.flaticon.com/128/4400/4400629.png" alt="" class="w-6 h-6 mr-4 filter-white">
                                Logout
                            </button>
                        </li>
                    </div>
                </form>
            </ul>
        </nav>

        <!-- Content on the right -->
        <div class="flex-1 p-10">
            @yield('navbar-admin')
        </div>
        
    </div>
</body>
</html>
<script>
    function confirmLogout() {
        Swal.fire({
            title: "Logout",
            text: "Apakah anda yakin untuk logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: "success",
                title: "Berhasil logout",
                showConfirmButton: false,
                timer: 4200
                });
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>

