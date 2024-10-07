@extends('frontend.layout');

@section('allproduct')
    <div class="container">
        <!-- Cột sản phẩm -->
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
                        <input type="range" class="form-control-range" id="priceRange" min="0" max="1000000"
                            step="10000" value="500000">
                        <div class="range-values">
                            <span id="minPrice">0 VND</span>
                            <span id="maxPrice">1.000.000 VND</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <p>{{ $product->brand_name }}</p>
                        <h5 style="margin-bottom: 10px">{{ number_format($product->price, 2) }}vnđ</h5>
                        <button class="abc" data-url="{{ route('add.product.to.cart', [$product->id, 1]) }}">Thêm vào
                            giỏ</button>
                    </div>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 20px;">
                {{ $products->links('pagination::bootstrap-4') }}
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
                        if (data && data.total_price !== undefined && data.total_items !==
                            undefined) {
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceRange = document.getElementById('priceRange');
            const minPriceDisplay = document.getElementById('minPrice');
            const maxPriceDisplay = document.getElementById('maxPrice');

            // Hàm cập nhật giá trị hiển thị
            function updatePriceDisplay() {
                const minPrice = priceRange.min; // Giá trị tối thiểu
                const maxPrice = priceRange.max; // Giá trị tối đa
                const currentValue = priceRange.value; // Giá trị hiện tại của slider

                minPriceDisplay.textContent = minPrice + ' VND';
                maxPriceDisplay.textContent = currentValue + ' VND';
            }

            // Cập nhật hiển thị ban đầu
            updatePriceDisplay();

            // Thêm sự kiện khi giá trị slider thay đổi
            priceRange.addEventListener('input', updatePriceDisplay);
        });
    </script>
@endsection
