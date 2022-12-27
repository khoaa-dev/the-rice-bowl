<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light m-0 p-4" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><span class="flaticon-pizza-1 mr-1"></span>The Rice
            Bowl<br><small>Restaurant</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link" style="font-size: 20px">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="{{ route('menu-page') }}" class="nav-link" style="font-size: 20px">Thực
                        đơn</a></li>
                <li class="nav-item"><a href="{{ route('service-page') }}" class="nav-link" style="font-size: 20px">Dịch
                        vụ</a></li>
                <li class="nav-item"><a href="{{ route('about-page') }}" class="nav-link" style="font-size: 20px">Về
                        chúng tôi</a></li>
                @guest
                    {{-- {{ route('login') }} --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"
                            style="color: #f7bd5e; font-size: 20px">{{ __('Đăng nhập') }}</a>
                    </li>

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            style="color: #f7bd5e; font-size: 20px" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->fullName }}
                            {{-- <span class="caret"></span> --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                            style="font-size: 16px">
                            @if (Auth::user()->fullName == 'admin')
                                {{-- <a class="nav-link" href="{{ route('admin') }}">{{ __('Trang quản trị') }}</a> --}}
                                {{-- {{ route('admin') }} --}}
                                <a class="dropdown-item" href="" style="font-family: 'Josefin Sans'; font-size: 20px"
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


                @endguest
            </ul>
        </div>
    </div>
</nav>
