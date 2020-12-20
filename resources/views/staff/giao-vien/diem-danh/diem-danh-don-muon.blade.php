@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper" onload="thongbao()">
    <!-- END: Subheader -->
    <div class="m-portlet box_tille_ row title_attendance"  >
        <h3 class="col-lg-4" style="padding-top:5px">
            Điểm danh đón muộn
        </h3>
    </div>
    <input type="hidden" id="thongbao" value="{{session('status')}}">
   
    <div class="m-portlet box_tille_">
        <div class="m-portlet__body">
            <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_5_2" role="tabpanel">
                            @if(count($attendanceTrue)>0)
                            <form class="row" action="{{ route('giao-vien.diem_danh_ve_muon')}}" method="post">
                                @csrf
                                @foreach($attendanceTrue as $index=>$attendance)
                                <div class=" col image_kid_attendance m-portlet d-flex justify-content-center"
                                    style="background-image: url({{asset('/upload/avatar/'.$attendance->kid->kid_avatar)}})">

                                    <div class="box_group_name">
                                        <b> {{$attendance->kid->kid_name}}</b>
                                        <input type="hidden" name="dateAttendance" class="form-control m-input"
                                            id="date_attendance" value="{{$dateAttendance}}" />
                                        <input hidden type="text" value="{{$dateAttendance}}"
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
                                    <div class="box_more">
                                        <a href="#" class="button_khac" data-toggle="modal"
                                            data-target="#m_modal_4_{{$attendance->kid->id}}"
                                            class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link"
                                            style="padding: 0;padding-top:15px;">
                                            <i class="la la-ellipsis-h icon_button_khac"></i>
                                            @if(!empty($attendance->don_ho))
                                            <span class="m-badge m-badge--danger m-badge--wide m-badge--rounded"
                                                style="margin:10px 0 0 -15px;border-radius:50%"></span>
                                            @endif
                                        </a>

                                    </div>
                                    <div class="box_time">
                                        <b>
                                            {{$attendance->leave_time}}
                                        </b>
                                    </div>
                                    <div class="box_group_button">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <input hidden type="text" value="off"
                                                    name="status[{{$attendance->kid->id}}]" />
                                                @if($attendance->leave_time!=="00:00:00")
                                                <span
                                                    class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                    <label style="margin-bottom:0px">
                                                        <input type="checkbox" checked="checked"
                                                            onchange="handleClickAttendance2('{{$attendance->kid->id}}')"
                                                            name="status[{{$attendance->kid->id}}]">
                                                        <span></span>
                                                    </label>
                                                </span>
                                                @else
                                                <span
                                                    class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                    <label style="margin-bottom:0px">
                                                        <input type="checkbox"
                                                            onchange="handleClickAttendance2('{{$attendance->kid->id}}')"
                                                            name="status[{{$attendance->kid->id}}]">
                                                        <span></span>
                                                    </label>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="m_modal_4_{{$attendance->kid->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Khác</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <p class="mb-3">Số điện thoại phụ huynh : <b>{{$attendance->kid->parent->phone}}</b></p>
                                                    <textarea class="form-control" name="note[{{$attendance->kid->id}}]"
                                                        placeholder="Nhập thông tin khác"
                                                        rows="6">{{$attendance->note=="null"?"":$attendance->note}}</textarea>
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
                                                        <div class="col-md-6 d-flex justify-content-center"><img
                                                                src="{{asset('/upload/avatar/'.$attendance->don_ho->image)}}"
                                                                style="width:50%;float:right" alt=""
                                                                class="thumbnail zoom"></div>
                                                    </div>

                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
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
                                        <button id="diem_danh_ve" class="btn btn-metal button_attendance" disabled
                                            type="submit">Điểm danh về</button>
                                    </li>

                                </div>
                            </form>
                            @endif
                        </div>
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
let idTemp = []

function handleClickP(id) {

    if (!isNaN(id)) {
        var status = document.getElementById(`status_${id}`).checked;
        status ? document.getElementById(`meal_${id}`).checked = true : document.getElementById(`meal_${id}`).checked =
            false;
    }
    if (idTemp.includes(id) == true) {
        const arrTemp = idTemp
        idTemp = arrTemp.filter(item => item !== id)
    } else {
        idTemp.push(id)
    }
    if (idTemp.length > 0) {
        document.getElementById('diem_danh_den').classList.remove('btn-metal');
        document.getElementById('diem_danh_den').classList.add('btn-primary')
        document.getElementById('diem_danh_den').disabled = false
    } else {
        document.getElementById('diem_danh_den').classList.add('btn-metal')
        document.getElementById('diem_danh_den').classList.remove('btn-primary');
        document.getElementById('diem_danh_den').disabled = true
    }
}


function handleClickAttendance2(id) {
    console.log(id);
    if (idTemp.includes(id) == true) {
        const arrTemp = idTemp
        idTemp = arrTemp.filter(item => item !== id)
    } else {
        idTemp.push(id)
    }
    if (idTemp.length > 0) {
        document.getElementById('diem_danh_ve').classList.remove('btn-metal');
        document.getElementById('diem_danh_ve').classList.add('btn-primary')
        document.getElementById('diem_danh_ve').disabled = false
    } else {
        document.getElementById('diem_danh_ve').classList.add('btn-metal')
        document.getElementById('diem_danh_ve').classList.remove('btn-primary');
        document.getElementById('diem_danh_ve').disabled = true
    }
}



function thongbao() {
    var x = document.querySelector('#thongbao').value;
    console.log(x);
    x === "ok" && swal("Xong!", "Bạn đã cập nhật điểm danh thành công!", "success");
    x === "error" && swal("Xong!", "Điểm danh không thành công!", "error");
}
setTimeout(() => {
    thongbao();
}, 0);
</script>
@endsection