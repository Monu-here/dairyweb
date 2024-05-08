@extends('admin.index')
@section('title', 'Footer Page Settings')
@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Footer Page Settings</li>
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


     <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h3>Footer Page Settings</h3>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input class="form-control" type="text" name="address" id="address" value="{!!$data->address!!}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{!!$data->email!!}">
                </div>
                <div class="form-group">
                    <label for="email">Phone No:</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{!!$data->phone!!}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text "style="border-radius:0%"><i class="fab fa-instagram form-control" ></i></span>
                    </div>
                    <input type="text" class="form-control" name="instaurl" placeholder="Instagram URL" value="{!!$data->instaurl!!}">
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text "style="border-radius:0%"><i class="fab fa-facebook form-control" ></i></span>
                    </div>
                    <input type="text" class="form-control" name="facebookurl" placeholder="Facebook URL" value="{!!$data->facebookurl!!}">
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text "style="border-radius:0%"><i class="fab fa-twitter form-control" ></i></span>
                    </div>
                    <input type="text" class="form-control" name="twitterurl" placeholder="Twitter URL" value="{!!$data->twitterurl!!}">
                </div>
            </div>
            <div class="row mt-3">
                <hr>
                <h5>Quick Links</h5>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">Privacy Policy:</label>
                        <input class="form-control" type="text" name="privacy" id="privacy" value="{!!$data->privacy!!}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Terms & Conditions:</label>
                        <input class="form-control" type="text" name="terms" id="terms" value="{!!$data->terms!!}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Disclaimer:</label>
                        <input class="form-control" type="text" name="disclaimer" id="disclaimer" value="{!!$data->disclaimer!!}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Support:</label>
                        <input class="form-control" type="text" name="support" id="support" value="{!!$data->support!!}">
                    </div>

                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-success float-end mt-5">Save</button>


     </form>



@endsection
