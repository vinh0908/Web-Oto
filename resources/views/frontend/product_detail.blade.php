@extends('frontend.layout')

@section('product-detail')
    <div class="container product-container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-details">
                    <h2>{{ $product->name }}</h2>
                    <img src="{{ asset('images') . '/' . $product->image }}" alt="" class="product-image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <div class="product-description">
                        <p>{{ $product->des }}</p>
                    </div>

                    <div class="product-brand">{{ $product->brand_name }}</div>
                    <div class="product-origin {{ $product->qty > 0 ? '' : 'text-danger' }}">
                        {{ $product->qty > 0 ? 'In Stock' : 'Out of stock' }}</div>
                    <div class="product-brand">Weight: {{ $product->weight }} kg</div>
                    <div class="product-origin">Origin: Made in USA</div>
                    <div class="product-price">{{ $product->price }}</div>
                    <button><a class="abc btn add-to-cart-button"
                            data-url="{{ route('add.product.to.cart', [$product->id, 1]) }}">Thêm vào
                            giỏ</a></button>
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
