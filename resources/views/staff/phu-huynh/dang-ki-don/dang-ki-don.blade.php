@extends('./staff/phu-huynh/layouts/layout')
@section('title','Đăng kí đón trẻ')
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
                <form class="m-form m-form--label-align-left- m-form--state-" enctype="multipart/form-data"
                    action="{{route('phu-huynh.luu-diem-danh',['id'=>session('id_kid_default')])}}" method="post"
                    id="m_form">
                    @csrf
                    <input type="hidden" value="{{session('id_kid_default')}}" name="kid_id">
                    <input type="hidden" value="{{Auth::guard('parent')->user()->id}}" name="parent_id">
                    <input type="hidden" value="{{session('id_kid_default')}}" id="date_dang_ki_don" name="date">
                    <input type="hidden" value="0" name="confirm">
                    <script>
                        var d = new Date();
                        document.getElementById("date_dang_ki_don").value = d.getFullYear() + '-' + (
                            d.getMonth() + 1) + '-' + d.getDate();
                        document.getElementById("date_dang_ki_don").max = d.getFullYear() + '-' + (
                            d.getMonth() + 1) + '-' + d.getDate();
                    </script>
                    <div class="m-portlet__body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Tên</span>
                                <input type="text" class="form-control m-input" name="name" />
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Quan hệ với bé</span>
                                <input type="type" class="form-control" name="relationship" />
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Địa chỉ</span>
                                <input type="text" class="form-control m-input" name="address" />
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <span>Số điện thoại</span>
                                <input type="number" class="form-control" name="phone" />
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 col-md-5 col-sm-12">
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12">
                                <div class="form-group m-form__group">
                                    <label>Ảnh</label>
                                    <img id="avatar">
                                    <input name="image" type="file" class="form-control m-input"
                                        onchange="readURL(this);">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary mr-5">Gửi</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar')
                .attr('src', e.target.result)
                .width(300);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection