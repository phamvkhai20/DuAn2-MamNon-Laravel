@extends('./staff/nha-truong/layouts/layout')
@section('title','Thêm mới thông báo')
@section('content')<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
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
                        <a href="{{route('nha-truong.thong-bao.index')}}"
                            class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>Quay lại</span>
                            </span>
                        </a>
                    </div>
                </div>
            <div class="m-portlet__body">
             <form action="" method="post" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                     
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tiêu đề:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="school_year" class="form-control m-input" placeholder="Nhập tiêu đề">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Phạm vi:</label>
                                <div class="col-lg-6">
                                <select name="grade_id" class="form-control">
                                        <option value="">Tất cả</option>
                                        <option value="">Lớp</option>
                                        <option value="">Cá nhân</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Ảnh:</label>
                                <div class="col-lg-6">
                                <input name="" type="file" class="form-control m-input" placeholder="" onchange="kidAvatar;">
                                </div>
                            </div>
                           
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Nội dung:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="school_year" class="form-control m-input" placeholder="Nhập tên đầy đủ">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-success">Thêm</button>
                                        <a href="{{route('nha-truong.thong-bao.index')}}" class="btn btn-secondary">Quay lại</a>
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