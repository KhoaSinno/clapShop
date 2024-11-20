@extends('admin.main_layout')

@section('function_nav')
<!-- <div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="{{route('admin.customer')}}" title="Thêm"><i class="fas fa-plus"></i>
        Tạo mới khách hàng</a>
</div> -->
@endsection

@section('content')
<div id="alert-container"></div> <!-- Hiển thị thông báo từ AJAX -->

<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th>Mã KH</th>
            <th width="150">Họ và tên</th>
            <th width="300">Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th width="100">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $cus)
        <tr>
            <td>{{ $cus->id }}</td> <!-- Mã khách hàng -->
            <td>{{ $cus->fullname }}</td> <!-- Họ và tên -->
            <td>{{ $cus->address }}</td> <!-- Địa chỉ -->
            <td>{{ $cus->phone }}</td> <!-- SĐT -->
            <td>{{ $cus->email }}</td> <!-- Email -->
            <td>{{ \Carbon\Carbon::parse($cus->dateOfBirth)->format('d-m-Y') }}</td> <!-- Ngày sinh -->
            <td>{{ $cus->gender }}</td> <!-- Giới tính -->
            <td class="table-td-center">
                <!-- <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                    data-toggle="modal" data-id="{{ $cus->id }}"><i class="fas fa-edit"></i>
                </button> -->
                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-id="{{ $cus->id }}" data-toggle="modal" data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                </button>

            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection



<!--MODAL Update customer-->
@section('modal')
<!-- MODAL Update customer -->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã KH</label>
                            <input class="form-control" type="text" id="customerId" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Họ và tên</label>
                            <input class="form-control" type="text" id="fullname" name="fullname">
                            <div class="text-danger" id="fullnameError"></div> <!-- Thêm thẻ để hiển thị lỗi -->
                        </div>
                        <div class="form-group col-12">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                            <div class="text-danger" id="addressError"></div> <!-- Thêm thẻ để hiển thị lỗi -->
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="number" id="phone" name="phone">
                            <div class="text-danger" id="phoneError"></div> <!-- Thêm thẻ để hiển thị lỗi -->
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Địa chỉ email</label>
                            <input class="form-control" type="email" id="email" name="email">
                            <div class="text-danger" id="emailError"></div> <!-- Thêm thẻ để hiển thị lỗi -->
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Ngày sinh</label>
                            <input class="form-control" type="date" id="dateOfBirth" name="dateOfBirth">
                            <div class="text-danger" id="dateOfBirthError"></div> <!-- Thêm thẻ để hiển thị lỗi -->
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Bí mật</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-save">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" id="btnCloseFm">Hủy bỏ</a>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                },
                error: function(xhr) {
                    swal({
                            title: "Lỗi khi lấy thông tin khách hàng",
                            text: xhr.responseText,
                            icon: "error",
                            button: "OK",
                        });
                    // alert('Lỗi khi lấy thông tin khách hàng');
                    // console.log(xhr.responseText);
                }
            });
        });

        $("#updateCustomerForm").on("submit", function(e) {
            e.preventDefault(); // Ngăn chặn việc gửi form mặc định

            // Lấy giá trị từ form
            var customerId = $('#customerId').val();
            var fullname = $('#fullname').val().trim();
            var address = $('#address').val().trim();
            var phone = $('#phone').val().trim();
            var email = $('#email').val().trim();
            var dateOfBirth = $('#dateOfBirth').val();
            var gender = $('#gender').val();

            // Xóa thông báo lỗi cũ
            $('.text-danger').html('').removeClass('d-none');

            // Xóa viền lỗi cũ
            $('.form-control').removeClass('input-error');

            // Kiểm tra dữ liệu hợp lệ
            var errors = [];

            if (fullname === "") {
                errors.push("Họ và tên không được để trống.");
                $('#fullnameError').html("Họ và tên không được để trống.").removeClass('d-none');
                $('#fullname').addClass('input-error'); // Thêm viền đỏ cho ô này
            }
            if (address === "") {
                errors.push("Địa chỉ không được để trống.");
                $('#addressError').html("Địa chỉ không được để trống.").removeClass('d-none');
                $('#address').addClass('input-error'); // Thêm viền đỏ cho ô này
            }
            var phonePattern = /^[0-9]{10}$/; // Ví dụ kiểm tra số điện thoại có 10 chữ số
            if (!phonePattern.test(phone)) {
                errors.push("Số điện thoại không hợp lệ.");
                $('#phoneError').html("Số điện thoại không hợp lệ.").removeClass('d-none');
                $('#phone').addClass('input-error'); // Thêm viền đỏ cho ô này
            }
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Kiểm tra định dạng email
            if (!emailPattern.test(email)) {
                errors.push("Email không hợp lệ.");
                $('#emailError').html("Email không hợp lệ.").removeClass('d-none');
                $('#email').addClass('input-error'); // Thêm viền đỏ cho ô này
            }
            if (dateOfBirth === "") {
                errors.push("Ngày sinh không được để trống.");
                $('#dateOfBirthError').html("Ngày sinh không được để trống.").removeClass('d-none');
                $('#dateOfBirth').addClass('input-error'); // Thêm viền đỏ cho ô này
            }

            // Nếu có lỗi, hiển thị thông báo và dừng lại
            if (errors.length > 0) {
                return; // Dừng không gửi form nếu có lỗi
            }

            // Tạo dữ liệu form để gửi qua AJAX
            var formData = $(this).serialize();

            // Gọi AJAX để cập nhật khách hàng
            $.ajax({
                url: '/admin/customer/' + customerId, // Gọi đúng URL với ID
                type: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        // Cập nhật trực tiếp thông tin trên bảng
                        const row = $(`button[data-id="${customerId}"]`).closest('tr');
                        row.find('td:nth-child(2)').text(response.data.fullname); // Cập nhật Họ và tên
                        row.find('td:nth-child(3)').text(response.data.address); // Cập nhật Địa chỉ
                        row.find('td:nth-child(4)').text(response.data.phone); // Cập nhật SĐT
                        row.find('td:nth-child(5)').text(response.data.email); // Cập nhật Email
                        row.find('td:nth-child(6)').text(response.data.dateOfBirth); // Cập nhật Ngày sinh
                        row.find('td:nth-child(7)').text(response.data.gender); // Cập nhật Giới tính

                        // Hiển thị thông báo thành công
                        $('#alert-container').html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response.message}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);

                        // Tự động ẩn thông báo sau 5 giây
                        setTimeout(function() {
                            $('#alert-container .alert').alert('close'); // Đóng thông báo
                        }, 5000); // 5000 milliseconds = 5 seconds

                        // Đóng modal và xóa lớp phủ modal
                        jQuery('#ModalUP').modal('hide');
                        $('.modal-backdrop.fade.show').remove();
                    } else {
                        // Hiển thị thông báo lỗi từ server
                        $('#error-container').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${response.message}
                    </div>
                `).removeClass('d-none');
                    }
                },
                error: function(xhr) {
                    // Hiển thị lỗi chung khi có vấn đề với yêu cầu AJAX
                    $('#error-container').html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Cập nhật thất bại. Vui lòng thử lại sau.
                </div>
            `).removeClass('d-none');
                }
            });
        });

    });
</script>
@endsection
