@extends('admin.main_layout')

@section('function_nav')
<!-- <div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
        Tạo mới đơn hàng</a>
</div> -->
@endsection

@section('content')
<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th width="20">Mã ĐH</th>
            <th width="150">Khách hàng</th>
            <th width="250">Địa chỉ</th>
            <th width="10">Tổng SL</th>
            <th>Thời gian</th>
            <th width="100">Tổng giá</th>
            <th>Trạng thái</th>
            <th width="200">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendingOrders as $od)
        <tr>
            <td>#{{ $od->id }}</td>
            <td>{{ $od->user ? $od->user->fullname : 'Khách không đăng ký' }}</td>
            <td width="300">{{ $od->address }}</td>
            <td>{{ $od->totalQuantity }}</td>
            <td>{{ $od->created_at }}</td>
            <td>{{ format_currencyVNĐ($od->totalPrice)  }}</td>
            <td>{{ $od->status}}</td>
            <td class="table-td-center d-flex justify-content-center align-items-stretch gap-x-2">
                <button class="btn btn-primary btn-sm edit mr-1" type="button" title="Sửa" data-id="{{ $od->id }}" data-toggle="modal" data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                </button>
                <a class="btn btn-info btn-sm mx-1" href="{{route('admin.order.view', $od->id)}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                <a class="btn btn-success btn-sm mx-1" href="{{route('admin.order.view', $od->id)}}"><i class="fa fa-check" aria-hidden="true"></i></a>
                <a class="btn btn-danger btn-sm ml-1" href="{{route('admin.order.view', $od->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
<h2 class="text-center bg-success py-2 mt-3">Đơn hàng đã duyệt</h2>

<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr class="text-center">
            <th width="10">Mã ĐH</th>
            <th width="150">Khách hàng</th>
            <th width="250">Địa chỉ</th>
            <th width="10">Tổng SL</th>
            <th>Thời gian</th>
            <th>Tổng giá</th>
            <th>Trạng thái</th>
            <th width="150">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($successOrders as $od)
        <tr>
            <td>#{{ $od->id }}</td>
            <td>{{ $od->user ? $od->user->fullname : 'Khách không đăng ký' }}</td>
            <td width="300">{{ $od->address }}</td>
            <td>{{ $od->totalQuantity }}</td>
            <td>{{ $od->created_at }}</td>
            <td width="100">{{ format_currencyVNĐ($od->totalPrice)  }}</td>
            <td>{{ $od->status}}</td>
            <td class="table-td-center">
                <a class="btn btn-info btn-sm mx-1" href="{{route('admin.order.view', $od->id)}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
                url: '/admin/customers/' + customerId + '/edit', // Route để lấy dữ liệu khách hàng
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
                url: '/admin/customers/' + customerId, // Gọi đúng URL với ID
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
