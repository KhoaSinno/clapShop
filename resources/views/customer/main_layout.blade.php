<!DOCTYPE html>
<html lang="vi">

<head>
    @include('customer.head')
    @yield('header')
    <style>
        /* CSS tùy chỉnh cho hiệu ứng hover màu đỏ */
        .footer__widget ul li a:hover {
            color: #EB473D;
            /* Đổi màu chữ sang đỏ khi hover */
            transition: color 0.3s ease;
            /* Hiệu ứng chuyển màu mượt mà */
        }

        .footer__widget ul li a {
            padding: 5px 0;
        }

        .category li a:hover {
            color: #EB473D;
            /* Đổi màu chữ sang đỏ khi hover */
            transition: color 0.3s ease;
            /* Hiệu ứng chuyển màu mượt mà */
        }

        .category li a:active {
            color: #EB473D;
            /* Đổi màu chữ sang đỏ khi hover */
            transition: color 0.3s ease;
            /* Hiệu ứng chuyển màu mượt mà */
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="/e_customerSN/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                <li><a href="{{ route('customer.cart') }}"><i class="fa fa-shopping-bag"></i> <span
                            class="span__quantity_cart">{{ session('totalQuantity', 0) }}</span></a></li>
            </ul>
            <div class="header__cart__price">Tổng tiền: <span>{{session('total', 0) }}</span>
            </div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="/e_customerSN/img/vietnamese.jpg" style="width: 27px; height: 14px;" alt="Vietnamese">
                <div>Tiếng Việt</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Tiếng Việt</a></li>
                </ul>
            </div>
            <!-- <div class="header__top__right__auth">
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
            </div> -->
            <div class="header__top__right__auth">
                @auth
                <!-- Kiểm tra nếu người dùng là khách hàng -->
                @if(auth()->user()->role == 'customer')
                <!-- Gắn đường dẫn ở đây -->
                <a class="d-inline-block border-right pr-1" href="{{ route('customer.profile') }}"><i
                        class="fa fa-user"></i>
                    {{ auth()->user()->username }}</a>
                <a class="d-inline-block " href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                @endif
                @else
                <!-- Nếu người dùng chưa đăng nhập -->
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                @endauth
            </div>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('customer.home') }}">Trang chủ</a></li>
                <li><a href="{{ route('customer.products') }}">Sản phẩm</a></li>
                <li><a href="{{ route('customer.order') }}">Đơn hàng</a></li>
                <li><a href="{{ route('customer.products') }}">Danh mục</a>
                    <ul class="header__menu__dropdown pl-3 ">
                        @foreach ($categories as $category)
                        <li>
                            <a class="font-weight-light"
                                href="{{ route('customer.products.by_slug', $category->slug) }}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <!-- <li><a href="./blog.html">Blog</a></li> -->
                <li><a href="{{ route('customer.contact') }}">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> clapshop@ctuet.edu.vn</li>
                <li>Giao hàng miễn phí đơn từ 2.000.000</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> clapshop@ctuet.edu.vn</li>
                                <li>Giao hàng miễn phí đơn từ 2.000.000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="/e_customerSN/img/vietnamese.jpg" style="width: 27px; height: 14px;"
                                    alt="Vietnamese">
                                <div>Tiếng Việt</div>
                            </div>

                            <div class="header__top__right__auth">
                                @auth
                                <!-- Kiểm tra nếu người dùng là khách hàng -->
                                @if(auth()->user()->role == 'customer')
                                <!-- Gắn đường dẫn ở đây -->
                                <a class="d-inline-block border-right pr-1" href="{{ route('customer.profile') }}"><i
                                        class="fa fa-user"></i>
                                    {{ auth()->user()->username }}</a>
                                <a class="d-inline-block " href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                @endif
                                @else
                                <!-- Nếu người dùng chưa đăng nhập -->
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route(name: 'customer.home') }}"><img src="/e_customerSN/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                    href="{{ route(name: 'customer.home') }}">Trang chủ</a></li>
                            <li class="{{ request()->is('customer/products') ? 'active' : '' }}">
                                <a href="{{ route(name: 'customer.products') }}">Sản phẩm</a>
                            </li>
                            <li class="{{ request()->is('customer/order') ? 'active' : '' }}">
                                <a href="{{ route(name: 'customer.order') }}">Đơn hàng</a>
                            </li>
                            <li class="{{ request()->is('customer/contact') ? 'active' : '' }}"><a
                                    href="{{ route(name: 'customer.contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('customer.cart') }}"><i class="fa fa-shopping-bag"></i> <span
                                        class="span__quantity_cart">{{ session('totalQuantity', 0)}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng tiền:
                            <span>{{session('total', 0) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero {{ request()->is('/') ? '' : 'hero-normal' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục</span>
                        </div>
                        <ul class="category">
                            @foreach ($categories as $category)

                            <li><a
                                    href="{{ route('customer.products.by_slug', $category->slug) }}">{{$category->name}}</a>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('customer.product.search') }}" method="GET">
                                <!-- Route đến hàm xử lý tìm kiếm -->
                                <input type="text" name="query" placeholder="Bạn muốn tìm gì?"
                                    value="{{ request()->input('query') }}">
                                <button type="submit" class="site-btn">Tìm</button>
                            </form>

                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 30 04 1975</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>

                    @yield('background_home')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('breadcrumb')
    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('customer.home')}}"><img src="/e_customerSN/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 256 Nguyễn Văn Cừ, An Hòa, Ninh Kiều, Cần Thơ</li>
                            <li>Phone: +84 30 04 1975</li>
                            <li>Email: clapshop@ctuet.edu.vn</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Chính sách</h6>
                        <ul class="w-100">
                            <li><a href="#">Hướng Dẫn Mua Hàng</a></li>
                            <li><a href="#">Chính sách bảo mật dữ liệu</a></li>
                            <li><a href="#">Chính sách xử lý dữ liệu cá nhân</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                            <li><a href="#">Chính sách bán hàng</a></li>
                            <li><a href="#">Chính sách kiểm hàng</a></li>
                            <li><a href="#">Chính sách đổi trả</a></li>
                            <li><a href="#">Chính sách hoàn tiền</a></li>
                            <li><a href="#">Quy chế hoạt động</a></li>
                            <li><a href="#">Chính sách vận chuyển</a></li>
                            <li><a href="#">Chính sách giao hàng và thanh toán</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Liên hệ</h6>
                        <p>Nhận thông tin cập nhật qua Email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#">
                            <input type="text" placeholder="Địa chỉ mail của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <!-- SINOO <i class="fa fa-heart" aria-hidden="true"></i> YOU giữ bản quyền trên website. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="/e_customerSN/img/payment-item.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="floating-facebook">
                <a href="#" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('customer.footer')
    @yield('footer')

</body>

</html>