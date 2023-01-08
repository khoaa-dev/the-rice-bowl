@extends('admin.templates.admin-page')

@section('css')

@endsection

@section('content')
<div class="right_col" role="main" style="min-height: 2000px">
    <div class="row">
        <div class="col-12">
            <div class="status">
                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between"> Thêm món ăn
                        <a href="{{ route('food-management') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
                    </h4>
                </div>
                <div class="card-body" style="font-size: 20px">
                    <form action="{{ route('add-food') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="name">Tên món ăn:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">Giá:</label>
                            <input type="number" name="price" id="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="categoryId">Chọn danh mục:</label>
                            <select name="categoryId" id="categoryId" class="custom-select">
                                @foreach ($categories as $category)
                                <option class="p-2" value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm món ăn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection