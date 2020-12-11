@extends('./staff/nha-truong/layouts/layout')
@section('title','Thêm học sinh')
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

                <form class="m-form row" action="{{ route('nha-truong.tre.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    
                    <div class="m-portlet__body col-lg-6">
                        <h3>Thông tin trẻ</h3>
                    
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Họ Tên học sinh: </label>
                                <input name="kid_name" type="text" class="form-control m-input"
                                    placeholder="Nhập đầy đủ tên" value="{{ old('kid_name') }}">
                                {!! ShowErrors($errors,'kid_name') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Nick name </label>
                                <input name="nickname" type="text" class="form-control m-input"
                                    placeholder="Nhập nick name" value="{{ old('nickname') }}">
                                {!! ShowErrors($errors,'nickname') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ảnh đại diện trẻ</label>
                                <img id="kid_avatar">
                                <input name="kid_avatar" type="file" class="form-control m-input" placeholder=""
                                    onchange="kidAvatar(this);">
                                {!! ShowErrors($errors,'kid_avatar') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Giới Tính</label>
                                <select name="gender" id="cars" class="form-control">
                                    <option value="">Chọn giới tính</option>
                                    <option @if (old('gender')=="1" ) {{ 'selected' }} @endif value="1" value="1">Nam
                                    </option>
                                    <option @if (old('gender')=="0" ) {{ 'selected' }} @endif value="1" value="0">Nữ
                                    </option>
                                </select>
                                {!! ShowErrors($errors,'gender') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày sinh </label>
                                <input name='date_of_birth' type="date" class="form-control m-input"
                                    value="{{ old('date_of_birth') }}">
                                {!! ShowErrors($errors,'date_of_birth') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Địa chỉ </label>
                                <input name="address" type="text" class="form-control m-input"
                                    placeholder="Nhập địa chỉ đầy đủ" value="{{ old('address') }}">
                                {!! ShowErrors($errors,'address') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày nhập học</label>
                                <input name="admission_date" type="date" class="form-control m-input"
                                    value="{{ old('admission_date') }}">
                                {!! ShowErrors($errors,'admission_date') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Lớp</label>
                                <select name="class_id" id="cars" class="form-control">
                                    <option value="">Chọn lớp</option>
                                    @foreach($classes as $class)
                                    <option {{(old('class_id')==$class->id)? 'selected':''}} value="{{$class->id}}">
                                        {{$class->name}}</option>
                                    @endforeach
                                </select>

                                {!! ShowErrors($errors,'class_id') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Chi tiết </label>
                                <textarea name="description" class="form-control m-input" name="w3review" rows="10"
                                    cols="50">{{old('description')}}</textarea>
                                {!! ShowErrors($errors,'description') !!}
                            </div>
                            <input @if (old('check')==true) {{ 'checked' }} @endif name="check" type="checkbox" id="myCheck"
                            onclick="myFunction()">
                        <label for="myCheck">Đã có thông tin phụ huynh</label>
                        </div>
                    </div>
                    <div class="m-portlet__body col-lg-6">
                        <h3>Thông tin phụ huynh</h3>
                        <div id="parent" class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group" class="parent">
                                <label>Họ tên phụ huynh</label>
                                <input name="parent_name" type="text" class="form-control m-input"
                                    value="{{ old('parent_name') }}">
                                {!! ShowErrors($errors,'parent_name') !!}
                            </div>
                            <div class="form-group m-form__group" class="parent">
                                <label>Ảnh đại diện phụ huynh</label>
                                <img id="parent_avatar">
                                <input name="parent_avatar" type="file" class="form-control m-input" placeholder=""
                                    onchange="parentAvatar(this);">
                                {!! ShowErrors($errors,'parent_avatar') !!}
                            </div>
                            <div class="form-group m-form__group" class="parent">
                                <label>Số điện thoại</label>
                                <input name="phone" type="text" class="form-control m-input"
                                    placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                                {!! ShowErrors($errors,'phone') !!}
                            </div>
                            <div class="form-group m-form__group" class="parent">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control m-input" placeholder="Nhập email"
                                    value="{{ old('email') }}">
                                {!! ShowErrors($errors,'email') !!}
                            </div>
                        </div>
                        <div style="display:none" id="search_phone" class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group" class="parent">
                                <label>Tìm kiếm phụ huynh</label>
                                <input id="search" name="search" type="text" class="form-control m-input"
                                    placeholder="Nhập số điện thoại">
                            </div>
                            <div id="info">
                            </div>
                        </div>
                    </div>
                    <div class="m-form__actions m-form__actions">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{route('nha-truong.tre.index')}}" class="btn btn-secondary">Quay Lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function kidAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#kid_avatar')
                .attr('src', e.target.result)
                .width(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function parentAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#parent_avatar')
                .attr('src', e.target.result)
                .width(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("parent");
    var search = document.getElementById("search_phone");
    if (checkBox.checked == true) {
        text.style.display = "none";
        search.style.display = "block";
    } else {
        text.style.display = "block";
        search.style.display = "none";
    }
});

function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("parent");
    var search = document.getElementById("search_phone");
    if (checkBox.checked == true) {
        text.style.display = "none";
        search.style.display = "block";
    } else {
        text.style.display = "block";
        search.style.display = "none";
    }
}
</script>

<script>
$(document).ready(function() {
    fetch_customer_data();

    function fetch_customer_data(query = '') {
        $.ajax({
            url: "{{ route('nha-truong.tre.search') }}",
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function(data) {
                $('#info').html(data.table_data);
            }
        })
    }

    $(document).on('keyup', '#search', function() {
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
</script>

@endsection
