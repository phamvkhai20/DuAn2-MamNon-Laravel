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

                        <form method="POST" action="{{route('nha-truong.tempalte_email')}}" accept-charset="UTF-8"
                              id="frmValidate2" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12">
                                <br>
                                <div class="row-fluid ">
                                    <h2>Template Email nộp hồ sơ nhập học</h2>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col-md-6" style="font-size: 16px">
                                                    __hoTenTre__ : Họ và tên trẻ <br>
                                                    __tenGoiONha__ : Tên gọi ở nhà <br>
                                                    __ngaySinh__ : Ngày sinh <br>
                                                    __gioiTinh__ : Giới tính <br>
                                                    __hienTaiDangCutruTai__ : Hiện tại đang cư trú tại <br>
                                                </div>
                                                <div class="col-md-6" style="font-size: 16px">
                                                    __luaTuoi__ : Lứa tuổi <br>
                                                    __hoTenPhuHuyng__ : Họ tên phụ huynh <br>
                                                    __soDienThoai__ : Số điện thoại<br>
                                                    __email__ : Email<br>
                                                </div>
                                            </div>
                                            <div class="controls">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label">Tiêu đề:</label>
                                            <input value="{{\App\Models\Config::cfg('title_nhap_ho_so')}}" type="text" name="title_nhap_ho_so" class="form-control m-input"
                                                   placeholder="Nhập tiêu đề">
                                            <br>
                                            <label class="form-label">Nội dung</label>
                                            <textarea id="text-editor3"
                                                      name="template_email_nhop_ho_so"
                                                      placeholder="Enter text ..."
                                                      class="form-control">{{\App\Models\Config::cfg('template_email_nhop_ho_so')}}</textarea>
                                            <script>
                                                CKEDITOR.replace('template_email_nhop_ho_so');
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success m-l-15">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

