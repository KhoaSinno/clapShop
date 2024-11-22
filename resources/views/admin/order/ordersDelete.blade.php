@extends('admin.main_layout')

@section('function_nav')

@endsection

@section('content')
<h2 class="text-center bg-danger py-2">Đơn hàng đã hủy</h2>
<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th width="20">Mã ĐH</th>
            <th width="190">Khách hàng</th>
            <th width="250">Địa chỉ</th>
            <th width="10">Tổng SL</th>
            <th width="220">Thời gian</th>
            <th width="100">Tổng giá</th>
            <th width="180">Trạng thái</th>
            <th width="200">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $od)
        <tr>
            <td id="orderId">#{{ $od->id }}</td>
            <td>{{ $od->user ? $od->user->fullname : 'Khách không đăng ký' }}</td>
            <td width="300">{{ $od->address }}</td>
            <td>{{ $od->totalQuantity }}</td>
            <td>{{ $od->created_at }}</td>
            <td>{{ format_currencyVNĐ($od->totalPrice)  }}</td>
            <td class="font-weight-bold  {{returnCssStatus($od->status)}}">{{ returnStatus($od->status) }}</td>
            <td class="table-td-center d-flex justify-content-center align-items-stretch gap-x-2">
                <a class="btn btn-info btn-sm mx-1" href="{{route('admin.order.view', $od->id)}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection


@section('modal')
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Chỉnh sửa địa chỉ khách hàng</h5>
                        </span>
                    </div>
                </div>
                <!-- Form cập nhật địa chỉ -->
                <form id="updateOrderForm" method="POST">
                    @csrf
                    <input type="hidden" id="orderId" name="orderId">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
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


@section('footer')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".edit").on("click", function() {
            var orderId = $(this).data('id'); // Lấy ID của đơn hàng

            // Gọi AJAX để lấy dữ liệu đơn hàng theo ID
            $.ajax({
                url: '/admin/order/edit/' + orderId, // Route để lấy thông tin đơn hàng
                type: 'GET',
                success: function(response) {
                    $('#address').val(response.address); // Gán địa chỉ vào form
                    $('#orderId').val(orderId); // Gán orderId vào hidden input
                    // $('#orderId').val(response.id);

                    $('#ModalUP').modal('show'); // Hiển thị modal
                },
                error: function(xhr) {
                    alert('Lỗi khi lấy thông tin địa chỉ đơn hàng');
                    console.log(xhr.responseText); // Xem phản hồi từ server
                }
            });
        });


        $("#updateOrderForm").on("submit", function(e) {
            e.preventDefault(); // Ngăn chặn việc gửi form mặc định
            var orderId = $('#orderId').val(); // Lấy ID từ hidden input
            var formData = $(this).serialize(); // Lấy dữ liệu từ form

            $.ajax({
                url: '/admin/order/update/' + orderId, // Gọi đúng URL với ID
                type: 'PUT',
                data: formData, // Dữ liệu từ form
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function(response) {
                    // $('#ModalUP').modal('hide');
                    // alert('Cập nhật thành công');
                    swal({
                        title: "Cập nhật thành công.",
                        icon: "success",
                        button: "OK",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    alert('Cập nhật thất bại');
                }
            });
        });

    });
</script>
@endsection