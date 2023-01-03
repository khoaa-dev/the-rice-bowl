<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false"
                        style="font-size: 16px !important;font-weight: bold !important; color: #254b97 !important;">
                        <img src="{{ asset('public/front-end/images/ava_admin.jpg') }}" alt="">Admin
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Thông tin cá nhân</a>
                        <a class="dropdown-item" href="javascript:;">Trợ giúp</a>
                        <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Đăng
                            xuất</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell" style="margin-top: 4px !important; font-size: 20px !important;"></i>
                        <span class="badge bg-red" style="margin-top: 6px !important;">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src={{ asset('public/front-end/images/ava_admin.jpg') }}
                                        alt="Profile Image" /></span>
                                <span>
                                    <span style="font-weight: bold !important">Cao Thị Thúy Hằng</span>
                                    <span class="time" style="font-weight: normal !important">3 mins ago</span>
                                </span>
                                <br>
                                <span class="message" style="color: #9f6a12 !important; font-style: italic; !important">
                                    Có đơn hàng mới đang chờ duyệt!
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src={{ asset('public/front-end/images/ava_admin.jpg') }}
                                        alt="Profile Image" /></span>
                                <span>
                                    <span style="font-weight: bold !important">Cao Thị Thúy Hằng</span>
                                    <span class="time" style="font-weight: normal !important">3 mins ago</span>
                                </span>
                                <br>
                                <span class="message" style="color: #9f6a12 !important; font-style: italic; !important">
                                    Có đơn hàng mới đang chờ duyệt!
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
