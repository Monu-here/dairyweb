@extends('admin.index')
@section('title', 'Create Testimonial')
@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Create Testimonial</li>
@endsection

@section('content')
<div class="row mb-3">
    <h3>Create Testimonial</h3>
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


            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" class="form-control-file dropify" accept="image/*">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" id="summernote" class="form-control"></textarea>
                        <div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
            </form>
 </div>

            <hr class="mt-2">
            <div class="row mb-3">
                <h3>Testimonials List</h3>

            <div class="col-md-12">
                <table class="table" id="myTable">

                    <thead>
                      <tr>
                        <th>Clients</th>
                        <th></th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($testimonials as $testimonial)
                        <tr>
                          <td>{{ $testimonial->name }} @if ($testimonial->image)
                                <img src="{{ asset('testimonial_images/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border:1px solid black;">
                                @else
                                    <i class="fa fa-user"></i>
                                @endif
                            </td>
                            <td>{!!$testimonial->content !!}
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', ['testimonial' => $testimonial->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></a>
                                <form id="deleteForm" action="{{ route('admin.testimonials.delete', $testimonial->id) }}" method="POST">
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




@endsection
