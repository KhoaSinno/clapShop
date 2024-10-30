@extends('customer.main_layout')

<!-- Breadcrumb Section Begin -->
@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>ClapShop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('customer.home') }}">Trang chủ</a>
                        <a href="{{ route('customer.order') }}">Đơn hàng</a>
                        <span>Đơn hàng #{{$order->id}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Breadcrumb Section End -->

@section('content')
<div class="container shoping-cart spad">
    <div class="row">
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad col-12 col-lg-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="{{ $detail->product->mainImage ? asset($detail->product->mainImage->image_url) : asset('storage/images/default.jpg') }}" alt="{{$detail->product->name}}" style="width: 80px; ">
                                        </td>
                                        <td>{{ $detail->product->name }}</td> <!-- Nếu có quan hệ với Product -->
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ format_currencyVNĐ($detail->price * $detail->quantity) }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{route('customer.products')}}" class="primary-btn cart-btn">Tiếp tục mua sắm</a>

                        </div>
                    </div>

                </div>
        </section>

        <div class="col-12 col-lg-5">
            <div class="checkout__order">
                <h4>Đơn hàng của bạn:</h4>
                <!-- <ul>
                    <li class="d-flex justify-content-between align-items-start">
                        <span>{{ $order->id }}</span>
                        <span class="text-danger">(x{{ $order->totalQuantity }})</span>
                        <span>{{ format_currencyVNĐ($order->totalPrice) }}</span>
                    </li>

                </ul> -->
                <div class="checkout__order__total">
                    Tổng tiền: <span>{{ format_currencyVNĐ($order->totalPrice) }}</span>
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="paymentMethod">Phương thức thanh toán <span class="text-danger d-lg-inline">*</span></label>
                    <select class="form-control" name="paymentMethod" required disabled>
                        <option value="cod" {{ $order->paymentMethod == 'cod' ? 'selected' : '' }}>Thanh toán khi nhận hàng (COD)</option>
                        <option value="bank_transfer" {{ $order->paymentMethod == 'bank_transfer' ? 'selected' : '' }}>Chuyển khoản ngân hàng</option>
                    </select>
                    <input type="hidden" name="paymentMethod" value="{{ $order->paymentMethod }}">
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <textarea class="form-control" name="note" placeholder="Ghi chú về đơn hàng hoặc vận chuyển..." readonly>{{ $order->note }}</textarea>
                </div>
                <div class="form-group">
                    <label for="address">Ghi chú</label>
                    <textarea class="form-control" name="address" placeholder="Địa chỉ giao hàng..." readonly>{{ $order->address }}</textarea>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
