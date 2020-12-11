@extends('./staff/phu-huynh/layouts/layout')
@section('title','Xin nghỉ học')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">
    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @yield('title')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <a href="{{route('phu-huynh.index',['id'=>session('id_kid_default')])}}"
                        class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-arrow-left"></i>
                            <span>Quay lại</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="m-portlet__body">

                <form class="m-form m-form--label-align-left- m-form--state-"
                    action="{{route('phu-huynh.them-don-xin-nghi',['id'=>session('id_kid_default')])}}" method="post"
                    id="m_form">
                    @csrf
                    <input type="hidden" value="{{session('id_kid_default')}}" name="id">
                    <div class="m-portlet__body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Từ</span>
                                <input type="date" class="form-control m-input" name="start" />
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Đến</span>
                                <input type="date" class="form-control" name="end" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <button type="submit" class="btn btn-primary mr-5">Xin Nghỉ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection