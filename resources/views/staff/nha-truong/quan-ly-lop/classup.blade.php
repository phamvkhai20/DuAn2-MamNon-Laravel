@extends('./staff/nha-truong/layouts/layout')
@section('title','Lên lớp')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
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
     @if(session('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('error') }}
        </div>
     @endif 
            <div class="m-portlet__body">
         <form action="{{route('nha-truong.lop.save_class_up')}}" method="post"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Lớp cũ</label>
                                <div class="col-lg-6">
                                    <select name="old_class_id" class="form-control">
                                        <option value="">Chọn lớp</option>
                                        @foreach($classes as $class)
                                        <option {{(old('old_class_id')==$class->id)? 'selected':''}} value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input @if (old('check')==true) {{ 'checked' }} @endif name="check" type="checkbox" id="myCheck"
                                onclick="myFunction()">
                            <label for="myCheck">Đã có lớp mới</label>
                                </div>
                            </div>         
                            <div id='create_new_class'>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Khối</label>
                                <div class="col-lg-6">
                                    <select name="grade_id" class="form-control">
                                        <option value="">Chọn khối</option>
                                        @foreach($grades as $grade)
                                        <option {{(old('grade_id')==$grade->id)? 'selected':''}} value="{{$grade->id}}">{{$grade->grade}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div> 
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Lớp mới</label>
                                <div class="col-lg-6">
                                    <input name="class_name" type="text" class="form-control m-input"
                                        placeholder="Tên lớp mới">
                                </div>
                            </div>
                            
                            </div>     
                            <div id="choose_class">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Khối</label>
                                <div class="col-lg-6">
                                    <select name="gradeId" class="form-control">
                                        <option value="">Chọn khối</option>
                                        @foreach($grades as $grade)
                                        <option {{(old('grade_id')==$grade->id)? 'selected':''}} value="{{$grade->id}}">{{$grade->grade}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div> 
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Lớp mới</label>
                                <div class="col-lg-6">
                                    <select name="class_id" class="form-control">
                                        <option value="">Chọn lớp</option>
                                        @foreach($classes as $class)
                                        <option {{(old('class_id')==$class->id)? 'selected':''}} value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div> 
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">Xác nhận</button>
                                        <a href="{{route('nha-truong.khoi.index')}}" class="btn btn-secondary">Quay
                                            lại</a>
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
<script>
    $(document).ready(function() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("create_new_class");
    var search = document.getElementById("choose_class");
    if (checkBox.checked == true) {
        text.style.display = "none";
        search.style.display = "inline";
    } else {
        text.style.display = "inline";
        search.style.display = "none";
    }
});

function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("create_new_class");
    var search = document.getElementById("choose_class");
    if (checkBox.checked == true) {
        text.style.display = "none";
        search.style.display = "block";
    } else {
        text.style.display = "block";
        search.style.display = "none";
    }
}

</script>
<script type="text/javascript">
    var url = "{{ route('nha-truong.lop.grade') }}";
    $("select[name='gradeId']").change(function(){
        var grade_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                grade_id: grade_id,
                _token: token
            },
            success: function(data) {
                $("select[name='class_id'").html('');
                $.each(data, function(key, value){
                    $("select[name='class_id']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });
</script>

@endsection
