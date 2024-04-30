@extends('user.components.app')
@section('title','About Us')
@section('content')
<div class="main">
    @php

    @endphp

<main>
    <!--Page Heading-->
    <section class="heading">
      <div class="heading-container container">
        <h3>History of Our Dairy</h3>
        <h1>About Us</h1>
      </div>
    </section>
    <!--Page heading end-->

    <!--About us-->
    <section class="about-section container">
      <figure class="about-image">
        <img src="/public/about.jpg" alt="about" />
      </figure>
      <div class="about-us-section-details">
        <h3>About Us</h3>
        <h1>Providing the Best Quality Products to You Everyday</h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis
          ab reiciendis, dolor odit excepturi, repellendus dolore minus ipsa
          nulla consequuntur ducimus modi enim ex repudiandae cumque numquam
          suscipit, fuga unde.
        </p>
      </div>
    </section>
    <!--About us End-->

    <!--Why Choose Us-->
    <section class="why-choose-us container">
      <figure class="why-choose-us-image">
        <img src="./public/why-choose-us.jpg" alt="" />
      </figure>
      <div class="why-choose-us-advantages">
        <span>Why Choose Us</span>
        <h1>Unleash the Magic of Farm Crafted Dairy</h1>
        <p>
          Indulge in the unparalleled freshness and exceptional quality of our
          dairy products, where every sip and bite reflects our commitment to
          providing a wholesome and delightful experience for our valued
          customers.
        </p>
        <div class="advantage-item">
          <img src="./public/check-square-2.svg" alt="" />
          <div class="item">
            <h2>100% Natural</h2>
            <p>Products are 100% naturally crafted.</p>
          </div>
        </div>
        <div class="advantage-item">
          <img src="./public/check-square-2.svg" alt="" />
          <div class="item">
            <h2>Best Quality Products</h2>
            <p>Get quality like none others.</p>
          </div>
        </div>
        <div class="advantage-item">
          <img src="./public/check-square-2.svg" alt="" />
          <div class="item">
            <h2>Expert Workers</h2>
            <p>Products made by experienced industry workers and experts.</p>
          </div>
        </div>
      </div>
    </section>
    <!--Why Choose Us End-->

    <!--Founder Message-->
    <section class="founer-message container"></section>
    <!--Founder Message End-->
  </main>


</div>
@endsection
