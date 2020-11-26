@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="row">
                        <div class="m-portlet__head-title col 6">
                            <h3 class="m-portlet__head-text">
                                Xem điểm danh
                            </h3>
                        </div>
                        <div class="input-group date col-6">
                            <input type="text" class="form-control m-input" readonly value="05/20/2017" id="m_datepicker_3" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-section">
                    <div class=" table-responsive">
                        <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary" style="min-width: 500px;width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>#</th>
                                    @foreach($getAttendance as $gg)
                                    <th>{{substr($gg->date,8,2)}}</th>
                                    @endforeach
                                    <th>Đi học</th>
                                    <th>Nghỉ có phép</th>
                                    <th>Nghỉ không phép</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($studentInClass as $index=>$student)
                                <tr>
                                <th>{{$index+1}}</th>
                                    <td>{{$student->kid_name}}</td>
                                    @foreach($student->attendance as $attendances)
                                    @if($attendances->status==1)
                                    <td  width="60px">Đi</td>
                                    @else
                                    <td  width="60px">Vắng</td>
                                    @endif
                                    
                                    @endforeach
                                    @if(!empty(count($present[$index]->attendance)))
                                     <td width="60px">{{count($present[$index]->attendance)}}</td>
                                     @else
                                     <td width="60px">0</td>
                                    @endif
                                    @if(!empty(count($absent[$index]->attendance)))
                                     <td width="100px" >{{count($absent[$index]->attendance)}}</td>
                                     @else
                                     <td  width="100px">0</td>
                                    @endif
                             
                                    @if(!empty(count($permission[$index]->attendance)))
                                     <td  width="120px">{{count($permission[$index]->attendance)}}</td>
                                     @else
                                     <td  width="120px">0</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection