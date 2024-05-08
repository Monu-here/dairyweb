@extends('user.components.app')
@section('title','Home')
@section('content')
<div class="main">
    @php
        $data=App\Helper::getHomePageSetting();
    @endphp

        <main class="main">
      <!--hero-->
      <section class="hero" id="hero" style="background-image: url('{{ Storage::url($data->image1) }}');">
        <span class="hero-section">Join the Dairy Journey</span>
        <h1 class="hero-title">{!!$data->heading1!!}</h1>
        <p class="hero-desc">
            {!!$data->paragraph1!!}
        </p>
        <button class="discover-btn">
            {!!$data->buttontext1!!} <img src="/arrow.svg" alt="" />
        </button>
        <img src="/splash.png" alt="" class="splash" />
      </section>
      <!--hero end-->

      <!--About Us-->
      <section class="about-us container">
        <div class="welcome">
          <div class="top">
            <span class="welcome-section">Farm Perfect Dairy</span>
            <h1 class="welcome-title">{!!$data->heading2!!}</h1>
            <p class="welcome-desc">
                {!!$data->paragraph2!!}
            </p>
            <a href="#" class="welcome-anchor"
              > {!!$data->linktext1!!} <img src="/arrow copy.svg" alt=""
            /></a>
          </div>
          <figure class="buttom">
            <img src="{{ Storage::url($data->welcomeimage) }}" alt="" class="welcome-image" />
          </figure>
        </div>

        <!--About-->
        <div class="about" id="about">
          <div class="left">
            <img src="{{ Storage::url($data->aboutimage1) }}" alt="" class="image" />
            <div class="left-badge">
              <h3>Trusted by <span>{!!$data->trustednos!!}+</span> Customers</h3>
            </div>
          </div>
          <figure class="center">
            <img src="{{ Storage::url($data->aboutimage2) }}" alt="" class="image" />
          </figure>
          <div class="right">
            <span>About Us</span>
            <h1>{!!$data->heading3!!}</h1>
            <p>
                {!!$data->paragraph3!!}
            </p>
            <div class="vision-mission">
              <div class="vision">
                <h5>Our Vision</h5>
                <ul class="vision-list">
                    @foreach ($data->visions as $vision)

                    <li><img src="/check.svg" alt="" />{!!$vision!!}</li>
                    @endforeach
                </ul>
              </div>
              <div class="mission">
                <h5>Our Mission</h5>
                <ul class="mission-list">
                    @foreach ($data->missions as $mission)
                    <li><img src="/check.svg" alt="" />{!!$mission!!}</li>
                    @endforeach
                </ul>
              </div>
            </div>
            <a href="{{ route('user.about')}}">
              <button>More <img src="./public/arrow.svg" alt="" /></button>
            </a>
          </div>
        </div>

        <!--Experience-->
        <div class="experience-card container">
            @foreach($data->features as $index => $feature)

          <div class="experience">
            <figure class="experience-logo">
              <img src="./thumbsup.svg" alt="" />
            </figure>
            <div class="experience-details">
              <h3>{!!$index!!}</h3>
              <p>{!!$feature!!}</p>
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
            @foreach ($products as $product)
                @if ($count < 4)
                    <div class="product">
                        <figure class="product-image">
                            <img src="{{ asset('product_images/' . $product->image) }}" />
                        </figure>
                        <h1>{!! $product->name !!}</h1>
                        <p>{!! $product->description !!}</p>
                        <div class="actions">
                            <span>Rs.{!! $product->price !!}</span>
                            <div class="buttons">
                                <button class="product-button">
                                    <img src="./heart.svg" alt="" class="product-button-image" />
                                </button>
                                <button class="product-button">
                                    <img src="./cart.svg" alt="" class="product-button-image" />
                                </button>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                @endif
            @endforeach


        </div>
        <a
          class="all-products-btn"
          href="{{ route('product')}}"
        >
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
              {!!$service!!}
            </li>
            @endforeach
          </ul>
          <a href="{!! $data->servicelink !!}"><button>Read More <img src="./arrow.svg" alt="" /></button></a>
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
          <img src="./public/advantages.jpg" alt="" />
        </figure>
        <div class="our-advantages">
          <span>Our Advantages</span>
          <h1>Exceptional Freshness, Quality, & Sustainability</h1>
          <p>
            Indulge in the unparalleled freshness and exceptional quality of our
            dairy products, where every sip and bite reflects our commitment to
            providing a wholesome and delightful experience for our valued
            customers.
          </p>
        </div>
      </section>
      <!--Advantages end-->
      <!--Testimonials-->
      <section class="testimonials">
        <div class="container testimonial-container">
          <div class="testimonial-details">
            <span>Testimonials</span>
            <h1>We Are Trusted By 2500+ Clients</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut libero
              facere iure veritatis natus magnam? Dolore, officiis! Soluta
              sapiente temporibus ab delectus aliquid? Iure voluptate, qui
              distinctio optio neque numquam.
            </p>
          </div>

          <div class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                @foreach($testimonial->take(3) as $testimonial)
                <li class="splide__slide">
                  <div class="testimony">
                    <figure>
                        <img src="{{ asset('testimonial_images/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" />
                    </figure>
                    <h4>{!!$testimonial->name!!}</h4>
                    <span>{!!$testimonial->address!!}</span>
                    <p>
                        {!!$testimonial->content!!}
                    </p>
                    <div class="pattern"></div>
                    <img src="./public/quote.svg" alt="" class="quote" />
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
          <h1>Our Dairy Programs</h1>
          <p>
            Our dairy programs encompass various initiatives and strategies
            aimed at optimizing different aspects of dairy farming and
            production.
          </p>
          <button>Read More <img src="./public/arrow.svg" alt="" /></button>
        </div>
        <div class="programs">
          <div class="program">
            <figure>
              <img src="./public/quality.png" alt="" />
            </figure>
            <div class="details">
              <h3>Quality Assurance</h3>
              <p>
                Ensures the consistent quality and safety of dairy products
                through rigorous testing, monitoring, and adherence to industry
                standards.
              </p>
            </div>
          </div>
          <div class="program">
            <figure>
              <img src="./public/innovation.png" alt="" />
            </figure>
            <div class="details">
              <h3>Innovation & Research</h3>
              <p>
                Invests in research & development to explore new technologies,
                processes, & duct innovations.
              </p>
            </div>
          </div>
          <div class="program">
            <figure>
              <img src="./public/training.png" alt="" />
            </figure>
            <div class="details">
              <h3>Employee Training & Development</h3>
              <p>
                Prioritizes training & development of employees, ensuring a
                skilled & kowledgeable workforce.
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
          <div class="blog">
            <figure>
              <img src="./public/milk matters.jpg" alt="" />

              <span>information</span>
            </figure>
            <div class="blog-details">
              <h2>
                Milk Matters: Exploring the Wonders of Nature's Perfect Food
              </h2>
              <div class="published-details">
                <span>
                  <img src="./public/author.svg" alt="" />
                  Sujan Rai
                </span>
                <span>
                  <img src="./public/calendar.svg" alt="" />
                  March 3, 2023
                </span>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                laudantium totam enim temporibus incidunt unde inventore libero
                deleniti nostrum possimus hic, commodi aliquam voluptatibus illo
                sunt sequi amet, suscipit nisi?
              </p>
              <a href="#"
                >Read More <img src="./public/arrow copy.svg" alt=""
              /></a>
            </div>
          </div>
          <div class="blog">
            <figure>
              <img src="./public/delicious.jpg" alt="" />
              <span>information</span>
            </figure>
            <div class="blog-details">
              <h2>Udderly Delicious: A Journey into Premium Dairy Products</h2>
              <div class="published-details">
                <span>
                  <img src="./public/author.svg" alt="" />
                  Sujan Rai
                </span>
                <span>
                  <img src="./public/calendar.svg" alt="" />
                  March 3, 2023
                </span>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                laudantium totam enim temporibus incidunt unde inventore libero
                deleniti nostrum possimus hic, commodi aliquam voluptatibus illo
                sunt sequi amet, suscipit nisi?
              </p>
              <a href="#"
                >Read More <img src="./public/arrow copy.svg" alt=""
              /></a>
            </div>
          </div>
          <div class="blog">
            <figure>
              <img src="./public/milk matters.jpg" alt="" />

              <span>information</span>
            </figure>
            <div class="blog-details">
              <h2>
                Milk Matters: Exploring the Wonders of Nature's Perfect Food
              </h2>
              <div class="published-details">
                <span>
                  <img src="./public/author.svg" alt="" />
                  Sujan Rai
                </span>
                <span>
                  <img src="./public/calendar.svg" alt="" />
                  March 3, 2023
                </span>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                laudantium totam enim temporibus incidunt unde inventore libero
                deleniti nostrum possimus hic, commodi aliquam voluptatibus illo
                sunt sequi amet, suscipit nisi?
              </p>
              <a href="#"
                >Read More <img src="./public/arrow copy.svg" alt=""
              /></a>
            </div>
          </div>
        </div>
      </section>
      <!--Blogs End-->
      <!--Newsletter-->
      <section class="newsletter-container container">
        <div class="newsletter">
          <figure class="image">
            <img src="./public/newsletter.png" alt="" />
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
