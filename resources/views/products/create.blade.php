@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Create New Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="product_id">Product ID</label>
                <input class="form-control" type="text" name="product_id" required>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input class="form-control" type="number" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="stock">Stock</label>
                <input class="form-control" type="number" name="stock">
            </div>
            <div class="mb-3">
                <label for="image">Image URL</label>
                <input class="form-control" type="text" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div>
@endsection
