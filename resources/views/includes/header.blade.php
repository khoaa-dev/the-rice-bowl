<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light m-0 p-4" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 20px; line-height: 25px"><span
                class="flaticon-pizza-1 mr-1" style="padding: 5px"></span>The Rice
            Bowl<br><small
                style="
            font-size: 15px;
            margin-left: 10px;
        ">Restaurant</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link" style="font-size: 18px">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="{{ route('menu-page') }}" class="nav-link" style="font-size: 18px">Thực
                        đơn</a></li>
                <li class="nav-item"><a href="{{ route('service-page') }}" class="nav-link" style="font-size: 18px">Dịch
                        vụ</a></li>
                <li class="nav-item"><a href="{{ route('about-page') }}" class="nav-link" style="font-size: 18px">Về
                        chúng tôi</a></li>
                @guest
                    {{-- {{ route('login') }} --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"
                            style="color: #f7bd5e; font-size: 18px">{{ __('Đăng nhập') }}</a>
                    </li>

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            style="color: #f7bd5e; font-size: 18px" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->fullName }}
                            {{-- <span class="caret"></span> --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                            style="font-size: 18px">
                            @if (Auth::user()->fullName == 'admin')
                                {{-- <a class="nav-link" href="{{ route('admin') }}">{{ __('Trang quản trị') }}</a> --}}
                                {{-- {{ route('admin') }} --}}
                                <a class="dropdown-item" href="" style="font-family: 'Josefin Sans'; font-size: 18px"
                                    onclick="event.preventDefault();
                                                            document.getElementById('admin-form').submit();">
                                    {{ __('Trang quản trị') }}
                                </a>
                            @endif
                            {{-- {{ route('profile') }} --}}
                            <a class="dropdown-item" href="" style="font-family: 'Josefin Sans'; font-size: 18px">
                                {{ __('Thông tin cá nhân') }}
                            </a>

                            {{-- {{ route('logout') }} --}}
                            <a class="dropdown-item" href="" style="font-family: 'Josefin Sans'; font-size: 18px"
                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            {{-- <form id="profile-form" action="{{ route('profile') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            {{-- {{ route('admin') }} --}}
                            <form id="admin-form" action="" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li role="presentation" class="nav-item dropdown open">
                        <ul class="navbar-nav d-flex flex-row me-1">
                            <li class="nav-item me-3 me-lg-0">
                                <div class="dropdown">
                                    <a href="javascript:;" class="" data-toggle="dropdown" aria-expanded="false">
                                        <div class="container d-flex" style="padding: 5px">
                                            <img style="height: 25px; width: 30px; margin-top: 5px;"
                                                src="{{ asset('public/front-end/images/bell.png') }}">
                                            <span
                                                style="font-family: 'Josefin Sans';border-radius: 20px;margin-bottom: 10px;margin-left: -12px;"
                                                class="badge badge-notification bg-danger">5</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="nav-item" style="width:200px">
                                            {{-- <a class="dropdown-item">
                                                <span class="image"><img style="width:50px; height:50px"
                                                        src="{{ asset('public/front-end/images/checked.png') }}"
                                                        alt="Profile Image" /></span>
                                                <span>
                                                    <span style="font-weight: bold !important">hello</span>
                                                    <span class="time" style="font-weight: normal !important">5m
                                                        trước</span>
                                                </span>
                                                <br>
                                                <span class="message"
                                                    style="color: #a11425 !important; font-style: italic; !important">
                                                    Có đơn hàng mới đang chờ duyệt!
                                                </span>
                                            </a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
