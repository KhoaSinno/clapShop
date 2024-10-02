@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
        Tạo mới sản phẩm</a>
</div>
@endsection

@section('content')
<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th>Mã SP</th>
            <th width="150">Tên SP</th>
            <th width="150">Thương hiệu</th>
            <th>Chi tiết cấu hình</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Hoạt động</th>
            <th width="100">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->brand }}</td>
            <!-- 'cpu', 'ram', 'storage', 'screen_size', 'battery', 'warranty', 'os', 'description' -->
            <td>{{ $p->cpu }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->active ? 'Còn bán': 'Ngừng bán'}}</td>
            <td class="table-td-center">
                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-id="{{ $p->id }}" data-toggle="modal" data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                </button>

            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--MODAL Update customer-->
@section('modal')
<!-- MODAL Update customer -->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Chỉnh sửa thông tin khách hàng</h5>
                        </span>
                    </div>
                </div>
                <!-- Form cập nhật khách hàng -->
                <form id="updateCustomerForm">
                    @csrf
                    <!-- <input type="hidden" id="customerId" name="id"> -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã KH</label>
                            <input class="form-control" type="text" id="customerId" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Họ và tên</label>
                            <input class="form-control" type="text" id="fullname" name="fullname" required>
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="number" id="phone" name="phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Địa chỉ email</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Ngày sinh</label>
                            <input class="form-control" type="date" id="dateOfBirth" name="dateOfBirth" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Bí mật</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-save">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal">Hủy bỏ</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


<script>
    $(document).ready(function() {
        // Khi click vào nút sửa, hiển thị modal với thông tin của khách hàng
        $(".edit").on("click", function() {
            var customerId = $(this).data('id'); // Lấy ID của khách hàng

            // Gọi AJAX để lấy dữ liệu khách hàng theo ID
            $.ajax({
                url: '/admin/customer/' + customerId + '/edit', // Route để lấy dữ liệu khách hàng
                type: 'GET',
                success: function(response) {
                    $('#customerId').val(response.id);
                    $('#fullname').val(response.fullname);
                    $('#address').val(response.address);
                    $('#phone').val(response.phone);
                    $('#email').val(response.email);


                    // Lấy ngày sinh và chuyển đổi sang định dạng yyyy-MM-dd
                    var dob = response.dateOfBirth; // lấy ngày từ server
                    var dateParts = dob.split(" ")[0].split("-"); // chia theo dấu cách để lấy phần ngày, sau đó chia theo "-"

                    // Kiểm tra độ dài mảng
                    if (dateParts.length === 3) {
                        var formattedDate = dateParts[0] + '-' + dateParts[1] + '-' + dateParts[2]; // định dạng lại thành yyyy-MM-dd
                        $('#dateOfBirth').val(formattedDate); // gán giá trị cho input
                    }

                    $('#gender').val(response.gender);
                    // $('#ModalUP').modal('show'); // Hiển thị modal
                },
                error: function(xhr) {
                    alert('Lỗi khi lấy thông tin khách hàng');
                    console.log(xhr.responseText); // Xem phản hồi từ server
                }
            });
        });

        $("#updateCustomerForm").on("submit", function(e) {
            e.preventDefault(); // Ngăn chặn việc gửi form mặc định
            var customerId = $('#customerId').val(); // Lấy ID từ hidden input
            var formData = $(this).serialize(); // Lấy dữ liệu từ form

            $.ajax({
                url: '/admin/customer/' + customerId, // Gọi đúng URL với ID
                type: 'PUT',
                data: formData, // Dữ liệu từ form
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function(response) {
                    // $('#ModalUP').modal('hide');
                    alert('Cập nhật thành công');
                    location.reload(); // Reload trang sau khi cập nhật thành công
                },
                error: function(xhr) {
                    alert('Cập nhật thất bại');
                }
            });
        });

    });
</script>
