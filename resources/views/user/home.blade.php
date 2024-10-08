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
    <div class="nav-content flex">
        
        <!-- Main content section -->
        <div id="content" class="ml-96 mt-80 flex flex-col items-center justify-center text-center w-3/4">
            <h1 class="text-5xl font-bold">WELCOME TO USER</h1>
            <div class="animasi-teks">
                SMK NEGERI 1 BANTUL <span class="text-sky-400">CAFETARIA</span>
            </div>
             

            {{-- Menampilkan pesan flash jika ada --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
</body>
</html>
