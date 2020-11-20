@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách lớp học')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Danh Sách Lớp</h3>
            </div>
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile mt-3" style="height: 70px;">
        <a href="{{route('lop.them-moi')}}" style="margin:20px 0 0 20px" class="btn btn-sm btn-success">Thêm</a>
    </div>

    <div class="m-content">
        <div class="row">
            @foreach($grades as $grade )
            @if($grade->classes->count()>0)
            <div class="col-lg-6">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{$grade->grade}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                        id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                        style="width: 954px;">
                                        <thead>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Tên Lớp</th>
                                                <th rowspan="1" colspan="1">Năm Học</th>
                                                <th rowspan="1" colspan="1">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($grade->classes as $key=>$cl )
                                            <tr role="row" class="odd">
                                                <td class="sorting_1" tabindex="0">{{$key+1}}</td>
                                                <td>{{$cl->name}}</td>
                                                <td>{{$cl->school_years->school_year}}</td>
                                                <td>
                                                    <a href="sua/{{$cl->id}}"
                                                        class="btn btn-warning btn-sm ">Sửa</a>&nbsp;
                                                    <a href="xoa/{{$cl->id}}"
                                                        class="btn btn-danger btn-sm btn-remove">Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div id="m_table_1_processing" class="dataTables_processing card"
                                        style="display: none;">
                                        Processing...</div>
                                </div>
                        </div>
                    </div>
                </div>

                <!--end::Portlet-->
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection