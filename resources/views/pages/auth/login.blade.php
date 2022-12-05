@extends('client.templates.default-page')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css?v=') . time() }}">
    <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        #login__page {
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
<div id="login__page" class="container-fluid h-custom" style="background-color: #fff">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal mb-0 me-3" style="font-size: 16px; padding: 0 10px">Sign in with</p>
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
                    <p class="text-center fw-bold mx-3 mb-0">Or</p>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4" >
                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" style="font-size: 16px"/>
                    {{-- <label class="form-label" for="form3Example3">Email address</label> --}}
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" style="font-size: 16px"/>
                    {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    {{-- <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                            Remember me
                        </label>
                    </div> --}}
                    <a href="#!" class="text-body" style="font-size: 14px; padding: 10px">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="button" class="btn btn-primary btn-lg w-100 text-uppercase"
                    style="padding: 1rem 2.5rem; font-weight: 700">Login</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 14px">
                        Don't have an account? 
                        <a href="#!" class="link-danger" style="color: #dc4c64">Register</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
