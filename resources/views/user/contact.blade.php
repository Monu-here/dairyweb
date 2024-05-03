@extends('user.components.app')
@section('title', 'Contact')
@section('content')
    <div class="main">
        @php
        $data=App\Helper::getContactPageSetting();
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
                    <h1>{!!$data->heading!!}</h1>
                    <p>
                        {!!$data->paragraph!!}
                    </p>
                </div>
                <form class="contact-us-right" action="{{ route('msg.send') }}" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" />
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                    <label for="message">Message</label>
                    <textarea name="msg" id="message" cols="30" rows="10"></textarea>
                    <button type="submit">Submit</button>
                    @if (session('success'))

                    <script>
                        alert("{{ session('success') }}");
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        alert("{{ session('error') }}");
                    </script>
                @endif


                </form>

            </section>
            <!--Contact form End-->
            <!--Map-->

            <iframe id="gmap_canvas"
                width="100%" height="500" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!--Map End-->
        </main>


    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const mapurl = "https://maps.google.com/maps?q=xxx_map&t=&z=13&ie=UTF8&iwloc=&output=embed";

        function setMap(location) {
            const mapUrlWithLocation = mapurl.replace('xxx_map', encodeURIComponent(location));
            $('#gmap_canvas').attr('src', mapUrlWithLocation);
        }

        // Initialize map with default location
        setMap("{!! $data->location !!}");

        // Update map when location input changes
        $('#location').on('input', function() {
            const newLocation = $(this).val();
            setMap(newLocation);
        });

        // Form submission
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            // Here, you can add code to handle form submission via AJAX or regular form submission
            // For example:
            // $('form').submit();
        });
    });
</script>
