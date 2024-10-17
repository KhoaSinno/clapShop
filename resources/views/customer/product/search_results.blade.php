@extends('customer.main_layout')

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
                            <div class="product__item__pic set-bg" data-setbg="{{ $product->mainImage ? asset($product->mainImage->image_url) : asset('storage/images/default.jpg') }}">
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
