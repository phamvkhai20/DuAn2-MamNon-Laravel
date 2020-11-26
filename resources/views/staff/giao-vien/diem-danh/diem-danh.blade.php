@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
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
        document.getElementById("date_attendance").max = d.getFullYear() + '-' + (
            d.getMonth() + 1) + '-' + d.getDate();
        </script>
    </div>

    <div class="m-portlet box_tille_">

        <div class="m-portlet__body">
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Điểm danh đến</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Điểm danh về</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                    <form class="row" action="{{ route('giao-vien.diem_danh_den')}}" method="post">
                        @csrf
                        @foreach($kids as $index=>$kid)
                        <div class=" col image_kid_attendance m-portlet d-flex justify-content-center"
                            style="background-image: url({{asset('/upload/avatar/'.$kid->kid_avatar)}})">
                            <div class="box_group_name">
                                <b> {{$kid->kid_name}}</b>
                                <input hidden type="text" value="{{$kid->class_id}}" name="class" />
                                <input hidden type="text" id="date[{{$kid->id}}]" name="date[{{$kid->id}}]" />
                                <input hidden type="text" id="arrival_time[{{$kid->id}}]"
                                    name="arrival_time[{{$kid->id}}]" />
                                @if(!empty($kid->attendance[0])&&$kid->attendance[0]->arrival_time!=="00:00:00")
                                <input hidden type="text" value="{{$kid->attendance[0]->arrival_time}}"
                                    name="arrival_time[{{$kid->id}}]" />
                                @endif
                                <input hidden type="text" value="null" name="note[{{$kid->id}}]" />
                                <input hidden type="text" value="{{$kid->id}}" name="kid_id[{{$kid->id}}]" />
                                <input hidden type="text" value="{{$kid->class_id}}" name="class_id[{{$kid->id}}]" />
                            </div>
                            <div class="box_time">
                                <b>@if(!empty($kid->attendance[0]))
                                    {{$kid->attendance[0]->arrival_time}}
                                    @endif</b>
                            </div>
                            <div class="box_group_button">
                                <div class="row">
                                    <span class=" col-6 m-switch m-switch--outline m-switch--success">
                                        <label style="margin-bottom: 5px;margin-left:10px">
                                            <input hidden type="text" value="off" value=""
                                                name="status[{{$kid->id}}]" />
                                            @if(!empty($kid->attendance[0])&&$kid->attendance[0]->status==1)
                                            <input data-switch="true" type="checkbox" checked="checked"
                                                name="status[{{$kid->id}}]" data-on-color="success" data-on-text="P"
                                                data-off-color="danger" data-off-text="A">
                                            @else
                                            <input data-switch="true" type="checkbox" name="status[{{$kid->id}}]"
                                                data-on-color="success" data-on-text="P" data-off-color="danger"
                                                data-off-text="A">
                                            @endif
                                        </label>
                                    </span>
                                    <div class="col-6">
                                        <a href="#" class="button_khac" data-toggle="modal" data-target="#m_modal_1_2"
                                            class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link"
                                            style="padding: 0;padding-top:15px;">
                                            <i class="la la-ellipsis-h icon_button_khac"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="m_modal_1_2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Khác</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true"
                                                data-height="200">
                                                <input type="text" hidden value="off" name="meal[{{$kid->id}}]" />
                                                <input data-switch="true" type="checkbox" checked="checked"
                                                    name="meal[{{$kid->id}}]" data-on-color="success" data-on-text="P"
                                                    data-off-color="danger" data-off-text="A">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Xong</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                        var d = new Date();
                        document.getElementById("date[{{$kid->id}}]").value = d.getFullYear() + '-' + (d
                            .getMonth() + 1) + '-' + d.getDate();
                        document.getElementById("arrival_time[{{$kid->id}}]").value = d.getHours() + ':' + (d
                            .getMinutes()) + ':' + d.getSeconds();
                        </script>
                        @endforeach
                        <div class="m-nav-sticky" style="margin-top: 30px;width:100px;height:100px">
                            <li class="m-nav-sticky__item" data-toggle="m-tooltip" data-placement="left">
                                <button class="btn-primary button_attendance" type="submit">Điểm danh</button>
                            </li>

                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                    @if(count($attendanceTrue)>0)
                    <form class="row" action="{{ route('giao-vien.diem_danh_ve')}}" method="post">
                        @csrf
                        @foreach($attendanceTrue as $index=>$attendance)
                        <div class=" col image_kid_attendance m-portlet d-flex justify-content-center"
                            style="background-image: url({{asset('/upload/avatar/'.$attendance->kid->kid_avatar)}})">
                            <div class="box_group_name">
                                <b> {{$attendance->kid->kid_name}}</b>
                                <input hidden type="text" id="dates[{{$attendance->kid->id}}]"
                                    name="date[{{$attendance->kid->id}}]" />
                                <input hidden type="text" value="{{$attendance->kid->id}}"
                                    name="kid_id[{{$attendance->kid->id}}]" />
                                <input hidden type="text" value="{{$attendance->kid->class_id}}" name="class" />
                                <input hidden type="text" id="leave_time[{{$attendance->kid->id}}]"
                                    name="leave_time[{{$attendance->kid->id}}]" />
                                <input hidden type="text" value="false"
                                    name="check_diem_danh_ve[{{$attendance->kid->id}}]" />
                                @if($attendance->leave_time!=="00:00:00")
                                <input hidden type="text" value="true"
                                    name="check_diem_danh_ve[{{$attendance->kid->id}}]" />
                                @endif
                                <input hidden type="text" value="null" name="note[{{$attendance->kid->id}}]" />
                            </div>
                            <div class="box_time">
                                <b>
                                    {{$attendance->leave_time}}
                                </b>
                            </div>
                            <div class="box_group_button">
                                <div class="row">
                                    <span class=" col-6 m-switch m-switch--outline m-switch--success">
                                        <label style="margin-bottom: 5px;margin-left:10px">
                                            <input hidden type="text" value="off" value=""
                                                name="status[{{$attendance->kid->id}}]" />
                                            @if($attendance->leave_time!=="00:00:00")
                                            <input data-switch="true" type="checkbox" checked="checked"
                                                name="status[{{$attendance->kid->id}}]" data-on-color="success"
                                                data-on-text="Yes" data-off-color="danger" data-off-text="No">
                                            @else
                                            <input data-switch="true" type="checkbox"
                                                name="status[{{$attendance->kid->id}}]" data-on-color="success"
                                                data-on-text="Yes" data-off-color="danger" data-off-text="No">
                                            @endif </label>
                                    </span>
                                    <div class="col-6">
                                        <a href="#" class="button_khac" data-toggle="modal" data-target="#m_modal_1_3"
                                            class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link"
                                            style="padding: 0;padding-top:15px;">
                                            <i class="la la-ellipsis-h icon_button_khac"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="m_modal_1_3" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Khác</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true"
                                                data-height="200">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Xong</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                        var d = new Date();
                        document.getElementById("dates[{{$attendance->kid->id}}]").value = d.getFullYear() + '-' + (
                            d.getMonth() + 1) + '-' + d.getDate();
                        document.getElementById("leave_time[{{$attendance->kid->id}}]").value = d.getHours() + ':' +
                            (d.getMinutes()) + ':' + d.getSeconds();
                        </script>
                        @endforeach
                        <div class="m-nav-sticky " style="margin-top: 30px;width:100px;height:100px">
                            <li class="m-nav-sticky__item" data-toggle="m-tooltip" data-placement="left">
                                <button class="btn-primary button_attendance" type="submit">Điểm danh</button>
                            </li>

                        </div>
                    </form>
                    @endif
                </div>
                <div id="info">

                </div>s
            </div>
        </div>
    </div>
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