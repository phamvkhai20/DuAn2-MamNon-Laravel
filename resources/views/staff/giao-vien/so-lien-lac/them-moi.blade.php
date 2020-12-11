@extends('./staff/giao-vien/layouts/layout')
@section('title','Thêm sổ liên lạc')
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
                        <a href="{{route('giao-vien.index')}}"
                            class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>Quay lại</span>
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="m-portlet__body">
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                        action="{{route('giao-vien.them-so-lien-lac.them-moi',['id'=>session('class')])}}"
                        method="post">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <h4 class="col-lg-1 col-form-label">Tiêu đề:</h4>
                                <div class="col-lg-12">
                                
                                <input type="text" name="title" class="form-control m-input">
                                <input type="hidden" id="contactBook" value="{{session('contactBook')}}" class="form-control m-input">
                                </div>
                            </div>
                            <input type="hidden" name="teacher_id" value="{{Auth::guard('teacher')->user()->id}}">
                            <div class="form-group m-form__group row">
                                <h4 class="col-lg-1 col-form-label">Trẻ:</h4>
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="checkbox" id="check_all" onclick="chekboxFull()"></th>
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                        </tr>
                                    </thead>
                                    <tbody id="change_list">
                                        @foreach ($kids as $key=>$kid)
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="checkbox" id="check_all"
                                                    name="checkKid[ {{$kid->id}}]"></th>
                                            <th rowspan="1" colspan="1">{{$kid->kid_name}}</th>
                                            <th rowspan="1" colspan="1">
                                                @if($kid->gender==1)
                                                Nam
                                                @else
                                                Nữ
                                                @endif
                                            </th>
                                            <th rowspan="1" colspan="1">{{$kid->date_of_birth}}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @foreach($formComments as $formComment)
                            <div class="m-portlet m-portlet--mobile m-portlet--sortable">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="la la-thumb-tack m--font-success"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text m--font-success">
                                                {{ $formComment->title}}
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <h4 class="col-lg-1 col-form-label">Khác:</h4>
                                        <div class="col-lg-12">
                                            <input type="email" class="form-control m-input" placeholder="Full name">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body ">
                                    <div class="m-radio-inline">
                                        @foreach($formComment->comment_response_forms as $comment_response_form)
                                        <label class="m-radio m-radio--solid m-radio--brand">
                                            <input type="radio" name="response[{{$formComment->id}}]"
                                                value="{{$comment_response_form->id}}"> {{$comment_response_form->name}}
                                            <span></span>
                                        </label>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="submit" class="btn btn-brand">Submit</button>
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let isStatus= false;
        function chekboxFull(){
            var x = document.querySelectorAll("input[type='checkbox']");
            for (let i = 0; i < x.length; i++) {
                isStatus?x[i].checked=true:x[i].checked=false;
            }
            isStatus = !isStatus;
        }

        function thongbao() {
        var x = document.querySelector('#contactBook').value;
        x && swal("Xong!", "Bạn đã thêm sổ liên lạc thành công", "success");
    }
    setTimeout(() => {
        thongbao();
    }, 0);
    </script>
    @endsection