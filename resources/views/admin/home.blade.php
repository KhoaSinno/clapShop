<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li>
                <a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    @include('admin.sidebar')
    <!-- Main content -->
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">

                                <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
                                    Tạo mới nhân viên</a>
                            </div>

                        </div>
                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
                            id="sampleTable">
                            <thead>
                                <tr>
                                    <th>ID nhân viên</th>
                                    <th width="150">Họ và tên</th>
                                    <th width="20">Ảnh thẻ</th>
                                    <th width="300">Địa chỉ</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th>Chức vụ</th>
                                    <th width="100">Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#CD12837</td>
                                    <td>Hồ Thị Thanh Ngân</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/1.jpg" alt=""></td>
                                    <td>155-157 Trần Quốc Thảo, Quận 3, Hồ Chí Minh </td>
                                    <td>12/02/1999</td>
                                    <td>Nữ</td>
                                    <td>0926737168</td>
                                    <td>Bán hàng</td>
                                    <td class="table-td-center">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction(this)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#SX22837</td>
                                    <td>Trần Khả Ái</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/2.jpg" alt=""></td>
                                    <td>6 Nguyễn Lương Bằng, Tân Phú, Quận 7, Hồ Chí Minh</td>
                                    <td>22/12/1999</td>
                                    <td>Nữ</td>
                                    <td>0931342432</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#LO2871</td>
                                    <td>Phạm Thu Cúc</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/3.jpg" alt=""></td>
                                    <td>Số 3 Hòa Bình, Phường 3, Quận 11, Hồ Chí Minh </td>
                                    <td>02/06/1998</td>
                                    <td>Nữ</td>
                                    <td>0931491997</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#SR28746</td>
                                    <td>Trần Anh Khoa</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/4.jpg" alt=""></td>
                                    <td>19 Đường Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh </td>
                                    <td>18/02/1995</td>
                                    <td>Nam</td>
                                    <td>0916706633</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#KJS276</td>
                                    <td>Nguyễn Thành Nhân</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/5.jpg" alt=""></td>
                                    <td>Số 13, Tân Thuận Đông, Quận 7, Hồ Chí Minh </td>
                                    <td>10/03/1996</td>
                                    <td>Nam</td>
                                    <td>0971038066</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BS76228</td>
                                    <td>Nguyễn Đặng Trọng Nhân</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/6.jpg" alt=""></td>
                                    <td>59C Nguyễn Đình Chiểu, Quận 3, Hồ Chí Minh </td>
                                    <td>23/07/1996</td>
                                    <td>Nam</td>
                                    <td>0846881155</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#YUI21376</td>
                                    <td>Nguyễn Thị Mai</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/4.jpg" alt=""></td>
                                    <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                                    <td>09/12/2000</td>
                                    <td>Nữ </td>
                                    <td>0836333037</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#YUI21376</td>
                                    <td>Nguyễn Thị Mai</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/4.jpg" alt=""></td>
                                    <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                                    <td>09/12/2000</td>
                                    <td>Nữ </td>
                                    <td>0836333037</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#YUI21376</td>
                                    <td>Nguyễn Thị Mai</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/3.jpg" alt=""></td>
                                    <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                                    <td>09/12/2000</td>
                                    <td>Nữ </td>
                                    <td>0836333037</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#YUI21376</td>
                                    <td>Nguyễn Thị Mai</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/3.jpg" alt=""></td>
                                    <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                                    <td>09/12/2000</td>
                                    <td>Nữ </td>
                                    <td>0836333037</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#YUI21376</td>
                                    <td>Nguyễn Thị Mai</td>
                                    <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/3.jpg" alt=""></td>
                                    <td>Đường Số 3, Tân Tạo A, Bình Tân, Hồ Chí Minh</td>
                                    <td>09/12/2000</td>
                                    <td>Nữ </td>
                                    <td>0836333037</td>
                                    <td>Bán hàng</td>
                                    <td><button class="btn btn-primary btn-sm trash" title="Xóa" onclick="myFunction()"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!--MODAL Update info staff-->
    <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Chỉnh sửa thông tin nhân viên cơ bản</h5>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">ID nhân viên</label>
                            <input class="form-control" type="text" required value="#CD2187" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Họ và tên</label>
                            <input class="form-control" type="text" required value="Sinoo">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="number" required value="092672342">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Địa chỉ email</label>
                            <input class="form-control" type="text" required value="ctuet@gmail.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Ngày sinh</label>
                            <input class="form-control" type="date" value="2004-03-15">
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="exampleSelect1" class="control-label">Chức vụ</label>
                            <select class="form-control" id="exampleSelect1">
                                <option selected>Bán hàng</option>
                            </select>
                        </div>
                    </div>
                    <BR>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
