@extends('frontend.layout');

@section('allproduct')
    <div class="container">
        <!-- Cột sản phẩm -->
        <div class="products-column col-8">
            <h2 style="text-align: center;">Toàn bộ sản phẩm</h2>
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
                        <p>{{ $product->productBrand->name ?? 'Thương hiệu A' }}</p>
                        <h5 style="margin-bottom: 10px">{{ number_format($product->price, 2) }}vnđ</h5>
                        <button class="abc" data-url="{{ route('add.product.to.cart', [$product->id, 1]) }}">Thêm vào giỏ</button>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="products-column col-4">
            <!-- Cột danh mục và thương hiệu -->
            <div class="sidebar">
                <div class="category">
                    <h3 style="background: #007bff; margin: 5px;">Danh mục</h3>
                    <ul>
                        @foreach ($results['categories'] as $productCategory)
                            <li><a
                                    href="{{ route('tongsanpham', ['categorySlug' => $productCategory->slug]) }}">{{ $productCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="brand">
                    <h3 style="background: #007bff; margin: 5px;">Thương hiệu</h3>
                    <ul>
                        @foreach ($results['brands'] as $productBrand)
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

@section('my-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.abc').on('click', function() {
                var url = $(this).data('url');

                // Kiểm tra nếu URL tồn tại trước khi thực hiện AJAX
                if (!url) {
                    console.error('URL không tồn tại.');
                    return;
                }

                $.ajax({
                    type: 'GET', // hoặc 'POST' nếu bạn muốn dùng POST
                    url: url,
                    success: function(data) {
                        if (data && data.total_price !== undefined && data.total_items !== undefined) {
                            $('#total-price-cart').html('$' + data.total_price);
                            $('#total-items-cart').html(data.total_items);
                            swal("Thành công!", "Thêm sản phẩm thành công !!!", "success");
                        } else {
                            console.error('Dữ liệu trả về không đúng định dạng:', data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi xảy ra:', error);
                        console.error('Trạng thái:', status);
                        swal("Lỗi!", "Thêm sản phẩm thất bại !!!", "error");
                    }
                });
            });
        });
    </script>
@endsection
