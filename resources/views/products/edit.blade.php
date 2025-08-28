@extends('layouts.boilerplate')

@section('content')
    <div class="container mt-4">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <select name="category_id" id="category_id" class="form-select mb-3" required multiple>
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control" id="img" name="img" accept="image/*">
                <div class="mt-2">
                    @if($product->img)
                        <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" width="100">
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @endsection
