@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách khối học')
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
                                        <div class="m-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select m-bootstrap-select--solid"
                                                id="m_form_status">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label class="m-label m-label--single">Type:</label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select m-bootstrap-select--solid"
                                                id="m_form_type">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid"
                                            placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>

                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <button type="button" class="btn btn-secondary">Tìm kiếm</button>
                                    </div>
                                </div>
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
                    <a href="{{route('nha-truong.khoi.them_moi')}}"
                        class="btn btn-success m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Thêm khối học</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="m-portlet__body">

                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                    <!--begin: Form Body -->
                    <div class="">
                        <div class="row">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                    style="min-width: 990px;width:100%">
                                    <thead>
                                        <tr>
                                            <a href="{{route('nha-truong.khoi.them_moi')}}"
                                                class="btn btn-sm btn-success">Thêm</a>
                                        </tr>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Tên Khối</th>
                                            <th></th>
                                        </tr>
                            </div>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Tên khối</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($grade as $gr)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">{{$gr->id}}</td>
                                    <td>{{$gr->grade}}</td>
                                    <td>
                                        <a href="sua/{{$gr->id}}" class="btn btn-warning btn-sm ">Sửa</a>&nbsp;
                                        <a href="xoa/{{$gr->id}}" class="btn btn-danger btn-sm btn-remove">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>

                            <div id="m_table_1_processing" class="dataTables_processing card" style="display: none;">
                                Processing...</div>
                        </div>
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                        <ul class="pagination">
                            sbc
                        </ul>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection