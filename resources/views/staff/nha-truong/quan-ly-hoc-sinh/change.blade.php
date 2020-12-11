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
                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" action="{{ route('nha-truong.tre.save') }}" method="post">
                @csrf
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Chọn lớp</label>
                        <div class="col-lg-6">
                        <select id="change" name="old_class_id" class="form-control m-input" >
                        <option value="">Chọn lớp</option> 
                            @foreach($classes as $class)
                                <option  value="{{$class->id}}" >{{$class->name}}</option> 
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Chọn học sinh</label>
                        <div  class="col-lg-10">
                        <table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline" id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                    >
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="checkbox" id="check_all"></th>  
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                        </tr>
                                    </thead>
                                    <tbody id="change_list">

                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Chọn lớp mới</label>
                        <div class="col-lg-6">
                        <select name="class_id" name="old_class_id" class="form-control m-input" >
                        <option value="">Chọn lớp mới</option> 
                            @foreach($classes as $class)
                                <option  value="{{$class->id}}" >{{$class->name}}</option> 
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
<script>
$(document).ready(function() {
    fetch_customer_data();

    function fetch_customer_data(query = '') {
        $.ajax({
            url: "{{ route('nha-truong.tre.change_list') }}",
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function(data) {
                $('#change_list').html(data.table_data);
            }
        })
    }

    $("select[name='old_class_id']").change(function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});

</script>


@endsection