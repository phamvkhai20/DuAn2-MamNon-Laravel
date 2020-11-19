@extends('./staff/layouts/layout')
@section('title','Danh sách giáo viên')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Danh Sách Giáo Viên</h3>
        
            </div>
        
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile mt-3">
        <div class="m-portlet__body">
            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="table-responsive">
                        <table
                            class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                            id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 954px;">
                            <thead>
                                <tr>
                                    <a href="{{route('giao-vien.them')}}" class="btn btn-sm btn-success">Thêm</a>
                                </tr>
                                 <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Tên GV</th>
                                    <th rowspan="1" colspan="1">Ảnh</th>
                                    <th rowspan="1" colspan="1">SĐT</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Vai Trò</th>
                                    <th rowspan="1" colspan="1">Trạng Thái</th>
                                    <th rowspan="1" colspan="1">
                                    </th>
                                </tr>
                            </thead>
									<tfoot>
										<tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Tên GV</th>
                                            <th rowspan="1" colspan="1">Ảnh</th>
                                            <th rowspan="1" colspan="1">SĐT</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Vai Trò</th>
                                            <th rowspan="1" colspan="1">Trạng Thái</th>
                                            <th rowspan="1" colspan="1">
                                    </th>
                                        </tr>
									</tfoot>
								<tbody>
                                @foreach ($teachers as $teacher)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{$teacher->id}}</td>
                                        <td>{{$teacher->fullname}}</td>
                                        <td>
                                            <img src="{{asset('upload/avatar/'.$teacher->avatar)}}"  alt="avatar" width="100px"> 
                                        </td>
                                        <td>{{$teacher->phone}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{ $teacher->getTeacherType->teacher_type}}</td>
                                        
                                            @if($teacher->status == 0)
                                            <td class="text-danger"> Khóa </td>
                                            @else
                                            <td class="text-success"> Hoạt động </td>
                                            @endif
                                        </td>
                                        
                                       <td>
                                           <a href="{{ route('giao-vien.sua', $teacher->id) }}" class="btn btn-warning btn-sm ">Chi tiết</a>&nbsp;
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
                        <div class="dataTables_info" id="m_table_1_info" role="status" aria-live="polite">Hiển thị 1 đến
                            10 trong số 30 mục nhập</div>
                    </div>
                    <div class="col-sm-12 col-md-7 dataTables_pager">
                        <div class="dataTables_length" id="m_table_1_length">
                            <label>Display
                                <select name="m_table_1_length" aria-controls="m_table_1"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                            <ul class="pagination">
                            {{ $teachers->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            @endsection