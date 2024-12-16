<header class="backgroud-image-images">
    <div class="contact-info">
        <div class="contact-details">
            <p><i class="fas fa-phone-alt"></i> <a href="tel:+123456789">090 2346 044</a></p>
            <p><i class="fas fa-envelope"></i> <a href="mailto:example@gmail.com">lehuuvinh159@gmail.com</a></p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend-oto/images/logo.jpeg') }}" alt="Logo">
        </a>
    </div>

    <nav style="padding: 0px;" class="navbar navbar-expand-lg navbar-light">
        <div class="d-flex justify-content-end container">

            <button class="navbar-toggler" type="button" id="navToggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="navbarNav">
                @php
                    $cart = session()->get('cart') ?? [];
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['qty'];
                    }
                @endphp
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-star"></i>Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('checkout') }}"><i class="bi bi-bag-check"></i>Checkout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shopping.cart') }}"><i class="bi bi-cart"></i>
                            <span
                                id="total-items-cart">
                                {{ is_array(session()->get('cart')) ? count(session()->get('cart')) : 0 }}
                            </span>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (!Auth::check())
                            <a class="nav-link" href="{{ route('login') }}"><i
                                    class="bi bi-box-arrow-in-right"></i>Login</a>
                        @else
                            <div class="header__top__right__language">
                                <div><i class="bi bi-box-arrow-in-right"></i>{{ Auth::user()->name }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="admin">My Order</a></li>
                                    <form method="post" action="{{ route('logout') }}" id="formLogout">
                                        @csrf
                                        <li><a href="#"
                                                onclick="document.getElementById('formLogout').submit();">Logout</a>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        @endif
                    </li>
                    <li>
                        <div class="header__cart__price">Tổng:
                            <span id="total-price-cart">{{ number_format($total, 2) }}vnđ</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="slider">
        <div class="slides">
            <div class="slide">
                <img src="{{ asset('frontend-oto/images/blog/blog1.jpeg') }}" alt="Ảnh 1">
                <div class="text">
                    <h1>Malissa Kiss</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis assumenda soluta esse
                        recusandae provident tempora odio. Quae suscipit voluptate distinctio sed illum rem corrupti
                        sit officiis, unde iusto est perspiciatis.</p>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('frontend-oto/images/blog/blog2.jpeg') }}" alt="Ảnh 2">
                <div class="text">
                    <h1>Laura Anne</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto nulla laudantium natus!
                        Necessitatibus qui impedit corporis. Iusto, sed, facilis quia expedita tempore atque ipsam
                        sapiente, culpa accusamus sint totam. Harum!</p>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('frontend-oto/images/blog/blog3.jpeg') }}" alt="Ảnh 3">
                <div class="text">
                    <h1>Kiss My Body</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque est alias facilis nesciunt
                        eligendi esse atque blanditiis dolorem eum numquam? Debitis assumenda et placeat molestiae
                        eius cumque ex eum dolore.</p>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
        </div>
        <a class="prev" onclick="moveSlide(-1)">&#10094;</a>
        <a class="next" onclick="moveSlide(1)">&#10095;</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-custom backgroud-image-header">
        <div class="container">
            <ul style="font-size: 1.4rem;" class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-color nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-color nav-link" href="{{ route('aboutus.list') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-color nav-link" href="{{ route('tongsanpham') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-color nav-link" href="{{ route('blog.list') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-color nav-link" href="{{ route('contact.list') }}">Contact</a>
                </li>
            </ul>
            <!-- Navbar links -->
            <div id="navbarNav"> <!-- Removed collapse navbar-collapse classes -->
                <!-- Search form -->
                <form class="d-flex ms-auto" role="search" action="{{ route('product.list') }}" method="GET">
                    <input class="form-control me-2" type="text" name="name"
                        value="{{ request()->query('name') ?? '' }}" placeholder="Search">
                    <button class="btn btn-outline-success search-icon" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

</header>

@section('my-script')
    <script type="text/javascript">
        function submitLogoutForm() {
            $('#formLogout').submit();
        }
    </script>
@endsection
