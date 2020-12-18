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
                        <table class="table table-bordered table_attendance" style="min-width: 500px;width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ và tên</th>
                                    @foreach($getAttendance as $gg)
                                    <th>{{substr($gg->date,8,2)}}</th>
                                    @endforeach
                                    <th>Đi học</th>
                                    <th>Nghỉ không phép</th>
                                    <th>Nghỉ có phép</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentInClass as $index=>$student)
                                <tr>
                                    <th width="40px">{{$index+1}}</th>
                                    <td width="140px">{{$student->kid_name}}</td>
                                    @foreach($student->attendance as $attendances)
                                    @if($attendances->status==1)
                                    <td width="60px">
                                        <select class="form-control m-bootstrap-select m_selectpicker border-0">
												<option data-content="<span class='m-badge m-badge--success m-badge--wide m-badge--rounded'>Relish</span>"></option>
												<option data-content="<span class='m-badge m-badge--warning m-badge--wide m-badge--rounded'>Ketchup</span>"></option>
												<option data-content="<span class='m-badge m-badge--brand m-badge--wide m-badge--rounded'>Relish</span>"></option>
												<option data-content="<span class='m-badge m-badge--danger m-badge--wide m-badge--rounded'>Chili</span>"></option>
                                        </select>
                                    </td>
                                    @elseif($attendances->status==0)
                                    <td width="60px">Vắng</td>
                                    @else
                                    <td width="60px">Phép</td>
                                    @endif
                                    @endforeach
                                    @if(!empty(count($present[$index]->attendance)))
                                    <td width="60px">{{count($present[$index]->attendance)}}</td>
                                    @else
                                    <td width="60px">0</td>
                                    @endif
                                    @if(!empty(count($absent[$index]->attendance)))
                                    <td width="100px">{{count($absent[$index]->attendance)}}</td>
                                    @else
                                    <td width="60x">0</td>
                                    @endif
                                    @if(!empty(count($permission[$index]->attendance)))
                                    <td width="60px">{{count($permission[$index]->attendance)}}</td>
                                    @else
                                    <td width="60px">0</td>
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