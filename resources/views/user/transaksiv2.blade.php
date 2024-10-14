<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .filter-white {
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body>

    @extends('navbar.transaksi')

    @section('navbar')
    <div class="nav-content flex ">
        <div class="ml-96 items-center justify-center min-h-screen bg-white"">

            <div class="flex space-x-2 mb-8">
                <button class="bg-gray-300 text-black py-2 px-4 rounded">
                 MAKANAN
                </button>
                <button class="bg-gray-300 text-black py-2 px-4 rounded">
                 MAKANAN
                </button>
               </div>
               <div class="flex space-x-4">
                <div class="border p-4">
                 <img alt="A bowl of Bakso" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                 <div class="text-center">
                  <div class="font-bold">
                   Bakso
                  </div>
                  <div>
                   5000
                  </div>
                 </div>
                </div>
                <div class="border p-4">
                 <img alt="A bowl of Bakso" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                 <div class="text-center">
                  <div class="font-bold">
                   Bakso
                  </div>
                  <div>
                   5000
                  </div>
                 </div>
                </div>
                <div class="border p-4">
                 <img alt="A bowl of Bakso" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                 <div class="text-center">
                  <div class="font-bold">
                   Bakso
                  </div>
                  <div>
                   5000
                  </div>
                 </div>
                </div>
                <div class="border p-4">
                 <img alt="A bowl of Bakso" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                 <div class="text-center">
                  <div class="font-bold">
                   Bakso
                  </div>
                  <div>
                   5000
                  </div>
                 </div>
                </div>
                <div class="border p-4">
                 <img alt="A bowl of Bakso" class="mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/wKSVTKupiVr0GBMwjnvWE1AJesgYnsgstZgXsq9YW8wNUUzJA.jpg" width="100"/>
                 <div class="text-center">
                  <div class="font-bold">
                   Bakso
                  </div>
                  <div>
                   5000
                  </div>
                 </div>
                </div>
        </div>
        </div>
    @endsection
</body>
</html>
