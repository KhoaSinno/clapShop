<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    @yield('head')
</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <!-- <li>
                <a class="app-nav__item" href="{{route('customer.home')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            </li> -->
            <form action="{{ route('logout') }}" method="POST" class="cursor-pointer m-0">
                @csrf
                <button type="submit" class="app-nav__item m-0"><i class='bx bx-log-out bx-rotate-180'></i></button>
            </form>
        </ul>
    </header>
    <!-- Sidebar menu-->
    @include('admin.sidebar')
    <!-- Main content -->
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>{{$title ?? ''}}</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">

                            <!-- Render function here -->
                            @yield(section: 'function_nav')

                        </div>

                        <!-- Render table here -->
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal -->
    @yield('modal')
    @include('admin.footer')
    @yield('footer')
</body>

</html>
