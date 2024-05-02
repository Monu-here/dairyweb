@extends('admin.index')
@section('title', 'Blog')
@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
@endsection

@section('content')

    <!-- Create New Post Form -->
    <div class="row mb-3">
        <div class="col-md-12">
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

            <h3>Create New Blog</h3>
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="title" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control image-upload" id="image" name="image"
                            accept="image/*">
                    </div>

                </div>
                <div class="row mb-3">

                    <div class="col-md-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                    </div>

                </div>

                <!-- Social Media Links -->
                <div class="row mb-3">
                    <label class="form-label">Social Media Links</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                            <input type="text" class="form-control" name="facebook_url" placeholder="Facebook URL">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                            <input type="text" class="form-control" name="instagram_url" placeholder="Instagram URL">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                            <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn URL">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                            <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>




    <!-- List of Posts -->
    <hr>
    <div class="row mb-3">
        <div class="col-md-12">
            <h3>Blog Lists</h3>
            <ul class="list-group">
                @foreach ($blogs as $blog)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Column for the image -->
                            <div style="width: 250px; height: 120px; overflow: hidden;">
                                @if ($blog->image)
                                <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; object-fit: cover;">
                                @else
                                No Image
                                @endif
                            </div>

                        </div>
                        <div class="col-md-7">
                            <h3><strong>{{ $blog->title }}</strong></h3>
                            <p>{{ implode(' ', array_slice(str_word_count($blog->content, 1), 0, 40)) }}...</p>
                        </div>
                        <div class="col-md-2">
                            <!-- Column for the action buttons -->
                            <div class="float-right">
                                <a href="{{ route('admin.blogs.edit', ['blog' => $blog->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.blogs.delete', ['blog' => $blog->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>


                </li>
                @endforeach
            </ul>
        </div>
    </div>



</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var closeButtons = document.querySelectorAll('.btn-close');
        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var alert = button.closest('.alert');
                alert.style.display = 'none';
            });
        });

        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function (alert) {
            setTimeout(function () {
                alert.style.display = 'none';
            }, 2000);
        });
    });
    function confirmDelete() {
        return confirm('Are you sure you want to delete this Blog?');
    }
</script>


@endsection
