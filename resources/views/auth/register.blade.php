@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        #signup__page {
            font-family: Roboto;
            padding: 50px;
            margin: 50px 0;
        }

        .btn-social {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 4px 9px -4px #fac564 !important;
        }

        .btn-social i {
            scale: 1.5;
        }
    </style>
@endsection
@section('content')
    <div id="signup__page" class="container-fluid h-custom" style="background-color: transparent; padding: inherit">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -40px;">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('public/front-end/images/login.png') }}" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3" style="font-size: 20px; padding: 0 10px">Đăng ký với </p>
                        <button type="button" class="btn-social btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn-social btn btn-primary btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn-social btn btn-primary btn-floating mx-1">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
                    </div>

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control form-control-lg" required
                            placeholder="Nhập họ và tên"
                            style="font-family: 'Josefin Sans'; font-size: 18px; background-color: #fffab8 !important;" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" required
                            placeholder="Nhập email"
                            style="font-family: 'Josefin Sans'; font-size: 18px; background-color: #fffab8 !important;" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" required
                            autocomplete="new-password" placeholder="Nhập mật khẩu"
                            style="font-family: 'Josefin Sans'; font-size: 18px; background-color: #fffab8 !important;" />
                    </div>

                    <!-- Password confirm input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password-confirm" name="password_confirmation" required
                            autocomplete="new-password" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu"
                            style="font-family: 'Josefin Sans'; font-size: 18px; background-color: #fffab8 !important;" />
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg w-100 text-uppercase"
                            style="padding: 1rem 2.5rem; font-weight: 700; font-size: 18px; margin-bottom: 15px">Đăng
                            ký</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 18px; margin-top: 20px">
                            Bạn đã có tài khoản?
                            <a href="{{ route('login') }}" class="link-danger" style="color: #fac564; font-size: 18px">Đăng
                                nhập</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
