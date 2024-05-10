<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">


    @yield('css')

</head>

<body>
    @include('user.components.header')
    @yield('content')
    @include('user.components.footer')
    @yield('js')

    <script>
        const mobileNav = document.querySelector("#mobile-nav-bar");
        const menuBtn = document.querySelector("#menu-btn");
        const closeBtn = document.querySelector("#close");

        const anchors = document.querySelectorAll("a");

        menuBtn.addEventListener("click", () => {
            mobileNav.style.transform = "scaleY(1)";
            menuBtn.style.display = "none";
            closeBtn.style.display = "flex";
        });

        closeBtn.addEventListener("click", () => {
            mobileNav.style.transform = "scaleY(0)";
            closeBtn.style.display = "none";
            menuBtn.style.display = "flex";
        });

        anchors.forEach((anchor) => {
            anchor.addEventListener("click", () => {
                mobileNav.style.display = "none";
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
