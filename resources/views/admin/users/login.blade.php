<!DOCTYPE html>
<html lang="vi">

<head>
    @include('admin.head')
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="/admin_UI/images/team.jpg" alt="IMG">
                </div>
                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        <b>{{$title}}</b>
                    </span>
                    <form action="/admin/users/login/store" method="post">
                        @include('admin.alert')
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Tài khoản quản trị" name="email"
                                id="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu"
                                name="password" id="password-field">
                            <!-- <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span> -->
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 form-check validate-input">
                            <input class="form-check-input" type="checkbox" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        <!--=====ĐĂNG NHẬP======-->
                        <div class="container-login100-form-btn">
                            <button type="submit" class="btn btn-info w-100">Đăng nhập</button>
                        </div>
                        <!--=====LINK TÌM MẬT KHẨU======-->
                        <div class="text-right p-t-12">
                            <a class="txt2" href="/admin_UI/forgot.html">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                        @csrf
                    </form>
                    <!--=====FOOTER======-->
                    <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng ClapShop<i class="far fa-copyright" aria-hidden="true"></i>
                        <script type="text/javascript">
                            document.write(new Date().getFullYear());
                        </script> <a
                            class="txt2" href="#"> Five Hero Team </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>