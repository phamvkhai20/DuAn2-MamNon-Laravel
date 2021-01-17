@extends('./staff/giao-vien/layouts/layout')
@section('title','Danh sách học sinh')
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
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Ảnh đại diện</th>
                                            <th rowspan="1" colspan="1">Họ và Tên</th>
                                            <th rowspan="1" colspan="1">Giới tính</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($classes->kids as $kid)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">{{$kid->id}}</td>
                                            <td>
                                                <img src="{{asset('/upload/avatar/'.$kid->kid_avatar)}}" alt="avatar"
                                                    style="width:50px;border-radius: 10px;">
                                            </td>
                                            <td>{{$kid->kid_name}}</td>
                                            <td>
                                                @if($kid->gender == 1)
                                                Nam
                                                @elseif($kid->gender == 0)
                                                Nữ
                                                @endif
                                            </td>
                                            <td>{{$kid->date_of_birth}}</td>
                                            <td style="width:22%"><span>{{$kid->address}}</span></td>
                                            <td class="text-success"> Đang học </td>
                                            <td>
                                            <a href="{{route('giao-vien.xem-thong-tin-tre',['id'=>$kid->id])}}"
                                                    class="btn btn-warning btn-sm ">Chi
                                                    tiết</a>
                                                    
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection