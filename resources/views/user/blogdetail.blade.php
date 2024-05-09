@extends('user.components.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    .social-share-icons a {
        display: inline-block;
        background-color: #103371; /* Change background color on hover */
        width:40px;
        height: 40px;
        margin-right: 10px; /* Adjust the spacing between icons if needed */
        border-radius: 100%; /* Make the icons circular */
        border: 1px solid transparent; /* Hide the border by default */
        transition: all 0.3s ease;
        margin-bottom: 10px; /* Add smooth transition effect */
    }


    .social-share-icons a:hover {
        background-color: #103371; /* Change background color on hover */
        border-color: #ccc; /* Show border on hover */
    }

    .social-share-icons i {
        font-size: 24px; /* Adjust the size of the icons as needed */
        padding: 10px; /* Add padding to the icons for better alignment */
    }
</style>

@section('title', $blog->title)
@section('content')
<div class="main container">
    <div class="row">
        <div class="col-md-6">
            <div class="blog-detail">
                <figure style="width:auto; overflow: hidden;">
                    <div class="">
                        <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mt-3 mb-3" style="height: 500px; object-fit: cover;">
                    </div>
                </figure>
            </div>
        </div>
        <div class="col-md-6">
            <div class="blog-details">
                <h2 style="color: #103371">{{ $blog->title }}</h2>
                <div class="published-details">
                    <span>
                        <img src="/author.svg" alt="Author">
                        Admin
                    </span>
                    <span>
                        <img src="/calendar.svg" alt="Published Date">
                        {{ $blog->updated_at->format('Y-m-d') }}
                    </span>
                </div>
                <p style="font-size:14px">{!! $blog->content !!}</p>
                <!-- Social Media Share Icons -->
                <div class="social-share-icons">
                    <h4>Share this post:</h4>
                    <a  href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fa fa-facebook"></i> </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank"><i class="fa fa-linkedin"></i></a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
