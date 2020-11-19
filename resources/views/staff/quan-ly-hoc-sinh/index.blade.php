@extends('./staff/layouts/layout')
@section('title','Danh sách học sinh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile"
                    id="main_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-progress">

                            <!-- here can place a progress bar-->
                        </div>
                        <div class="m-portlet__head-wrapper">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon">
                                        <!-- <i class="flaticon-map-location"></i> -->
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                    Danh sách học sinh
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <a href="{{route('nha-truong.index')}}"
                                    class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                                    <span>
                                        <i class="la la-arrow-left"></i>
                                        <span>Quay lại</span>
                                    </span>
                                </a>
                                <a href="{{route('tre.create')}}"
                                    class="btn btn-success m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                                    <span>
                                        <i class="la la-puzzle-piece"></i>
                                        <span>Thêm trẻ</span>
                                    </span>
                                </a>
                                <!-- <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-brand  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-check"></i>
                                            <span>Save</span>
                                        </span>
                                    </button>
                                    <button type="button"
                                        class="btn btn-brand  dropdown-toggle dropdown-toggle-split m-btn m-btn--md"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="la la-plus"></i> Save & New</a>
                                        <a class="dropdown-item" href="#"><i class="la la-copy"></i> Save &
                                            Duplicate</a>
                                        <a class="dropdown-item" href="#"><i class="la la-undo"></i> Save & Close</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="la la-close"></i> Cancel</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                            <!--begin: Form Body -->
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                            id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                            style="width: 954px;">
                                            <thead>
                                              
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Họ và Tên</th>
                                                    <th rowspan="1" colspan="1">Giới tính</th>
                                                    <th rowspan="1" colspan="1">Ngày sinh</th>
                                                    <th rowspan="1" colspan="1">Địa chỉ</th>
                                                    <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                                    <th rowspan="1" colspan="1">Trạng thái</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Họ và Tên</th>
                                                    <th rowspan="1" colspan="1">Giới tính</th>
                                                    <th rowspan="1" colspan="1">Ngày sinh</th>
                                                    <th rowspan="1" colspan="1">Địa chỉ</th>
                                                    <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                                    <th rowspan="1" colspan="1">Trạng thái</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($kids as $kid)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" tabindex="0">{{$kid->id}}</td>
                                                    <td>{{$kid->kid_name}}</td>
                                                    <td>
                                                        @if($kid->gender == 1)
                                                        Nam
                                                        @elseif($kid->gender == 0)
                                                        Nữ
                                                        @endif
                                                    </td>
                                                    <td>{{$kid->date_of_birth}}</td>
                                                    <td>{{$kid->address}}</td>
                                                    <td>
                                                        <img src="{{asset('/upload/avatar/'.$kid->kid_avatar)}}"
                                                            alt="avatar" width="100px">
                                                    </td>
                                                    @if($kid->kid_status == 0)
                                                    <td class="text-danger"> Khóa </td>
                                                    @else
                                                    <td class="text-success"> Hoạt động </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{route('tre.edit', $kid->id)}}"
                                                            class="btn btn-warning btn-sm ">Chi
                                                            tiết</a>&nbsp;
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
                                {{ $kids->links() }}
                            </ul>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection