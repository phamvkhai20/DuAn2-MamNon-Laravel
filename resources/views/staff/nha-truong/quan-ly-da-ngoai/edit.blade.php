@extends('./staff/nha-truong/layouts/layout')
@section('title','Sửa dã ngoại')
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
                    action="{{ route('nha-truong.dangoai.save_edit', $picnic->id) }}" method="post">
                    @csrf
                    <div class="m-portlet__body col-lg-6">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label for="example_input_full_name">Tên buổi dã ngoại: </label>
                                <input name="name" type="text" class="form-control m-input"
                                    placeholder="Nhập đầy đủ tên" value="{{$picnic->name}}">
                                    {!! ShowErrors($errors,'name') !!}

                            </div>
                           <div class="form-group m-form__group">
                                <label>Thời gian </label>
                                <input name="time" type="date" class="form-control m-input"
                                    value="{{$picnic->time}}">
                                    {!! ShowErrors($errors,'time') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Địa chỉ </label>
                                <input name="address" type="text" class="form-control m-input"
                                    placeholder="Nhập địa chỉ đầy đủ" value="{{$picnic->address}}">
                                    {!! ShowErrors($errors,'addres') !!}
                            </div>
                             <div class="form-group m-form__group">
                                <label>Chi phí buổi dã ngoại </label>
                                <input name="price" type="text" class="form-control m-input"
                                    placeholder="Nhập chi phí đầy đủ" value="{{$picnic->price}}">
                                    {!! ShowErrors($errors,'price') !!}
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__body col-lg-6">
                        <div class="m-form__section m-form__section--first">
                         <div class="form-group m-form__group">
                                <label>Tên phụ huynh đi cùng </label>
                                <input name="name_parent" type="text" class="form-control m-input"
                                    placeholder="Nhập địa chỉ đầy đủ" value="{{$picnic->name_parent}}">
                                    {!! ShowErrors($errors,'name_parent') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ảnh buổi picnic </label>
                                <br>
                                <img src="{{asset('/upload/avatar/'.$picnic->picnic_avatar)}}" id="avatar" width="300px">
                                <input name="picnic_avatar" type="file" class="form-control m-input" placeholder=""
                                    onchange="readURL(this);">
                                    {!! ShowErrors($errors,'picnic_avatr') !!}
                            </div>
                            <div class="form-group m-form__group">
                                <label>Mô tả </label>
                                <textarea id="w3review" class="form-control m-input" name="description" rows="10"
                                    cols="50">{{$picnic->description}}</textarea>
                                    {!! ShowErrors($errors,'description') !!}

                            </div>

                        </div>

                    </div>
                    <div class="">
                        <div class="m-form__actions m-form__actions">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{route('nha-truong.dangoai.index')}}" class="btn btn-secondary">Quay Lại</a>
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
