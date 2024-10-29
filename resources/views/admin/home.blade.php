<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Dashboard</title>

    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .icon {
            filter: invert(100%) brightness(100%); /* Membuat ikon menjadi putih */
        }
    </style>

</head>
<body>
    @extends('navbar-admin.dashboard')

    @section('navbar-admin')
    <div class="nav-content flex justify-between items-center p-4">
        <!-- Dashboard Cards Section -->
        <div class="ml-0 lg:ml-96 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-5 mt-14">
            <!-- User Card -->
            <a href="{{ route('detail-user-dashboard-admin') }}">
                <div class="flex items-center bg-purple-200 text-black rounded-lg p-4 shadow-md">
                    <div class="bg-purple-500 p-2 mr-3">
                        <img src="https://cdn-icons-png.flaticon.com/128/615/615075.png" alt="" class="h-6 sm:h-8 w-6 sm:w-8 mr-3 icon">
                    </div>
                    <div>
                        <p class="font-semibold text-sm sm:text-base">USER</p>
                        <p class="text-lg sm:text-xl font-bold">{{ $userCount }}</p>
                    </div>
                </div>
            </a>

            <!-- Food and Drink Card -->
            <a href="{{ route('detail-f&d-admin') }}">
                <div class="flex items-center bg-blue-200 text-black rounded-lg p-4 shadow-md">
                    <div class="bg-blue-500 p-2 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 sm:h-8 w-6 sm:w-8 text-white">
                            <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-sm sm:text-base">PRODUCT</p>
                        <p class="text-lg sm:text-xl font-bold">{{ $productCount }}</p>
                    </div>
                </div>
            </a>

            <!-- Transaksi Card -->
            <a href="{{ route('detail-transaksi-dashboard-admin') }}">
                <div class="flex items-center bg-green-200 text-black rounded-lg p-4 shadow-md">
                    <div class="bg-green-500 p-2 mr-3">
                        <img src="https://cdn-icons-png.flaticon.com/128/4492/4492321.png" alt="" class="h-6 sm:h-8 w-6 sm:w-8 mr-3 icon">
                    </div>
                    <div>
                        <p class="font-semibold text-sm sm:text-base">TRANSAKSI</p>
                        <p class="text-lg sm:text-xl font-bold">{{ $detailTransaksiCount }}</p>
                    </div>
                </div>
            </a>

            <!-- Report Card -->
            <a href="{{ route('detail-report-dashboard-admin') }}">
                <div class="flex items-center bg-red-200 text-black rounded-lg p-4 shadow-md">
                    <div class="bg-red-500 p-2 mr-3">
                        <img src="https://cdn-icons-png.flaticon.com/128/478/478544.png" alt="" class="h-6 sm:h-8 w-6 sm:w-8 mr-3 icon">
                    </div>
                    <div>
                        <p class="font-semibold text-sm sm:text-base">REPORT</p>
                        <p class="text-lg sm:text-xl font-bold">{{ $reportCount }}</p>
                    </div>
                </div>
            </a>

            <!-- Total Pendapatan Card -->
            <div class="flex items-center bg-yellow-200 text-black rounded-lg p-4 shadow-md">
                <div class="bg-yellow-500 p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 sm:h-8 w-6 sm:w-8 text-white">
                        <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                        <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm sm:text-base">PENDAPATAN</p>
                    @if ($report->count() > 0)
                    <p class="text-lg sm:text-xl font-bold">
                        {{ $report->sum('total_pendapatan') }}
                    </p>
                    @else
                    <p>0</p>
                    @endif
                </div>
            </div>

            <canvas id="barChart" width="500" height="200" class="">
                
            </canvas>
        </div>
    </div>
    
    <script>
      var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @if(isset($laporanKeuangan) && $laporanKeuangan->count() > 0)
                        @foreach($laporanKeuangan as $laporan)
                            '{{ $laporan->tanggal_laporan }}'{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    @endif
                ],
                datasets: [{
                    label: 'Total Pendapatan',
                    data: [
                        @if(isset($laporanKeuangan) && $laporanKeuangan->count() > 0)
                            @foreach($laporanKeuangan as $laporan)
                                {{ $laporan->total_pendapatan }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        @endif
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
    </script>

<!-- SweetAlert Notifications -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil',
        text: "{{ session('success') }}",
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
        text: "{{ session('error') }}",
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
