@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="{{route('admin.order')}}" title="Thêm"><i class="fas fa-plus"></i>
        Tạo mới đơn hàng</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="form-group col-md-3">
        <label class="control-label">Admin</label>
        <input class="form-control" type="text" value="{{ $order->admin->fullname }}" disabled>
    </div>
    <!-- Khách hàng -->
    <div class="form-group  col-md-3">
        <label class="control-label">Khách hàng</label>
        <input class="form-control" type="text" value="{{ $order->user->fullname }}" disabled>
    </div>
    <div class="form-group  col-md-3">
        <label class="control-label">SĐT Khách hàng</label>
        <input class="form-control" type="text" value="{{ $order->user->phone }}" disabled>
    </div>
</div>
<div class="row">
    <div class="form-group  col-md-2">
        <label class="control-label">Mã đơn hàng</label>
        <input class="form-control" type="text" value="#{{$order->id}}" disabled>
    </div>
    <div class="form-group  col-md-3">
        <label class="control-label">Ngày tạo</label>
        <input class="form-control" type="text" value="{{ $order->created_at }}" disabled>
    </div>

    <div class="form-group  col-3">
        <label class="control-label">Phương thức thanh toán</label>
        <input class="form-control" type="text" value="{{getPaymentMethodText($order->paymentMethod) }}" disabled>
    </div>

    <div class="form-group  col-md-2">
        <label class="control-label">Tổng tiền</label>
        <input class="form-control" type="text" value="{{ format_currencyVNĐ($order->totalPrice) }}" disabled>
    </div>

    <div class="form-group col-12">
        <label class="control-label">Ghi chú đơn hàng</label>
        <input class="form-control" type="text" disabled>{{ $order->note }}</input>
    </div>

    <div class="form-group col-12">
        <label class="control-label">Địa chỉ nhận hàng</label>
        <textarea class="form-control" disabled>{{ $order->address }}</textarea>
    </div>


</div>

<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->details as $detail)
        <tr>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ format_currencyVNĐ($detail->price) }}</td>
            <td>{{ format_currencyVNĐ($detail->price * $detail->quantity) }}</td>
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
                    swal({
                        title: "Lỗi khi lấy thông tin khách hàng",
                        text: xhr.responseText, // Hiển thị tất cả lỗi
                        icon: "error",
                        button: "OK",
                    });
                    // alert('Lỗi khi lấy thông tin khách hàng');
                    // console.log(xhr.responseText); // Xem phản hồi từ server
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
                    // alert('Cập nhật thành công');
                    swal({
                        title: "Cập nhật thành công",
                        icon: "success",
                        button: "OK",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    // alert('Cập nhật thất bại');
                    swal({
                        title: "Cập nhật thất bại",
                        text: xhr.responseText,
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        });

    });
</script>