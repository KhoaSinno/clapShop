@extends('customer.main_layout') <!-- Kế thừa Layout chính -->

@section('content')
<div class="container">

    <h2>Thông tin tài khoản</h2>

    <a href="{{ route('customer.profile') }}">Thông tin tài khoản</a>

    <!-- Kiểm tra lỗi xác thực -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Thông báo thành công -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('customer.profile.update') }}" method="POST">
        @csrf
        <!-- Tên tài khoản -->
        <div class="form-group">
            <label for="username">Tên tài khoản:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}"
                readonly>
        </div>

        <!-- Mật khẩu -->
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Họ và tên -->
        <div class="form-group">
            <label for="fullname">Họ và tên:</label>
            <input type="text" class="form-control" id="fullname" name="fullname"
                value="{{ auth()->user()->fullname }}">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
        </div>

        <!-- Địa chỉ -->
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
        </div>

        <!-- Giới tính -->
        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="" disabled {{ auth()->user()->gender ? '' : 'selected' }}>Chọn giới tính</option>
                <option value="Nam" {{ auth()->user()->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ auth()->user()->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>

        <!-- Ngày sinh -->
        <div class="form-group">
            <label for="dateOfBirth">Ngày sinh:</label>
            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                value="{{ auth()->user()->dateOfBirth }}">
        </div>

        <!-- Nút cập nhật -->
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection