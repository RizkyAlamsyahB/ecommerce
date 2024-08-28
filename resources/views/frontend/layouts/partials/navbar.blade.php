<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<nav id="navbar" class="navbar navbar-expand-lg navbar-custom-bg fixed-top navbar-transparent">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center mt-1" id="navbarNav">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item me-5">
                    <a class="nav-link" href="#about-us" style="color: #ffffff; font-size: 18px;">About Us</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="/#shop" style="color: #ffffff; font-size: 18px;">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand me-5" href="#">
                        <img src="{{ asset('template/dist/assets/compiled/png/logo_baru_gray.png') }}" alt="Logo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-5" href="#" style="color: #ffffff; font-size: 18px;">
                        <i class="bi bi-cart-fill"></i> Carts
                    </a>
                </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/landing') }}" class="nav-link"
                                style="color: #ffffff; font-size: 18px;">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link me-5"
                                style="color: #ffffff; font-size: 18px;">Sign In</a>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.onscroll = function() {
        var navbar = document.getElementById("navbar");
        if (window.pageYOffset > 50) { // Jika scroll lebih dari 50px
            navbar.classList.add("bg-dark");
            navbar.classList.remove("navbar-transparent");
        } else {
            navbar.classList.remove("bg-dark");
            navbar.classList.add("navbar-transparent");
        }
    };
</script>
