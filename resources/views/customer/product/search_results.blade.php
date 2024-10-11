@extends('customer.main_layout')

<!-- Breadcrumb Section Begin -->
<!-- @section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('customer.home') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection -->
<!-- Breadcrumb Section End -->

@section('content')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li>
                                <a
                                    href="{{ route('customer.products.by_slug', $category->slug) }}"
                                    class="{{ request()->is('customer/products/' . $category->slug) ? 'text-primary text-bold' : '' }}">{{$category->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="sidebar__item">
                        <h4>Giá</h4>
                        <form method="GET" action="{{ route('products.filter') }}">
                            <div class="sidebar__item__size">
                                <label for="large">
                                    <input type="radio" id="large" name="price_range" value="0" onchange="this.form.submit()" {{ request('price_range') == '0' ? 'checked' : '' }}>
                                    <span>&lt; 10tr</span>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    <input type="radio" id="medium" name="price_range" value="1" onchange="this.form.submit()" {{ request('price_range') == '1' ? 'checked' : '' }}>
                                    <span>10tr - 20tr</span>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    <input type="radio" id="small" name="price_range" value="2" onchange="this.form.submit()" {{ request('price_range') == '2' ? 'checked' : '' }}>
                                    <span>20tr - 30tr</span>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    <input type="radio" id="tiny" name="price_range" value="3" onchange="this.form.submit()" {{ request('price_range') == '3' ? 'checked' : '' }}>
                                    <span>&gt; 30tr</span>
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('customer.products') }}" method="GET" class="filter__sort">
                                <span>Sắp xếp</span>
                                <select id="sort" name="sort" onchange="this.form.submit()">
                                    <option value="default" {{ $sort == 'default' ? 'selected' : '' }}>Mặc định</option>
                                    <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                    <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-6">
                            <div class="filter__found">
                                <h6><span>{{$count}}</span> sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="/e_customerSN/img/product/product-1.jpg">
                                <ul class="product__item__pic__hover">
                                    <li>
                                        <a href="#" class="add-to-cart" data-id="{{ $product->id }}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a href="{{route('customer.product.detail', $product->id) }}">{{$product->name}}</a>
                                </h6>
                                <h5>{{$product->price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-center align-items-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->


@endsection


@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        var productId = $(this).data('id'); // Lấy productId từ thuộc tính data-id của nút

        // Kiểm tra xem productId có tồn tại không
        if (!productId) {
            alert('Sản phẩm không hợp lệ.');
            return;
        }

        $.ajax({
            url: '/customer/cart/add/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}' // Bao gồm token CSRF
            },
            success: function(response) {
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
                // Bạn có thể cập nhật biểu tượng giỏ hàng hoặc số lượng sản phẩm ở đây
            },
            error: function(xhr) {
                alert('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });
</script> -->

<script>
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        var productId = $(this).data('id');

        $.ajax({
            url: `/customer/cart/add/${productId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
                // Cập nhật tổng tiền ngay lập tức
                $('.header__cart__price span').text('$' + response.total.toFixed(2));
                $('.span__quantity_cart').text(response.totalQuantity);
            },
            error: function(xhr) {
                alert('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });
</script>

@endsection
