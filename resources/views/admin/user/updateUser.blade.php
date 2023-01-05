@extends('admin.templates.admin-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/front-end/css/service.css') }}">
@endsection

@section('content')
<div class="right_col row content" role="main" style="min-height: 0px !important">
    <div class="col-12">
        <h2 style="font-size: 30px !important; margin-bottom: 40px;">Chỉnh sửa dịch vụ</h2>
        <form class="needs-validation" action="{{route('service.update', $service->id) }}" method="post" novalidate
            style="width: 100%;">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Tên dịch vụ<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name"
                        placeholder="Tên dịch vụ" required value="{{ $service->name }}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Mô tả<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <textarea class="form-control" style="height: 200px" class='optional' name="detail"
                        placeholder="Mô tả" data-validate-length-range="5,15" type="text"
                        required>{{ $service->detail}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-7"><button class="btn btn-secondary" type="submit">Lưu</button></div>
            </div>
        </form>
    </div>

</div>
@endsection

@section('js')

@endsection