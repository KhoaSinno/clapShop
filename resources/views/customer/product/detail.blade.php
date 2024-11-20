@extends('customer.main_layout')

@section('content')
<!-- Breadcrumb Section Begin -->
@section('breadcrumb')
<section class="breadcrumb-section set-bg" data-setbg="/e_customerSN/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$category->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('customer.home')}}">Trang chủ</a>
                        <a href="{{ route('customer.products.by_slug', $category->slug) }}">{{$category->name}}</a>
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Breadcrumb Section End -->

@section('content')

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{ $product->mainImage ? asset($product->mainImage->image_url) : asset('storage/images/default.jpg') }}"
                            alt="">
                    </div>
                    <!-- <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="/e_customerSN/img/product/details/product-details-2.jpg"
                            src="/e_customerSN/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="/e_customerSN/img/product/details/product-details-3.jpg"
                            src="/e_customerSN/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="/e_customerSN/img/product/details/product-details-5.jpg"
                            src="/e_customerSN/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="/e_customerSN/img/product/details/product-details-4.jpg"
                            src="/e_customerSN/img/product/details/thumb-4.jpg" alt="">
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    <!-- <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div> -->
                    <div class="product__details__price">{{format_currencyVNĐ($product->price) }}</div>
                    <div class="product__details__quantity">
                        <div class="pro-qty">
                            <input type="text" value="1">
                        </div>
                    </div>
                    <!-- <div class="quantity">

                    </div> -->
                    <a href="#" class="primary-btn add-to-cart" data-id="{{ $product->id }}">Thêm vào giỏ</a>
                    <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                    @if($product->stock <= 0)
                        <h5 style="color: red;">Sản phẩm hết hàng.</h5>
                    @endif
                    <ul>
                        <li><b>Bộ vi xử lý (CPU):</b> <span class="d-block pl-3">{{ $product->cpu }}</span></li>
                        <li><b>Bộ nhớ (RAM):</b> <span class="d-block pl-3">{{ $product->ram }}</span></li>
                        <li><b>Ổ cứng (Storage):</b> <span class="d-block pl-3">{{ $product->storage }}</span></li>
                        <li><b class="d-inline">Kích thước màn hình:</b> <span
                                class="d-block pl-3">{{ $product->screen }}</span></li>
                        <li><b>Dung lượng pin:</b> <span class="d-block pl-3">{{ $product->battery }}</span></li>
                        <li><b>Bảo hành:</b> <span class="d-block pl-3">{{ $product->warranty }}</span></li>
                        <li><b>Hệ điều hành:</b> <span class="d-block pl-3">{{ $product->os }}</span></li>
                        <li><b>Tình trạng:</b> <span
                                class="d-block pl-3">{{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</span></li>

                        <li><b>Chia sẻ</b>
                            <div class="share">
                                <a href="https://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="https://pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $relatedProduct->mainImage ? asset($relatedProduct->mainImage->image_url) : asset('storage/images/default.jpg') }}">
                            <ul class="product__item__pic__hover">
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                                                                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a
                                    href="{{route('customer.product.detail', $relatedProduct->id) }}">{{$relatedProduct->name}}</a>
                            </h6>
                            <h5>{{$relatedProduct->price}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Related Product Section End -->


@endsection

@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/e_customerSN/js/incQuantitySession.js"></script>
@endsection