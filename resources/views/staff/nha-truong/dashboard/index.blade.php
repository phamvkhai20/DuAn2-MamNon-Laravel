@extends('./staff/nha-truong/layouts/layout')
@section('title','Dashboard')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
        <div class="m-portlet ">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Trẻ nghỉ nhiều liên tục
                                </h4><br>
                                <span class="m-widget24__desc">
                                </span>
                                <span class="m-widget24__stats m--font-info">
                                    {{count($attendance)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    84%
                                </span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                Đăng kí ăn ngày hôm nay
                                </h4><br>
                                <span class="m-widget24__desc">
                                    
                                </span>
                                <span class="m-widget24__stats m--font-danger">
                                  {{count($meal)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    69%
                                </span>
                            </div>
                        </div>

                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                   Trẻ nghỉ hôm nay
                                </h4><br>
                                <span class="m-widget24__desc">
                                    
                                </span>
                                <span class="m-widget24__stats m--font-success">
                                {{count($attendanceToday)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    90%
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection