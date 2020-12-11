@extends('./staff/nha-truong/layouts/layout')
@section('title','Chuyển lớp cho trẻ')
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
            </div>
            <div class="m-portlet__body">
                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" action="{{ route('nha-truong.tre.save_change', $kid->id) }}" method="post">
                @csrf
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Học sinh</label>
                        <div class="col-lg-6">
                        <input disabled type="text" name="name" class="form-control m-input" value="{{$kid->kid_name}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Ngày sinh</label>
                        <div class="col-lg-6">
                        <input disabled type="text" name="name" class="form-control m-input" value="{{$kid->date_of_birth}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Lớp cũ</label>
                        <div class="col-lg-6">
                        <input disabled type="text" name="name" class="form-control m-input" value="{{$kid->getClass->name}}">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Lớp mới</label>
                        <div class="col-lg-6">
                        <select name="class_id" class="form-control m-input" >
                        <option value="">Chọn lớp muốn chuyển</option> 
                            @foreach($classes as $class)
                                
                                <option value="{{$class->id}}">{{$class->name}}</option> 
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="m-form__actions m-form__actions">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                        <a href="{{route('nha-truong.tre.index')}}" class="btn btn-secondary">Quay Lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection