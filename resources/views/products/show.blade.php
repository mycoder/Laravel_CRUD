@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h2>Product Details</h2>
    <div class="card">
      <div class="card-header">
        <p><strong>Image:</strong> <img src="{{ asset('assets/images') }}/{{ $product->image }}" alt="{{ $product->name }}" width="100"></p>
    </div>
    <div class="card-body">
        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
    </div>
      <div class="card-footer">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
    </div>
  </div>
@endsection
