<footer class="footer-container" id="footer">
    <style>
        a{
            color:white;
        }
    </style>
    @php
        $data=App\Helper::getFooterPageSetting();
    @endphp
    <div class="footer container">
      <div class="contact">
        <h3>Contact</h3>
        <ul>
          <li><img src="./map-pin.svg" alt="" /> {!!$data->address!!}</li>
          <li>
            <img src="/mail.svg" alt="" /> <a href="mailto:{!!$data->email!!}">{!!$data->email!!}</a>

          </li>
          <li><img src="./phone.svg" alt="" /><a  href="tel:{!!$data->phone!!}">{!!$data->phone!!}</a>
            </li>
        </ul>
        <div class="icons">
            <a href="{!!$data->facebookurl!!}">
                <figure>
                    <img src="./facebook.svg" alt="" />
                </figure>
             </a>
             {{-- <a href="{!!$data->instaurl!!}">
                <figure>
                    <img src="./insta.svg" alt="" />
                </figure>
            </a>

            <a href="{!!$data->twitterurl!!}">
                <figure>
                    <img src="./twitter.svg" alt="" />
                </figure>
            </a> --}}
        </div>
      </div>
      <div class="links">
        <div class="explore">
          <h3>Explore</h3>
          <ul>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/products') }}">Products</a></li>
            <li><a href="{{ url('/blogs') }}">News & Articles</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
          </ul>
        </div>
        <div class="quick-links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="{!!$data->privacy!!}">Privacy Policy</a></li>
            <li><a href="{!!$data->terms!!}">Terms & Conditions</a></li>
            <li><a href="{!!$data->disclaimer!!}">Disclaimer</a></li>
            <li><a href="{!!$data->support!!}">Support</a></li>

          </ul>
        </div>
      </div>
    </div>
  </footer>
