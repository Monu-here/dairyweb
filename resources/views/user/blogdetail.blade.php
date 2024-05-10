@extends('user.components.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<style>

    .mainpage{
        padding:0px 20px 5px 20px;
    }
    .blogimage{
        overflow: hidden;
        width: 100%;
    }


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
    .relatedpost{
        overflow: hidden;
        height: 100px;
        width: 150px;
    }
    .relatedpost img{
        object-fit: cover;
        width:100%;
    }
</style>

@section('title', $blog->title)
@section('content')
 <!--Page Heading-->
 <section class="heading">
    <div class="heading-container container">
      <h3>News and Information</h3>
      <h1>Blog Detail</h1>
    </div>
  </section>
<div class="container-fluid">
    <div class="row mainpage">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12" >
                    <div class="blogimage">
                        <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mt-3 mb-3" style="height: 500px; width:auto; object-fit: cover;">
                    </div>
                </div>
                <div class="col-12">
                    <span>
                        <img src="/author.svg" alt="Author">
                        Admin
                    </span>
                    <span>
                        <img src="/calendar.svg" alt="Published Date">
                        {{ $blog->updated_at->format('Y-m-d') }}
                    </span>
                </div>
                <div class="col-12">
                    <h2 style="color: #103371">{{ $blog->title }}</h2>

                </div>
                <div class="col-12">
                    <p style="font-size:14px; word-break: break-all;">{!! $blog->content !!}</p>
                </div>
                <div class="col-12 social-share-icons">
                    <h4>Share this post:</h4>
                    <a  href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fa fa-facebook"></i> </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <h4>Related Posts</h4>
                @foreach ($blogs as $related_blog)
                    @if ($related_blog->id !== $blog->id) <!-- Check if the related blog is not the current one -->
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="relatedpost">
                                    <img src="{{ asset('blog_images/' . $related_blog->image) }}" alt="{{ $related_blog->title }}" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('blog.show', ['blog' => $related_blog->id]) }}" style="color: #103371"><h5 style="text-align:justify;">{{ $related_blog->title }}</h5></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


    </div>
</div>
@endsection
