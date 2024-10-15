@extends('customer.main_layout')

<!-- Breadcrumb Section Begin -->
@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('customer.home') }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Breadcrumb Section End -->

@section('content')
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            @foreach($cart as $id => $details)
                            <tr>
                                <td class="shoping__cart__item" style="width: 200px;">
                                    <img src="{{ $details['image'] ?? asset('storage/images/default.jpg') }}" alt="{{ $details['name'] }}" style="width: 100px; height: auto;">
                                </td>
                                <td class="shoping__cart__item" style="width: 300px;">
                                    <h5>{{ $details['name'] }}</h5>
                                </td>
                                <td class="shoping__cart__price" style="width: 135px;">
                                    {{ format_currencyVNĐ($details['price']) }}
                                </td>
                                <td class=" h-20">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity-input" data-id="{{ $id }}" value="{{ $details['quantity'] }}" min="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total" id="product-total-{{ $id }}" style="width: 135px;">
                                    {{ format_currencyVNĐ($details['price'] * $details['quantity']) }}
                                </td>
                                <td>
                                    <form action="{{ route('customer.cart.remove', ['id' => $id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">Giỏ hàng của bạn đang trống.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('customer.products')}}" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <!-- <a href="#" class="primary-btn cart-btn cart-btn-right">
                        <span class="icon_loading"></span>
                        Upadate Cart</a> -->
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <!-- <li>Tổng giá (đã tính VAT): <span>$454.98</span></li> -->
                        <!-- <li>Total <span>$454.98</span></li> -->
                        <li>Tổng giá (đã tính VAT): <span id="cart-total">{{ $cartTotal}}</span></li>
                    </ul>
                    <a href="{{route('customer.checkout')}}" class="primary-btn">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->


@endsection


@section('footer')
<script>
    $(document).ready(function() {
        // Khi số lượng thay đổi
        $('.quantity-input').on('change', function() {
            var id = $(this).data('id');
            var quantity = $(this).val();

            $.ajax({
                url: `{{ route('customer.cart.update') }}`, // Route để cập nhật giỏ hàng
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    // Cập nhật lại tổng giá sản phẩm
                    $('#product-total-' + id).text(response.productTotal);

                    // Cập nhật lại tổng giá của toàn bộ giỏ hàng
                    $('#cart-total').text(response.cartTotal);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý click vào nút trừ
        document.querySelectorAll('.dec').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định
                const input = this.nextElementSibling; // input ở ngay sau span .dec
                let currentValue = parseInt(input.value);

                // Nếu giá trị lớn hơn 1 thì giảm
                if (currentValue > 1) {
                    input.value = --currentValue; // Giảm giá trị trước khi gán
                    input.dispatchEvent(new Event('change')); // Gửi sự kiện change cho input
                }
            });
        });

        // Xử lý click vào nút cộng
        document.querySelectorAll('.inc').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định
                const input = this.previousElementSibling; // input ở ngay trước span .inc
                let currentValue = parseInt(input.value);

                input.value = ++currentValue; // Tăng giá trị trước khi gán
                input.dispatchEvent(new Event('change')); // Gửi sự kiện change cho input
            });
        });
    });
</script>

@endsection
