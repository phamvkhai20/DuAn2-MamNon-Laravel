
@extends('./staff/layouts/layout')
@section('title','Dashboard')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Thêm học sinh</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Forms &amp; Controls</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Form Layouts</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Default Forms</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-plus m--hide"></i>
                            <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first m--hide">
                                                <span class="m-nav__section-text">Quick Actions</span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">Activity</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">Support</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__separator m-nav__separator--fit">
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content" style="background-color: white;">
            <div class="row">
                <div class="col-lg-6">

                    <!--begin::Portlet-->
                    <div class="">
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
                        <form class="m-form">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group">
                                        <label for="example_input_full_name">Họ Tên học sinh: </label>
                                        <input type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Nick name :</label>
                                        <input type="email" class="form-control m-input" placeholder="Nhập nick name">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Giới Tính</label>
                                        <div class="">
                                            <select id="cars"  class="form-control" >
                                                <option value="nam">Nam</option>
                                                <option value="nu">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Ngày sinh :</label>
                                        <input type="date" class="form-control m-input">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Địa chỉ :</label>
                                        <input type="text" class="form-control m-input" placeholder="Nhập địa chỉ đầy đủ">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Ngày vào lớp :</label>
                                        <input type="date" class="form-control m-input" >
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Tên phụ huynh :</label>
                                        <input type="text" class="form-control m-input" placeholder="Nhập tên phụ huynh đầy đủ">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--begin::Portlet-->
                    <div class="">
                        <!--begin::Form-->
                        <form class="m-form m-form--fit">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <div class="form-group m-form__group">
                                            <label>Tri tiết :</label>
                                       <textarea id="w3review" class="form-control m-input" name="w3review" rows="10" cols="50">

                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>ID lớp :</label>
                                        <div class="">
                                            <select id="cars"  class="form-control" >
                                                <option value="nam">1</option>
                                                <option value="nu">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Ảnh đại diện :</label>
                                        <input type="file" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>Trạng thái:</label>
                                        <div class="">
                                            <select id="cars"  class="form-control" >
                                                <option value="nam">1</option>
                                                <option value="nu">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>ID phụ huynh :</label>
                                        <div class="">
                                            <select id="cars"  class="form-control" >
                                                <option value="nam">1</option>
                                                <option value="nu">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group">
                                        <label>ID năm học :</label>
                                        <div class="">
                                            <select id="cars"  class="form-control" >
                                                <option value="nam">1</option>
                                                <option value="nu">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <button type="reset" class="btn btn-primary">Thêm</button>
                                    <a href="{{route('hocSinh.danh_sach')}}" class="btn btn-secondary">Quay Lại</a>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>

        </div>
        </div>


@endsection

