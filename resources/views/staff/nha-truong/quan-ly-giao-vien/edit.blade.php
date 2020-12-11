@extends('./staff/nha-truong/layouts/layout')
@section('title','Sửa giáo viên')
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
            <div class="m-portlet__body">
            <form class="m-form row" enctype="multipart/form-data"
                    action="{{ route('nha-truong.giao-vien.update', $teacher->id) }}" method="post">
                    @csrf
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                            <input hidden name="id" value="{{$teacher->id}}" type="text" class="form-control m-input"
                                placeholder="Nhập đầy đủ tên">
                            <div class="m-form__section m-form__section--first">

                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Tên:</label>
                                    <input name="fullname" type="text" class="form-control m-input"
                                        placeholder="Nhập đầy đủ tên" value="{{$teacher->fullname}}">
                                    {!! ShowErrors($errors,'fullname') !!}
                                    <!-- <span class="m-form__help">Please enter your full name</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Email :</label>
                                    <input name="email" type="text" class="form-control m-input"
                                        placeholder="Nhập email đầy đủ" value="{{$teacher->email}}">
                                    {!! ShowErrors($errors,'email') !!}
                                    <!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Số Điện Thoại</label>
                                    <input name="phone" type="text" class="form-control m-input"
                                        placeholder="Nhập sđt đầy đủ" value="{{$teacher->phone}}">
                                    {!! ShowErrors($errors,'phone') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label>Ngày Sinh</label>
                                    <input name="date_of_birth" type="date" class="form-control m-input" placeholder=""
                                        value="{{$teacher->date_of_birth}}">
                                    {!! ShowErrors($errors,'date_of_birth') !!}
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Giới Tính:</label>
                                    <select name="gender" class="form-control">
                                        <option @if ($teacher->gender == 0) selected @endif value="0">Nữ</option>
                                        <option @if ($teacher->gender == 1) selected @endif value="1">Nam</option>
                                    </select>
                                    {!! ShowErrors($errors,'gender') !!}
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Trạng Thái</label>
                                    <select name="status" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option @if ($teacher->status == 0) selected @endif value="0">Khóa</option>
                                        <option @if ($teacher->status == 1) selected @endif value="1">Hoạt Động</option>
                                    </select>
                                    {!! ShowErrors($errors,'status') !!}
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ảnh đại diện</label>
                                    <br>
                                    <img src="{{asset('upload/avatar/'.$teacher->avatar)}}" id="avatar" width="300px">
                                    <input name="avatar" type="file" class="form-control m-input"
                                        onchange="readURL(this);">
                                    {!! ShowErrors($errors,'avatar') !!}
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{route('giao-vien.index')}}" class="btn btn-secondary">Quay Lại</a>
                            </div>
                        </div>
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
