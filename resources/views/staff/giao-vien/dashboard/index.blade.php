@extends('./staff/giao-vien/layouts/layout')
@section('title','Bảng tin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="container mt-5">
        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
            <div class="m-demo__preview">
                <div class="m-nav-grid">
                    <div class="m-nav-grid__row">
                        <a href="{{route('giao-vien.giao_dien_diem_danh',['id'=>'1'])}}" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-list-1"></i>
                            <h5 class="m-nav-grid__text">Điểm danh</h5>
                        </a>
                        <a href="#" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-support"></i>
                            <span class="m-nav-grid__text">Danh bạ</span>
                        </a>
                        <a href="#" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-speech-bubble"></i>
                            <span class="m-nav-grid__text">Xin nghỉ</span>
                        </a>
                    </div>
                    <div class="m-nav-grid__row">
                        <a href="#" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-folder"></i>
                            <span class="m-nav-grid__text">Sổ liên lạc</span>
                        </a>
                        <a href="#" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-gift"></i>
                            <span class="m-nav-grid__text">Sinh nhật</span>
                        </a>
                        <a href="#" class="m-nav-grid__item">
                            <i class="m-nav-grid__icon flaticon-list"></i>
                            <span class="m-nav-grid__text">Thông tin đón hộ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Giáo viên
                        </h3>
                    </div>
                </div>

            </div>
            <div class="m-portlet__body m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title"> Nick Bold</h3>
                                        <span class="m-widget1__desc"> 03 345 345 04</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <img src="../../assets/app/media/img/users/100_11.jpg" width="50px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title"> Nick Bold</h3>
                                        <span class="m-widget1__desc"> 03 345 345 04</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <img src="../../assets/app/media/img/users/100_11.jpg" width="50px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title"> Nick Bold</h3>
                                        <span class="m-widget1__desc"> 03 345 345 04</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <img src="../../assets/app/media/img/users/100_11.jpg" width="50px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Danh sách trẻ
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="Tìm kiếm"
                                    id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                            <div class="d-md-none m--margin-bottom-10"></div>

                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="" id="m_widget4_tab1_content" class="m-scrollable" data-scrollable="true"
                                style="height: 400px">
                                <!--begin::Widget 14-->
                                <div class="m-widget4">
                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Anna Strong
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                Visual Designer,Google Inc
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_14.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Milano Esco
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_11.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Bold
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_1.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Wiltor Delton
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_5.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Stone
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Anna Strong
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                Visual Designer,Google Inc
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_14.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Milano Esco
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_11.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Bold
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_1.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Wiltor Delton
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_5.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Stone
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>
                                    <!--end::Widget 14 Item-->
                                </div>

                                <!--end::Widget 14-->
                            </div>
                            <div class="tab-pane" id="m_widget4_tab2_content">

                                <!--begin::Widget 14-->
                                <div class="m-widget4">

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_2.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Kristika Bold
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_13.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Ron Silk
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_9.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Bold
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->

                                    <!--begin::Widget 14 Item-->
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_2.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Wiltor Delton
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="../../assets/app/media/img/users/100_8.jpg" alt="">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                Nick Bold
                                            </span><br>
                                            <span class="m-widget4__sub">
                                                03 345 345 04
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>

                                    <!--end::Widget 14 Item-->
                                </div>

                                <!--end::Widget 14-->
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-6">

                <!--begin:: Widgets/Support Tickets -->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Thông báo
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget3">
                            <div class="m-widget3__item">
                                <div class="m-widget3__header">
                                    <div class="m-widget3__user-img">
                                        <img class="m-widget3__img" src="../../assets/app/media/img/users/user1.jpg"
                                            alt="">
                                    </div>
                                    <div class="m-widget3__info">
                                        <span class="m-widget3__username">
                                            Melania Trump
                                        </span><br>
                                        <span class="m-widget3__time">
                                            2 day ago
                                        </span>
                                    </div>
                                    <span class="m-widget3__status m--font-info">
                                        Pending
                                    </span>
                                </div>
                                <div class="m-widget3__body">
                                    <p class="m-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                    </p>
                                </div>
                            </div>
                            <div class="m-widget3__item">
                                <div class="m-widget3__header">
                                    <div class="m-widget3__user-img">
                                        <img class="m-widget3__img" src="../../assets/app/media/img/users/user4.jpg"
                                            alt="">
                                    </div>
                                    <div class="m-widget3__info">
                                        <span class="m-widget3__username">
                                            Lebron King James
                                        </span><br>
                                        <span class="m-widget3__time">
                                            1 day ago
                                        </span>
                                    </div>
                                    <span class="m-widget3__status m--font-brand">
                                        Open
                                    </span>
                                </div>
                                <div class="m-widget3__body">
                                    <p class="m-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad
                                        minim veniam,quis nostrud exerci tation ullamcorper.
                                    </p>
                                </div>
                            </div>
                            <div class="m-widget3__item">
                                <div class="m-widget3__header">
                                    <div class="m-widget3__user-img">
                                        <img class="m-widget3__img" src="../../assets/app/media/img/users/user5.jpg"
                                            alt="">
                                    </div>
                                    <div class="m-widget3__info">
                                        <span class="m-widget3__username">
                                            Deb Gibson
                                        </span><br>
                                        <span class="m-widget3__time">
                                            3 weeks ago
                                        </span>
                                    </div>
                                    <span class="m-widget3__status m--font-success">
                                        Closed
                                    </span>
                                </div>
                                <div class="m-widget3__body">
                                    <p class="m-widget3__text">
                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh
                                        euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Support Tickets -->
            </div>
        </div>
    </div>
</div>
@endsection