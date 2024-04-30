@extends('user.components.app')
@section('title','Contact')
@section('content')
<div class="main">
    @php

    @endphp

<main class="main">
    <!--Page Heading-->
    <section class="heading">
      <div class="heading-container container">
        <h3>Contact</h3>
        <h1>Get in Touch</h1>
      </div>
    </section>
    <!--Heading End-->
    <!--Contact form-->
    <section class="contact-us container">
      <div class="contact-us-left">
        <span>Say Hi!</span>
        <h1>Message Us</h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis
          eum assumenda nam consequatur rem aspernatur ipsam soluta nobis,
          dolores, ea quae dolore modi commodi consequuntur cupiditate
          voluptatum accusantium quos? Tenetur.
        </p>
      </div>
      <form class="contact-us-right">
        <label for="name">Name</label>
        <input type="text" />
        <label for="email">Email</label>
        <input type="email" />
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <button>Submit</button>
      </form>
    </section>
    <!--Contact form End-->
    <!--Map-->

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14286.304048889142!2d87.26903406368017!3d26.469392539044723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef75d4df1dda71%3A0x7a5c0791724d0c90!2sNeed%20Technosoft%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1709183314488!5m2!1sen!2snp"
      width="100%"
      height="500"
      style="border: 0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
    <!--Map End-->
  </main>


</div>
@endsection

