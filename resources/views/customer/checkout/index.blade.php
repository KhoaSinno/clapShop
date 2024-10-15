@extends('customer.main_layout')

<!-- Breadcrumb Section Begin -->
@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('customer.home') }}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Breadcrumb Section End -->

@section('content')
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Mày có phiếu giảm giá không? <a href="#">Bấm vào đây</a>
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điên thoại<span>*</span></p>
                                    <input type="number">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder="Tên đường" class="checkout__input__add">
                            <input type="text" placeholder="Phường/Xã, Quận/Huyện, Tỉnh/Thành phố">
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email">
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <input type="text"
                                placeholder="Ghi chú về đơn hàng hoặc vận chuyển...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn:</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            <ul>
                                @if(session('cart'))
                                @foreach(session('cart') as $item)
                                <li class="d-flex justify-content-between align-items-start">
                                    <span>
                                        {{ $item['name'] }}
                                    </span>
                                    <span class="text-danger text-left">
                                        (Số lượng: {{ $item['quantity'] }})
                                    </span>
                                    <span>{{ format_currencyVNĐ($item['price'] * $item['quantity']) }}</span>
                                </li>
                                @endforeach
                                @else
                                <li>Không có sản phẩm nào trong giỏ hàng.</li>
                                @endif
                            </ul>

                            <!-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> -->
                            <div class="checkout__order__total">Tổng tiền thanh toán <span>{{$cartTotal}}</span></div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
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
                            </div> -->
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
