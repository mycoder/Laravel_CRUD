@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-3">
                <label for="product_id">Product ID</label>
                <input class="form-control @error('product_id') is-invalid @enderror" type="text" name="product_id" value="{{ old('product_id', $product->product_id) }}" required>
                @error('product_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price">Price</label>
                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock">Stock</label>
                <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">Image URL</label>
                <input class="form-control @error('image') is-invalid @enderror" type="text" name="image" value="{{ old('image', $product->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
