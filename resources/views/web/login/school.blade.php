
@extends('./web/login/layouts/layout')
@section('title','Nhà trường đăng nhập')
@section('content')
    <div class="login" style="margin-top:70px">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="row m-row--full-height">
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="min-height: 130px">
                </div>
                <div class="col-xl-4 mt-5">
                    <div class="m-portlet m-portlet--full-height m-portlet--fit  m-portlet--rounded">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Đăng nhập với tư cách nhà trường
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                        m-dropdown-toggle="hover" aria-expanded="true">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form class="m-form m-form--fit m-form--label-align-right" action="{{ route('login.school') }}" method="post">
                        @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label>Số điện thoại</label>
                                    <input name="phone" type="number" value="{{ old('phone') }}" class="form-control m-input m-input--square"
                                        placeholder="Số điện thoại">
                                        {!! ShowErrors($errors,'phone') !!}
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Mật khẩu</label>
                                    <input name="password" type="password" value="{{ old('password') }}"  class="form-control m-input m-input--square"
                                        placeholder="Mật khẩu">
                                        {!! ShowErrors($errors,'password') !!}
                                        <br>
                                        @if(session('thongbao'))
                                <span style='color: red'>{{session('thongbao')}}</span>
                                @endif
                                </div>
                            
                           
                            </div>
                            
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection