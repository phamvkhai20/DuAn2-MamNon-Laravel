@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
    <div class="">
    <form class="m-portlet box_tille_ row title_attendance"  method="get" action="{{route('giao-vien.xem_diem_danh',['id'=>session('class')])}}">
            {!! csrf_field() !!}
            <h3 class="col-lg-5" style="padding-top:5px">
                Điểm danh
            </h3>
            <div class="col-lg-4">
                <div class="m-select2 m-select2--square">
                    <select class="form-control m-select2" id="m_select2_12_4" checked="{{$month}}" name="date" data-placeholder="Square style">
                        <option></option>
                        <option value="2020-12"  {{ $month=='2020-12'?"selected":''}} >Tháng 12/2020</option>
                        <option value="2020-11" {{ $month=='2020-11'?"selected":''}} >Tháng 11/2020</option>
                        <option value="2020-10" {{ $month=='2020-10'?"selected":''}} >Tháng 10/2020</option>
                        <option value="2020-09" {{ $month=='2020-09'?"selected":''}} >Tháng 9/2020</option>
                        <option value="2020-08" {{ $month=='2020-08'?"selected":''}} >Tháng 8/2020</option>
                        <option value="2020-07" {{ $month=='2020-07'?"selected":''}} >Tháng 7/2020</option>
                        <option value="2020-06" {{ $month=='2020-06'?"selected":''}} >Tháng 6/2020</option>
                    </select>
                </div>
            </div>
            <script>
            var d = new Date();
            document.getElementById("date_attendance").value = d.getFullYear() + '-' + (
                d.getMonth() + 1) + '-' + d.getDate();
            </script>
            <div class="col-lg-3">
                <button class="btn btn-primary " style="">
                    Tìm kiếm
                </button>
            </div>
       
        <script>
        var d = new Date();
        document.getElementById("date_attendance").max = d.getFullYear() + '-' + (
            d.getMonth() + 1) + '-' + d.getDate();
        </script>
    </form>
        <div class="m-portlet box_tille_">
            <div class="m-portlet__body">
                <div class="m-section">
                    <div class=" table-responsive">
                        <table class="table table-bordered table_attendance" style="min-width: 500px;width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ và tên</th>
                                    <th>Đi học</th>
                                    <th>Vắng</th>
                                    <th>Có phép</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentInClass as $index=>$student)
                                <tr>
                                    <th width="40px">{{$index+1}}</th>
                                    <td width="140px">{{$student->kid_name}}</td>
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
<script>
     function updateAttendance(id){
        const attendance = document.querySelector(`#attendance_${id}`).value;
        swal({
                title: 'Bạn muốn cập nhật điểm danh?',
                text: "Trạng thái điểm danh sẽ được cập nhật!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Cập nhật'
            }).then(function(result) {
                axios.post("{{route('giao-vien.thay-doi-diem-danh')}}", {
                id,attendance
                })
                .then((response) => {
                    response.data.data==true&&swal(
                        'Cập nhật thành công!',
                        'Bạn đã cập nhật trạng thái điểm danh thành công.',
                        'success'
                    )
                })
                .catch(function(error) {
                    swal(
                        'Điểm danh không thành công!',
                        'Cập nhật trạng thái điểm danh thất bại.',
                        'error'
                    )
                })
            });
        
     }
</script>
@endsection