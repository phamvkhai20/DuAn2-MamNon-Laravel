@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper" onload="thongbao()">
    <!-- END: Subheader -->
    <form class="m-portlet box_tille_ row title_attendance" method="get" action="{{route('giao-vien.giao_dien_diem_danh',['id'=>session('class')])}}">
        @csrf
        <h3 class="col-lg-4" style="padding-top:5px">
            Điểm danh
            @php
            use Carbon\Carbon;
            $date= substr(Carbon::now('Asia/Ho_Chi_Minh'),11,5)
            @endphp
        </h3>
        <div class="col-lg-4">
            <input type="date" name="date" class="form-control m-input" id="date_attendance" value="{{$dateAttendance}}" />
        </div>
        <div class="col-lg-3">
            <button class="btn btn-primary ">
                Tìm kiếm
            </button>
        </div>

        <script>
            var d = new Date();
            document.getElementById("date_attendance").max = d.getFullYear() + '-' + (
                d.getMonth() + 1) + '-' + d.getDate();
        </script>
    </form>
    <input type="hidden" id="thongbao" value="{{session('status')}}">
    <div class="m-portlet box_tille_">
        <div class="m-portlet__body">
        @if($dateAttendance < Carbon::now()->toDateString())
            <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                <div class="">
                    <div class="row">
                        <div class="table-responsive">
                        <table
                                class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                                id="m_table_1" role="grid" aria-describedby="m_table_1_info"
                                style="min-width: 954px;width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="1" colspan="1">Tên học sinh</th>
                                        <th rowspan="1" colspan="1">Ảnh</th>
                                        <th rowspan="1" colspan="1">Trạng thái</th>
                                        <th rowspan="1" colspan="1">Note</th>
                                        <th rowspan="1" colspan="1"></th>
                                    
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Tên học sinh</th>
                                        <th rowspan="1" colspan="1">Ảnh</th>
                                        <th rowspan="1" colspan="1">Trạng thái</th>
                                        <th rowspan="1" colspan="1">Note</th>
                                        <th rowspan="1" colspan="1"></th>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($attendance as $a)
                                    <tr>
                                        <td>{{$a->kid->kid_name}}</td>
                                        <td>
                                            <img src="{{asset('upload/avatar/'.$a->kid->kid_avatar)}}" alt="avatar" width="100px">
                                        </td>
                                        @if($a->status == 0 && $a->arrival_time != "00:00:00")
                                        <td>Có mặt</td>
                                        @elseif($a->status == 2)
                                        <td>Xin nghỉ có phép</td>
                                        @else
                                        <td>Vắng mặt</td>
                                        @endif
                                        @if($a->note == 'null')
                                        <td>Không có</td>
                                        @else
                                        <td>{{$a->note}}</td>
                                        @endif
                                        <td>
                                            <a href="#" class="button_khac" data-toggle="modal" data-target="#m_modal_{{$a->id}}" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link" style="padding: 0;padding-top:15px;">Chi tiết</a>
                                        </td>
                                        </tr>  
                                        <div class="modal fade" id="m_modal_{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết đến và về</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class='row'>
                                                            <div class="col-6">
                                                            <p>Thời gian đến:</p>
                                                            <?php
                                                            foreach (explode(",",ltrim(rtrim(str_replace('"', '',$a->arrival_time),"]"),"[")) as $value) {
                                                                echo("-\n".$value."<br>");
                                                            }
                                                        ?>
                                                            </div>
                                                            <div class="col-6">
                                                            <p>Thời gian về:</p>
                                                            <?php
                                                            foreach (explode(",",ltrim(rtrim(str_replace('"', '',$a->leave_time),"]"),"[")) as $value) {
                                                                echo("-\n".$value."<br>");
                                                            }
                                                        ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                </tbody>
                            </table>
                            

                            <div id="m_table_1_processing" class="dataTables_processing card"
                                style="display: none;">
                                Processing...</div>
                        </div>
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                        <ul class="pagination">
                            
                        </ul>
                    </div>
                </div>
                
            </form>
            @elseif(date('w', strtotime($dateAttendance)) >= 6)
                <h5 class="text-center">Ngày bạn chọn là cuối tuần</h5>
            @elseif($dateAttendance >   Carbon::now()->toDateString())
                <h5 class="text-center">Chưa đến thời gian điểm danh</h5>
            @elseif($dateAttendance >=   Carbon::now()->toDateString())
            <ul class="nav nav-pills nav-fill" role="tablist">
                @if($date<"12:00:00"||count($attendanceTrue)==0) 
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Điểm danh đến</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Điểm danh về</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#m_tabs_5_1">Điểm danh đến</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_2">Điểm danh về</a>
                    </li>
                    @endif
            </ul>
            <div class="tab-content">
                @if($date<"12:00"||count($attendanceTrue)==0) <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                    @else
                    <div class="tab-pane " id="m_tabs_5_1" role="tabpanel">
                        @endif
                        <form class="row" action="{{ route('giao-vien.diem_danh_den')}}" method="post">
                            @csrf
                            @foreach($kids as $index=>$kid)
                            
                            <div @if (!empty($kid->attendance[0]) && $kid->attendance[0]->status == 1) hidden @endif  class="col image_kid_attendance m-portlet justify-content-center" style="background-image: url({{asset('/upload/avatar/'.$kid->kid_avatar)}})">
                                <div style="margin-left:-15px;"  class="box_group_name">
                                    <b> {{$kid->kid_name}}</b>
                                    <input type="hidden" name="dateAttendance" class="form-control m-input" id="date_attendance" value="{{$dateAttendance}}" />
                                    <input hidden type="text" value="{{$kid->class_id}}" name="class" />
                                    <input hidden type="text" name="date[{{$kid->id}}]" value="{{$dateAttendance}}" />   
                                    <input hidden type="text" id="arrival_time[{{$kid->id}}]" name="arrival_time[{{$kid->id}}]" />
                                    @if(!empty($kid->attendance[0]))
                                    <input hidden type="text" value="{{$kid->attendance[0]->arrival_time}}" name="arrival_time[{{$kid->id}}]" />
                                    <input hidden type="text" value="{{$kid->attendance[0]->leave_time}}" name="leave_time[{{$kid->id}}]" />
                                    <input hidden type="text" value="{{$kid->attendance[0]->status}}" name="stt[{{$kid->id}}]" />
                                    
                                    @endif                    
                                    
                                    <input hidden type="text" value="null" name="note[{{$kid->id}}]" />
                                    <input hidden type="text" value="{{$kid->id}}" name="kid_id[{{$kid->id}}]" />
                                    <input hidden type="text" value="{{$kid->class_id}}" name="class_id[{{$kid->id}}]" />
                                </div>
                                <div  class="box_more">
                                    <a href="#" class="button_khac" data-toggle="modal" data-target="#m_modal_1_2_{{$kid->id}}" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link" style="padding: 0;padding-top:15px;">
                                        <i class="la la-ellipsis-h icon_button_khac"></i>
                                        @if(!empty($kid->attendance[0])&&$kid->attendance[0]->status==2)
                                        <span class="m-badge m-badge--danger m-badge--wide m-badge--rounded" style="margin:10px 0 0 -15px;border-radius:50%"></span>
                                        @endif
                                    </a>
                                </div>
                                <div style="margin-left:-15px;" class="box_group_button">
                                    <div class="row">
                                        @if(!empty($kid->attendance[0])&&$kid->attendance[0]->status==2)
                                        <input hidden type="text" value="2" name="status[{{$kid->id}}]" />
                                        <h4 style="line-height:38px;padding-left:70px">Xin nghỉ</h4>
                                        @else
                                        <div class="col-12">
                                            <input hidden type="text" value="off" name="status[{{$kid->id}}]" />
                                            @if(!empty($kid->attendance[0])&&$kid->attendance[0]->status==1)
                                            <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                                <label style="margin-bottom:0">
                                                    <input type="checkbox" onchange="handleClickP('{{$kid->id}}')" id="status_{{$kid->id}}" name="status[{{$kid->id}}]">
                                                    <span></span>
                                                </label>
                                            </span>
                                            @elseif(!empty($kid->attendance[0])&&$kid->attendance[0]->status==0)
                                            <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                                <label style="margin-bottom:0">
                                                    <input type="checkbox" id="status_{{$kid->id}}" onchange="handleClickP('{{$kid->id}}')" name="status[{{$kid->id}}]">
                                                    <span></span>
                                                </label>
                                            </span>
                                            @elseif(empty($kid->attendance[0]))
                                            <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                                <label style="margin-bottom:0">
                                                    <input type="checkbox" id="status_{{$kid->id}}" checked="checked" onchange="handleClickP('{{$kid->id}}')" name="status[{{$kid->id}}]">
                                                    <span></span>
                                                </label>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        @endif
                                    </div>
                                </div>
                                <div class="modal fade" id="m_modal_1_2_{{$kid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Khác
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="note[{{$kid->id}}]" value="null">
                                                <p class="mb-3">Số điện thoại phụ huynh : <b>{{$kid->parent->phone}}</b></p>
                                                <textarea class="form-control" name="note[{{$kid->id}}]" placeholder="Nhập thông tin khác" rows="6">{{!empty($kid->attendance[0])&&$kid->attendance[0]->note!="null"?$kid->attendance[0]->note:""}}</textarea>
                                                @if(!empty($kid->attendance[0])&&$kid->attendance[0]->status==2)
                                                <p>Xin nghỉ trên hệ thống nhưng có đi học !</p>
                                                <p>Thay đổi trạng thái</p>
                                                <div class="row">
                                                    <input hidden type="text" value="Xin nghỉ trên hệ thống nhưng có đi học" name="note[{{$kid->id}}]" />
                                                    <span class=" col-6 m-switch m-switch--outline m-switch--success">Điểm danh
                                                        <label style="margin-bottom: 5px;margin-left:10px">
                                                            <input hidden type="text" value="2" name="status[{{$kid->id}}]" />
                                                            <input data-switch="true" onchange="handleClickP('S{{$kid->id}}')" type="checkbox" name="status[{{$kid->id}}]" data-on-color="success" data-on-text="Đ" data-off-color="danger" data-off-text="N">
                                                        </label>
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                <button type="button" class="btn " data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var d = new Date();
                                document.getElementById("arrival_time[{{$kid->id}}]").value = d.getHours() + ':' + (d
                                    .getMinutes()) + ':' + d.getSeconds();
                            </script>
                            @endforeach
                            <div class="m-nav-sticky" style="margin-top: 30px;width:150px;height:70px">
                                <li class="m-nav-sticky__item" data-toggle="m-tooltip" data-placement="left">
                                    <button id="diem_danh_den"  class="btn btn-primary button_attendance" type="submit">Điểm danh đến</button>
                                </li>
                            </div>
                        </form>
                    </div>
                    @if($date<"12:00") <div class="tab-pane " id="m_tabs_5_2" role="tabpanel">
                        @else
                        <div class="tab-pane active" id="m_tabs_5_2" role="tabpanel">
                            @endif
                            @if(count($attendanceTrue)>0)
                            <form class="row" action="{{ route('giao-vien.diem_danh_ve')}}" method="post">
                                @csrf
                                @foreach($attendanceTrue as $index=>$attendance)
                                <div @if ($attendance->status == 0 )) hidden @endif class=" col image_kid_attendance m-portlet justify-content-center" style="background-image: url({{asset('/upload/avatar/'.$attendance->kid->kid_avatar)}})">
                                    <div style="margin-left:-15px;" class="box_group_name">
                                        <b> {{$attendance->kid->kid_name}}</b>
                                        <input type="hidden" name="dateAttendance" class="form-control m-input" id="date_attendance" value="{{$dateAttendance}}" />
                                        <input hidden type="text" value="{{$dateAttendance}}" name="date[{{$attendance->kid->id}}]" />
                                        <input hidden type="text" value="{{$attendance->kid->id}}" name="kid_id[{{$attendance->kid->id}}]" />
                                        <input hidden type="text" value="{{$attendance->kid->class_id}}" name="class" />
                                        <input hidden type="text" value="{{$attendance->leave_time}}" name="leave_time[{{$attendance->kid->id}}]" />
                                        <input hidden type="text" value="null" name="note[{{$attendance->kid->id}}]" />
                                    </div>
                                    <div class="box_more">
                                        <a href="#" class="button_khac" data-toggle="modal" data-target="#m_modal_4_{{$attendance->kid->id}}" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link" style="padding: 0;padding-top:15px;">
                                            <i class="la la-ellipsis-h icon_button_khac"></i>
                                            @if(!empty($attendance->don_ho))
                                            <span class="m-badge m-badge--danger m-badge--wide m-badge--rounded" style="margin:10px 0 0 -15px;border-radius:50%"></span>
                                            @endif
                                        </a>

                                    </div>
                                    <div style="margin-left:-15px;" class="box_group_button">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <input hidden type="text" value="off" name="status[{{$attendance->kid->id}}]" />
                                                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                    <label style="margin-bottom:0px">
                                                        <input type="checkbox" onchange="handleClickAttendance2('{{$attendance->kid->id}}')" name="status[{{$attendance->kid->id}}]">
                                                        <span></span>
                                                    </label>
                                                </span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="m_modal_4_{{$attendance->kid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Khác</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="nav nav-pills nav-fill" role="tablist">    
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#tab_note">Chú ý trong ngày</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#tab_pickup">Thông tin đón hộ</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#tab_book">Sổ liên lạc ngày</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="tab_note" role="tabpanel">
                                                        <textarea class="form-control" name="note[{{$attendance->kid->id}}]" placeholder="Nhập thông tin khác" rows="6">{{$attendance->note=="null"?"":$attendance->note}}</textarea>
                                                        </div>
                                                        <div class="tab-pane " id="tab_pickup" role="tabpane1">
                                                        @if(!empty($attendance->don_ho))
                                                        <h4 class="mt-3">Thông tin đón trẻ</h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul>
                                                                    <li>
                                                                        <span>Họ và tên</span> :
                                                                        <span>{{$attendance->don_ho->name}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <span>Số điện thoại</span> :
                                                                        <span>{{$attendance->don_ho->phone}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <span>Địa chỉ</span> :
                                                                        <span>{{$attendance->don_ho->address}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <span>Quan hệ với bé</span> :
                                                                        <span>{{$attendance->don_ho->relationship}}</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-center"><img src="{{asset('/upload/avatar/'.$attendance->don_ho->image)}}" style="width:50%;float:right" alt="" class="thumbnail zoom"></div>
                                                        </div>

                                                        @endif
                                                        </div>
                                                        <div class="tab-pane active" id="tab_book" role="tabpane1">
                                                        <input hidden type="text" value="{{$attendance->kid_id}}" name="kid_id_cb" />
                                                        <h5>Sức khỏe</h5>
                                                        <textarea class="form-control" name="note[{{$attendance->kid->id}}]" placeholder="Nhập thông tin khác" rows="6"></textarea>
                                                        <h5>Học tập</h5>
                                                        <textarea class="form-control" name="note[{{$attendance->kid->id}}]" placeholder="Nhập thông tin khác" rows="6"></textarea>
                                                        <h5>Ăn-Ngủ</h5>
                                                        <textarea class="form-control" name="note[{{$attendance->kid->id}}]" placeholder="Nhập thông tin khác" rows="6"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var d = new Date();
                                    document.getElementById("leave_time[{{$attendance->kid->id}}]").value = d
                                        .getHours() + ':' +
                                        (d.getMinutes()) + ':' + d.getSeconds();
                                </script>
                                @endforeach
                                <div class="m-nav-sticky" style="margin-top: 30px;width:150px;height:70px">
                                    <li class="m-nav-sticky__item" data-toggle="m-tooltip" data-placement="left">
                                        <button id="diem_danh_ve" class="btn btn-primary button_attendance" type="submit">Điểm danh về</button>
                                    </li>

                                </div>
                            </form>
                        @endif
                        </div>
                        <div id="info">

                        </div>
            </div>
        </div>
    </div>
    @endif
</div>
<script>
    function fetch_customer_data(query = '') {
        $.ajax({
            url: "{{ route('giao-vien.giao_dien_diem_danh',['id'=>'1']) }}",
            method: 'GET',
            data: {
                data: query
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                alert('hhehehe')
            },
        })
    }
    $(document).on('change', '#date_attendance', function() {
        var query = $(this).val();
        fetch_customer_data(query);
    });
</script>
@endsection