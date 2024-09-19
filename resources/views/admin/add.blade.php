<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Add New Product</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
                <div class="card-body">
                    <form action="{{ route('AddProduct') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Product Name</label>
                            <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}" id="formGroupExampleInput2" placeholder="Enter Price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Category</label>
                            <input type="text" name="category" value="{{ old('category') }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Category">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>