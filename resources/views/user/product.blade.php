@extends('user.components.app')
@section('title','Home')
@section('content')
<div class="main">
    @php

    @endphp

<main class="main">
    <!--Page Heading-->
    <section class="heading">
      <div class="heading-container container">
        <h3>Our Products</h3>
        <h1>All Products</h1>
      </div>
    </section>
    <!--Page heading end-->
    <section class="all-products">
      <div class="products-container container">
        @foreach ($products->reverse() as $product )
        <div class="product">
            <figure class="product-image" style="overflow: hidden; padding-bottom:5px; border-top-right-radius:10%; border-top-left-radius:30%">
                <img src="{{ asset('product_images/' . $product->image) }}" />
            </figure>
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->sdescription }}</p>
            <div class="actions">
                <span>Rs.{{ number_format($product->price, 0) }}</span>
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
    </section>
  </main>


</div>
@endsection
