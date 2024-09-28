@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
        Tạo mới khách hàng</a>
</div>
@endsection

@section('content')
<table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
    id="sampleTable">
    <thead>
        <tr>
            <th>ID</th>
            <th width="150">Họ và tên</th>
            <!-- <th width="20">Ảnh thẻ</th> -->
            <th width="300">Địa chỉ</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>SĐT</th>
            <th>Chức vụ</th>
            <th width="100">Tính năng</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>#CD12837</td>
            <td>Hồ Thị Thanh Ngân</td>
            <!-- <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/1.jpg" alt=""></td> -->
            <td>155-157 Trần Quốc Thảo, Quận 3, Hồ Chí Minh </td>
            <td>12/02/1999</td>
            <td>Nữ</td>
            <td>0926737168</td>
            <td>Bán hàng</td>
            <td class="table-td-center">
                <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                    data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>


    </tbody>
</table>
@endsection
