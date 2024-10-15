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
                        <a href="{{ route('customer.home') }}">Home</a>
                        <span>ClapShop</span>
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
                                <th class="shoping__product">Đơn hàng</th>
                                <th>Tổng</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="shoping__cart__item">
                                    <!-- <img src="img/cart/cart-1.jpg" alt=""> -->
                                    <h5>Vegetable’s Package</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    $55.00
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    $110.00
                                </td>
                                <td class="shoping__cart__item__close">
                                    <button class="btn btn-link ">Chi tiết</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                </div>
            </div>

    </div>
</section>
<!-- Shoping Cart Section End -->



@endsection
