<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-blue-50">
    @extends('navbar-admin.dashboard')
    @section('navbar-admin')
    <div class="container mx-auto flex justify-end">
        <div class="bg-white rounded-lg shadow-lg p-8 w-3/4">
            
                <a href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left-long"> </i></a>
           
            <h1 class="text-center text-4xl font-bold text-blue-700 mb-6">List Users</h1>
            <div class="overflow-x-auto">
                <table class=" max-w-full w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-blue-300 text-blue-900">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">S/N</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Nama</th>
                            <th class="px-4 py-3 border border-gray-300 text-center text-sm font-semibold">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($count) && $count->count() > 0)
                        @foreach ($count as $item)
                        <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                            <td class="text-center py-3 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->name }}</td>
                            <td class="text-center py-3 border border-gray-300">{{ $item->email }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center py-3 border border-gray-300">Tidak ada users ditemukan!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
       </div>
    @endsection
</body>
</html>