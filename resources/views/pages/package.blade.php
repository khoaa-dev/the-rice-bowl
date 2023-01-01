@extends('templates.default-page')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('public/front-end/css/style2.css') }}">
<link rel="stylesheet" href="{{ asset('public/front-end/css/package.css') }}">
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
</style>

@endsection

@section('content')
<section class="ftco-section ftco-services">
    <div class="row">
        <div class="col-md-8">
            <h1 style="text-align: center; color: #a7501f">Our Menu</h1>
            <div class="row" style="margin-left: 20px;margin-top: 60px">

                @foreach ($menus as $menu)
                <div class="col-md-6" style="margin-bottom: 50px">
                    <div class="title_menu " style="color: #a7501f">{{ $menu->name }}</div>
                    <div class="pricing-entry" style="padding: 0 20px">
                        @foreach ($menu->menuFoods as $mf)
                        <div class="d-flex text align-items-center" style="margin-bottom: 35px; ">
                            <img src="{{ asset($mf->food->image) }}"
                                style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px; box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                            &nbsp;&nbsp;
                            <h3 style="background: none; color: #563c05"><span>{{ $mf->food->name }}</h3>
                            <span class="price" style="color: #563c05">{{ number_format($mf->food->price, 0) }} đ</span>
                        </div>
                        @endforeach

                        <div class="d-flex text align-items-center">
                            <h3 style="background: none;color:rgb(82, 82, 80)"><span class="total">Tổng
                                    tiền</span>
                            </h3>
                            <span class="price total" style="width: 200px; color: #563c05;">{{
                                number_format($menu->cost, 0) }}
                                đ</span>
                        </div>
                    </div>

                </div>
                @endforeach

                <div class="col-md-6 custom-menu" style="margin-bottom: 30px;">
                    <div class="title_menu " style="color: #a7501f">Menu tự chọn</div>
                    <div class="pricing-entry food-in-menu" style="padding: 0 20px">
                        <div style="width: 100%;" class="">
                        </div>
                        <div class="align-items-center add-food">
                            <center>
                                <i class="fas fa-plus-circle"></i>
                                <a href="#" class="" data-toggle="modal" data-target="#modalChooseFood">Thêm món ăn</a>
                            </center>
                        </div>

                        <div class="d-flex text align-items-center">
                            <h3 style="background: none;color:rgb(82, 82, 80)"><span class="total">Tổng
                                    tiền</span>
                            </h3>
                            <span class="price total" style="width: 200px; color: #563c05;">0 đ</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 create-menu" style="display: block">
                    <div>
                        <i class="far fa-plus-square"></i>
                        <span>Thêm mới thực đơn</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-3" style="padding-right: 80px;color: rgba(246, 12, 12, 0.794)">
            <h1 style="text-align: center; margin-bottom: 50px; color: #a7501f">Đặt ngay</h1>
            <form method="POST" action="">
                @csrf
                <div class="form-row">
                    <div class="form-group row col-12">
                        <label for="organizationDate" style="font-size: 1.2em; color: #a7501f; font-weight: 400">Thời
                            gian</label>
                        <input type="datetime-local" class="inp form-control col-12" id="dt" placeholder="Ngày/giờ"
                            name="organizationDate" style="color: #563c05">
                    </div>
                    <div class="form-group row my-col col-12">
                        <label style="font-size: 1.2em; color: #a7501f; font-weight: 400" for="peopleNumber">Số
                            lượng
                            người</label>
                        <input type="number" class="inp form-control col-12" id="peopleNumber" name="peopleNumber">
                    </div>
                    <div class="form-group row my-col sel col-12">
                        <label style="font-size: 1.2em; color: #a7501f; font-weight: 400" for="menuId">Menu</label>
                        <select class="form-control sel menu-select col-12" style="width: 300%" name="menuId">
                            <option value="0">Chọn menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row my-col col-12" style="width: 120%">
                        <label style="font-size: 1.2em; color: #a7501f; font-weight: 400" for="note">Ghi
                            chú</label>
                        <textarea class="inp form-control col-12" id="note" name="note"></textarea>
                    </div>
                    <div class="col-12 row btn-order">
                        <button style="width: 100%;height: 40px; border-color: rgb(126, 125, 125); font-size: 18px"
                            class="btn btn-dark col-12" type="submit">Đặt
                            đơn</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{-- Filter food modal --}}
    <div class="modal fade" id="modalChooseFood" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" style="font-size: 20px; padding: 0">Danh sách thức ăn
                        & thức uống
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: black">&times;</span>
                    </button>
                </div>
                <div class="content row"
                    style="background-image: url({{ asset('public/front-end/images/bg_4.jpg') }});">
                    <div class="col-12 row food-nav"
                        style="background-image: url({{ asset('public/front-end/images/bg_4.jpg') }}); display: flex; justify-content: space-between">
                        <select class="browser-default custom-select col-5" id="categoryOption">
                            <option selected="" value="0">Tất cả thể loại</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="email" class="form-control col-6" name="foodName" id="foodName"
                            placeholder="Nhập tên món ăn">
                        {{ csrf_field() }}
                    </div>

                    <div class="col-12 row pricing-entry food-list" style="margin-top: 100px">
                        @foreach ($foods as $food)
                        <div class="row" style="padding-left: 15px">
                            <div class="d-flex text" style="margin-bottom: 35px; display: inline-block;width: 90%;">
                                <img src="{{ asset($food->image) }}"
                                    style=" border-radius: 100%;margin-top: -10px; height: 50px; width:50px;max-width: 50px; max-height: 50px;min-width: 50px; min-height: 50px;box-shadow: 0 4px 8px 0 rgba(192, 151, 16, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" />
                                &nbsp;&nbsp;
                                <h3 style="padding-top: 7px;">
                                    <span style="color: rgb(238, 222, 200) !important; background: none">
                                        {{ $food->name }}
                                    </span>
                                </h3>
                                <span class=" price"
                                    style="color: rgb(238, 222, 200); font-size: 18px !important; background: none">
                                    {{ number_format($food->price, 0) }} đ </span>
                            </div>
                            <div class="col-1"
                                style="padding: 0px !important;padding-left: 20px !important;display: inline;padding-top: 8px !important;">

                                @if (array_search($food->id, Session::get('foodIds', [])) !== false)
                                <input class="form-check-input food_checkbox" type="checkbox" value="{{ $food->id }}"
                                    id="{{ $food->id }}" checked style="font-size: 20px;margin: 0px !important;" />
                                @else
                                <input class="form-check-input food_checkbox" type="checkbox" value="{{ $food->id }}"
                                    id="{{ $food->id }}" style="font-size: 20px;margin: 0px !important;" />
                                @endif

                            </div>
                        </div>


                        @endforeach
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button id="btnUpdateMenu" class="btn btn-dark" style="font-size: 18px; border-radius: 5px"
                        data-dismiss="modal" data-toggle="modal" data-target="#notifySuccessModal">
                        Cập nhật thực đơn</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notify Success Modal -->
    <div id="notifySuccessModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <span style="font-size: 26px; color: #563c05">Cập nhật thực đơn thành công!</span>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
<script>
    $(document).on('ready', function() {
        changeSessionValue();
    });

    function changeSessionValue() {
        //change session value when checkbox clicked
        $('.food_checkbox').on('click', function() {
            if (this.checked) {
                var _token = $('input[name="_token"]').val();
                var foodId = $(this).val();

                $.ajax({
                    // url: "http://localhost/the-rice-bowl/add-food",
                    url: "{{ route('addFood') }}",
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        foodId: foodId,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                var _token = $('input[name="_token"]').val();
                var foodId = $(this).val();

                $.ajax({
                    url: "{{ route('removeFood') }}",
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        foodId: foodId,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        console.log(data);
                    },
                    error: function(data) {
                        alert('error');
                        console.log('Error:', data);
                    }
                });
            }
        });
    }

    $(function() {
        //set header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //filter food when category option changed
        $('#categoryOption').on("change", function(e) {
            e.preventDefault();

            var foodName = $('#foodName').val();
            var category = $(this).val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                // url: "http://localhost/the-rice-bowl/search",
                url: "{{ route('search') }}",
                method: "POST", // phương thức gửi dữ liệu.
                data: {
                    foodName: foodName,
                    categoryId: category,
                    _token: _token
                },
                success: function(data) { //dữ liệu nhận về
                    $('.food-list').html(data);
                    changeSessionValue();
                },
                error: function(data) {
                    alert('error');
                    console.log('Error:', data);
                }
            });
        });


        //filter food when food name input changed
        $('#foodName').on("keyup", function(e) {
            e.preventDefault();

            var foodName = $(this).val();
            var category = $('#categoryOption').val();
            var _token = $('input[name=_token]').val();

            $.ajax({
                // url: "http://localhost/the-rice-bowl/search",
                url: "{{ route('search') }}",
                method: "POST", // phương thức gửi dữ liệu.
                data: {
                    foodName: foodName,
                    categoryId: category,
                    _token: _token
                },
                success: function(data) { //dữ liệu nhận về
                    $('.food-list').html(data);
                    changeSessionValue();
                },
                error: function(data) {
                    alert('error');
                    console.log('Error:', data);
                }
            });
        });


        //create session when click to create new menu
        $(".create-menu").on("click", function() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                // url: "http://localhost/the-rice-bowl/init-session",
                url: "{{ route('initSession') }}",
                method: "POST",
                data: {
                    _token: _token
                },
                success: function(data) { //dữ liệu nhận về
                },

            });
            $('input:checkbox').removeAttr('checked');

            $('.create-menu').hide();
            $('.custom-menu').show();

            $(".menu-select").append("<option value='-1'>Menu tự chọn</option>");

        });

        $("#btnUpdateMenu").on("click", function() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                // url: "http://localhost/the-rice-bowl/update-menu",
                url: "{{ route('updateMenu') }}",
                method: "GET",
                data: {
                    _token: _token
                },

                success: function(data) { //dữ liệu nhận về
                    $(".food-in-menu").html(data);
                },
                error: function(data) {
                    alert('error');
                    console.log('Error:', data);
                }
            });

        })


    });
</script>
@endsection

@endsection