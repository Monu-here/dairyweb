@extends('admin.index')
@section('title', 'Edit Product')

@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Edit Product</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-image">
                        <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Price:</strong> Rs.{{ $product->price }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Display validation errors if any -->
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                    <!-- Display success message if any -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- First Row: Product Title and Description -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="3">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <!-- Second Row: Product Price, Image, and Save Button -->
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control image-upload" id="image" name="image"
                                    accept="image/*"> {{ $product->image }}
                            </div>
                            <div class="col-md-6 mt-4">
                                <button type="submit" class="btn btn-success form-control mt-1 w-50">Update</button>
                            </div>
                        </div>
                        <div class="row mb-3">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
