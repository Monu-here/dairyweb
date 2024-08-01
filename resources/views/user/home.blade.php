@extends('user.components.app')
@section('title', 'Home')
@section('css')
<link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">
@endsection
@section('content')
    <div class="main">
        @php
            $data = App\Helper::getHomePageSetting();
        @endphp


        <main class="main">
            <!--hero-->
            <section class="hero" style="background-image: url('{{ Storage::url($data->image1) }}');">
                <span class="hero-section">Join the Dairy Journey</span>
                <h1 class="hero-title">{!! $data->heading1 !!}</h1>
                <p class="hero-desc">
                    {!! $data->paragraph1 !!}
                </p>
                <button class="discover-btn">
                    {!! $data->buttontext1 !!} <img src="/arrow.svg" alt="" />
                </button>
                <img src="{{ asset('splash.png') }}" alt="" class="splash" />
            </section>
            <!--hero end-->

            <!--About Us-->
            <section class="about-us container">
                <div class="welcome">
                    <div class="top">
                        <span class="welcome-section">Farm Perfect Dairy</span>
                        <h1 class="welcome-title">{!! $data->heading2 !!}</h1>
                        <p class="welcome-desc">
                            {!! $data->paragraph2 !!}
                        </p>
                        <a href="#" class="welcome-anchor">{!! $data->linktext1 !!} <img src="/arrow copy.svg"
                                alt="" /></a>
                    </div>
                    <figure class="buttom">
                        <img src="{{ Storage::url($data->welcomeimage) }}" alt="" class="welcome-image" />
                    </figure>
                </div>

                <!--About-->
                <div class="about" id="about">
                    <div class="left">
                        <img src=" {{Storage::url($data->aboutimage1) }}" alt="" class="image" />
                        <div class="left-badge">
                            <h3>Trusted by <span>{!! $data->trustednos !!}+</span> Customers</h3>
                        </div>
                    </div>
                    <figure class="center">
                        <img src="{{ Storage::url($data->aboutimage2) }}" alt="" class="image" />
                    </figure>
                    <div class="right">
                        <span>About Us</span>
                        <h1>{!! $data->heading3 !!}</h1>
                        <p>
                            {!! $data->paragraph3 !!}

                        </p>
                        <div class="vision-mission">
                            <div class="vision">
                                <h5>Our Vision</h5>
                                <ul class="vision-list">
                                    @foreach ($data->visions as $vision)
                                        <li><img src="/check.svg" alt="" />{!! $vision !!}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="mission">
                                <h5>Our Mission</h5>
                                <ul class="mission-list">
                                    @foreach ($data->missions as $mission)
                                        <li><img src="/check.svg" alt="" />{!! $mission !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('user.about') }}">
                            <button>More <img src="./public/arrow.svg" alt="" /></button>
                        </a>
                    </div>
                </div>

                <!--Experience-->
                <div class="experience-card container">
                    @foreach ($data->features as $index => $feature)
                        <div class="experience">
                            <figure class="experience-logo">
                                <img src="./thumbsup.svg" alt="" />
                            </figure>
                            <div class="experience-details">
                                <h3>{!! $index !!}</h3>
                                <p>{!! $feature !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!--About Us End-->
            <!--Our Products-->
            <section class="products" id="products">
                <span>Our all products</span>
                <h1 class="product-heading">View All Product</h1>
                <div class="products-container container">
                    @php $count = 0; @endphp
                    @foreach ($products->reverse() as $product)
                        @if ($count < 4)
                            <div class="product">
                                <figure class="product-image"
                                    style="overflow: hidden; padding-bottom:5px; border-top-right-radius:10%; border-top-left-radius:30%">
                                    <img src="{{ asset('product_images/' . $product->image) }}" />
                                </figure>
                                <h1>{!! $product->name !!}</h1>
                                <p>{!! $product->sdescription !!}</p>
                                <div class="actions">
                                    <span>Rs.{{ number_format($product->price, 0) }}</span>
                                    <div class="buttons">
                                       
                                        <a href="{{route('user.contact')}}"><button class="product-button">
                                          <img src="./phone.svg" alt="" class="product-button-image" />
                                      </button></a>
                                    </div>
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endif
                    @endforeach
                </div>
                <a class="all-products-btn" href="{{ route('product') }}">
                    See all products <img src="./arrow.svg" alt="" />
                </a>
            </section>
            <!--Our Products End-->
            <!--Dairy Services-->
            <section class="services container">
                <figure class="service-left">
                    <img src="{{ Storage::url($data->serviceimage1) }}" alt="" />
                </figure>
                <div class="service-center">
                    <span>Dairy Services</span>
                    <h1 class="service-title">{!! $data->serviceheading1 !!}</h1>
                    <ul class="service-list">
                        @foreach ($data->services as $service)
                            <li>
                                <img src="./check.svg" alt="" />
                                {!! $service !!}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{!! $data->servicelink !!}"><button>Read More <img src="./arrow.svg"
                                alt="" /></button></a>
                </div>
                <div class="service-right">
                    <figure>
                        <img src="{{ Storage::url($data->serviceimage2) }}" alt="" />
                    </figure>
                    <h3>{!! $data->serviceheading2 !!}</h3>
                    <div class="stats">
                        <div class="stats-left">
                            <span class="stat-value">{!! $data->productnos !!}+</span>
                            <span class="stat-text">Products</span>
                        </div>
                        <div class="stats-right">
                            <span class="stat-value">{!! $data->satisfaction !!}%</span>
                            <span class="stat-text">Satisfaction</span>
                        </div>
                    </div>
                </div>
            </section>
            <!--Dairy Services End-->
            <!--Advantages-->
            <section class="advantages container">
                <figure class="advantage-image">
                  <img src="{{ Storage::url($data->adv_image) }}" alt="" />
                </figure>
                <div class="our-advantages">
                    <span>Our Advantages</span>
                    <h1>{!! $data->advheading !!}</h1>
                    <p>
                      {!! $data->advparagraph !!}

                    </p>
                </div>
            </section>
            <!--Advantages end-->
            <!--Testimonials-->
            <section class="testimonials">
                <div class="container testimonial-container">
                    <div class="testimonial-details">
                        <span>Testimonials</span>
                        <h1>{!! $data->testheading !!}</h1>
                        <p>
                          {!! $data->testdescription !!}

                        </p>
                    </div>

                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                              @foreach ($testimonial->take(3) as $testimonial)
                              <li class="splide__slide">
                                  <div class="testimony">
                                      <figure>
                                          <img src="{{ asset('testimonial_images/' . $testimonial->image) }}"
                                              alt="{{ $testimonial->name }}" />
                                      </figure>
                                      <h4>{!! $testimonial->name !!}</h4>
                                      <span>{!! $testimonial->address !!}</span>
                                      <p>
                                          {!! $testimonial->content !!}
                                      </p>
                                      <div class="pattern"></div>
                                      <img src="./quote.svg" alt="" class="quote" />
                                  </div>
                              </li>
                          @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--Testimonials end-->
            <!--Dairy Program-->
            <section class="programs-container container">
                <div class="program-details">
                    <span>Our Programs</span>
                    <h1>{!! $data->programheading !!}</h1>
                    <p>
                      {!! $data->programpara !!}

                    </p>
                    <button><a href="{!! $data->programbtnlink !!}">{!! $data->programbtntext !!} <img src="./public/arrow.svg"
                      alt="" /></a></button>                </div>
                <div class="programs">
                    <div class="program">
                        <figure>
                          <img src="{{ Storage::url($data->programimage1) }}" alt="{!! $data->programtitle1 !!}" />
                        </figure>
                        <div class="details">
                          <h3>{!! $data->programtitle1 !!}</h3>
                          <p>
                            {!! $data->programdescription1 !!}

                            </p>
                        </div>
                    </div>
                    <div class="program">
                        <figure>
                          <img src="{{ Storage::url($data->programimage2) }}" alt="{!! $data->programtitle2 !!}" />
                        </figure>
                        <div class="details">
                          <h3>{!! $data->programtitle2 !!}</h3>
                          <p>
                            {!! $data->programdescription2 !!}

                            </p>
                        </div>
                    </div>
                    <div class="program">
                        <figure>
                          <img src="{{ Storage::url($data->programimage3) }}" alt="{!! $data->programtitle3 !!}" />
                        </figure>
                        <div class="details">
                          <h3>{!! $data->programtitle3 !!}</h3>
                          <p>
                              {!! $data->programdescription3 !!}

                          </p>
                      </div>
                    </div>
                </div>
            </section>
            <!--Dairy Program End-->
            <!--Blogs-->
            <section class="blogs-container container" id="blogs">
                <span class="section-title">Blogs & News</span>
                <h1>Special Information</h1>
                <div class="blogs">
                  @php
                      // Sort the $blogs array by updated_at attribute in descending order
                      $sortedBlogs = $blogs->sortByDesc('updated_at')->values();
                  @endphp

                  @foreach ($sortedBlogs as $blog)
                      @if ($loop->index < 3)
                          <!-- Display only the first three blogs -->
                          <div class="blog">
                              <figure>
                                  <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->title }}" />
                                  <span>information</span>
                              </figure>
                              <div class="blog-details">
                                  <h2>{{ $blog->title }}</h2>
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
                                  <p>{!! substr(strip_tags($blog->content), 0, 200) !!}</p>
                                  <a href="{{ route('blog.show', ['blog' => $blog->id]) }}">Read More <img
                                          src="./arrow copy.svg" alt="" /></a>
                              </div>
                          </div>
                      @endif
                  @endforeach



              </div>
            </section>
            <!--Blogs End-->
            <!--Newsletter-->
            <section class="newsletter-container container">
              <div class="newsletter">
                  <figure class="image">
                      <img src="{{ Storage::url($data->newsletterimage) }}" alt="" />
                  </figure>
                  <div class="form">
                      <h1>Subscribe to our Newsletter</h1>
                      <p>
                          Get the latest updates via email. Don’t miss it. Any time you may
                          unsubscribe.
                      </p>
                      <input type="text" />
                      <button>Subscribe</button>
                  </div>
              </div>
          </section>
            <!--Newletter end-->
        </main>

    </div>


@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
  document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide' );
    splide.mount();
  } );
</script>
@endsection
