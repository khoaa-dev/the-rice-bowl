@extends('admin.templates.admin-page')

@section('css')
<style>
    .tabs {
        display: flex;
        position: relative;
    }

    .tabs .line {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 6px;
        border-radius: 15px;
        background-color: #1959ad;
        transition: all 0.2s ease;
    }

    .tab-item {
        /* min-width: 80px; */
        padding: 16px 20px 11px 20px;
        font-size: 20px;
        text-align: center;
        color: #c23564;
        background-color: #fff;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: 5px solid transparent;
        opacity: 0.6;
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .tab-icon {
        font-size: 24px;
        width: 32px;
        position: relative;
        top: 2px;
    }

    .tab-item:hover {
        opacity: 1;
        background-color: rgba(194, 53, 100, 0.05);
        border-color: rgba(194, 53, 100, 0.1);
        text-decoration: none;
        color: #be2424;
    }

    .tab-item.active {
        opacity: 1;
    }

    .tab-content {
        padding: 28px 0;
        width: 100%;
    }

    .tab-pane {
        color: #333;
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    .tab-pane h2 {
        font-size: 24px;
        margin-bottom: 8px;
    }
</style>
@endsection

@section('content')
<div class="right_col" role="main" style="min-height: 2000px !important">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mtb-20 w-100">QUẢN LÝ TÀI KHOẢN</h1><br>
            <ul class="nav nav-tabs nav-tab tabs d-flex text-center col-12" style="background: #eaeaea">
                <li class="tab-item active col-6"><a data-toggle="tab" href="#tab-9-3" data-case="HDLocal">Tài khoản người
                        dùng</a></li>
                <li class="tab-item col-6"><a data-toggle="tab" href="#tab-9-1" data-case="HDPassenger">Tài khoản admin</a>
                </li>
                <div class="line"></div>
            </ul>
        </div>
    
        <div class="col-md-12">
            <div class="tab-pane active">
                <div class="row">
                    <div class="x_panel">
                        <div class="p-2">
                            <h2>Danh sách tài khoản</h2>
                        </div>
    
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings text-center" style="font-size: 20px">
                                            <th class="column-title" style="width: 10%">STT </th>
                                            <th class="column-title" style="width: 10%">Avatar </th>
                                            <th class="column-title" style="width: 18%">Họ và Tên </th>
                                            <th class="column-title" style="width: 18%">Email </th>
                                            <th class="column-title" style="width: 18%">Số điện thoại </th>
                                            {{-- <th class="column-title" style="width: 18%">Ngày tạo </th> --}}
                                            <th class="column-title" style="width: 36%">Hành động </th>
                                        </tr>
                                    </thead>
    
                                    <tbody class="text-center" style="font-size: 16px">
    
                                        @foreach ($accountUsers as $accountUser)
                                        <tr class="even pointer">
                                            <td class=" ">{{ ++$i1 }}</td>
                                            <td class=" ">
                                                @if ($accountUser->avatarUrl != NULL)
                                                <img src="{{ asset('public/front-end/images/' . $accountUser->avatarUrl) }}"
                                                    alt="" width="70px" height="70px">
                                                @else
                                                <img src="{{ asset('public/front-end/images/user.png') }}" alt="Avatar"
                                                    width="70px" height="70px">
                                                @endif
                                            </td>
                                            <td class=" ">{{ $accountUser->fullName }}</td>
                                            <td class=" ">{{ $accountUser->email }}</td>
                                            <td class=" ">{{ $accountUser->phone }}</td>
                                            {{-- <td class=" ">{{ $accountUser->created_at }}</td> --}}
                                            <td class=" last">
                                                <a class="btn btn-warning"
                                                    href="{{URL::to('admin/accounts/'.$accountUser->id)}}">Xem chi
                                                    tiết</a>
                                            </td>
                                        </tr>
                                        @endforeach
    
                                    </tbody>
                                </table>
    
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $accountUsers->links() }} --}}
                                </div>
                            </div>
    
    
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="tab-pane">
                <div class="row">
                    <div class="x_panel">
                        <div class="p-2">
                            <h2>Danh sách tài khoản</h2>
                        </div>
    
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" id="accountAdmin">
                                    <thead>
                                        <tr class="headings text-center" style="font-size: 20px">
                                            <th class="column-title" style="width: 10%">STT </th>
                                            <th class="column-title" style="width: 18%">Avatar </th>
                                            <th class="column-title" style="width: 18%">Họ và tên </th>
                                            <th class="column-title" style="width: 18%">Email </th>
                                            <th class="column-title" style="width: 18%">Số điện thoại </th>
                                            {{-- <th class="column-title" style="width: 18%">Ngày tạo </th> --}}
                                            <th class="column-title" style="width: 36%">Hành động </th>
                                        </tr>
                                    </thead>
    
                                    <tbody class="text-center" style="font-size: 16px">
                                        @foreach ($accountAdmins as $accountAdmin)
                                        <tr class="even pointer">
                                            <td class=" ">{{ ++$i2 }}</td>
                                            <td class=" ">
                                                @if ($accountAdmin->avatarUrl != NULL)
                                                <img src="{{ asset('public/front-end/images/' . $accountAdmin->avatarUrl) }}"
                                                    alt="" width="70px" height="70px">
                                                @else
                                                <img src="{{ asset('public/front-end/images/user.png') }}" alt="Avatar"
                                                    width="70px" height="70px">
                                                @endif
                                            </td>
                                            <td class=" ">{{ $accountAdmin->fullName }}</td>
                                            <td class=" ">{{ $accountAdmin->email }}</td>
                                            <td class=" ">{{ $accountAdmin->phone }}</td>
                                            {{-- <td class=" ">{{ $accountAdmin->created_at }}</td> --}}
                                            <td class=" last">
                                                <a class="btn btn-warning"
                                                href="{{URL::to('admin/accounts/'.$accountAdmin->id)}}">Xem chi
                                                tiết</a>
                                            </td>
                                        </tr>
                                        @endforeach
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

    const tabs = document.querySelectorAll('.tab-item');
    const panes = document.querySelectorAll('.tab-pane');

    const tabActive = document.querySelector('.tab-item.active');
    const line = document.querySelector('.tabs .line');

    line.style.left = tabActive.offsetLeft + 'px';
    line.style.width = tabActive.offsetWidth + 'px';

    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function() {
            document.querySelector('.tab-item.active').classList.remove('active');
            document.querySelector('.tab-pane.active').classList.remove('active');

            line.style.left = this.offsetLeft + 'px';
            line.style.width = this.offsetWidth + 'px';

            this.classList.add('active');
            pane.classList.add('active');
        }
    });
    const btnAddAccountAdmin = document.querySelector('#add-account-admin');
    const btnCancleAddAccountAdmin = document.querySelector('#cancle-add-account-admin');

    const addAccountAdminBox = document.querySelector('#form-add-account-admin');
    btnAddAccountAdmin.onclick = function() {
        addAccountAdminBox.style.display = "block";
    }

    btnCancleAddAccountAdmin.onclick = function() {
        addAccountAdminBox.style.display = "none";
    }
</script>
@endsection