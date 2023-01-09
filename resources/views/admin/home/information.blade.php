@extends('admin.templates.admin-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/front-end/css/service.css') }}">
@endsection

@section('content')
<div class="right_col row content" role="main" style="min-height: 0px !important">
    <div class="col-12">
        <h2 style="font-size: 30px !important; margin-bottom: 40px;">Thông tin nhà hàng</h2>
        <div class="status">
            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
        </div>
        <form class="needs-validation" action="{{ url('/admin/information/update', ['id' => $restaurant->id]) }}" method="post" novalidate style="width: 100%;">
            @csrf
            <div class="field item form-group">
                <label class="col-form-label col-2 label-align">Tên nhà hàng<span class="required">*</span></label>
                <div class="col-4">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Tên nhà hàng" value="{{ $restaurant->name }}" required />
                </div>

                <label class="col-form-label col-1 label-align">Liên hệ<span class="required">*</span></label>
                <div class="col-4">
                    <input class="form-control" type="number" data-validate-length-range="6" data-validate-words="2" name="phone" placeholder="Số điện thoại" value="{{ $restaurant->phone }}" required />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-2 label-align">Thời gian mở cửa<span class="required">*</span></label>
                <div class="col-4">
                    <input class="form-control" type="time" data-validate-length-range="6" data-validate-words="2" name="openedTime" value="{{ $restaurant->openedTime }}" required />
                </div>

                <label class="col-form-label col-1 label-align">Thời gian đóng cửa<span class="required">*</span></label>
                <div class="col-4">
                    <input class="form-control" type="time" value="{{ $restaurant->closedTime }}" data-validate-length-range="6" data-validate-words="2" name="closedTime" required />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-2  label-align">Địa chỉ<span class="required">*</span></label>
                <div class="col-9">
                    <input class="form-control" type="text" value="{{ $restaurant->street }}" data-validate-length-range="6" data-validate-words="2" name="street" placeholder="Địa chỉ" required />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-2 label-align">Banner món ăn</label>
                <div class="col-4">
                    <img src="{{ asset($restaurant->food_banner) }}" width="100%" id="img-food-banner" />
                    <input type="file" style="margin-top: 20px" id="food-banner" name="food_banner" value="{{ $restaurant->food_banner }}" />
                </div>

                <label class="col-form-label col-1 label-align">Banner menu</label>
                <div class="col-4">
                    <img src="{{ asset($restaurant->menu_banner) }}" width="100%" id="img-menu-banner" />
                    <br>
                    <input type="file" style="margin-top: 20px" name="menu_banner" id="menu-banner" value="{{ $restaurant->menu_banner }}" />
                </div>
            </div>

            <br><br>
            <div class="row d-flex justify-content-center">
                <div><button class="btn btn-secondary" type="submit">Cập nhật</button></div>
            </div>

        </form>
    </div>

</div>
@endsection

@section('js')
<script src="{{ asset('public/front-end/js/information.js') }}"></script>
@endsection