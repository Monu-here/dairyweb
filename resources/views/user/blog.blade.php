@extends('user.components.app')
@section('title','Blogs')
@section('content')
<div class="main">
    @php

    @endphp

<main class="main">
    <!--Page Heading-->
    <section class="heading">
      <div class="heading-container container">
        <h3>News and Information</h3>
        <h1>All Blogs</h1>
      </div>
    </section>
    <!--Page heading end-->
    <div class="blogs-container container">
      <div class="blogs">
        @foreach ($blogs as $blog)

        <div class="blog">
            <figure>
              <img src="{{ asset('blog_images/' . $blog->image) }}" alt="" />

              <span>information</span>
            </figure>
            <div class="blog-details">
              <h2>
                {{ $blog->title }}
              </h2>
              <div class="published-details">
                <span>
                  <img src="./author.svg" alt="" />
                  Admin
                </span>
                <span>
                  <img src="./calendar.svg" alt="" />
                  {{ $blog->updated_at->format('Y-m-d') }}

                </span>
              </div>
              <p>
                {!! $blog->content!!}
              </p>
              <a href="{{ route('blog.show', ['blog' => $blog->id]) }}"
                >Read More <img src="./arrow copy.svg" alt=""
              /></a>
            </div>
          </div>

        @endforeach


        </div>
    </div>
  </main>



</div>
@endsection
