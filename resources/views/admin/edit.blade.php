<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href='/admin/css/edit_product.css'>
</head>
<body>

<div class="container">
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div class="alert">
            <strong>Ups!</strong> Ada beberapa masalah:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" value="{{ old('category', $product->category) }}">
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar Baru (opsional)</label>
            <input type="file" name="image">
        </div>

        <div class="form-group image-preview">
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="200">
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
