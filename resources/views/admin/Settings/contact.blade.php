@extends('admin.index')
@section('title', 'Contact Page Settings')
<style>
    iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: auto;
            overflow-x: hidden;
        }
</style>


@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Page Settings</li>
@endsection

@section('content')
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

<div class="row">

    <div class="col-md-7">
        <h3>Contact Page Settings</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Heading:</label>
                    <input class="form-control" type="text" name="heading" id="title" value="{{ $data->heading }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="paragraph1">Paragraph</label>
                    <textarea class="form-control" name="paragraph" rows="8">{{ $data->paragraph }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="location">Location</label>
                    <input class="form-control" type="text" name="location" id="location" value="{{ $data->location }}">
                </div>

            </div>

            <button class="btn btn-primary mt-3 float-end">Save</button>
        </form>
    </div>

    <div class="col-md-5">
        <div id="map-container">
            <iframe id="gmap_canvas" width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const mapurl = "https://maps.google.com/maps?q=xxx_map&t=&z=13&ie=UTF8&iwloc=&output=embed";

        function setMap(location) {
            const mapUrlWithLocation = mapurl.replace('xxx_map', encodeURIComponent(location));
            $('#gmap_canvas').attr('src', mapUrlWithLocation);
        }

        // Initialize map with default location
        setMap("{!! $data->location !!}");

        // Update map when location input changes
        $('#location').on('input', function() {
            const newLocation = $(this).val();
            setMap(newLocation);
        });

        // Form submission
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            // Here, you can add code to handle form submission via AJAX or regular form submission
            // For example:
            // $('form').submit();
        });
    });
</script>

@endsection
