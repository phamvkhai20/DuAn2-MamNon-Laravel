@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách học sinh chưa xếp lớp')
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

                <form action="{{route('nha-truong.tre.save_arrange')}}" method="post" class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                @csrf
                    <div class="">
                    <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Chọn khối:</label>
                                <div class="col-lg-3">
                                    <select name="grade_id" class="form-control">
                                        <option value="">Chọn khối</option>
                                                @foreach ($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->grade}}</option>
                                                @endforeach
                                    </select>
                                </div>
                                <label class="col-lg-2 col-form-label">Chọn lớp:</label>
                                <div class="col-lg-3">
                                    <select name="class_id" class="form-control">
                                        <option value="">Chọn lớp</option>
                                    </select>
                                </div>
                            </div>
                        <div class="row">
                        
                            <div class="table-responsive">
                            
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                    style="min-width: 954px;width:100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="checkbox" id="check_all" onclick="chekboxFull()"></th>  
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Nickname</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="checkbox" id="check_all" onclick="chekboxFull()"></th>  
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Nickname</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>     
                                        </tr>
                                    </tfoot>
                                   
                                    <tbody id="kid_list">
                                    
                                    </tbody>
                                </table>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">Xác nhận</button>
                                        <a href="{{route('nha-truong.nha-truong.index')}}" class="btn btn-secondary">Quay
                                            Lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                            <ul class="pagination">
                                
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function chekboxFull(){
            var x = document.querySelectorAll("input[type='checkbox']");
            for (let i = 0; i < x.length; i++) {
                x[i].checked=true;
            }
        }

        let isStatus= false;
        function chekboxFull(){
            var x = document.querySelectorAll("input[type='checkbox']");
            for (let i = 0; i < x.length; i++) {
                isStatus?x[i].checked=true:x[i].checked=false;
            }
            isStatus = !isStatus;
        }
</script>
<script type="text/javascript">
    var url = "{{ route('nha-truong.tre.searchByGrade') }}";
    $("select[name='grade_id']").change(function(){
        var grade_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                grade_id: grade_id,
                _token: token
            },
            dataType: 'json',
            success: function(data) {
                $("select[name='class_id'").html('');
                $.each(data.classes, function(key, value){
                    $("select[name='class_id']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
                $("#kid_list").html('');
                $.each(data.kids, function(key, value){
                    $("#kid_list").append(
                        "<tr><td><input type='checkbox' class='checkitem' name='check[]' value='"+value.id+"'"+ "></td><td>" + value.kid_name + "</td><td>" + value.nickname + "</td><td>" + value.date_of_birth + "</td><td>" + value.gender +"</td><td>" + value.address + "</td><tr>"
                    );
                });
            }
        });
    });
</script>

@endsection