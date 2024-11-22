@extends('admin.main_layout')

@section('content')
<div class="row">
    <!--Left-->
    <div class="col-md-12 col-lg-6">
        <div class="row widget-small primary coloured-icon">
            <a href="{{route('admin.customer')}}">
                <i class='icon bx bxs-user-account fa-3x'></i>
            </a>
            <div class="info">
                <h4>Tổng khách hàng</h4>
                <p><b>{{ $totalCustomers }} khách hàng</b></p>
                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
            </div>
        </div>
        <div class="row widget-small info coloured-icon">
            <a href="{{route('admin.product')}}">
                <i class='icon bx bxs-data fa-3x'></i>
            </a>
            <div class="info">
                <h4>Tổng sản phẩm</h4>
                <p><b>{{ $totalProducts }} sản phẩm</b></p>
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
            </div>
        </div>
        <div class="row widget-small warning coloured-icon">
            <a href="{{route('admin.order')}}">
                <i class='icon bx bxs-shopping-bags fa-3x'></i>
            </a>
            <div class="info">
                <h4>Tổng đơn hàng</h4>
                <p><b>{{ $totalOrders }} đơn hàng</b></p>
                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
            </div>
        </div>
        <div class="row widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
            <div class="info">
                <h4>Sắp hết hàng</h4>
                <p><b>{{ $lowStockProducts }} sản phẩm</b></p>
                <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
            </div>
        </div>
    </div>
    <!--END left-->
    <!--Right-->
    <div class="col-md-12 col-lg-6">
        <div class="row">
            <!-- <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Thống kê 6 tháng gần nhất</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="tile">
                    <h3 class="tile-title">Doanh thu 6 tháng gần nhất</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END right-->
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
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer ? $order->customer->fullname : 'N/A' }}</td>
                        <td>{{ number_format($order->totalPrice, 0, ',', '.') }} đ</td>
                        <td>
                            @if($order->status == 'success')
                            <span class="badge bg-success">Đã hoàn thành</span>
                            @elseif($order->status == 'failed')
                            <span class="badge bg-danger">Đã hủy</span>
                            @else
                            <span class="badge bg-warning">Đang xử lý</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->fullname }}</td>
                        <td>{{ $customer->dob ? $customer->dob->format('d/m/Y') : 'N/A' }}</td>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- / col-12 -->
</div>
</div>
@endsection


@section('footer')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">

    var salesData = @json($salesData);
    var customerData = @json($customerData);
    var odersData = @json($ordersData);

    var months = [];
    var sales = [];
    var customers = [];

    salesData.forEach(function(data) {
        months.push('Tháng ' + data.month);
        sales.push(data.total);
    });

    customerData.forEach(function(data) {
        customers.push(data.total);
    });

    odersData.forEach(function(data) {
        odersData.push(data.total);
    });

    var chartDataBar = {
        labels: months,
        datasets: [
            {
                label: 'Doanh thu',
                data: sales,
                fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
                strokeColor: "rgb(255, 212, 59)",
                pointColor: "rgb(255, 212, 59)",
                pointStrokeColor: "rgb(255, 212, 59)",

            }
        ]
    };

    // var chartDataLine = {
    //     labels: months,
    //     datasets: [
    //         {
    //             label: 'Số khách hàng',
    //             data: customers,
    //             fillColor: "rgba(9, 109, 239, 0.651)  ",
    //             pointColor: "rgb(9, 109, 239)",
    //             strokeColor: "rgb(9, 109, 239)",
    //             pointStrokeColor: "rgb(9, 109, 239)",
    //         },
    //         {
    //             label: 'Số đơn hàng',
    //             data: odersData,
    //             fillColor: "rgba(255, 99, 132, 0.2)",
    //             strokeColor: "rgb(255, 99, 132)",
    //             pointColor: "rgb(255, 99, 132)",
    //             pointStrokeColor: "rgb(255, 99, 132)",
    //         }
    //     ]
    // };

    // var lineChartCtx = document.getElementById('lineChartDemo').getContext('2d');
    // var lineChart = new Chart(lineChartCtx, {
    //     type: 'line',
    //     data: chartDataLine,
    //     options: {
    //         responsive: true,
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    var barChartCtx = document.getElementById('barChartDemo').getContext('2d');
    var barChart = new Chart(barChartCtx, {
        type: 'bar',
        data: chartDataBar,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
