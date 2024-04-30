<header class="nav">
    <div class="container wrapper">
        <figure class="logo">
            <h1>LOGO</h1>
        </figure>
        <nav class="nav-bar">
            <ul class="nav-list">
                <li>
                    <a href="{{ url('/') }}"> Home </a>
                </li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/products') }}">Products</a></li>
                <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
            <button class="menu" id="menu-btn">
                <img src="/hamburger.svg" alt="" />
            </button>
            <button class="menu" id="close">
                <img src="/cross.svg" alt="" />
            </button>
        </nav>
    </div>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav-bar" id="mobile-nav-bar">
        <ul class="mobile-nav-list">
            <li>
                <a href="{{ url('/') }}"> Home </a>
            </li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/products') }}">Products</a></li>
            <li><a href="{{ url('/blogs') }}">Blogs</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </nav>
    <!-- Mobile Navigation End -->
</header>
