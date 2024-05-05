@extends('user.components.app')
@section('title','About Us')
@section('content')
<div class="main">
    @php
        $data=App\Helper::getAboutPageSetting();

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
        <img src="{{ Storage::url($data->image1) }}" alt="about" />
    </figure>
      <div class="about-us-section-details">
        <h3>About Us</h3>
        <h1>{!!$data->heading1!!}</h1>
        <p>
            {!!$data->paragraph1!!}
        </p>
      </div>
    </section>
    <!--About us End-->

    <!--Why Choose Us-->
    <section class="why-choose-us container">
      <figure class="why-choose-us-image">
        <img src="{{ Storage::url($data->image2) }}" alt="about" />
      </figure>
      <div class="why-choose-us-advantages">
        <span>Why Choose Us</span>
        <h1>{!!$data->heading2!!}</h1>
        <p>
            {!!$data->paragraph2!!}
        </p>
        @foreach($data->reasons as $index => $reason)
        <div class="advantage-item">
          <img src="/check-square-2.svg" alt="" />
          <div class="item">
            <h2>{!!$index!!}</h2>
            <p>{!!$reason!!}</p>
          </div>
        </div>
        @endforeach

      </div>
    </section>
    <!--Why Choose Us End-->

    <!--Founder Message-->
    <section class="founer-message container"></section>
    <!--Founder Message End-->
  </main>


</div>
@endsection
