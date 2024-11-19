<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="/e_customerSN/img/vietnamese.jpg"
            style="width: 100px; height: 100px; object-fit: cover;" alt="User Image">
        <div>
            <p class="app-sidebar__user-name text-white"><b>CLAPSHOP</b></p>
            <p class="app-sidebar__user-designation text-white">Wellcome my Boss</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">

        <li><a class="app-menu__item haha" href="{{ route('admin.pos') }}"><i class='app-menu__icon bx bx-cart-alt'></i>
                <span class="app-menu__label">POS Bán Hàng</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard') }}"><i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">Quản trị ClapShop</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/customer') ? 'active' : '' }} " href="{{ route('admin.customer') }}"><i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">Quản lý khách hàng</span></a></li>

        <li>
            <a class="app-menu__item {{
            request()->is('admin/product','admin/product/*', 'admin/product/edit/*') ? 'active' : '' }}
            "
                href="{{ route('admin.product') }}"><i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">
                    Quản lý sản phẩm
                </span></a>
        </li>

        <li><a class="app-menu__item {{ request()->is('admin/order/*','admin/order') ? 'active' : '' }} " href="{{ route('admin.order') }}"><i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">Quản lý đơn hàng</span></a></li>

        <li><a class="app-menu__item {{ request()->is('admin/category') ? 'active' : '' }} " href="{{ route('admin.category') }}"><i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">Quản lý danh mục</span></a></li>

    </ul>
</aside>