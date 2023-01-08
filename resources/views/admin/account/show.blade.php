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
                    <h4 class="d-flex justify-content-between"> Chỉnh sửa tai khoan
                        <a href="{{URL::to('/admin/accounts')}}" class="btn btn-primary float-end">Trở lại trang
                            trước</a>
                    </h4>
                </div>
                <div class="card-body" style="font-size: 20px">
                    <form action="{{URL::to('/admin/accounts/' . $user->id)}}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="fullName">Ho va ten:</label>
                            <input type="text" name="fullName" id="fullName" class="form-control"
                                value="{{$user->fullName}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">so dien thoai:</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="dob">Ngay sinh:</label>
                            <input type="text" name="dob" id="dob" class="form-control" value="{{$user->dob}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Anh dai dien:</label>
                            <input type="file" name="avatarUrl" id="avatarUrl" class="form-control">
                            @if ($user->avatarUrl != NULL)
                            <img src="{{ asset('public/front-end/images/' . $user->avatarUrl) }}" alt="" width="70px"
                                height="70px">
                            @else
                            <img src="{{ asset('public/front-end/images/user.png') }}" alt="Avatar" width="70px"
                                height="70px">
                            @endif

                        </div>
                        <div class=" form-group d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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