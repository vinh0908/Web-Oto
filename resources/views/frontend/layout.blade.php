<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Nước Hoa</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.3-dist/icons-1.8.1/font/bootstrap-icons.css') }}">

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('frontend-oto/css/main.css') }}">
</head>

<body onload="thongbaopopup()" class="backgroud-image-header">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('frontend.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @yield('hero-product-category')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    @yield('categories')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @yield('featured-product')
    <!-- Featured Section End -->
    @yield('product-detail')

    @yield('post-detail')

    @yield('shopping-cart')

    @yield('checkout')

    <!-- Banner Begin -->
    @yield('banner')
    <!-- Banner End -->

    <!-- product_list Begin -->
    @yield('product_list')
    <!-- product_list End -->

    <!-- Latest Product Section Begin -->
    @yield('latest-product')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    @yield('from-blog')
    <!-- Blog Section End -->

    @yield('aboutus')

    @yield('blog')

    @yield('allproduct')

    @yield('login')

    @yield('contacts')

    {{-- @yield('iconss') --}}

    <!-- Footer Section Begin -->
    @include('frontend.footer')
    <!-- Footer Section End -->

    <!-- Thong bao pupup -->
    @yield('pupup')

    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- JS OTO --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="frontend-oto/js/main.js"></script>
    {{-- END JS OTO --}}

    <!-- js thong bao popup -->
    <script>
        function thongbaopopup() {
            document.getElementById("tbpopup-1").classList.toggle("active");
        }
    </script>

    @yield('my-script')

    @if (session()->has('checkout'))
        <script type="text/javascript">
            swal("Thành công!", "Mua hàng thành công !!!", "success");
        </script>
    @endif
</body>

</html>
