<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <!-- resources/views/items/edit.blade.php -->

@extends('layouts.navbar.edit-product')

@section('navbar')
    <h1>Edit Data Barang</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('EditProduct') }}" method="PUT">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="form-control" 
                value="{{ old('nama_barang', $edit->nama_barang) }}" required>
            @error('nama_barang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" step="0.01" id="harga_barang" name="harga_barang" class="form-control" 
                value="{{ old('harga_barang', $edit->harga_barang) }}" required>
            @error('harga_barang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" 
                value="{{ old('kategori', $edit->kategori) }}" required>
            @error('kategori')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" class="form-control" 
                value="{{ old('stok', $edit->stok) }}" required>
            @error('stok')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
</body>
</html>