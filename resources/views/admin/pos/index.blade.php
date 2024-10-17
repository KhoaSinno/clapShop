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
                                    <td>{{ number_format($product['price'], 0, ',', '.') }}₫</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
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
                        <div class="form-group  col-md-10">
                            <label class="control-label">Họ tên khách hàng</label>
                            <input class="form-control" type="text" placeholder="Tìm kiếm khách hàng">
                        </div>
                        <div class="form-group  col-md-2 d-flex justify-content-center align-items-center m-0 mt-3">
                            <!-- <label style="text-align: center;" class="control-label">Tạo mới</label> -->
                            <button class="btn btn-primary btn-them" data-toggle="modal" data-target="#exampleModalCenter"><i
                                    class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Địa chỉ đơn hàng</label>
                            <textarea class="form-control" rows="4" placeholder="Địa chỉ đơn hàng"></textarea>
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
                                <option>Trả tiền mặt tại quầy</option>
                                <option>Thanh toán chuyển khoản</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tổng cộng thanh toán: </label>
                            <p class="control-all-money">= 290.000 VNĐ</p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Khách hàng đưa tiền: </label>
                            <input class="form-control" type="number" value="300000">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Tiền thừa: </label>
                            <p class="control-all-money-total"> 10.000 VNĐ</p>
                        </div>
                        <div class="tile-footer col-md-12">
                            <button class="btn btn-primary luu-san-pham" type="button">Lưu đơn hàng</button>
                            <button class="btn btn-primary luu-va-in" type="button">Lưu và in hóa đơn</button>
                            <a class="btn btn-secondary luu-va-in" href="{{ route('admin.customer') }}">Quay về</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    @include('admin.footer')

    <script>
        function format_currencyVNĐ(price) {
            return price.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
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

            $.ajax({
                url: `/admin/pos/session/${productId}`, // Đảm bảo URL đúng
                method: 'POST', // Phương thức POST
                data: {
                    _token: '{{ csrf_token() }}' // Token CSRF để bảo mật
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
                            <td>${format_currencyVNĐ(product.price)}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <button class="btn btn-primary btn-sm deleteProSession" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `);
                        });
                    }

                    // Cập nhật tổng tiền và số lượng
                    $('#totalPrice').text(response.total);
                    $('#totalQuantity').text(response.totalQuantity);
                },
                error: function(xhr) {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại!');
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
                    $('#totalPrice').text(response.total);
                    $('#totalQuantity').text(response.totalQuantity);
                },
                error: function(xhr) {
                    alert('Đã xảy ra lỗi khi xóa sản phẩm. Vui lòng thử lại!');
                }
            });
        });
    </script>



</body>

</html>