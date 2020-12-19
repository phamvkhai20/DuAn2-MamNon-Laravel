@extends('./staff/phu-huynh/layouts/layout')
@section('title','Đổi mật khẩu')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="">
            <!--begin::Portlet-->
            <div class="m-portlet ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                @yield('title')
                            </h3>
                        </div>
                    </div>
                </div>
                @if(session('message'))
        <div class="alert alert-success text-center" role="alert">
            {{session('message') }}
        </div>
     @endif   
     @if(session('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('error') }}
        </div>
     @endif   
                <div class="m-portlet__body">
                    <form action="{{route('phu-huynh.save_password',[Auth::guard('parent')->user()->id])}}" method="post"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Mật khẩu cũ</label>
                                <div class="col-lg-6">
                                    <input type="password" name="oldpass" class="form-control m-input"
                                        placeholder="Mật khẩu cũ">
                                        <br>
                                        {!! ShowErrors($errors,'oldpass') !!}
                                    
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Mật khẩu mới</label>
                                <div class="col-lg-6">
                                    <input type="password" name="password" class="form-control m-input"
                                        placeholder="Mật khẩu mới">
                                        <br>
                                        {!! ShowErrors($errors,'password') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Xác nhận mật khẩu</label>
                                <div class="col-lg-6">
                                    <input type="password" name="cfpass" class="form-control m-input"
                                        placeholder="Xác nhận mật khẩu">
                                        <br>
                                        {!! ShowErrors($errors,'cfpass') !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-success">Xác nhận</button>
                                        <a href="" class="btn btn-secondary">Quay
                                            Lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hahaa">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection