@extends('./staff/phu-huynh/layouts/layout')
@section('title','Lịch sử đăng kí đón')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <input type="hidden" id='receip' value="{{session('receip')}}">
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
                <table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                    id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="min-width: 990px;width:100%">
                    <thead>
                        <tr>
                            <th rowspan="1" colspan="1">Ảnh</th>
                            <th rowspan="1" colspan="1">Thông tin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $ChildReceiptHistorys as $ChildReceiptHistory)
                        <tr>
                            <td>
                                <img src="{{ '/upload/avatar/' . $ChildReceiptHistory->image }}"
                                    style="max-width:400px;width:100%" alt="">
                            </td>
                            <td>
                                <ul>
                                    <li>Họ và tên: {{$ChildReceiptHistory->name}}</li>
                                    <li>Điện thoại: {{$ChildReceiptHistory->phone}}</li>
                                    <li>Địa chỉ: {{$ChildReceiptHistory->address}}</li>
                                    <li>Quan hệ với bé: {{$ChildReceiptHistory->relationship}}</li>
                                    <li>Thời gian: {{$ChildReceiptHistory->created_at}}</li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function getSession(){
        var getSession=document.getElementById('receip').value;
        if(getSession&&getSession==='success'){
            swal("Gửi thông tin thành công!", "Bạn đã gửi thông tin đón trẻ thành công!", "success");
        }
        if(getSession&&getSession==='error') {
            swal("Gửi thông tin thất bại!", "Thông tin đón trẻ đã tồn tại. Vui lòng kiểm tra lại!", "error");
        }
        if(getSession&&getSession==='error1') {
            swal("Gửi thông tin thất bại!", "Trẻ hôm nay không có mặt tại lớp. Vui lòng liên hệ với cô giáo !", "error");
        }
    }
    setTimeout(() => {
        getSession()
    }, 200);
</script>
@endsection