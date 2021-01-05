@extends('./staff/nha-truong/layouts/layout')
@section('title','Cấu hình email')
@section('content')
    <style>
        .form-control-feedback {
            color: red !important;
        }
    </style>
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
                        <div class="m-portlet__head-tools">
                            <a href="{{route('nha-truong.nha-truong.index')}}"
                               class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>Quay lại</span>
                            </span>
                            </a>
                        </div>

                    </div>
                    <div class="m-portlet__body">

                        @if(session('message') || session('error'))
                            <div class="alert {{ (!empty(session('error')))?'alert-danger':''  }}">
                                <button class="close" data-dismiss="alert"></button>
                                {{ session('message') }}  {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert {{ (!empty(session('success')))?'alert-success':''  }}">
                                <button class="close" data-dismiss="alert"></button>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $value)
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert"></button>
                                    {{$value}}
                                </div>
                            @endforeach
                        @endif

                        <form method="POST" action="{{route('nha-truong.nha-truong.cau-hinh-email')}}"
                              accept-charset="UTF-8"
                              id="frmValidate2" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Mail gửi</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_send')}}" type="text"
                                               name="mail_send"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_title')}}" type="text"
                                               name="mail_title"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Máy chủ SMTP</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_smtp_serve')}}" type="text"
                                               name="mail_smtp_server" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Loại mã hoá</label>
                                    <div class="radio radio-success">
                                        <input id="no" type="radio"
                                               name="mail_encoding"
                                               value="no"
                                               @if(\App\Models\Config::cfg('mail_encoding') == 'no')
                                               checked="checked"
                                            @endif
                                        >
                                        <label for="no">Không mục nào</label>

                                        <input id="ssl"
                                               type="radio"
                                               name="mail_encoding"
                                               value="ssl"
                                               @if(\App\Models\Config::cfg('mail_encoding') == 'ssl' || \App\Models\Config::cfg('mail_encoding') == 'tls')
                                               checked="checked"
                                            @endif
                                        >
                                        <label for="ssl">SSL/TLS</label>

                                        <input id="starttls"
                                               type="radio"
                                               name="mail_encoding"
                                               value="starttls"
                                               @if(\App\Models\Config::cfg('mail_encoding') == 'starttls')
                                               checked="checked"
                                            @endif
                                        >
                                        <label for="starttls">STARTTLS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Cổng SMTP</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_smtp_port')}}" type="text"
                                               name="mail_smtp_port"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">SMTP Username</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_smtp_username')}}" type="text"
                                               name="mail_smtp_username" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Mật khẩu SMTP</label>
                                    <div class="controls">
                                        <input value="{{\App\Models\Config::cfg('mail_smtp_pass')}}" type="password"
                                               name="mail_smtp_pass"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success m-l-15">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#frmValidate2').validate({

                rules: {
                    mail_send: {
                        required: true
                    },
                    mail_title: {
                        required: true
                    },
                    mail_smtp_server: {
                        required: true
                    },
                    mail_encoding: {
                        required: true
                    },
                    mail_smtp_port: {
                        required: true
                    },
                    mail_smtp_username: {
                        required: true
                    },
                    mail_smtp_pass: {
                        required: true
                    }
                },
                messages: {
                    mail_send: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_title: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_smtp_server: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_encoding: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_smtp_port: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_smtp_username: {
                        required: 'Vui lòng nhập trường này'
                    },
                    mail_smtp_pass: {
                        required: 'Vui lòng nhập trường này'
                    }
                }
            })
        });
    </script>
@endsection

