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
            <li><a class="app-nav__item" href="{{route('customer.home')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->

    <main class="app app-ban-hang mt-2">
        <div>
            <a class="btn btn-warning py-1 px-4 text-danger mb-3" href="{{ route('admin.customer') }}">
                < Quay về</a>
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
                    <!-- <input type="text" id="myInput" onkeyup="myFunction()"
                        placeholder="Nhập mã sản phẩm hoặc tên sản phẩm để tìm kiếm..."> -->
                    <input type="text" id="myInput" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm để tìm kiếm...">
                    <div id="searchResults"></div> <!-- Phần kết quả tìm kiếm sẽ hiển thị ở đây -->

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Mã hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th width="10">Số lượng</th>
                                <th>Giá bán</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="table table-hover table-bordered" id="productList">
                            <!-- Phần này sẽ được điền bằng AJAX -->
                        </tbody>
                    </table>

                    <div class="alert">
                        <i class="fas fa-exclamation-triangle"></i> Gõ mã hoặc tên sản phẩm vào thanh tìm kiếm để thêm hàng vào đơn
                        hàng
                    </div>

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
                            <tbody class="table table-hover table-bordered" id="productListResult">
                                @if(!empty($cart))
                                @foreach($cart as $id => $product)
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td>{{ $product['name'] }}</td>
                                    <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" width="50px"></td>
                                    <td><input class="so--luong1" type="number" disabled value="{{ $product['quantity'] }}" min="1"></td>
                                    <td>{{ number_format($product['price'], 0, ',', '.') }} VND</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm deleteProSession" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" style="text-align: center;">Giỏ hàng trống</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile">
                    <h3 class="tile-title">Thông tin thanh toán</h3>
                    <div class="row">

                        <div class="form-group col-md-10">
                            <label class="control-label ">SĐT khách hàng <span class="text-danger">*</span></label>
                            <div class="d-flex justify-content-end align-items-center">
                                <input class="form-control mr-3" type="text" id="customerPhone" name="customerPhone" placeholder="Tìm kiếm khách hàng bằng SĐT" required>
                                <div class="form-group col-md-2 d-flex justify-content-center align-items-center m-0 ">
                                    <button class="btn btn-primary btn-them cursor-pointer text-white m-0" id="checkCustomerPhone">
                                        Kiểm tra
                                    </button>
                                </div>
                            </div>
                            <h5 id="phoneMessage" class="form-text text-success "></h5> <!-- Hiển thị thông báo -->

                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Địa chỉ đơn hàng <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Địa chỉ đơn hàng" required></textarea>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Ghi chú đơn hàng</label>
                            <textarea name="note" class="form-control" rows="2" placeholder="Ghi chú thêm đơn hàng"></textarea>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label class="control-label">Hình thức thanh toán</label>
                            <select class="form-control" id="paymentMethod" required>
                                <option value="cash">Thanh toán tại quầy</option>
                                <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tổng cộng thanh toán: </label>
                            <p class="control-all-money" id="totalPrice">0đ</p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Khách hàng đưa tiền: </label>
                            <input class="form-control" type="number" id="totalInUser" value=0>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tiền thừa: </label>
                            <p class="control-all-money-total" id="change"></p>
                        </div>
                        <div class="form-group col-md-6">
                            <button class="btn btn-primary luu-san-pham" type="button">Lưu đơn hàng</button>
                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label class="control-label"></label>
                            <button class="btn btn-success mt-3 cursor-pointer">Tính</button>
                        </div> -->
                        <!--
                        <div class="tile-footer col-md-12 d-flex gap-2">
                            <button class="btn btn-primary luu-san-pham w-50" type="button">Lưu đơn hàng</button>
                            <button class="btn btn-primary luu-va-in" type="button">Lưu và in hóa đơn</button>
                            <a class="btn btn-secondary luu-va-in w-50" href="{{ route('admin.customer') }}">Quay về</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- Modal 'Add new customer' -->
    <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm khách hàng mới</h5>
                            </span>
                        </div>
                    </div>
                    <form id="AddCustomerForm">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Họ và tên</label>
                                <input class="form-control" type="text" id="fullname" name="fullname">
                                <div class="text-danger" id="fullnameError"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Số điện thoại</label>
                                <input class="form-control" type="number" id="phone" name="phone">
                                <div class="text-danger" id="phoneError"></div>
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

    @include('admin.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function format_currencyVNĐ(price) {
            // Kiểm tra giá trị price không phải undefined, null, và là một số
            if (price !== undefined && price !== null && !isNaN(price)) {
                return price.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
            } else {
                // Nếu giá trị không hợp lệ, trả về chuỗi mặc định '0đ'
                return '0đ';
            }
        }


        $(document).ready(function() {
            let timer;

            // Bắt sự kiện keyup và delay để tránh gửi request liên tục
            $('#myInput').on('keyup', function() {
                clearTimeout(timer); // Xóa timer trước đó nếu có
                let query = $(this).val(); // Lấy giá trị tìm kiếm

                // Đặt delay trước khi gửi request
                timer = setTimeout(function() {
                    if (query.length > 0) {
                        $.ajax({
                            url: "{{ route('admin.search.product') }}", // Gọi route tìm kiếm
                            method: "GET",
                            data: {
                                query: query
                            }, // Gửi từ khóa tìm kiếm
                            success: function(response) {
                                $('#productList').html(response); // Hiển thị dữ liệu tìm kiếm trong tbody
                            }
                        });
                    } else {
                        $('#productList').html('<tr><td colspan="6">Vui lòng nhập để tìm kiếm</td></tr>');
                    }
                }, 300); // 300ms delay
            });
        });

        $(document).on('click', '.add-to-cart', function(e) {
            e.preventDefault(); // Ngăn hành vi mặc định của thẻ

            var productId = $(this).data('id'); // Lấy ID sản phẩm từ data-id
            var productListQuantity = $(`.productList-quantity[data-id="${productId}"]`).val();
            $.ajax({
                url: `/admin/pos/session/${productId}`, // Đảm bảo URL đúng
                method: 'POST', // Phương thức POST
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF để bảo mật
                    productListQuantity: productListQuantity
                },
                success: function(response) {
                    if (response.cart) {
                        // Cập nhật danh sách sản phẩm
                        $('#productListResult').empty();

                        $.each(response.cart, function(id, product) {
                            $('#productListResult').append(`
                        <tr>
                            <td>${id}</td>
                            <td>${product.name}</td>
                            <td><img src="${product.image}" alt="${product.name}" width="50px"></td>
                            <td><input class="so--luong1" type="text" disabled value="${product.quantity}" min="1"></td>
                            <td>${format_currencyVNĐ(product.price * product.quantity)}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <button class="btn btn-primary btn-sm deleteProSession" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `);
                        });
                    }

                    // Cập nhật tổng tiền và số lượng
                    // $('#totalPrice').text(response.total);
                    // $('#totalPrice').text(format_currencyVNĐ(response.total));
                    $('#totalPrice')
                        .text(format_currencyVNĐ(response.total)) // Hiển thị với định dạng
                        .data('total', response.total); // Lưu giá trị gốc không định dạng
                    $('#totalQuantity').text(response.totalQuantity);
                },
                error: function(xhr) {
                    if (xhr.status === 400 && xhr.responseJSON && xhr.responseJSON.error) {
                        alert(xhr.responseJSON.error);
                    } else {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại!');
                    }
                }
            });
        });

        // Xử lý sự kiện khi bấm nút "Xóa"
        $(document).on('click', '.deleteProSession', function(e) {
            e.preventDefault();

            var productId = $(this).closest('tr').find('td:first').text(); // Lấy ID sản phẩm từ hàng đầu tiên của bảng

            $.ajax({
                url: `/admin/pos/session/remove/${productId}`, // Đường dẫn API để xóa sản phẩm khỏi session
                method: 'POST', // Phương thức POST
                data: {
                    _token: '{{ csrf_token() }}' // Token CSRF để bảo mật
                },
                success: function(response) {
                    if (response.cart) {
                        // Xóa dòng sản phẩm từ bảng
                        $('#productListResult').empty();

                        // Cập nhật danh sách sản phẩm mới
                        $.each(response.cart, function(id, product) {
                            $('#productListResult').append(`
                        <tr>
                            <td>${id}</td>
                            <td>${product.name}</td>
                            <td><img src="${product.image}" alt="${product.name}" width="50px"></td>
                            <td><input class="so--luong1" type="text" disabled value="${product.quantity}" min="1"></td>
                            <td>${format_currencyVNĐ(product.price)}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <button class="btn btn-primary btn-sm deleteProSession" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `);
                        });
                    }

                    // Cập nhật tổng tiền và số lượng
                    $('#totalPrice').text(format_currencyVNĐ(response.totalPrice));
                    $('#totalQuantity').text(response.totalQuantity);
                },
                error: function(xhr) {
                    alert('Đã xảy ra lỗi khi xóa sản phẩm. Vui lòng thử lại!');
                }
            });
        });

        $(document).ready(function() {
            $('#checkCustomerPhone').on('click', function(e) {
                e.preventDefault();

                var phone = $('#customerPhone').val(); // Lấy giá trị số điện thoại từ input
                var _token = '{{ csrf_token() }}'; // CSRF token cho AJAX

                $.ajax({
                    url: '/admin/check-customer', // URL kiểm tra số điện thoại
                    method: 'POST',
                    data: {
                        phone: phone,
                        _token: _token
                    },
                    success: function(response) {
                        if (response.exists) {
                            // Nếu khách hàng đã tồn tại
                            $('#phoneMessage').text('Khách hàng đã có tài khoản').css('color', 'green');
                            $('#customerPhone').css('border', '2px solid green');
                        } else {
                            $('#customerPhone').css('border', '2px solid red');
                            $('#phoneMessage').text('Khách hàng cần tạo tài khoản').css('color', 'red !important');

                            // Nếu khách hàng không tồn tại, hiển thị cảnh báo yêu cầu tạo khách hàng
                            swal({
                                title: "Tạo khách hàng mới",
                                text: "Khách hàng chưa có tài khoản, bạn muốn tạo mới không?",
                                buttons: ["Hủy", "Đồng ý"],
                            }).then((willCreate) => {
                                if (willCreate) {
                                    // Mở modal bằng cách sử dụng data-toggle
                                    $('#ModalUP').modal('show');
                                }
                            });
                        }
                    },
                    error: function() {
                        $('#phoneMessage').text('Có lỗi xảy ra. Vui lòng thử lại.').css('color', 'red');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#AddCustomerForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định của form

                // Lấy dữ liệu từ form
                var formData = {
                    fullname: $('#fullname').val(),
                    phone: $('#phone').val(),
                    // username: $('#phone').val(), // Thêm trường username
                    _token: $('input[name="_token"]').val()
                };


                // Gửi yêu cầu AJAX
                $.ajax({
                    url: '/admin/create-customer', // Đường dẫn tới route xử lý
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Hiển thị thông báo thành công
                        swal("Thành công!", "Khách hàng đã được tạo thành công!", "success");

                        // Đóng modal
                        $('#ModalUP').modal('hide');

                        // Thực hiện các hành động khác như làm mới danh sách khách hàng nếu cần
                        // location.reload(); // Ví dụ, làm mới trang để thấy danh sách khách hàng mới
                    },
                    error: function(xhr) {
                        // Xử lý lỗi từ server
                        if (xhr.status === 422) { // Kiểm tra lỗi validate
                            var errors = xhr.responseJSON.errors;
                            $('#fullnameError').text(errors.fullname ? errors.fullname[0] : '');
                            $('#phoneError').text(errors.phone ? errors.phone[0] : '');
                        } else {
                            swal("Có lỗi!", "Đã xảy ra lỗi. Vui lòng thử lại.", "error");
                        }
                    }
                });
            });
        });

        // $('.luu-san-pham').click(function() {
        //     var formData = {
        //         customerPhone: $('#customerPhone').val(),
        //         address: $('textarea[name="address"]').val(),
        //         note: $('textarea[name="note"]').val(),
        //         paymentMethod: $('#paymentMethod').val(),
        //         _token: $('meta[name="csrf-token"]').attr('content')
        //     };

        //     $.ajax({
        //         url: '/admin/order/create',
        //         method: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             if (response.success) {
        //                 swal({
        //                     title: "Thành công!",
        //                     text: "Đơn hàng đã được tạo thành công!",
        //                     icon: "success",
        //                     button: "OK",
        //                 }).then(() => {
        //                     // Xử lý sau khi lưu đơn hàng thành công
        //                     window.location.reload();
        //                 });
        //             } else {
        //                 swal({
        //                     title: "Lỗi",
        //                     text: "Có lỗi xảy ra, vui lòng thử lại!",
        //                     icon: "error",
        //                     button: "OK",
        //                 });
        //             }
        //         },
        //         error: function(response) {
        //             alert('Có lỗi xảy ra, vui lòng thử lại!');
        //         }
        //     });
        // });

        $('.luu-san-pham').click(function() {
            var formData = {
                customerPhone: $('#customerPhone').val(),
                address: $('textarea[name="address"]').val(),
                note: $('textarea[name="note"]').val(),
                paymentMethod: $('#paymentMethod').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                url: '/admin/order/create',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        swal({
                            title: "Thành công!",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        }).then(() => {
                            setTimeout(function() {
                                location.reload();
                            }, 1500);

                        });
                    } else {
                        swal({
                            title: "Lỗi",
                            text: "Có lỗi xảy ra, vui lòng thử lại!",
                            icon: "error",
                            button: "OK",
                        });
                    }
                },
                error: function(response) {
                    if (response.status === 422) { // Lỗi xác thực
                        let errors = response.responseJSON.errors; // Lấy lỗi từ response
                        let errorMessages = '';
                        for (let field in errors) {
                            errorMessages += errors[field].join('\n') + '\n'; // Gộp các lỗi
                        }

                        swal({
                            title: "Lỗi xác thực",
                            text: errorMessages.trim(), // Hiển thị tất cả lỗi
                            icon: "error",
                            button: "OK",
                        });
                    } else {
                        swal({
                            title: "Lỗi",
                            text: "Có lỗi xảy ra, vui lòng thử lại!",
                            icon: "error",
                            button: "OK",
                        });
                    }
                }
            });
        });
    </script>
    <!-- tính tiền thừa -->
    <script>
        // Hàm tính tiền thừa
        function calculateChange() {
            // Lấy giá trị tổng cộng thanh toán từ data attribute (không định dạng)
            const totalPrice = parseFloat($('#totalPrice').data('total')) || 0;

            // Lấy giá trị tiền khách hàng đưa
            const totalInUser = parseFloat(document.getElementById('totalInUser').value) || 0;

            // Tính tiền thừa
            const change = totalInUser - totalPrice;

            // Hiển thị tiền thừa với định dạng VNĐ
            document.getElementById('change').textContent = change >= 0 ? format_currencyVNĐ(change) : 'Không đủ tiền';
        }

        // Gán sự kiện khi người dùng thay đổi giá trị trong input
        document.getElementById('totalInUser').addEventListener('input', calculateChange);

        // Gọi hàm tính toán khi trang được tải để hiển thị kết quả ban đầu
        calculateChange();
    </script>


</body>

</html>