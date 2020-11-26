@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
    <div class="">
    <div class="m-portlet box_tille_ row title_attendance" role="tablist">
            <h3 class="col-lg-5" style="padding-top:5px">
                Điểm danh
            </h3>
            <div class="col-lg-4">
                <input type="date" class="form-control m-input" id="date_attendance" />
            </div>
            <script>
                var d = new Date();
                document.getElementById("date_attendance").value = d.getFullYear() + '-' + (
                    d.getMonth() + 1) + '-' + d.getDate();
            </script>
        </div>
        <div class="m-portlet box_tille_">
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
                                <th   width="40px">{{$index+1}}</th>
                                    <td  width="140px">{{$student->kid_name}}</td>
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