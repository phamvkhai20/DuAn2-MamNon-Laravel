@extends('./staff/layouts/layout')
@section('title','Sửa thông tin giáo viên')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Sửa Giáo Viên</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="">
            <!--begin::Portlet-->
            <div class="m-portlet ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Nhập thông tin vào form bên dưới
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form row">
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Tên:</label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên">
                                    <!-- <span class="m-form__help">Please enter your full name</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Email :</label>
                                    <input type="email" class="form-control m-input" placeholder="Nhập email đầy đủ">
                                    <!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Số Điện Thoại</label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập sđt đầy đủ">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Mật Khẩu</label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập mật khẩu đầy đủ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Giới Tính:</label>
                                    <select name="id_cate" class="form-control">
                                        <option value="34">Nam</option>
                                        <option value="35">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Vai Trò :</label>
                                    <input type="email" class="form-control m-input" placeholder="">
                                    <!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Trạng Thái</label>
                                    <select name="id_cate" class="form-control">
                                        <option value="34">ab</option>
                                        <option value="35">bc</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ngày Sinh</label>
                                    <input type="text" class="form-control m-input" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="m-form__actions m-form__actions">
                                <button type="reset" class="btn btn-primary">Thêm</button>
                                <a href="{{route('giao-vien.index')}}" class="btn btn-secondary">Quay Lại</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection