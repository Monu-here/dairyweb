@extends('user.components.app')
@section('title','Home')
@section('content')
<div class="main">
    @php

    @endphp

        <main class="main">
      <!--hero-->
      <section class="hero" id="hero">
        <span class="hero-section">Join the Dairy Journey</span>
        <h1 class="hero-title">Pure Goodness From Our Dairy To Your Table.</h1>
        <p class="hero-desc">
          Experience pure dairy joy at [Dairy Name]. From farm to table, savor
          the freshest delights in every sip and bite. Join us for a journey of
          unrivaled flavor and quality.
        </p>
        <button class="discover-btn">
          Discover More <img src="/arrow.svg" alt="" />
        </button>
        <img src="/splash.png" alt="" class="splash" />
      </section>
      <!--hero end-->

      <!--About Us-->
      <section class="about-us container">
        <div class="welcome">
          <div class="top">
            <span class="welcome-section">Farm Perfect Dairy</span>
            <h1 class="welcome-title">Welcome to our Dairy</h1>
            <p class="welcome-desc">
              We take pride in delivering the freshest and finest dairy products
              straight to your table. From creamy milk to delectable cheeses,
              each product is crafted with care and passion.
            </p>
            <a href="#" class="welcome-anchor"
              >Know Us More <img src="/arrow copy.svg" alt=""
            /></a>
          </div>
          <figure class="buttom">
            <img src="/dairy.jpg" alt="" class="welcome-image" />
          </figure>
        </div>

        <!--About-->
        <div class="about" id="about">
          <div class="left">
            <img src="./public/about-1.jpg" alt="" class="image" />
            <div class="left-badge">
              <h3>Trusted by <span>1000+</span> Customers</h3>
            </div>
          </div>
          <figure class="center">
            <img src="./public/about-2.jpg" alt="" class="image" />
          </figure>
          <div class="right">
            <span>About Us</span>
            <h1>Where Milk Flows</h1>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit,
              vitae! Laborum sequi delectus nihil veniam! Odio quaerat autem,
              adipisci maxime sapiente aut possimus nihil ex nulla inventore!
              Tempora, temporibus quas.
            </p>
            <div class="vision-mission">
              <div class="vision">
                <h5>Our Vision</h5>
                <ul class="vision-list">
                  <li><img src="./public/check.svg" alt="" />Vision 1</li>
                  <li><img src="./public/check.svg" alt="" />Vision 2</li>
                  <li><img src="./public/check.svg" alt="" />Vision 3</li>
                </ul>
              </div>
              <div class="mission">
                <h5>Our Mission</h5>
                <ul class="mission-list">
                  <li><img src="./public/check.svg" alt="" />Mission 1</li>
                  <li><img src="./public/check.svg" alt="" />Mission 2</li>
                  <li><img src="./public/check.svg" alt="" />Mission 3</li>
                </ul>
              </div>
            </div>
            <a href="/src/pages/about/about.html">
              <button>More <img src="./public/arrow.svg" alt="" /></button>
            </a>
          </div>
        </div>

        <!--Experience-->
        <div class="experience-card container">
          <div class="experience">
            <figure class="experience-logo">
              <img src="./public/time.svg" alt="" />
            </figure>
            <div class="experience-details">
              <h3>20 Years of Experience</h3>
              <p>Serving quality dairy products.</p>
            </div>
          </div>
          <div class="experience">
            <figure class="experience-logo">
              <img src="./public/workers.svg" alt="" />
            </figure>
            <div class="experience-details">
              <h3>Experienced Workers</h3>
              <p>Serving quality dairy products.</p>
            </div>
          </div>
          <div class="experience">
            <figure class="experience-logo">
              <img src="./public/thumbsup.svg" alt="" />
            </figure>
            <div class="experience-details">
              <h3>Quality Assured</h3>
              <p>Serving quality dairy products.</p>
            </div>
          </div>
        </div>
      </section>
      <!--About Us End-->
      <!--Our Products-->
      <section class="products" id="products">
        <span>Our all products</span>
        <h1 class="product-heading">View All Product</h1>
        <div class="products-container container">
            @foreach ($products as $product )
            <div class="product">
                <figure class="product-image">
                  <img src="{{ asset('product_images/' . $product->image) }}" />
                </figure>
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <div class="actions">
                  <span>Rs.{{ $product->price }}</span>
                  <div class="buttons">
                    <button class="product-button">
                      <img
                        src="./heart.svg"
                        alt=""
                        class="product-button-image"
                      />
                    </button>
                    <button class="product-button">
                      <img
                        src="./cart.svg"
                        alt=""
                        class="product-button-image"
                      />
                    </button>
                  </div>
                </div>
              </div>

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
          <img src="./public/service-1.jpg" alt="" />
        </figure>
        <div class="service-center">
          <span>Dairy Services</span>
          <h1 class="service-title">The Eco-Friendly Services on Our Dairy</h1>
          <ul class="service-list">
            <li>
              <img src="./public/check.svg" alt="" />
              Energy-Efficient Equipment
            </li>
            <li>
              <img src="./public/check.svg" alt="" />
              Waste Management
            </li>
            <li>
              <img src="./public/check.svg" alt="" />
              Efficient Water Management
            </li>
            <li>
              <img src="./public/check.svg" alt="" />
              Efficient Transportation
            </li>
          </ul>
          <button>Read More <img src="./public/arrow.svg" alt="" /></button>
        </div>
        <div class="service-right">
          <figure>
            <img src="./public/service-2.jpg" alt="" />
          </figure>
          <h3>Product Care</h3>
          <div class="stats">
            <div class="stats-left">
              <span class="stat-value">20+</span>
              <span class="stat-text">Products</span>
            </div>
            <div class="stats-right">
              <span class="stat-value">99%</span>
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
