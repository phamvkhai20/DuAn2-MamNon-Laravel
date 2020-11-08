@extends('./staff/layouts/layout')
@section('title','Thêm học sinh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Thêm học sinh</h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content mt-3 container" style="background-color: white;">
        <div class="container">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="">
                    <!--begin::Form-->
                    <form class="m-form row">
                        <div class="m-portlet__body col-lg-6">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Họ Tên học sinh: </label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Nick name </label>
                                    <input type="email" class="form-control m-input" placeholder="Nhập nick name">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Giới Tính</label>
                                    <div class="">
                                        <select id="cars" class="form-control">
                                            <option value="nam">Nam</option>
                                            <option value="nu">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ngày sinh </label>
                                    <input type="date" class="form-control m-input">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Địa chỉ </label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập địa chỉ đầy đủ">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ngày vào lớp </label>
                                    <input type="date" class="form-control m-input">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Tên phụ huynh </label>
                                    <input type="text" class="form-control m-input" placeholder="Nhập tên phụ huynh đầy đủ">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body col-lg-6">
                            <div class="m-form__section m-form__section--first">

                                <div class="form-group m-form__group">
                                        <label>Chi tiết </label>
                                        <textarea id="w3review" class="form-control m-input" name="w3review" rows="10" cols="50">
                                        </textarea>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>ID lớp </label>
                                    <div class="">
                                        <select id="cars" class="form-control">
                                            <option value="nam">1</option>
                                            <option value="nu">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ảnh đại diện </label>
                                    <input type="file" class="form-control m-input" placeholder="">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Trạng thái</label>
                                    <div class="">
                                        <select id="cars" class="form-control">
                                            <option value="nam">1</option>
                                            <option value="nu">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>ID phụ huynh </label>
                                    <div class="">
                                        <select id="cars" class="form-control">
                                            <option value="nam">1</option>
                                            <option value="nu">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>ID năm học </label>
                                    <div class="">
                                        <select id="cars" class="form-control">
                                            <option value="nam">1</option>
                                            <option value="nu">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>

    </div>
</div>


@endsection