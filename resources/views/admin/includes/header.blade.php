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
                        <span class="badge bg-red"
                            style="margin-top: 6px !important;">{{ Session::get('orderCount') }}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1"
                        style="position: absolute;transform: translate3d(-139px, 35px, 0px) !important;top: 0px;left: 0px;will-change: transform;">
                        @foreach (Session::get('orderLists') as $orderItem)
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('getListOrder') }}">
                                    <span class="image"><img
                                            src="{{ asset('public/front-end/images/' . $orderItem->avatarUrl) }}"
                                            alt="Profile Image" /></span>
                                    <span>
                                        <span style="font-weight: bold !important">{{ $orderItem->fullName }}</span>

                                        <span class="time" style="font-weight: normal !important">
                                            <?php
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orderItem->created_at);

                                            $result_in_seconds = $to->diffInSeconds($from);
                                            $result_in_minutes = $to->diffInMinutes($from);
                                            $result_in_hours = $to->diffInHours($from);
                                            $result_in_days = $to->diffInDays($from);
                                            $result_in_months = $to->diffInMonths($from);

                                            if ($result_in_seconds < 60) {
                                                echo $result_in_seconds . 's trước';
                                            } elseif ($result_in_minutes < 60) {
                                                echo $result_in_minutes . 'mn trước';
                                            } elseif ($result_in_hours < 24) {
                                                echo $result_in_hours . 'h trước';
                                            } elseif ($result_in_days < 32) {
                                                echo $result_in_days . 'd trước';
                                            } else {
                                                echo $result_in_months . 'm trước';
                                            }
                                            ?>
                                        </span>
                                    </span>
                                    <br>
                                    <span class="message"
                                        style="color: #a11425 !important; font-style: italic; !important">
                                        Có đơn hàng mới đang chờ duyệt!
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
