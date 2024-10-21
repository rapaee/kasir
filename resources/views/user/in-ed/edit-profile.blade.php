<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @extends('navbar.dashboard')
    @section('navbar')
        <div class="container w-8/12 fixed ml-96">
                <h2 class="text-3xl font-bold text-blue-700 mb-4">Edit Profile</h2>
            
                <!-- Menampilkan pesan sukses jika ada -->
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success bg-blue-100 text-blue-800 p-4 rounded mb-4">
                        Profile updated successfully.
                    </div>
                @endif
            
                <!-- Menampilkan error jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger bg-red-100 text-red-800 p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <!-- Form untuk mengedit profil pengguna -->
                <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
            
                    <!-- Input untuk nama pengguna -->
                    <div class="form-group">
                        <label for="name" class="block text-blue-600 font-semibold">Name</label>
                        <input type="text" name="name" id="name" class="form-control w-full p-2 border border-blue-300 rounded focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $user->name) }}" required>
                    </div>
            
                    <!-- Input untuk email -->
                    <div class="form-group">
                        <label for="email" class="block text-blue-600 font-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control w-full p-2 border border-blue-300 rounded focus:ring-blue-500 focus:border-blue-500" value="{{ old('email', $user->email) }}" required>
                    </div>
            
                    <!-- Input untuk password -->
                    <div class="form-group">
                        <label for="password" class="block text-blue-600 font-semibold">New Password</label>
                        <input type="password" name="password" id="password" class="form-control w-full p-2 border border-blue-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Leave blank if you don't want to change the password">
                    </div>
            
                    <!-- Tombol submit -->
                    <button type="submit" class="btn bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Update Profile</button>
                </form>
            
                <hr class="my-6 border-blue-300">
            
                <!-- Bagian untuk hapus akun (opsional) -->
                <div class="mt-6">
                    <h4 class="text-xl font-semibold text-blue-700 mb-2">Delete Account</h4>
                    <p class="text-red-600 mb-4">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
            
                    <!-- Form untuk menghapus akun -->
                    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')" class="space-y-4">
                        @csrf
                        @method('DELETE')
            
                        <div class="form-group">
                            <label for="password" class="block text-red-600 font-semibold">Enter your password to confirm:</label>
                            <input type="password" name="password" id="password" class="form-control w-full p-2 border border-red-300 rounded focus:ring-red-500 focus:border-red-500" required>
                        </div>
            
                        <button type="submit" class="btn bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Delete Account</button>
                    </form>
                </div>
            </div>
            @endsection
        </body>
        </html>