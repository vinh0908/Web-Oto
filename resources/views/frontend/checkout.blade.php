@extends('frontend.layout')

@section('checkout')
    <section class="checkout spad">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('place.order') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address"
                                    class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" readonly value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="note" type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php $total = 0; @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $totalRow = $item['price'] * $item['qty'];
                                            $total += $totalRow;
                                        @endphp
                                        <li>{{ $item['name'] }} <span>${{ number_format($item['price'], 2) }}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="checkout__order__total">Total <span>${{ number_format($total, 2) }}</span></div>

                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="container checkout-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="checkout-form">
                    <h3>Billing Information</h3>
                    <form action="{{ route('place.order') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" readonly value="{{ Auth::user()->email }}" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your address">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter your city">
                        </div>
                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" placeholder="Enter your state">
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip Code:</label>
                            <input type="text" class="form-control" id="zip" placeholder="Enter your zip code">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkout-form">
                    <h3>Order Summary</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  Add rows dynamically using JavaScript based on cart items -->
                            <tr>
                                <td>Product 1</td>
                                <td>$10.00</td>
                                <td>1</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td>Product 2</td>
                                <td>$20.00</td>
                                <td>2</td>
                                <td>$40.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td>
                                    @php $total = 0; @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $totalRow = $item['price'] * $item['qty'];
                                            $total += $totalRow;
                                        @endphp
                                        <li>{{ $item['name'] }} <span>${{ number_format($item['price'], 2) }}</span></li>
                                    @endforeach
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="btn checkout-button">Place Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection
