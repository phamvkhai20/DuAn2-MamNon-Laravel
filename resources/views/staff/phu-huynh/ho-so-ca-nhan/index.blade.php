@extends('./staff/phu-huynh/layouts/layout')
@section('title','Hồ sơ cá nhân')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class=" ">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <style>
                            .image__kid {
                                background-position: center;
                                background-repeat: no-repeat;
                                background-size: cover;
                                position: relative;
                                width: 160px;
                                height: 160px;
                            }
                            </style>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper image__kid" id="image__kid"
                                    style="background-image: url()">
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">Nguyễn Thị Hà</span>
                            </div>
                        </div>
                        <div class="m-portlet__body-separator"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                        href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        @yield('title')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Họ và tên phụ huynh</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" disabled value=""
                                                class="form-control" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Số điện thoại</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" disabled value=""
                                                class="form-control" />
                                        </div>
                                    </div>
                                   
                                    <div class="form-group m-form__group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Email</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <input type="text" disabled value=""
                                                class="form-control" />
                                        </div>
                                    </div>
                                  
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_2">
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection