@extends('admin.index')
@section('title', 'Products')
@section('jumbo')
<li class="breadcrumb-item active" aria-current="page">Products</li>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Add New Product</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- First Row: Product Title and Description -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
          </div>
          <div class="col-md-8">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="1"></textarea>
          </div>
        </div>
        <!-- Second Row: Product Price, Image, and Save Button -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01">
          </div>
          <div class="col-md-6">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" class="form-control image-upload" id="product_image" name="product_image" accept="image/*">
          </div>
          <div class="col-md-2">
            <label for="product_image" class="form-label"></label>

            <button type="submit" class="btn btn-primary form-control mt-2 save">Save</button>
          </div>
        </div>

      </form>
    </div>
    <hr class="mt-2">
    <div class="col-md-12">
        <h3>Product List</h3>
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search product by name...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>


        <div class="table-responsive mt-2">
            <table class="table table-bordered text-center">
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
                    <tr>
                        <td class="align-middle">
                            <div style="height:50px; width:50px; overflow:hidden">
                                <img src="https://via.placeholder.com/500" alt="Product Image" style="width: auto; height: 100%; max-width: none;">
                            </div>
                        </td>

                        <td class="align-middle">Product Name</td>
                        <td class="align-middle">Description of the product goes here </td>
                        <td class="align-middle">$19.99</td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View & Edit</button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


  </div>

</div>
@endsection
