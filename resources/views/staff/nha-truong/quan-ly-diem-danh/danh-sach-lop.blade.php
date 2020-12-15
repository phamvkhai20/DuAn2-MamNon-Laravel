@extends('./staff/nha-truong/layouts/layout')
@section('title','Điểm danh lớp')
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
                                            <th rowspan="1" colspan="1">Tên lớp</th>
                                            <th rowspan="1" colspan="1">Sĩ số</th>
                                            <th rowspan="1" colspan="1">Giáo viên</th>
                                            <th rowspan="1" colspan="1">Điểm danh lúc</th>
                                            <th rowspan="1" colspan="1"></th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classes as $key=>$class)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$class->name}}</td>
                                            <td>{{count($class->attendance)}}/{{count($class->kids)}}</td>
                                            <td>
                                                <style>
                                                .image__teacher {
                                                    width: 40px;
                                                    height: 40px;
                                                    background-position: center;
                                                    background-repeat: no-repeat;
                                                    background-size: cover;
                                                    position: relative;
                                                    border-radius: 50%;
                                                    padding: 10px;
                                                }
                                                </style>
                                                <ul class="list-unstyled fw-normal pb-1">
                                                    @foreach($class->assignments as $teacher)
                                                    <li class="m-1">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class=" m-menu__link-icon image__teacher"
                                                                    style="background-image: url(<?php echo '/upload/avatar/' . $teacher->teacher->avatar?> )">
                                                                </div>
                                                            </div>
                                                            <span class="col-md-9"
                                                                style="line-height: 40px;">{{$teacher->teacher->fullname}}</span>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{count($class->attendance)>0?$class->attendance[0]->created_at:''}}</td>

                                            <td>
                                                <ul class="list-unstyled fw-normal ">
                                                    <li>
                                                        <a href="{{route('nha-truong.diem-danh.chi-tiet-lop',['id'=>$class->id])}}" class="btn btn-brand m-btn m-btn--icon">
                                                            <span>
                                                                <i class="la la-calendar-check-o"></i>
                                                                <span>Điểm danh ngày</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('nha-truong.diem-danh.chi-tiet-lop',['id'=>$class->id])}}" class="btn btn-info m-btn m-btn--icon">
                                                            <span>
                                                                <i class="la la-archive"></i>
                                                                <span>Tổng hợp</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>


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
@endsection