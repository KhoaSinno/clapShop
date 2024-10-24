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
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
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
                    <!-- <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="sidebar__item__size price_active">
                            <label for="large">
                                < 10tr
                                    <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                10tr - 20tr
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                20tr - 30tr
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                > 30tr
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div> -->
                    <!--
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
                    </div> -->


                    <div class="sidebar__item">
                        <h4>Giá</h4>

                        <div class="list-group ">
                            <label class="border-0 list-group-item d-flex justify-content-between align-items-center">
                                <input class="form-check-input me-2" type="radio" name="price_range" value="lower_15" onclick="showSelectedPrice()">
                                Nhỏ hơn 15 Triệu
                            </label>

                            <label class="border-0 list-group-item d-flex justify-content-between align-items-center">
                                <input class="form-check-input me-2" type="radio" name="price_range" value="greater_15" onclick="showSelectedPrice()">
                                Lớn hơn 15 Triệu
                            </label>

                            <label class="border-0 list-group-item d-flex justify-content-between align-items-center">
                                <input class="form-check-input me-2" type="radio" name="price_range" value="casual" onclick="showSelectedPrice()">
                                Bất kì giá nào
                            </label>
                        </div>
                    </div>



                    <!-- <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="sidebar__item sidebar__item__color--option">
                        <h4>Màu sắc</h4>
                        <div class="sidebar__item__color sidebar__item__color--silver">
                            <label for="silver">
                                Silver
                                <input type="radio" id="silver">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                    </div> -->
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                <!-- Slider Item -->
                                @foreach($latestProducts->chunk(3) as $productChunk) <!-- Chia 6 sản phẩm thành 2 nhóm, mỗi nhóm 3 sản phẩm -->
                                <div class="latest-prdouct__slider__item">
                                    @foreach($productChunk as $product)
                                    <a href="{{ route('customer.product.detail', ['id' => $product->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $product->mainImage ? asset( $product->mainImage->image_url) : asset('storage/images/default.jpg') }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <span class="fs-10">{{ format_currencyVNĐ($product->price) }}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <!-- <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-1.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-2.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Vegetables</span>
                                        <h5><a href="#">Vegetables’package</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-3.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Mixed Fruitss</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-4.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-5.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="/e_customerSN/img/product/discount/pd-6.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">Raisin’n’nuts</a></h5>
                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                <!-- <p id="myParagraph">something</p> -->
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6" @if ($product->price < 18790000)
                            id="lower_20"
                            @else
                            id="greater_20"
                            @endif>
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
                                    <h5>{{format_currencyVNĐ($product->price) }}</h5>
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
    function showSelectedPrice() {
        const radios = document.getElementsByName('price_range');
        let products;
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                // document.getElementById('result').textContent = radios[i].value;
                // console.log(radios[i].value);
                if (radios[i].value == "greater_15") {
                    console.log(10);
                    products = document.querySelectorAll('#greater_20');
                    products.forEach(product => {
                        product.style.display = 'inline';
                    });
                    products = document.querySelectorAll('#lower_20');
                    products.forEach(product => {
                        product.style.display = 'none';
                    });
                    break;
                } else if (radios[i].value == "lower_15") {
                    console.log(20);
                    products = document.querySelectorAll('#lower_20');
                    products.forEach(product => {
                        product.style.display = 'block';
                    });
                    products = document.querySelectorAll('#greater_20');
                    products.forEach(product => {
                        product.style.display = 'none';
                    });
                    break;
                } else {
                    products = document.querySelectorAll('#lower_20');
                    products.forEach(product => {
                        product.style.display = 'block';
                    });
                    products = document.querySelectorAll('#greater_20');
                    products.forEach(product => {
                        product.style.display = 'inline';
                    });
                }
                break;

            }
        }
    }
</script>
@endsection
