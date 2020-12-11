@extends('./staff/giao-vien/layouts/layout')
@section('title','Bảng tin')
@section('content')

@if(!empty(session('class')))

<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">


    <div class="">
        @if(count($attendance)<1&&$ngayThu>0)
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30"
                role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation m--font-brand"></i>
                </div>
                <div class="m-alert__text">
                   Bạn chưa điểm danh cho buổi học ngày hôm nay ! <br>
                   Vui lòng điểm danh !
                   <a href="{{route('giao-vien.giao_dien_diem_danh',['id'=>session('class')])}}"
                        target="_blank">Điểm danh</a>.
                </div>
            </div>
            @endif
            <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                <div class="m-demo__preview">
                    <div class="m-nav-grid">
                        <div class="m-nav-grid__row">
                            <a href="{{route('giao-vien.giao_dien_diem_danh',['id'=>session('class')])}}"
                                class="m-nav-grid__item">
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
    <div class="">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                        Giáo viên ({{count($teachers)}})
                        </h3>
                    </div>
                </div>

            </div>
            <div class="m-portlet__body m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    @foreach($teachers as $teacher)
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title"> {{$teacher->teacher->fullname}}</h3>
                                        <span class="m-widget1__desc">{{$teacher->teacher->phone}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <img src="<?php echo '/upload/avatar/' . $teacher->teacher->avatar ?> "
                                            width="50px" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div>
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
                                    @foreach ($classes->kids as $kid)
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="{{asset('/upload/avatar/'.$kid->kid_avatar)}}" style="width:50px;height:50px"  alt="" >
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                {{$kid->kid_name}}
                                            </span><br>
                                            <span class="m-widget4__sub">
                                               {{$kid->parent->parent_name}}-{{$kid->parent->phone}} 
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="{{route('giao-vien.xem-thong-tin-tre',['id'=>$kid->id])}}"
                                                class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Chi
                                                tiết</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--end::Widget 14 Item-->
                                </div>

                                <!--end::Widget 14-->
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/New Users-->
            </div>
            
        </div>
    </div>
</div>
@else
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
            <div class="m-demo__preview">
                <div class="m-nav-grid">
                    Bạn chưa có lớp
                </div>
            </div>
        </div>
    </div>

</div>
@endif
@endsection