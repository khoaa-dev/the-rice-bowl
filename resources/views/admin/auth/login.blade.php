{{-- @extends('admin.templates.admin-page')

@section('content')
<div class="right_col" role="main">
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            @if (\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{ \Session::forget('success') }}
            @if (\Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card mb-0">
                <div class="card-body">
                    <h2 class="brand-text text-primary ms-1">Admin Login</h2>

                    <form class="auth-login-form mt-2" action="{{route('adminLoginPost')}}" method="post">
                        @csrf
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email') }}"
                                autofocus />
                            @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="{{url('auth/forgot-password-basic')}}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="password"
                                    name="password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
                    </form>
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Rice Bowl </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="status">
                    <div class="alert alert-error" role="alert" id="errorMsg" style="display: none">
                        Thank you for getting in touch!
                    </div>
                </div>
                {{-- {{route('adminLoginPost')}} --}}
                <form id="adminLoginForm" action="" method="post" class="login100-form validate-form">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-43"
                        style="font-size: 40px; color: #834600; font-family: 'system-ui'; font-weight: bold">
                        ĐĂNG NHẬP
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz"
                        style="align-items: center;">
                        <input id="admin_email" class="input100" type="text" name="admin_email"
                            placeholder="Nhập email" style="font-family: 'system-ui';">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required"
                        style="align-items: center;">
                        <input id="admin_password" class="input100" type="password" name="admin_password"
                            placeholder="Nhập mật khẩu" style="font-family: 'system-ui';">
                    </div>

                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-danger text-center text-danger">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn"
                            style="font-family: 'system-ui'; background-color: #d18937; "><b style="font-size: 18px">
                                Đăng nhập</b>
                        </button>
                    </div>
                </form>

                <div class="login100-more"
                    style="background-image: url({{ asset('public/front-end/images/bg_admin_login.jpg') }});">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script>
        $(document).on('ready', function() {
            $('#adminLoginForm').on('submit', function(e) {
                e.preventDefault();

                let name = $('#admin_email').val();
                let password = $('#admin_password').val();
                var token = $('input[name="_token"]').val();

                $.ajax({
                    url: "route('adminLoginPost')",
                    type: "POST",
                    data: {
                        token: token,
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        $('#successMsg').show();
                        console.log(response);
                    },
                    error: function(response) {
                        console.log(response);
                        $('#errorMsg').show();
                        $('#emailErrorMsg').text(response.responseJSON.errors.email);
                        $('#passwordErrorMsg').text(response.responseJSON.errors.password);
                    },
                })

            })
        });
    </script>
</body>

</html>
