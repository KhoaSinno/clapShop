@extends('customer.main_layout')

@section('content')
<div class="container">
    <h1>Thông tin tài khoản</h1>
    <form action="{{ route('customer.profile.update') }}" method="POST">
        @csrf
        <!-- Tên tài khoản -->
        <div class="form-group">
            <label for="username">Tên tài khoản:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}"
                readonly>
        </div>

        <!-- Họ tên -->
        <div class="form-group">
            <label for="name">Họ và tên:</label>
            <input type="text" class="form-control" id="fullname" name="fullname"
                value="{{  auth()->user()->fullname }}">
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
        <div class="form-group d-flex align-items-center">
            <label for="gender" class="mr-2">Giới tính:</label>
            <select class="form-control form-select-sm text-center" id="gender" name="gender">
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

        <!-- <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Xác nhận mật khẩu mới">
        </div> -->

        <!-- Nút cập nhật -->
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection