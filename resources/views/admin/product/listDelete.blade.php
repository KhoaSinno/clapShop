@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" title="Thêm" href="{{ route('admin.product.create') }}">
        <i class="fas fa-plus"></i>
        Tạo mới sản phẩm
    </a>
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
            <th width="10">Mã SP</th>
            <th width="300">Tên SP</th>
            <th width="100">Ảnh SP</th>
            <th width="150">Thương hiệu</th>
            <th>Giá</th>
            <th width="50">Tồn kho</th>
            <th>Hoạt động</th>
        </tr>
    </thead>
    <tbody>

        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>
                @if($p->mainImage)
                <img src="{{ asset($p->mainImage->image_url) }}" alt="Product Image" weight="100" height="100">
                @else
                <!-- <img src="{{ asset('storage/images/default.jpg') }}" alt="No Image Available" weight="100" height="100"> -->
                @endif
            </td>
            <td class="d-flex justify-content-center align-items-center">{{ $p->category->name }}</td>
            <!-- 'cpu', 'ram', 'storage', 'screen_size', 'battery', 'warranty', 'os', 'description' -->
            <td class="text-center">{{ format_currencyVNĐ( $p->price) }}</td>
            <td class="d-flex justify-content-center align-items-center">{{ $p->stock }}</td>
            @if ($p->active)
            <td class="text-center">Còn bán</td>
            @else
            <td class="text-danger text-center">Ngừng bán</td>
            @endif
        </tr>
        @endforeach


    </tbody>
</table>
@endsection

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>