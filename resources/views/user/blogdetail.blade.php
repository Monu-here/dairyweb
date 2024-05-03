@extends('user.components.app')
@section('title', '{{ $blog->title }}')
@section('content')
<div class="main container">
    <div class="blog-detail">
        <figure style="height: 500px; width:500px; overflow:hidden;">
             <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->title }}"  style="object-fit: cover; width: 100%;">

          </figure>
        <div class="blog-details">
            <h2>{{ $blog->title }}</h2>
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
            <p>{!! $blog->content !!}</p>
        </div>
    </div>

</div>
@endsection
