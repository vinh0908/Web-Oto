@extends('frontend.layout')

@section('shopping-cart')
    {{-- <div class="cart-header">
        <h1>Giỏ Hàng Của Bạn</h1>
    </div>
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Cộng</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $idCart => $item)
                    <tr>
                        <td><img src="{{ asset('images') . '/' . $item['image'] }}" alt="Product Image"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}VNĐ</td>
                        <td>
                            <div class="pro-qty">
                                <input data-id="{{ $idCart }}" type="text" value="{{ $item['qty'] }}">
                            </div>
                        </td>
                        <td>@php
                            $totalRow = $item['price'] * $item['qty'];
                            $total += $totalRow;
                        @endphp
                            {{ number_format($totalRow, 2) }}VNĐ</td>
                        <td><a onclick="return confirm('Bạn muốn xóa ?')"
                                href="{{ route('delete.item.cart', [$idCart]) }}" class="btn btn-danger">Xóa</a></td>
                    </tr>
                    <!-- Thêm các dòng sản phẩm khác tương tự -->
                @endforeach
            </tbody>

        </table>
    </div>
    <div style="margin-bottom: 20px" class="cart-header">
        <h3 style="margin-bottom: 10px">Tổng Cộng: {{ number_format($total, 2) }}VNĐ</h3>
        <a href="{{ route('tongsanpham') }}" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
        <a href="{{ route('checkout') }}" class="btn btn-success ml-2">Thanh Toán</a>
    </div> --}}


    <div class="container mt-5">
        <div class="cart-container">
            <h2>Giỏ hàng của bạn</h2>
            <table class="table cart-table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $idCart => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images') . '/' . $item['image'] }}" alt="Product Image">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>
                                <input type="number" class="form-control quantity-input" data-id="{{ $idCart }}"
                                    value="{{ $item['qty'] }}" min="1">
                            </td>
                            <td>@php
                                $totalRow = $item['price'] * $item['qty'];
                                $total += $totalRow;
                            @endphp
                                {{ number_format($totalRow, 2) }}VNĐ</td>
                            <td><a onclick="return confirm('Bạn muốn xóa ?')"
                                    href="{{ route('delete.item.cart', [$idCart]) }}" class="btn btn-danger">Xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="margin-bottom: 20px" class="cart-header">
            <h3 style="margin-bottom: 10px">Tổng Cộng: {{ number_format($total, 2) }}VNĐ</h3>
            <a href="{{ route('tongsanpham') }}" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
            <a href="{{ route('checkout') }}" class="btn btn-success ml-2">Thanh Toán</a>
        </div>
    </div>
@endsection


@section('my-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#update-cart').on('click', function() {
                // alert('1231');
                var list = [];
                $('table#shopping-cart tr input').each(function() {
                    var item = {
                        id: $(this).data('id'),
                        qty: $(this).val()
                    };
                    list.push(item);
                });
                console.log(list);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('update.cart') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        list: list
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
