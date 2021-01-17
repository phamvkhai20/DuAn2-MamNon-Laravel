@extends('./staff/phu-huynh/layouts/layout')
@section('title','Xem điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
     
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @yield('title') - {{$kid->kid_name}}
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
                    @php 
                        $statusAttendance=['1'=>'Đi học','2'=>"Nghỉ phép",'0'=>'Nghỉ không phép'];
                        $styleAttendance=['1'=>'m--font-success','2'=>"m--font-primary",'0'=>'m--font-danger'];
                        $statusMeal=['on'=>"Có ăn",'off'=>"không ăn",'0'=>"không ăn"];
                        $styleMeal=['on'=>'m--font-success','off'=>'m--font-danger','0'=>'m--font-danger'];
                    @endphp
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
                                            <th rowspan="1" colspan="1">Khác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kid->attendance as $key=>$attendance)
                                        <tr>
                                            <td rowspan="1" colspan="1">{{$key+1}}</td>
                                            <td rowspan="1" colspan="1">
                                                @php
                                                $scheduled_day = $attendance->date;
                                                $days = ['Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ
                                                bảy'];
                                                $day = date('w',strtotime($scheduled_day));
                                                $scheduled_day = $days[$day]."<br>".date('d-m-Y',
                                                strtotime($scheduled_day));
                                                echo $scheduled_day;
                                                @endphp
                                            </td>
                                            <td rowspan="1" colspan="1">
                                            @if($attendance->arrival_time != "00:00:00")
                                                <span class="m--font-success">
                                                    Đi học
                                                </span>
                                            @elseif($attendance->arrival_time == "00:00:00")
                                            <span class="m--font-danger">
                                                    Nghỉ học
                                                </span>
                                            
                                            @elseif($attendance->status == 2)
                                            <span class="m--font-primary">
                                                   Nghỉ có phép
                                                </span>
                                            @endif
                                            <td rowspan="1" colspan="1">{{$attendance->arrival_time}}</td>
                                            <td rowspan="1" colspan="1">{{$attendance->leave_time}}</td>
                                            <td rowspan="1" colspan="1"><a href="#" data-toggle="modal" data-target="#m_modal_{{$attendance->id}}">Ghi chú</a> </td>
                                            <div class="modal fade" id="m_modal_{{$attendance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Khác</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{$attendance->note!="null"?$attendance->note:''}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection