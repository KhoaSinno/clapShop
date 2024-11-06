@extends('customer.main_layout')

<!-- Breadcrumb Section Begin -->
@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('customer.home') }}">Trang chủ</a>
                        <span>Thanh toán</span>
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
                <h6><span class="icon_tag_alt"></span>Bạn có phiếu giảm giá không? <a href="#">Bấm vào đây cũng không có đâu</a>
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form action="{{ route('customer.checkout.payment') }}" method="POST">
                @csrf
                <div class="row">


                    <div class="col-lg-7 col-md-12">
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text" name="fullname">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điên thoại<span>*</span></p>
                                    <input type="number" name="phone">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address" placeholder="Tên đường, Phường/Xã, Quận/Huyện, Tỉnh/Thành phố" required>
                        </div> -->

                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Tên đường, Phường/Xã, Quận/Huyện, Tỉnh/Thành phố" required></textarea>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn:</h4>
                            <ul>
                                @if(session('cart'))
                                @foreach(session('cart') as $item)
                                <li class="d-flex justify-content-between align-items-start">
                                    <span>{{ $item['name'] }}</span>
                                    <span class="text-danger">(x{{ $item['quantity'] }})</span>
                                    <span>{{ format_currencyVNĐ($item['price'] * $item['quantity']) }}</span>
                                </li>
                                @endforeach
                                @else
                                <li>Không có sản phẩm nào trong giỏ hàng.</li>
                                @endif
                            </ul>

                            <div class="checkout__order__total">
                                Tổng tiền: <span>{{ $cartTotal }}</span>
                            </div>

                            <div class="form-group d-flex flex-column">
                                <label for="paymentMethod">Phương thức thanh toán <span class="text-danger d-lg-inline">*</span></label>
                                <select class="form-control" name="paymentMethod" required>
                                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                                    <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" name="note" placeholder="Ghi chú về đơn hàng hoặc vận chuyển..."></textarea>
                            </div>

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