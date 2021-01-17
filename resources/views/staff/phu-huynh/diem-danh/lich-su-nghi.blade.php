@extends('./staff/phu-huynh/layouts/layout')
@section('title','Lịch sử nghỉ')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
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
                <div class="m-portlet__head-tools">
                    <a href="{{route('phu-huynh.index',['id'=>session('id_kid_default')])}}"
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

                    <!--begin: Form Body -->
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                    style="min-width: 990px;width:100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1">STT</th>
                                            <th rowspan="1" colspan="1">Ngày</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1">Giờ đến</th>
                                            <th rowspan="1" colspan="1">Giờ về</th>
                                            <th rowspan="1" colspan="1">Ăn</th>
                                            <th rowspan="1" colspan="1">Khác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="1" colspan="1">
                                                <h5>Dự kiến</h5>
                                            </td>

                                        </tr>
                                        @foreach($future->attendance as $key=>$attendance)
                                        <tr>
                                            <td rowspan="1" colspan="1">{{$key+1}}</td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                $scheduled_day = $attendance->date;
                                                $days = ['Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ
                                                7'];
                                                $day = date('w',strtotime($scheduled_day));
                                                $scheduled_day = $days[$day]."<br>".date('d-m-Y',
                                                strtotime($scheduled_day));
                                                echo $scheduled_day;
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                if($attendance->status==0){echo "Nghỉ không phép";}
                                                if($attendance->status==1){echo "Đi học";}
                                                if($attendance->status==2){echo "Nghỉ phép";}
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1">{{$attendance->arrival_time}}</td>
                                            <td rowspan="1" colspan="1">{{$attendance->leave_time}}</td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                if($attendance->meal==0){echo "Không ăn";}else{
                                                echo "Có ăn";
                                                }
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1"><a href="">Chi tiết</a> </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td rowspan="1" colspan="1">
                                                <h5>Lịch sử</h5>
                                            </td>

                                        </tr>
                                        @foreach($history->attendance as $key=>$attendance)
                                        <tr>
                                            <td rowspan="1" colspan="1">{{$key+1+count($future->attendance)}}</td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                $scheduled_day = $attendance->date;
                                                $days = ['Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ
                                                7'];
                                                $day = date('w',strtotime($scheduled_day));
                                                $scheduled_day = $days[$day]."<br>".date('d-m-Y',
                                                strtotime($scheduled_day));
                                                echo $scheduled_day;
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                if($attendance->status==0){echo "Nghỉ không phép";}
                                                if($attendance->status==1){echo "Đi học";}
                                                if($attendance->status==2){echo "Nghỉ phép";}
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1">{{$attendance->arrival_time}}</td>
                                            <td rowspan="1" colspan="1">{{$attendance->leave_time}}</td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                if($attendance->meal==0){echo "Không ăn";}else{
                                                echo "Có ăn";
                                                }
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1"><a href="">Chi tiết</a> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Tổng buổi nghỉ</th>
                                        <th>{{count($future->attendance)+count($history->attendance)}}</th>
                                    </tfoot>

                                </table>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection