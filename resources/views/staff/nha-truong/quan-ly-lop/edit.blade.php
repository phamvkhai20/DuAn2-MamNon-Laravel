@extends('./staff/nha-truong/layouts/layout')
@section('title','Sửa lớp học')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper " onload="getTeacher()">
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
                    <!--begin::Form-->
                    <form action="{{route('nha-truong.lop.save_edit',['id'=>$class->id])}}" method="post"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên Lớp:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" value="{{$class->name}}" class="form-control m-input"
                                        placeholder="Nhập tên đầy đủ">
                                    @error('name')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">ID Khối :</label>
                                <div class="col-lg-6">
                                    <select name="grade_id" class="form-control" value="{{$class->grade_id}}">
                                        @foreach($grade as $gr)
                                        <option value="{{$gr->id}}">{{$gr->grade}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
                                </div>
                            </div>
                            <div class="m-form__group m-form__group--last form-group row">
                                <label class="col-lg-2 col-form-label">ID Năm Học:</label>
                                <div class="col-lg-6">
                                    <input value="{{$year->id}}" id="school_year" hidden class="form-control"
                                        name="school_year_id" />

                                    <input value="{{$year->school_year}}" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="m-form__group m-form__group--last form-group row">
                                <label class="col-lg-2 col-form-label">Giáo viên:</label>
                                <div class="col-lg-6">
                                    <select class="form-control " id="m_select2_3" name="param[]" multiple="multiple">
                                        <optgroup label="Giáo viên hiện tại">
                                            @foreach($class->assignments as $teacher)
                                            <option value="{{$teacher->teacher->id}}" selected>
                                                {{$teacher->teacher->fullname}}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Giáo viên" id="teacher">
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">Sửa</button>
                                        <a href="{{route('nha-truong.lop.index')}}" class="btn btn-secondary">Quay
                                            Lại</a>
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
var school_year = document.querySelector('#school_year').value;
axios.get(
        `{{route('nha-truong.giao-vien.get-list')}}`, {
            params: {
                school_year: school_year
            }
        })
    .then(function(response) {
        document.querySelector('#teacher').innerHTML = response.data.teacher.map(teacher =>
            `<option value="${teacher.id}">${teacher.fullname}</option>`);
    })
    .catch(function(error) {
        console.log(error);
    })
    .then(function() {});
</script>
@endsection