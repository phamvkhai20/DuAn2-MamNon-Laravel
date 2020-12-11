@extends('./staff/nha-truong/layouts/layout')
@section('title','Sửa học sinh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3 ">
    <div class="">
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
                    action="{{ route('nha-truong.tre.update', $kid->id) }}" method="post">
                    @csrf
                    <div class="m-portlet__body col-lg-6">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Họ Tên học sinh: </label>
                                <input name="kid_name" type="text" class="form-control m-input"
                                    placeholder="Nhập đầy đủ tên" value="{{$kid->kid_name}}">
                                {!! ShowErrors($errors,'kid_name') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Nickname</label>
                                <input name="nickname" type="text" class="form-control m-input"
                                    placeholder="Nhập nick name" value="{{$kid->nickname}}">
                                {!! ShowErrors($errors,'nickname') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Giới Tính</label>
                                <select name="gender" id="cars" class="form-control">
                                    <option value="">Chọn giới tính</option>
                                    <option @if ($kid->gender == 1) selected @endif value="1">Nam</option>
                                    <option @if ($kid->gender == 0) selected @endif value="0">Nữ</option>
                                </select>
                                {!! ShowErrors($errors,'gender') !!}
                            </div>

                            <div class="form-group m-form__group">
                                <label>Ngày sinh </label>
                                <input name="date_of_birth" type="date" class="form-control m-input"
                                    value="{{$kid->date_of_birth}}">
                                {!! ShowErrors($errors,'date_of_birth') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Địa chỉ </label>
                                <input name="address" type="text" class="form-control m-input"
                                    placeholder="Nhập địa chỉ đầy đủ" value="{{$kid->address}}">
                                {!! ShowErrors($errors,'address') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày vào lớp </label>
                                <input name="admission_date" type="date" class="form-control m-input"
                                    value="{{$kid->admission_date}}">
                                {!! ShowErrors($errors,'admission_date') !!}
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body col-lg-6">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label>Ảnh đại diện </label>
                                <br>
                                <img src="{{asset('/upload/avatar/'.$kid->kid_avatar)}}" id="avatar" width="300px">
                                <input name="kid_avatar" type="file" class="form-control m-input" placeholder=""
                                    onchange="readURL(this);">
                                {!! ShowErrors($errors,'kid_avatar') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Chi tiết </label>
                                <textarea id="w3review" class="form-control m-input" name="description" rows="10"
                                    cols="50">{{$kid->description}}</textarea>
                                {!! ShowErrors($errors,'description') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Lớp</label>
                                <div class="">
                                    <select name="class_id" id="cars" class="form-control">
                                        <option value="">Chọn lớp</option>
                                        @foreach($classes as $class)
                                        <option {{($class->id==$kid->class_id)? 'selected':''}} value="{{$class->id}}">
                                            {{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! ShowErrors($errors,'class_id') !!}
                            </div>

                            <div class="form-group m-form__group">
                                <label>Trạng thái</label>
                                <div class="">
                                    <select name="kid_status" id="cars" class="form-control">
                                        <option value="">Chọn trạng thái</option>
                                        <option @if ($kid->kid_status == 1) selected @endif value="1">Hoạt động</option>
                                        <option @if ($kid->kid_status == 0) selected @endif value="0">Khóa</option>
                                    </select>
                                </div>
                                {!! ShowErrors($errors,'kid_status') !!}
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <div class="m-form__actions m-form__actions">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{route('giao-vien.index')}}" class="btn btn-secondary">Quay Lại</a>
                        </div>
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