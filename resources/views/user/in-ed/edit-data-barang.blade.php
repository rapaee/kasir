<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
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
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
                <div class="card-body">
                    <form action="{{ route('EditUser') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" id="" value="{{ $user->id }}">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$user->nama_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Nama Barang">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Harga Barang</label>
                            <input type="number"step="0.01" name="harga_barang" class="form-control" value="{{$user->harga_barang}}" id="formGroupExampleInput2" placeholder="Enter Harga Barang">
                            @error('harga_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                            <input type="text" name="kategori" value="{{ $user->kategori }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Kategori">
                            @error('kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Stok</label>
                            <input type="number" name="harga_barang" class="form-control" value="{{$user->stok}}" id="formGroupExampleInput2" placeholder="Enter Stok">
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>