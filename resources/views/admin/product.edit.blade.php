@extends('layouts.navbar')

@section('content')
    <h1>Edit Product</h1>

    <!-- Check if there are any validation errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Product Form -->
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name Field -->
        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <!-- Category Field -->
        <div>
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}">
        </div>

        <!-- Price Field -->
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Product Image Field -->
        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image">
            <br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" width="100">
            <p>Current Image (You can upload a new image if you want to change it)</p>
        </div>

        <!-- Submit Button -->
        <button type="submit">Update Product</button>
    </form>
@endsection
