@extends('admin.main_layout')

@section('function_nav')
<<<<<<< HEAD
<div class="col-sm-2">
    <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm">
        <i class="fas fa-plus"></i>
        Tạo mới danh mục</a>
</div>
@endsection

@section('content')
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
=======
    <div class="col-sm-2">
        <button class="btn btn-add btn-sm" data-toggle="modal" data-target="#createCategoryModal" title="Thêm">
            <i class="fas fa-plus"></i>
            Tạo mới danh mục
        </button>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Tạo mới danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
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
            @foreach($categories as $category)
                <tr>
                    <td class="col-1">{{ $category->id }}</td>
                    <td class="col-9">{{ $category->name }}</td>
                    <!-- <td class="col-2"><img class="img-card-person" src="/e_adminSN/assets/img-anhthe/1.jpg" alt=""></td> -->
                    <td class="col table-td-center">
                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp"
                            data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
>>>>>>> 43d007ae8e232b9507bf4172dbdbe89c72cfad3a
