@extends('layouts.app')

<style type="text/css">
    .avaUser {
        padding: 0.25rem;
        background-color: #fff;
        border: 0px solid #dee2e6;
        border-radius: 75.25rem;
        /* max-width: 8%; */
        width: 88px;
        height: 88px;
    }

    div.stars {}

    a.star span.vote-hover {
        color: #fffb1f;
    }

    a.star span:active {
        color: #ffd000;
    }

    a.star span.vote-active {
        color: #ffd000;
    }

    .blue {
        color: #ffd000;
    }
</style>

@section('content')
    <section class="home-slider owl-carousel img"
        style="background: linear-gradient(rgba(17, 30, 63, 0.9), rgba(112, 83, 15, 0.9)),
                                                                                                            url({{ asset('public/front-end/images/anhFood1.jpg') }});
                                                                                                            background-position: center center;
                                                                                                            background-repeat: no-repeat;
                                                                                                            background-size: cover;">
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="col-md-5 col-sm-12 ftco-animate">
                        <span class="subheading">Delicious</span>
                        <h1 class="mb-8">THE RICE BOWL</h1>
                        <p class="mb-4 mb-md-5">Menu đa dạng với những món ăn ngon nhất từ các đầu bếp hàng đầu thế giới.
                        </p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt Ngay</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Xem Menu</a></p>
                    </div>
                    <div class="col-md-7 ftco-animate hero text-center text-lg-end overflow-hidden">
                        <img src="{{ asset($restaurant->food_banner) }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>0765 700 777</h3>
                                <p style="color: #f7bd5e;">Số điện thoại</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>123 Nguyễn Văn Linh</h3>
                                <p style="color: #f7bd5e;">Địa chỉ</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Phục vụ 24/7</h3>
                                <p style="color: #f7bd5e;">7:00 am - 10:00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                    <ul class="social-icon">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('public/front-end/images/anhDV9.jpg') }});">
        </div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">CHÀO MỪNG TỚI THE RICE BOWL</h2>
            </div>
            <div>
                <p style="line-height: 30px; font-size: 17px">Đội ngũ đầu bếp tại The Rice Bowl sáng tạo ra những thực đơn
                    phù hợp với mọi
                    dịp, phục vụ trong nhà hoặc
                    ngoài trời, hay ngay trên bờ biển tuyệt đẹp của miền Trung Việt Nam. Các cặp đôi có thể lựa chọn thực
                    đơn riêng hoặc buffet phong phú với phong cách Phương Tây, Á Châu, Việt Nam và món ngon địa phương.</p>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4" style="font-size: 35px; color: #74581e">DỊCH VỤ CỦA CHÚNG TÔI</h2>
                    <p style="font-size: 22px; color: #74581e">Hãy để The Rice Bowl Restaurant đáp ứng yêu cầu và hiện thực
                        hóa ý tưởng của
                        bạn về một buổi tiệc,
                        một đám cưới,....</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5" style="margin-top: 20px;">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px; color: #a36400">CƯỚI HỎI</h3>
                            <p style="font-size: 20px">Không gian tiệc cưới thật đẹp với vòng hoa và lễ đường, để tạo ra
                                những trải nghiệm khó quên nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5" style="margin-top: 20px;">
                            <span class="flaticon-bicycle"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px; color: #a36400">SINH NHẬT - THÔI NÔI</h3>
                            <p style="font-size: 20px">Không gian ấm cúng phù hợp cho những tiệc sinh nhật dành cho các bé,
                                cho gia đình và các cặp
                                đôi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5" style="margin-top: 20px;">
                            <span class="flaticon-pizza-1"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px; color: #a36400">TIỆC THEO CHỦ ĐỀ</h3>
                            <p style="font-size: 20px">Hãy nói lên ý tưởng của bạn, The Rice Bowl sẽ hiện thực hóa điều ước
                                đó thành một không gian
                                tuyệt đẹp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4" style="color: #f7bd5e">MENU ĐA DẠNG</h2>
                    <p style="font-size: 22px">Hãy để The Rice Bowl Restaurant đánh thức vị giác của bạn!</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhDrink2.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Cocktail dâu tây</h3>
                            <p>Sự kết hợp hoàn hảo giữa Cocktail mát lạnh và dâu tây được nhập từ Mỹ phù hợp với mùa hè
                            </p>
                            <p class="price"><span>90.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhFood6.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Cá ngừ phi lê</h3>
                            <p>Món ngon nhất tại cửa hàng chính là cá ngừ phi lê ăn kết hợp với nướt sốt muối ớt kèm salad
                                Mỹ
                            </p>
                            <p class="price"><span>190.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhDrink3.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Smoothies dứa</h3>
                            <p>Smoothies dứa là sự kết hợp giữa chút rượu và dứa thơm từ Tây Ban Nha và Pháp
                            </p>
                            <p class="price"><span>120.000 VNĐ</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood3.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Salad củ quả</h3>
                            <p>Món ăn healthy nhất của nhà hàng Rice Bowl sẽ phù hợp với vị khách hàng khó tính nhất</p>
                            <p class="price"><span>123.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood7.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Trà táo bạc hà</h3>
                            <p>Trà thanh lọc được chiết xuất từ lá trà thiên nhiên, thêm chút bạc hà the the và vị táo
                                nguyên chất</p>
                            <p class="price"><span>77.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood8.jpg') }});"></a>
                        <div class="text p-4">
                            <h3 style="color: #f7bd5e">Súp bò hầm</h3>
                            <p>Súp nóng hổi được hầm với thịt bò Mỹ sẽ để lại cho bạn cảm giác khó quên và muốn thử lại
                            </p>
                            <p class="price"><span>299.000 VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-gallery">
            <div class="container-wrap">
                <div class="row no-gutters">
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV5.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV9.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV10.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV13.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-counter ftco-bg-dark img" id="section-counter"
            style="background-image: url({{ asset('public/front-end/images/bg_2.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-pizza-1"></span></div>
                                        <strong class="number" data-number="100"
                                            style="font-family: 'Josefin Sans';">0</strong>
                                        <span style="font-size: 20px; font-family: 'Josefin Sans';">Đơn đặt mỗi ngày</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-medal"></span></div>
                                        <strong class="number" data-number="25"
                                            style="font-family: 'Josefin Sans';">0</strong>
                                        <span style="font-size: 20px; font-family: 'Josefin Sans';">Chứng nhận quốc
                                            tế</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-laugh"></span></div>
                                        <strong class="number" data-number="10567"
                                            style="font-family: 'Josefin Sans';">0</strong>
                                        <span style="font-size: 20px; font-family: 'Josefin Sans';">Số lượng khách
                                            hàng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <div class="icon"><span class="flaticon-chef"></span></div>
                                        <strong class="number" data-number="100"
                                            style="font-family: 'Josefin Sans';">0</strong>
                                        <span style="font-size: 20px">Đầu bếp hàng đầu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <section class="ftco-appointment">
            <div class="overlay"></div>
            <div class="container-wrap">
                <div class="row no-gutters d-md-flex align-items-center">
                    <div class="col-md-6 d-flex align-self-stretch">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6 appointment ftco-animate">
                        <h3 class="mb-3">Liên hệ với chúng tôi</h3>
                        <form action="#" class="appointment-form">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input style="text-size: 20px" type="text" class="form-control"
                                        placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="d-me-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="3" class="form-control"
                                    placeholder="Lời nhắn nhủ"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Gửi" class="btn btn-primary py-3 px-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
    @endsection
