@extends('./staff/phu-huynh/layouts/layout')
@section('title','Bảng tin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    @php
    use Carbon\Carbon;
    $date= substr(Carbon::now('Asia/Ho_Chi_Minh'),11,5)
    @endphp
    @if($ngayThu==1)
    
    @if((empty($attendance)||$attendance->arrival_time=="00:00:00"||$attendance->status==0))
    <div class="m-alert m-alert--icon alert alert-warning" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
        </div>
        <div class="m-alert__text">
            <strong>Con của bạn chưa đến lớp</strong>
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Hide">
            </button>
        </div>
    </div>
    @else
    @if($date>"16:00:00"&&$attendance->leave_time=="00:00:00")
    <div class="m-alert m-alert--icon alert alert-warning" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
        </div>
        <div class="m-alert__text">
            <strong style="color:#000">Con của bạn chưa được đón về</strong>
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Hide">
            </button>
        </div>
    </div>
    @endif
    <div class="">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{$prinDay}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body m-portlet__body--no-padding">
                <div class="m-demo">
                    <div class="m-demo__preview">
                        <div class="m-list__content">
                            <div class="m-list-badge m--margin-bottom-20">
                                @if($attendance->arrival_time!=="00:00:00")
                                <div class="m-list-badge__label m--font-success">
                                    {{$attendance->arrival_time}}
                                </div>
                                <div class="m-list-badge__items">
                                    <h5>Trẻ đã đến lớp</h5>
                                </div>
                                @else
                                <div class="m-list-badge__label m--font-success">
                                    00:00:00
                                </div>
                                <div class="m-list-badge__items">
                                    <h5>Trẻ chưa đến lớp</h5>
                                </div>
                                @endif
                            </div>
                            <div class="m-list-badge m--margin-bottom-20">
                                @if($attendance->leave_time!=="00:00:00")
                                <div class="m-list-badge__label m--font-brand">
                                    {{$attendance->leave_time}}
                                </div>
                                <div class="m-list-badge__items">
                                    <h5>Trẻ đã được phụ huynh đón về</h5>
                                </div>
                                @else
                                <div class="m-list-badge__label m--font-brand">
                                    00:00:00
                                </div>
                                <div class="m-list-badge__items">
                                    @if($date>"16:00:00")
                                    <h5>Trẻ chưa được phụ huynh đón về</h5>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
    @endif
    <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
        <div class="p-3">
            <div class="m-nav-grid">
                <div class="m-nav-grid__row">
                    <a href="{{route('phu-huynh.thong-tin-tre',['id'=>session('id_kid_default')])}}"
                        class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-list-1"></i>
                        <h5 class="m-nav-grid__text">Thông tin trẻ</h5>
                    </a>
                    <a href="" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                        data-target="#m_daterangepicker_modal" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-chat-2"></i>
                        <span class="m-nav-grid__text">Xin nghỉ</span>
                    </a>
                    <a href="{{route('phu-huynh.dang-ki-don',['id'=>session('id_kid_default')])}}"
                        class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-user-settings"></i>
                        <span class="m-nav-grid__text">Đăng kí đón</span>
                    </a>
                </div>
                <div class="m-nav-grid__row">
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-lifebuoy"></i>
                        <h5 class="m-nav-grid__text">Dịch vụ</h5>
                    </a>
                    <a href="{{route('phu-huynh.so-lien-lac',['id'=>session('id_kid_default')])}}"
                        class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-book"></i>
                        <span class="m-nav-grid__text">Sổ liên lạc</span>
                    </a>
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon flaticon-email"></i>
                        <span class="m-nav-grid__text">Góp ý nhà trường</span>
                    </a>
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
                                        <h3 class="m-widget1__title"> {{$teacher->teacher->fullname}}</h3>
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
                                        <div class=" m-menu__link-icon image__teacher"
                                            style="background-image: url(<?php echo '/upload/avatar/' . $teacher->teacher->avatar?> )">
                                        </div>
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
    <div class="">
        <div class="row">
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
<div class="modal fade" id="m_daterangepicker_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="">Xin nghỉ học</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <div class=" justify-content-center  d-flex">
                <div class="d-none mt-3" style="height: 200px;" id="loading">
                    <td style="vertical-align:middle;">
                        <div class="m-spinner m-spinner--brand"></div>
                        <div class="m-spinner m-spinner--primary"></div>
                        <div class="m-spinner m-spinner--success"></div>
                        <div class="m-spinner m-spinner--info"></div>
                        <div class="m-spinner m-spinner--warning"></div>
                        <div class="m-spinner m-spinner--danger"></div>
                    </td>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right" id="form_nghi_hoc">
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-5 col-sm-12">Chọn khoảng thời gian xin nghỉ học</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class='input-group pull-right' id='m_daterangepicker_6'>
                                <input type="hidden" name="id" value="{{session('id_kid_default')}}">
                                <input type='text' class="form-control m-input" readonly
                                    placeholder="Chọn lịch nghỉ học" name="date" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="guiXinNghiHoc()" class="btn btn-secondary m-btn">Gửi</button>
                    <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function guiXinNghiHoc() {
    event.preventDefault();
    document.querySelector('#form_nghi_hoc').classList.add("d-none")
    document.querySelector('#loading').classList.remove("d-none")
    const id = document.querySelector("input[name = 'id']").value;
    const date = document.querySelector("input[name = 'date']").value;
    axios.post("{{route('phu-huynh.them-don-xin-nghi',['id'=>session('id_kid_default')])}}", {
            id: id,
            date: date
        })
        .then((response) => {
            console.log(response);
            if (response.status === 200) {
                swal({
                    title: "Gửi đơn xin nghỉ học thành công !",
                    text: "Thông báo tự động đóng trong 5s.",
                    timer: 5e3,
                    onOpen: function() {
                        swal.showLoading();
                    },
                }).then(function(e) {
                    // "timer" === e.dismiss &&
                    //     window.location.reload();
                });
            }
        })
        .catch(function(error) {
            if (error.response) {
                console.log(error.response);
                swal(error.response.data.error, "Lỗi");
            }
        }).finally(function() {
            document.querySelector('#form_nghi_hoc').classList.remove("d-none")
            document.querySelector('#loading').classList.add("d-none")
        });
}


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