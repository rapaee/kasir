
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

    @extends('layouts.navbar.transaksi')

    @section('navbar')
    <div class="nav-content flex">
       
        <img src="{{ asset('SMK_Negeri_1_Bantul_logo.png') }}" alt="" srcset="">
        {{-- Main content section --}}
        <div id="content" class="ml-32 flex flex-col items-center justify-center h-screen text-center w-3/4">
            
          
        </div>
    </div>
    
    
    @endsection
</body>
</html>
    