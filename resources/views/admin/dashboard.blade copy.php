@extends('admin.main_layout')

@section('content')
<div class="row">
    <!--Left-->
    <div class="col-md-12 col-lg-6">
        <div class="row">
            <!-- col-6 -->
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                    <div class="info">
                        <h4>Tổng khách hàng</h4>
                        <p><b>56 khách hàng</b></p>
                        <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                    </div>
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-md-6">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                    <div class="info">
                        <h4>Tổng sản phẩm</h4>
                        <p><b>1850 sản phẩm</b></p>
                        <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                    </div>
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-md-6">
                <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                    <div class="info">
                        <h4>Tổng đơn hàng</h4>
                        <p><b>247 đơn hàng</b></p>
                        <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                    </div>
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-md-6">
                <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                    <div class="info">
                        <h4>Sắp hết hàng</h4>
                        <p><b>4 sản phẩm</b></p>
                        <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
                    </div>
                </div>
            </div>
            <!-- col-12 -->
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tình trạng đơn hàng</h3>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>AL3947</td>
                                    <td>Phạm Thị Ngọc</td>
                                    <td>
                                        19.770.000 đ
                                    </td>
                                    <td><span class="badge bg-info">Chờ xử lý</span></td>
                                </tr>
                                <tr>
                                    <td>ER3835</td>
                                    <td>Nguyễn Thị Mỹ Yến</td>
                                    <td>
                                        16.770.000 đ
                                    </td>
                                    <td><span class="badge bg-warning">Đang vận chuyển</span></td>
                                </tr>
                                <tr>
                                    <td>MD0837</td>
                                    <td>Triệu Thanh Phú</td>
                                    <td>
                                        9.400.000 đ
                                    </td>
                                    <td><span class="badge bg-success">Đã hoàn thành</span></td>
                                </tr>
                                <tr>
                                    <td>MT9835</td>
                                    <td>Đặng Hoàng Phúc </td>
                                    <td>
                                        40.650.000 đ
                                    </td>
                                    <td><span class="badge bg-danger">Đã hủy </span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- / div trống-->
                </div>
            </div>
            <!-- / col-12 -->
            <!-- col-12 -->
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Khách hàng mới</h3>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#183</td>
                                    <td>Hột vịt muối</td>
                                    <td>21/7/1992</td>
                                    <td><span class="tag tag-success">0921387221</span></td>
                                </tr>
                                <tr>
                                    <td>#219</td>
                                    <td>Bánh tráng trộn</td>
                                    <td>30/4/1975</td>
                                    <td><span class="tag tag-warning">0912376352</span></td>
                                </tr>
                                <tr>
                                    <td>#627</td>
                                    <td>Cút rang bơ</td>
                                    <td>12/3/1999</td>
                                    <td><span class="tag tag-primary">01287326654</span></td>
                                </tr>
                                <tr>
                                    <td>#175</td>
                                    <td>Hủ tiếu nam vang</td>
                                    <td>4/12/20000</td>
                                    <td><span class="tag tag-danger">0912376763</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- / col-12 -->
        </div>
    </div>
    <!--END left-->
    <!--Right-->
    <div class="col-md-12 col-lg-6">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--END right-->
</div>
@endsection

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('footer')
<script type="text/javascript">
    var data = {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
        datasets: [{
                label: "Dữ liệu đầu tiên",
                fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
                strokeColor: "rgb(255, 212, 59)",
                pointColor: "rgb(255, 212, 59)",
                pointStrokeColor: "rgb(255, 212, 59)",
                pointHighlightFill: "rgb(255, 212, 59)",
                pointHighlightStroke: "rgb(255, 212, 59)",
                data: [20, 59, 90, 51, 56, 100]
            },
            {
                label: "Dữ liệu kế tiếp",
                fillColor: "rgba(9, 109, 239, 0.651)  ",
                pointColor: "rgb(9, 109, 239)",
                strokeColor: "rgb(9, 109, 239)",
                pointStrokeColor: "rgb(9, 109, 239)",
                pointHighlightFill: "rgb(9, 109, 239)",
                pointHighlightStroke: "rgb(9, 109, 239)",
                data: [48, 48, 49, 39, 86, 10]
            }
        ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
</script>
@endsection
