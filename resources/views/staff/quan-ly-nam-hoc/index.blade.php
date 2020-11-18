@extends('./staff/layouts/layout')
@section('title','Danh sách năm học')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Danh Sách Năm Học</h3>
            </div>

        </div>
    </div>

    <div class="m-portlet m-portlet--mobile mt-3">
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline" id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 954px;">
                            <thead>
                                <tr>
                                    <a href="{{route('nam.them_moi')}}" class="btn btn-sm btn-success">Thêm</a>
                                </tr>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Năm</th>
                                    <th></th>
                                </tr>
                    </div>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">ID</th>
                            <th rowspan="1" colspan="1">Năm</th>

                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($year as $yr)
                        <tr role="row" class="odd">
                            <td class="sorting_1" tabindex="0">{{$yr->id}}</td>
                            <td>{{$yr->school_year}}</td>
                            <td>
                                <a href="sua/{{$yr->id}}" class="btn btn-warning btn-sm ">Sửa</a>&nbsp;
                                <a href="xoa/{{$yr->id}}" class="btn btn-danger btn-sm btn-remove">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div id="m_table_1_processing" class="dataTables_processing card" style="display: none;">
                        Processing...</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="m_table_1_info" role="status" aria-live="polite">Hiển thị 1 đến 10
                        trong số 30 mục nhập</div>
                </div>
                <div class="col-sm-12 col-md-7 dataTables_pager">
                    <div class="dataTables_length" id="m_table_1_length">
                        <label>Display
                            <select name="m_table_1_length" aria-controls="m_table_1" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </label>
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="m_table_1_previous">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="0" tabindex="0" class="page-link">
                                    <i class="la la-angle-left"></i>
                                </a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                            </li>
                            <li class="paginate_button page-item disabled" id="m_table_1_ellipsis">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="6" tabindex="0" class="page-link">…</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="7" tabindex="0" class="page-link">35</a>
                            </li>
                            <li class="paginate_button page-item next" id="m_table_1_next">
                                <a href="#" aria-controls="m_table_1" data-dt-idx="8" tabindex="0" class="page-link">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
