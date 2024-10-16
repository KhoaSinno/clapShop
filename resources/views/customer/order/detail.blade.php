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
                        <a href="{{ route('customer.order') }}">Đơn hàng</a>
                        <span>Detail #{{$order->id}}</span>
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
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $detail)
                            <tr>
                                <td>
                                    <img src="{{ $detail->product->mainImage ? asset($detail->product->mainImage->image_url) : asset('storage/images/default.jpg') }}" alt="" style="width: 80px; ">
                                </td>
                                <td>{{ $detail->product->name }}</td> <!-- Nếu có quan hệ với Product -->
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ format_currencyVNĐ($detail->price) }}</td>
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
<!-- Shoping Cart Section End -->



@endsection
