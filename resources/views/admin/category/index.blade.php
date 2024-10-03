@extends('admin.main_layout')

@section('function_nav')
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm">
        <i class="fas fa-plus"></i>
        Tạo mới danh mục</a>
</div>
@endsection

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('admin.category.create') }}">Create New Category</a>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
        id="sampleTable">
        <thead>
            <tr>
                <th>ID</th>
                <th width="150">Tên</th>
                <!-- <th width="20">Ảnh thẻ</th> -->
                <th width="100">Tính năng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#CD12837</td>
                <td>Lenovo</td>
                <!-- <td><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/1.jpg" alt=""></td> -->
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
