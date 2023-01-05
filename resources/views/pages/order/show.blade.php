@extends('templates.default-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/css/cart.css?v=') . time() }}">
<style>
    .modal-confirm {
        color: #434e65;
        width: 525px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        background: #47c9a2;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 36px;
        margin: 10px 0;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #fff;
        text-shadow: none;
        opacity: 0.5;
    }

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box {
        display: flex;
        justify-content: center;
        align-content: center;
        color: #fff;
        width: 95px;
        height: 95px;
        /* display: inline-block; */
        border-radius: 50%;
        z-index: 9;
        border: 5px solid #fff;
        padding: 15px;
        text-align: center;
    }

    .modal-confirm .icon-box i {
        font-size: 64px;
        margin: -4px 0 0 -4px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #eeb711 !important;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border-radius: 30px;
        margin-top: 10px;
        padding: 6px 20px;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #eda645 !important;
        outline: none;
    }

    .modal-confirm .btn span {
        margin: 1px 3px 0;
        float: left;
    }

    .modal-confirm .btn i {
        margin-left: 1px;
        font-size: 20px;
        float: right;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }

    .message__paid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        width: 100%;
        background-color: #393a3c !important;
        color: #e7ba28 !important;
        font-size: 20px;
        margin-top: 30px;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 m-0">
            <div class="status" style="margin: 10px 0">
                @if (session('success'))
                <h6 class="alert alert-success" style="font-size: 20px">{{ session('success') }}</h6>
                @endif
                @if (session('error'))
                <h6 class="alert alert-danger" style="font-size: 20px">{{ session('error') }}</h6>
                @endif
            </div>
        </div>
    </div>
    <div class="row" id="wrapper">

        <div class="col-6 mt-2">
            <div class="mb-5">
                <div class="row">
                    <div class="col-12 pt-4 pr-4 pl-4 pb-0" id="infor">
                        <h2 class="text-center" style="font-weight: 600">ĐƠN HÀNG CỦA BẠN</h2>
                        <span style="font-size: 20px; color:#fff;">Loại dịch vụ:</span>
                        <span style="color: #fac564">{{ $order->service->name }}</span>
                        <br>
                        <span style="font-size: 20px; color:#fff;">Số lượng khách:</span>
                        <span style=" color: #fac564">{{ $order->peopleNumber }}</span>
                        <br>
                        <span style="font-size: 20px; color:#fff;">Thời gian tổ chức:</span>
                        <span style="color: #fac564">{{ date('d-m-Y H:i', strtotime($order->organizationDate)) }}</span>
                        <br>
                        <span style="font-size: 20px; color:#fff;">Ghi chú:</span>
                        <span style=" color: #fac564">Không</span>
                        <br><br>
                        <span style="font-size: 20px; color:#fff;">Thực đơn:</span>

                        <div class="col-12 pt-3">
                            <div class="pricing-entry">
                                @if (isset($menu))
                                @foreach ($menu->menuFoods as $mf)
                                <div class="d-flex text align-items-center" style="margin-bottom: 35px">
                                    <img src="{{ asset($mf->food->image) }}"
                                        style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px; box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                    &nbsp;&nbsp;
                                    <h3 style="background: none"><span>{{ $mf->food->name }}</h3>
                                    <span class="price">{{ number_format($mf->food->price, 0) }}đ</span>
                                </div>
                                @endforeach
                                @else
                                @foreach ($foods as $food)
                                <div class="d-flex text align-items-center" style="margin-bottom: 35px">
                                    <img src="{{ asset($food->image) }}"
                                        style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px; box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                    &nbsp;&nbsp;
                                    <h3 style="background: none"><span>{{ $food->name }}</h3>
                                    <span class="price">{{ number_format($food->price, 0) }}đ</span>
                                </div>
                                @endforeach
                                @endif
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>


        <div class="col-6" id="checkout">
            <div class="mt-2" style="height: 100%">
                <div class="row" style="height: 100%">
                    <div class="cart-total-prices" style="width: 100%; height: 100%">
                        <div class="cart-total-prices__inner sticky "
                            style="height: 100%; display: flex; flex-direction: column; justify-content: space-around;">
                            <div class="customer-address">
                                <p class="heading d-flex justify-content-between title-r">
                                    <span class="" style=" color: #000000;font-size: 18px !important"><b>Thông tin
                                            khách hàng</b></span>
                                    <span data-view-id="" style="color: #2f4257">Thay
                                        đổi</span>
                                </p>
                                <span style="color:#081d31; font-weight: bold;">Tên khách
                                    hàng:</span>
                                <span style="color: #34495e">{{ $user->fullName }}</span>
                                <br>
                                <span style="color:#081d31; font-weight: bold">Số điện
                                    thoại:</span>
                                <span style="color: #34495e">{{ $user->phone }}</span>
                                <br>
                                <span style="color:#081d31; font-weight: bold">Địa chỉ:</span>
                                <span style="color: #34495e">{{ $user->houseNumber }}</span>
                                <br>

                            </div>

                            <div class="prices">
                                <p class="title-r title-2" style="">
                                    <span class="tt" style=" color: #000000; font-size: 18px !important"><b>Chi
                                            phí</b></span>
                                </p>
                                @csrf
                                <ul class="prices__items pl-0 pb-3">
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: rgb(0, 0, 0)">Tạm tính</span>
                                        <span class="prices__value" style="color: #34495e">{{ number_format($totalCost,
                                            0) }}đ</span>
                                    </li>
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: rgb(0, 0, 0)">Thuế</span>
                                        <span class="prices__value" style="color: #34495e">0đ</span>
                                    </li>
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: rgb(0, 0, 0)">Giảm giá</span>
                                        <span class="prices__value" style="color: #34495e">0đ</span>
                                    </li>
                                    <hr>
                                    <li class="prices__item d-flex justify-content-between">
                                        <span class="prices__text" style="color: rgb(0, 0, 0); font-size: 20px">Tổng
                                            cộng</span>
                                        <span class="prices__value"
                                            style="color: #34495e; font-weight: bold; font-size: 20px">{{
                                            number_format($totalCost, 0) }}đ</span>
                                    </li>

                                </ul>
                                <div class="prices__total d-flex justify-content-between">

                                </div>
                            </div>

                            <form action="{{ URL::to('/process-transaction/'.$order->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="select-method row">
                                    @if ($status == 1)
                                    @elseif ($status != 4)
                                    <select name="payment" id="payment" class="col-7">
                                        <option selected>Chọn phương thức thanh toán</option>
                                        @foreach ($paymentMethods as $paymentMethod)
                                        <option class="mt-2 mb-2" value="{{ $paymentMethod->id }}">
                                            {{ $paymentMethod->name }}</option>
                                        @endforeach
                                    </select>
                                    @php
                                    $vnd_to_usd = $totalCost / 23000;
                                    @endphp
                                    <input type="hidden" name="totalCost" value="{{ round($vnd_to_usd, 2) }}">
                                    {{-- <div id="paypal-button" class="col-4" style="display: none"></div>
                                    <input type="hidden" name="" id="vnd_to_usd" value="{{ round($vnd_to_usd, 2) }}"> --}}
                                    @endif

                                </div>
                                @if ($status == 1)
                                {{-- <button data-view-id="cart_navigation_proceed" data-toggle="modal"
                                    data-target="#notifyConfirmOrder" type="button" class="cart__submit">Đặt dịch
                                    vụ</button> --}}
                                <span data-view-id="cart_navigation_proceed" class="message__paid" @disabled(true)>Đơn hàng đang chờ duyệt</span>
                                @elseif($status == 2)
                                <button data-view-id="cart_navigation_proceed" type="submit" class="cart__submit">Xác
                                    nhận</button>
                                @elseif($status == 4)
                                <span data-view-id="cart_navigation_proceed" class="message__paid" @disabled(true)>Bạn đã thanh toán đơn hàng này</span>
                                @endif
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-12">
            <!-- Modal confirm order -->
            <div id="notifyConfirmOrder" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <span style="font-size: 26px; color: #563c05">
                                Đơn hàng của bạn đã được xác nhận!
                                Nhân viên nhà hàng sẽ liên hệ bạn trong thời gian sớm nhất!
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-back-homepage"
                                style="border-radius: 5px; background-color: #47c9a2 !important; font-size: 16px"
                                onclick="window.location.href = '{{ route('home') }}' ">Đồng ý</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- Modal confirm payment -->
            <div class="modal fade" id="confirm-payment" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #fff">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle" style="color: #218838">Thông báo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="color: #000">
                            <p>Đơn hàng của bạn đã được duyệt! Nhân viên nhà hàng sẽ liên hệ bạn trong thời gian sớm
                                nhất!</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-confirm-payment"
                                style="border-radius: 5px; font-size: 18px; width: 120px"
                                onclick="window.location.href = '{{ URL::to('/updateStatus/' . $order->id) }}'">Đồng
                                ý</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection