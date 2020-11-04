@extends('./staff/layouts/layout')
@section('title','Dashboard')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper container">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Danh Sách Lớp</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Forms &amp; Controls</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Form Layouts</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                                <span class="m-nav__link-text">Default Forms</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first m--hide">
                                                <span class="m-nav__section-text">Quick Actions</span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">Activity</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">Support</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__separator m-nav__separator--fit">
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline" id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 954px;">
                                <thead>
                                <tr>
                                    <a href="{{route('hocSinh.them')}}" class="btn btn-sm btn-success">Thêm</a>
                                </tr>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Họ và Tên</th>
                                    <th rowspan="1" colspan="1">Giới tính</th>
                                    <th rowspan="1" colspan="1">Ngày sinh</th>
                                    <th rowspan="1" colspan="1">Địa chỉ</th>
                                    <th rowspan="1" colspan="1">Ảnh đại diện</th>
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
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">1</td>
                                    <td>Nguyễn văn a</td>
                                    <td>Nam</td>
                                    <td>17/01/2020</td>
                                    <td>Hà nội</td>
                                    <td><img src="{{ asset('assets_staff/app/media/img/products/product1.jpg') }}" alt="" style="width: 100px"></td>
                                    <td>
                                        <a href="{{route('hocSinh.sua')}}" class="btn btn-warning btn-sm ">Sửa</a>&nbsp;
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div id="m_table_1_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="m_table_1_info" role="status" aria-live="polite">Hiển thị 1 đến 10 trong số 30 mục nhập</div>
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
@endsection
