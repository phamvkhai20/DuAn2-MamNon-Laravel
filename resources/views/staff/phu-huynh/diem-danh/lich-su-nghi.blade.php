@extends('./staff/phu-huynh/layouts/layout')
@section('title','Lịch sử nghỉ')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper container">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <div class="m-form m-form--label-align-right  ">
                    <div class="row align-items-center">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select m-bootstrap-select--solid"
                                                id="m_form_status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Delivered</option>
                                                <option value="3">Canceled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label class="m-label m-label--single">Type:</label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select m-bootstrap-select--solid"
                                                id="m_form_type">
                                                <option value="">All</option>
                                                <option value="1">Online</option>
                                                <option value="2">Retail</option>
                                                <option value="3">Direct</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid"
                                            placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>

                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <button type="button" class="btn btn-secondary">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="m_datatable" id="column_rendering"></div>

            </div>
        </div>
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
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection