@extends('customer.main_layout')

@section('breadcrumb')
<section class="error-404 d-flex flex-column align-items-center text-center" style="margin-top: 50px;">
    <h1 style="font-size: 100px; font-weight: bold; color: #333;">404</h1>
    <h4 style="font-size: 24px; color: #666; margin-bottom: 20px;">Xin lỗi, chúng tôi không tìm thấy trang mà bạn cần!</h4>
    <a href="{{ url('/') }}" class=" btn btn-danger" style="margin-bottom: 100px;font-weight: 700 ;padding: 10px 20px; text-decoration: none; color: #fff; background-color: #EB473D; border-radius: 5px;">Quay lại trang chủ</a>
    <!-- Nếu bạn có ảnh lỗi thì có thể bỏ comment dòng dưới -->
    <!-- <img src="{{ asset('storage/images/error.jpg') }}" alt="404 Error" style="margin-top: 30px; max-width: 100%; height: auto;"> -->
</section>
@endsection

