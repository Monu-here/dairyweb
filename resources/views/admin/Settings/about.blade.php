@extends('admin.index')
@section('title', 'About Page Settings')



@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">About Page Settings</li>
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


    <div class="col-md-12">
        <h3>About Page Settings</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <hr>
            <h4>"About Us" Section:</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Heading:</label>
                            <input class="form-control" type="text" name="heading1" id="title"
                                value="{!! $data->heading1 !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="paragraph1">Paragraph</label>
                            <textarea class="form-control" id="" name="paragraph1" rows="8">{!! $data->paragraph1 !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="file" class="form-control image-upload dropify" id="image" name="image1"
                        data-default-file="{{ Storage::url($data->image1) }}" accept="image/*">
                </div>
            </div>
            <hr>
            <h4>"Why Choose Us?" Section:</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="heading2">Heading:</label>
                            <input class="form-control" type="text" name="heading2" id="heading2"
                                value="{!! $data->heading2 !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="paragraph2">Paragraph</label>
                            <textarea class="form-control" id="" name="paragraph2" rows="8">{!! $data->paragraph2 !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="file" class="form-control image-upload dropify" id="image2" name="image2"
                        data-default-file="{{ Storage::url($data->image2) }}" accept="image/*">
                </div>
            </div>
            <h4 class="mt-3">Why Choose Us?:</h4>
            <div id="reasons">
                @if (empty($reasons))
                    <!-- Display a single input field for adding a reason -->
                    <div class="reason row mt-1">
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Reason" name="reasonheadings[]">
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Reason Description"
                                    name="reasondescriptions[]">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success addReason btn-sm m-1"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger removeReason btn-sm m-1"><i
                                            class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Display input fields for each reason in the $reasons array -->
                    @foreach ($reasons as $index => $reason)
                        <div class="reason row mt-1">
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Reason" name="reasonheadings[]"
                                        value="{{ $index }}">
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Reason Description"
                                        name="reasondescriptions[]" value="{{ $reason }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success addReason btn-sm m-1"><i
                                                class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger removeReason btn-sm m-1"><i
                                                class="fa fa-times" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>






            <button class="btn btn-primary mt-3 float-end">Save</button>
        </form>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function addReasonRow() {
                var reasonsContainer = document.getElementById("reasons");
                var reasonClone = reasonsContainer.querySelector(".reason").cloneNode(true);
                reasonsContainer.appendChild(reasonClone);
                reasonClone.querySelector(".btn-success").addEventListener("click", addReasonRow);
                reasonClone.querySelector(".btn-danger").addEventListener("click", function() {
                    reasonClone.remove();
                });
            }

            document.querySelector("#reasons .btn-success").addEventListener("click", addReasonRow);

            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("removeReason")) {
                    event.target.closest(".reason").remove();
                }
                if (event.target.classList.contains("addReason")) {
                    event.target.closest(".reason").addReasonRow();
                }

            });
        });
    </script>
@endsection


