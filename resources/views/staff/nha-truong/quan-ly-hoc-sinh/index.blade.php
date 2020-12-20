@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách học sinh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3 ">
    <div class="">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <div class="m-form m-form--label-align-right  ">
                    <div class="row align-items-center">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="ml-4 dropdown pt-3 pb-4 mt-2">
                                            <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lọc theo trạng thái
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}">Tất cả</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}?kid_status=1">Đang học</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}?kid_status=2">Thôi học</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}?kid_status=3">Đã tốt nghiệp</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                    <div class="ml-4 dropdown pt-3 pb-4 mt-2">
                                            <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lọc theo giới tính
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}">Tất cả</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}?gender=0">Đang học</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.tre.index')}}?gender=1">Thôi học</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                
                                <div class="col-md-3">
                                <form action="" class="d-flex">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input value="{{request()->get('kid_name')}}" name="kid_name" id="searchByName" type="text" class="form-control m-input m-input--solid"
                                            placeholder="Search...">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>

                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="m_datatable" id="column_rendering"></div>

            </div>
        </div>
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
                    <a href="{{route('nha-truong.tre.create')}}"
                        class="btn btn-success m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Thêm trẻ</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="m-portlet__body">

                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                    <div class="">
                        <div class="row">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                    style="min-width: 954px;width:100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Họ tên</th>
                                            <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Họ tên</th>
                                            <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1">
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(count($kids) == 0)
                                    <tr>
                                        <th colspan="8" class="text-center"><label class="col-lg-10 text-danger">Không tìm thấy học sinh nào!</label> </th>
                                    </tr>
                                    @endif
                                        @foreach ($kids as $kid)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">{{$kid->id}}</td>
                                            <td>{{$kid->kid_name}}</td>
                                            <td>
                                                <img src="{{asset('upload/avatar/'.$kid->kid_avatar)}}" alt="avatar"
                                                    width="100px">
                                            </td>
                                            @if($kid->gender == 0)
                                            <td > Nữ </td>
                                            @elseif($kid->gender == 1)
                                            <td > Nam </td>
                                           
                                            @endif
                                            <td>{{$kid->date_of_birth}}</td>
                                            <td>{{$kid->address}}</td>

                                            @if($kid->kid_status == 1)
                                            <td class="text-success"> Đang học </td>
                                            @elseif($kid->kid_status == 2)
                                            <td class="text-danger"> Thôi học </td>
                                            @elseif($kid->kid_status == 3)
                                            <td class="text-primary"> Đã tốt nghiệp </td>
                                            @endif
                                            @if($kid->kid_status == 1)
                                            <td>
                                                <a href="{{route('nha-truong.tre.edit', $kid->id)}}"
                                                    class="btn btn-warning btn-sm ">Chi
                                                    tiết</a>&nbsp;
                                                    <a href="{{route('nha-truong.tre.change_class', $kid->id)}}"
                                                    class="btn btn-primary btn-sm ">Chuyển lớp</a>&nbsp;
                                                    <br>
                                                    <a href="{{route('nha-truong.tre.stop', $kid->id)}}"
                                                    class="btn btn-danger btn-sm ">Thôi học</a>&nbsp;
                                                    <a href="{{route('nha-truong.tre.history', $kid->id)}}"
                                                    class="btn btn-info btn-sm ">Lịch sử học</a>&nbsp;
                                            </td>
                                            @elseif($kid->kid_status == 2 || $kid->kid_status == 3)
                                            <td>
                                                <a href="{{route('nha-truong.tre.edit', $kid->id)}}"
                                                    class="btn btn-warning btn-sm ">Chi
                                                    tiết</a>&nbsp;
                                                    <a href="{{route('nha-truong.tre.history', $kid->id)}}"
                                                    class="btn btn-info btn-sm ">Lịch sử học</a>&nbsp;
                                            </td>
                                            @endif
                             
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <div id="m_table_1_processing" class="dataTables_processing card"
                                    style="display: none;">
                                    Processing...</div>
                            </div>
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                            <ul class="pagination">
                                {{ $kids->links() }}
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#smbt").click(function()  {
        var stt = $("#stt").val();
        var name = $("#searchByName").val();
        
        $.ajax({
            url: "{{ route('nha-truong.tre.filter') }}",
            method: 'GET',
            data: {
                stt:stt,
                name:name
            },
            dataType: 'json',
            success: function(data) {
                $('#filter').html(data.table_data);
            }
        })
    });
});
</script>
@endsection