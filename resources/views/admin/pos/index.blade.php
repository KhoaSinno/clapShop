<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button-->
        <!-- Navbar Right Menu-->
        <ul class="app-nav">


            <!-- User Menu-->
            <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->

    <main class="app app-ban-hang">
        <div>
            <a class="btn btn-warning py-1 px-4 text-danger mb-3" href="{{ route('admin.customer') }}">
                <<< Quay về</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>POS bán hàng</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="tile">
                    <h3 class="tile-title">Phần mềm bán hàng</h3>
                    <input type="text" id="myInput" onkeyup="myFunction()"
                        placeholder="Nhập mã sản phẩm hoặc tên sản phẩm để tìm kiếm...">
                    <div class="du--lieu-san-pham">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>

                                    <th class="so--luong">Mã hàng</th>
                                    <th class="so--luong">Tên sản phẩm</th>
                                    <th class="so--luong">Ảnh</th>
                                    <th class="so--luong" width="10">Số lượng</th>
                                    <th class="so--luong">Giá bán</th>
                                    <th class="so--luong text-center" style="text-align: center; vertical-align: middle;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>71309005</td>
                                    <td>Bàn ăn gỗ Theresa</td>
                                    <td><img src="/e_adminSN/assets/img-sanpham/reno.jpg" alt="" width="50px;"></td>
                                    <td><input class="so--luong1" type="number" value="2"></td>
                                    <td>5.600.000 </td>

                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>62304003</td>
                                    <td>Bàn ăn Vitali mặt đá</td>
                                    <td><img src="/e_adminSN/assets/img-sanpham/matda.jpg" alt="" width="50px;"></td>
                                    <td><input class="so--luong1" type="number" value="3"></td>
                                    <td>33.235.000 </td>

                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>71304032</td>
                                    <td>Bàn ăn mở rộng Gepa </td>
                                    <td><img src="/e_adminSN/assets/img-sanpham/ghethera.jpg" alt="" width="50px;"></td>
                                    <td><input class="so--luong1" type="number" width="30" value="1"></td>
                                    <td>16.770.000 </td>

                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>71338008</td>
                                    <td>Bàn ăn mở rộng cao cấp Dolas</td>
                                    <td><img src="/e_adminSN/assets/img-sanpham/zuno.jpg" alt="" width="50px;"></td>
                                    <td><input class="so--luong1" type="number" width="30" value="5"></td>
                                    <td>22.650.000 </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="alert">

                        <i class="fas fa-exclamation-triangle"></i> Gõ mã hoặc tên sản phẩm vào thanh tìm kiếm để thêm hàng vào đơn
                        hàng
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile">
                    <h3 class="tile-title">Thông tin thanh toán</h3>
                    <div class="row">
                        <div class="form-group  col-md-10">
                            <label class="control-label">Họ tên khách hàng</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm khách hàng">
                        </div>
                        <div class="form-group  col-md-2">
                            <label style="text-align: center;" class="control-label">Tạo mới</label>
                            <button class="btn btn-primary btn-them" data-toggle="modal" data-target="#exampleModalCenter"><i
                                    class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Nhân viên bán hàng</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>--- Chọn nhân viên bán hàng ---</option>
                                <option>Sinoo</option>
                                <option>Nhật Kim Anh</option>
                                <option>Đào Thanh Tuấn</option>
                                <option>Phạm Phong Phú</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Ghi chú đơn hàng</label>
                            <textarea class="form-control" rows="4" placeholder="Ghi chú thêm đơn hàng"></textarea>
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group  col-md-12">
                            <label class="control-label">Hình thức thanh toán</label>
                            <select class="form-control" id="exampleSelect2" required>
                                <option>Thanh toán chuyển khoản</option>
                                <option>Trả tiền mặt tại quầy</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tạm tính tiền hàng: </label>
                            <p class="control-all-money-tamtinh">= 129.397.213 VNĐ</p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Giảm giá (F7): </label>
                            <input class="form-control" type="number" value="0">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tổng cộng thanh toán: </label>
                            <p class="control-all-money-total">= 129.397.213 VNĐ</p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Khách hàng đưa tiền (F8): </label>
                            <input class="form-control" type="number" value="290000">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Khách hàng còn nợ: </label>
                            <p class="control-all-money"> - 129.397.213 VNĐ</p>
                        </div>
                        <div class="tile-footer col-md-12">
                            <button class="btn btn-primary luu-san-pham" type="button"> Lưu đơn hàng (F9)</button>
                            <button class="btn btn-primary luu-va-in" type="button">Lưu và in hóa đơn (F10)</button>

                            <a class="btn btn-secondary luu-va-in" href="{{ route('admin.customer') }}">Quay về</a>
                        </div>
                    </div>
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
