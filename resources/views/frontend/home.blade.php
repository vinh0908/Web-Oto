@extends('frontend.layout')


@section('categories')
@endsection

@section('hero-product-category')
@endsection



@section('featured-product')
    <div class="container">
        <!-- Cột sản phẩm -->
        <div class="products-column col-8">
            <h2 style="text-align: center;">Sản phẩm</h2>
            <div class="product-grid">
                @foreach ($products as $product)
                    <div class="product">
                        @php
                            $image = empty($product->image) ? 'image_product_default.png' : $product->image;
                        @endphp
                        <img class="featured__item__pic set-bg" data-setbg="{{ asset('images') . '/' . $image }}">
                        @php $slug = is_null($product->slug) ? '' : $product->slug  @endphp
                        <h3><a class="nav-color" href="{{ route('product.detail.slug', [$slug]) }}">{{ $product->name }}</a>
                        </h3>
                        <p>Thương hiệu A</p>
                        <h5 style="margin-bottom: 10px">{{ number_format($product->price, 2) }}vnđ</h5>
                        <button><a class="abc" data-url="{{ route('add.product.to.cart', [$product->id, 1]) }}">Thêm vào
                                giỏ</a></button>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="products-column col-4">
            <!-- Cột danh mục và thương hiệu -->
            <div class="sidebar">
                <div class="category">
                    <h3>Danh mục</h3>
                    <ul>
                        @foreach ($productCategories as $productCategory)
                            <li><a
                                    href="{{ route('tongsanpham', ['categorySlug' => $productCategory->slug]) }}">{{ $productCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="brand">
                    <h3>Thương hiệu</h3>
                    <ul>
                        @foreach ($productBrands as $productBrand)
                            <li><a
                                    href="{{ route('tongsanpham', ['brandSlug' => $productBrand->slug]) }}">{{ $productBrand->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="price-range-container">
                    <h4>Price Range</h4>
                    <div class="form-group">
                        <label for="priceRange">Select Price Range:</label>
                        <input type="range" class="form-control-range" id="priceRange" min="0" max="1000"
                            step="10" value="500">
                        <div class="range-values">
                            <span id="minPrice">0</span>
                            <span id="maxPrice">1000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('banner')
@endsection

@section('from-blog')
    <h2 style="text-align: center">Bài viết</h2>
    <div class="container my-5">
        <div class="row">
            <!-- Bài viết 1 -->
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                        @php
                            $image = empty($post->image) ? 'image_product_default.png' : $post->image;
                        @endphp
                        <img class="featured__item__pic set-bg" data-setbg="{{ asset('images') . '/' . $image }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-title">{{ $post->datetime }}</p>
                        <p class="card-text">{{ $post->des }}</p>
                        <a href="{{ route('blog.list') }}" class="btn btn-primary">Xem bài viết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('pupup')
    <div class="tbpopup" id="tbpopup-1">
        <div class="tboverlay"></div>
        <div class="tbcontent">
            <div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
            <div style="font-size:30px;font-weight:bold">Khuyến mãi tết giảm giá 50%</div>
            <p>Kính chào quý khách hàng.</p>
            <p>Chương trình khuyến mãi Tết, <strong>Shopphukienmoto</strong> xin thông báo khuyến mãi <strong>giảm giá
                    từ 10% đến 50%</strong> khi mua sản
                phẩm tại cửa hàng.</p>
            <p>Và để tiện phục vụ từ ngày 29/01/2022 chúng tôi chuyển về địa chỉ mới: <strong>số 67 Nguyễn thị minh
                    khai, Q1 , tpHCM.</strong></p>
            <p>Cám ơn quý khách hàng đã quan tâm và ủng hộ.</p>
        </div>
    </div>
@endsection

@section('my-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.abc').on('click', function() {
                var url = $(this).data('url');
                $.ajax({
                    type: 'GET', // method of form
                    url: url,
                    success: function(data) {
                        $('#total-price-cart').html('$' + data.total_price);
                        $('#total-items-cart').html(data.total_items);
                        // alert('Them san pham thanh cong !!!');
                        swal("Thành công!", "Thêm sản phẩm thành công !!!", "success");
                    },
                    error: function() {
                        alert('Them san pham that bai !!!');
                    }
                });
            });
        });
    </script>
@endsection
