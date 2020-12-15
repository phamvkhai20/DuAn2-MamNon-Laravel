@extends('./staff/nha-truong/layouts/layout')
@section('title','Điểm danh lớp')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <!-- END: Subheader -->
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
                    <a href="{{route('nha-truong.nha-truong.index')}}"
                        class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-arrow-left"></i>
                            <span>Quay lại</span>
                        </span>
                    </a>
                    
                </div>
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
                                    <td width="60px">Đi</td>
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