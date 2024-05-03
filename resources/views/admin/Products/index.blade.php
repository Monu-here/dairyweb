@extends('admin.index')
@section('title', 'Products')

@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Products</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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


                <h3>Add New Product</h3>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First Row: Product Title and Description -->

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01"
                                value="{{ old('price') }}">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="summernote" name="description" rows="1">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">Product Image</label>
                            <!-- Add data-show-remove="false" attribute to prevent the remove button from appearing -->
                            <input type="file" class="image-upload dropify" id="image" name="image" data-height="100" accept="image/*" data-show-remove="false">
                        </div>
                    </div>
                    <!-- Second Row: Product Price, Image, and Save Button -->
                    <div class="row mb-3">


                        <div class="col-md-2">
                            <label for="image" class="form-label"></label>
                            <button type="submit" class="btn btn-success form-control">Save</button>
                        </div>
                    </div>

                </form>
            </div>
            <hr class="mt-2">
            <div class="col-md-12">
                <h3>Product List</h3>



                <div class="table-responsive mt-2">
                    <table class="table table-bordered text-center display" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="align-middle">
                                    <div style="height:50px; width:50px; overflow:hidden">
                                        <img src="{{ asset('product_images/' . $product->image) }}" alt="Product Image"
                                            style="width: auto; height: 100%; max-width: none;">
                                    </div>
                                </td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{!! $product->description !!}</td>
                                <td class="align-middle">Rs.{{ $product->price }}</td>
                                <td class="align-middle">
                                   <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-primary m-1"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                 <form id="deleteForm" action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                 </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
