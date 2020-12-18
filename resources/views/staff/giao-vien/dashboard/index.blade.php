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
                            <a  href="{{route('giao-vien.them-so-lien-lac',['id'=>session('class')])}}" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                <span class="m-nav-grid__text">Sổ liên lạc</span>
                            </a>
                            <a href="#" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon flaticon-gift"></i>
                                <span class="m-nav-grid__text">Sinh nhật</span>
                            </a>
                            <a href="{{route('giao-vien.danh-sach-don-ho')}}" class="m-nav-grid__item">
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
                    <style>
                    .image__teacher {
                        width: 60px;
                        height: 60px;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        position: relative;
                        border-radius: 5px;
                        padding: 10px;
                        float: right;
                    }
                    </style>
                    @foreach($teachers as $teacher)
                    <div class="col-md-12 col-lg-12 col-xl-4">
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center row">
                                    <div class=" col-7">
                                        <label class="m-widget1__title"  data-toggle="modal"
                                            data-target="#m_info_teacher_{{$teacher->teacher->id}}"> {{$teacher->teacher->fullname}}</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input class="form-control mt-3" id="m_clipboard_2_{{$teacher->id}}"
                                                value="{{$teacher->teacher->phone}}">
                                            <a class="m-input-icon__icon m-input-icon__icon--right"
                                                data-clipboard="true"
                                                data-clipboard-target="#m_clipboard_2_{{$teacher->id}}"><span><i
                                                        class="la la-clipboard"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="col-5 m--align-right">
                                        <div class=" m-menu__link-icon image__teacher" data-toggle="modal"
                                            data-target="#m_info_teacher_{{$teacher->teacher->id}}"
                                            style="background-image: url(<?php echo '/upload/avatar/' . $teacher->teacher->avatar?> )">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="m_info_teacher_{{$teacher->teacher->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin giáo viên</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Họ và tên:</label>
                                            <input type="text" class="form-control"
                                                value="{{$teacher->teacher->fullname}}" id="recipient-name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Ngày sinh:</label>
                                            <input type="text" class="form-control"
                                                value="{{$teacher->teacher->date_of_birth}}" id="recipient-name"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Số điện
                                                thoại:</label>
                                            <input type="text" class="form-control" value="{{$teacher->teacher->phone}}"
                                                id="recipient-name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Email:</label>
                                            <input type="text" class="form-control" value="{{$teacher->teacher->email}}"
                                                id="recipient-name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" value="" id="recipient-name"
                                                disabled>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
                                <style>
                    .image__teacher {
                        width: 60px;
                        height: 60px;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        position: relative;
                        border-radius: 5px;
                        padding: 10px;
                        float: right;
                    }
                    </style>
                                    <!--begin::Widget 14 Item-->
                                    @foreach ($classes->kids as $kid)
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                        <div class=" m-menu__link-icon image__teacher"
                                            style="background-image: url(<?php echo '/upload/avatar/' . $kid->kid_avatar?> )">
                                        </div>
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
<script>


var ClipboardDemo = {
    init: function() {
        new Clipboard("[data-clipboard=true]").on("success", function(e) {
            e.clearSelection(), alert("Sao chép thành công");
        });
    },
};
jQuery(document).ready(function() {
    ClipboardDemo.init();
});
</script>
@endsection