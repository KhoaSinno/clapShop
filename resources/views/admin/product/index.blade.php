@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <button class="btn btn-add btn-sm" title="Thêm" data-toggle="modal" data-target="#ModalCRE">
        <i class="fas fa-plus"></i>
        Tạo mới sản phẩm
    </button>

</div>
            <!-- MODAL Create customer -->
            <div class="modal fade" id="ModalCRE" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Them thông tin san pham</h5>
                                </span>
                            </div>
                        </div>
                        <form id="CreateCustomer">
                            @csrf
                            <!-- <input type="hidden" id="customerId" name="id"> -->
                            <div class="row">
                               <!-- ten san pham -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ten san pham</label>
                                    <input class="form-control" type="text" id="product" name="name" >
                                </div>
                                <!-- danh muc san pham -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">Danh muc san pham</label>
                                    <input class="form-control" type="text" id="category" name="category" required >
                                </div>
                                <!-- cpu -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CPU</label>
                                    <input class="form-control" type="text" id="cpu" name="cpu" required >
                                </div>
                                <!-- ram -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">RAM</label>
                                    <input class="form-control" type="text" id="ram" name="ram" required >
                                </div>
                                <!-- storage -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">STORAGE</label>
                                    <input class="form-control" type="text" id="storage" name="storage" required >
                                </div>
                                <!-- screen -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">SCREEN</label>
                                    <input class="form-control" type="text" id="screen" name="screen" required >
                                </div>
                                <!-- card -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CARD</label>
                                    <input class="form-control" type="text" id="card" name="card" required >
                                </div>
                                <!-- connector -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CONNECTOR</label>
                                    <input class="form-control" type="text" id="connector" name="connector" required >
                                </div>
                                <!-- weight -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">WEIGHT</label>
                                    <input class="form-control" type="text" id="weight" name="weight" required >
                                </div>
                                <!-- keyboard -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">KEYBOARD</label>
                                    <input class="form-control" type="text" id="keyboard" name="keyboard" required>
                                </div>
                                <!-- battery -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">BATTERY</label>
                                    <input class="form-control" type="text" id="battery" name="battery" required >
                                </div>
                                <!-- os -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">OS</label>
                                    <input class="form-control" type="text" id="os" name="os" required >
                                </div>
                                <!-- material -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">MATERIAL</label>
                                    <input class="form-control" type="text" id="material" name="material" required >
                                </div>
                                <!-- stock -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">STOCK</label>
                                    <input class="form-control" type="text" id="stock" name="stock" required >
                                </div>

                                <div class="form-group col-12">
                                    <label class="control-label">Mo ta chi tiet</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-save">Them</button>
                            <a class="btn btn-cancel" data-dismiss="modal">Hủy bỏ</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th>Mã SP</th>
            <th width="150">Tên SP</th>
            <th width="150">Thương hiệu</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Hoạt động</th>
            <th width="100">Tính năng</th>
        </tr>
    </thead>
    <tbody>

        @foreach($products as $p)
        <!-- MODAL Update customer -->
        <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <span class="thong-tin-thanh-toan">
                                    <h5>Chỉnh sửa thông tin san pham</h5>
                                </span>
                            </div>
                        </div>
                        <!-- Form cập nhật khách hàng -->
                        <form action="{{ route('admin.product.update', ['id' => $p->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- <input type="hidden" id="customerId" name="id"> -->
                            <div class="row">
                               <!-- ten san pham -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ten san pham</label>
                                    <input class="form-control" type="text" id="product" name="name" value="{{$p->name}}">
                                </div>
                                <!-- danh muc san pham -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">Danh muc san pham</label>
                                    <input class="form-control" type="text" id="category" name="category" required value="{{$p->category->name}}">
                                </div>
                                <!-- cpu -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CPU</label>
                                    <input class="form-control" type="text" id="cpu" name="cpu" required value="{{$p->cpu}}">
                                </div>
                                <!-- ram -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">RAM</label>
                                    <input class="form-control" type="text" id="ram" name="ram" required value="{{$p->ram}}">
                                </div>
                                <!-- storage -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">STORAGE</label>
                                    <input class="form-control" type="text" id="storage" name="storage" required value="{{$p->storage}}">
                                </div>
                                <!-- screen -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">SCREEN</label>
                                    <input class="form-control" type="text" id="screen" name="screen" required value="{{$p->screen}}">
                                </div>
                                <!-- card -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CARD</label>
                                    <input class="form-control" type="text" id="card" name="card" required value="{{$p->card}}">
                                </div>
                                <!-- connector -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">CONNECTOR</label>
                                    <input class="form-control" type="text" id="connector" name="connector" required value="{{$p->connector}}">
                                </div>
                                <!-- weight -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">WEIGHT</label>
                                    <input class="form-control" type="text" id="weight" name="weight" required value="{{$p->weight}}">
                                </div>
                                <!-- keyboard -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">KEYBOARD</label>
                                    <input class="form-control" type="text" id="keyboard" name="keyboard" required value="{{$p->keyboard}}">
                                </div>
                                <!-- battery -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">BATTERY</label>
                                    <input class="form-control" type="text" id="battery" name="battery" required value="{{$p->battery}}">
                                </div>
                                <!-- os -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">OS</label>
                                    <input class="form-control" type="text" id="os" name="os" required value="{{$p->os}}">
                                </div>
                                <!-- material -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">MATERIAL</label>
                                    <input class="form-control" type="text" id="material" name="material" required value="{{$p->material}}">
                                </div>
                                <!-- stock -->
                                <div class="form-group col-md-6">
                                    <label class="control-label">STOCK</label>
                                    <input class="form-control" type="text" id="stock" name="stock" required value="{{$p->stock}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="control-label">Mo ta chi tiet</label>
                                    <textarea class="form-control" id="description" name="description" required>{{$p->description }}</textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-save">Cap nhat</button>
                            <a class="btn btn-cancel" data-dismiss="modal">Hủy bỏ</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <!-- 'cpu', 'ram', 'storage', 'screen_size', 'battery', 'warranty', 'os', 'description' -->
            <td>{{ $p->price }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->active ? 'Còn bán': 'Ngừng bán'}}</td>
            <td class="table-td-center">
                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-id="{{ $p->id }}" data-toggle="modal" data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm delete" type="button" title="Xóa" data-id="{{ $p->id }}">
                    <i class="fas fa-trash-alt"></i>
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


@endsection


<!-- <script>
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
</script> -->
