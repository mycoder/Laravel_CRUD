@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>


        <form action="{{ route('products.index') }}" method="GET" class="form-inline my-2">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by Product ID or Description" value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>


        <div>
            <strong>Sort by:</strong>
            <a href="{{ route('products.index', ['sort' => 'name', 'direction' => $sortColumn == 'name' && $sortDirection == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                Name
                @if($sortColumn == 'name')
                    {{ $sortDirection == 'asc' ? '▲' : '▼' }}
                @endif
            </a> |
            <a href="{{ route('products.index', ['sort' => 'price', 'direction' => $sortColumn == 'price' && $sortDirection == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                Price
                @if($sortColumn == 'price')
                    {{ $sortDirection == 'asc' ? '▲' : '▼' }}
                @endif
            </a>
        </div>


        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('assets/images') }}/{{ $product->image }}" alt="{{ $product->name }}" width="100"></td>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">
                            <i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE3C9;</i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </table>


        {{ $products->appends(['sort' => $sortColumn, 'direction' => $sortDirection, 'search' => $search])->links() }}

        </div>


<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" hidden id="deleteID"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
            </div>
        </div>
    </div>
</div>

    <script>
        document.getElementById('confirmDelete').addEventListener('click', function () {
            document.getElementById('deleteForm').submit();
        });


    </script>
@endsection
