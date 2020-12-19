

@extends('./staff/nha-truong/layouts/layout')
@section('title','Thêm mới giáo viên')
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
                @if(session('message'))
        <div class="alert alert-success text-center" role="alert">
            {{session('message') }}
        </div>
     @endif   
                <div class="m-portlet__body">
                    <form enctype="multipart/form-data" action="{{route('nha-truong.giao-vien.update', $teacher->id)}}" method="post"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên giáo viên</label>
                                <div class="col-lg-6">
                                <input name="fullname" type="text" class="form-control m-input"
                                        placeholder="Nhập đầy đủ tên" value="{{$teacher->fullname}}">
                                        <br>
                                    {!! ShowErrors($errors,'fullname') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Email</label>
                                <div class="col-lg-6">
                                <input name="email" type="text" class="form-control m-input"
                                        placeholder="Nhập email đầy đủ" value="{{$teacher->email}}">
                                <br>
                            {!! ShowErrors($errors,'email') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Số điện thoại</label>
                                <div class="col-lg-6">
                                <input name="phone" type="text" class="form-control m-input"
                                        placeholder="Nhập sđt đầy đủ" value="{{$teacher->phone}}">
                                <br>
                            {!! ShowErrors($errors,'phone') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Ngày sinh</label>
                                <div class="col-lg-6">
                                <input name="date_of_birth" type="date" class="form-control m-input" placeholder=""
                                        value="{{$teacher->date_of_birth}}">
                            {!! ShowErrors($errors,'date_of_birth') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Giới tính</label>
                                <div class="col-lg-6">
                                <select name="gender" class="form-control">
                                        <option @if ($teacher->gender == 0) selected @endif value="0">Nữ</option>
                                        <option @if ($teacher->gender == 1) selected @endif value="1">Nam</option>
                                    </select>
                            <br>
                            {!! ShowErrors($errors,'gender') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Trạng thái</label>
                                <div class="col-lg-6">
                                <select name="status" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option @if ($teacher->status == 0) selected @endif value="0">Khóa</option>
                                        <option @if ($teacher->status == 1) selected @endif value="1">Hoạt Động</option>
                                    </select>
                            <br>
                            {!! ShowErrors($errors,'status') !!}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Ảnh đại diện</label>
                                <div class="col-lg-6">
                                <br>
                                    <img src="{{asset('upload/avatar/'.$teacher->avatar)}}" id="avatar" width="300px">
                                    <input name="avatar" type="file" class="form-control m-input"
                                        onchange="readURL(this);">
                                        <br>
                                {!! ShowErrors($errors,'avatar') !!}
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-success">Cập nhật</button>
                                        <a href="{{route('nha-truong.giao-vien.list')}}" class="btn btn-secondary">Quay
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

