@extends('admin.templates.admin-page')

@section('content')

<div class="right_col" role="main" style="min-height: 2000px">
    {{ logger('Test') }}
    <div class="row">
        <div class="col-12">
            <div class="status">
                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between"> Thêm thực đơn
                        <a href="{{ route('menu-management') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
                    </h4>
                </div>
                <div class="card-body" style="font-size: 20px">
                    <form action="{{ URL::to('/admin/update-menu/'.$menu->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation">

                        @csrf
                        <div class="form-group">
                            <label for="name">Tên thực đơn:</label>
                            <input type="text" name="name" id="name" value="{{$menu->name}}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="foods">Chọn món ăn:</label>
                            <select name="foodIds[]" id="foodIds" multiple class="custom-select" style="height: 400px;" required>
                                @foreach ($foods as $food)
                                <option class="p-2" value="{{ $food->id }}" {{is_array($foodIds) && in_array($food->id, $foodIds) ? 'selected' : '' }}>
                                    {{ $food->name}} - {{ $food->price }}
                                </option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Cập nhật thực đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection