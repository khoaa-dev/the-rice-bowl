@extends('admin.templates.admin-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/front-end/css/user.css') }}">
@endsection

@section('content')
<div class="right_col row content" role="main" style="min-height: 0px !important">
    <div class="col-12">
        <h2 style="font-size: 30px !important; margin-bottom: 40px;">Chỉnh sửa thành viên</h2>
        <form class="needs-validation" action="{{route('user.update', $user->id) }}" method="post" novalidate
            style="width: 100%;">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Họ tên thành viên<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullName"
                        placeholder="Tên dịch vụ" required value="{{ $user->fullName }}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Email<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="email"
                        placeholder="Nhập email" required value="{{ $user->email }}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Date of Birth<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="dob"
                        placeholder="Nhập ngày sinh" required value="{{ $user->dob}}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Phone number<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="phone"
                        placeholder="Nhập số điện thoại" required value="{{ $user->phone}}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Username<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="username"
                        placeholder="Nhập tên người dùng" required value="{{ $user->username}}" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Địa chỉ nhà<span
                        class="required">*</span></label>
                <div class="col-md-7 col-sm-6">
                    <textarea class="form-control" style="height: 200px" class='optional' name="housNumber"
                        placeholder="Nhập địa chỉ nhà" data-validate-length-range="5,15" type="text"
                        required>{{ $user->houseNumber}}</textarea>
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