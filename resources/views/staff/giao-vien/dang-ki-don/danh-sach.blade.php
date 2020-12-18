@extends('./staff/giao-vien/layouts/layout')
@section('title','Danh sách nhờ đón hộ')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <input type="hidden" id='receip' value="{{session('receip')}}">
    <div class="">
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
                    <a href="{{route('giao-vien.index')}}"
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
                            <th rowspan="1" colspan="1">Ảnh nguời đón</th>
                            <th rowspan="1" colspan="1">Ảnh trẻ</th>
                            <th rowspan="1" colspan="1">Thông tin</th>
                            <th rowspan="1" colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $childReceiptsIsConfirmFalse as $childReceipt)
                        <tr>
                            <td>
                                <img src="{{ '/upload/avatar/' . $childReceipt->image }}"
                                    style="max-width:170px;width:100%;border-radius:5px" alt="">
                            </td>
                            <td>
                                <img src="{{ '/upload/avatar/' . $childReceipt->kid->kid_avatar}}"
                                    style="max-width:170px;width:100%;border-radius:5px" alt="">
                            </td>
                            <td>
                                <ul>
                                    <li>Họ và tên: {{$childReceipt->name}}</li>
                                    <li>Điện thoại: {{$childReceipt->phone}}</li>
                                    <li>Địa chỉ: {{$childReceipt->address}}</li>
                                    <li>Quan hệ với bé: {{$childReceipt->relationship}}</li>
                                    <li>Thời gian: {{$childReceipt->created_at}}</li>

                                </ul>
                            </td>
                            <td>
                                @if($childReceipt->confirm==0)
                                    <form action="{{route('giao-vien.xac-nhan-don-ho',['id'=>$childReceipt->id])}}" method="post">
                                    @csrf
                                        <button href="#" class="btn btn-primary m-btn m-btn--icon">
                                            <span>
                                                <input type="hidden" name="confirm" value="1">
                                                <i class="la la-chevron-down"></i>
                                                <span>Xác nhận</span>
                                            </span>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('giao-vien.xac-nhan-don-ho',['id'=>$childReceipt->id])}}" method="post">
                                    @csrf
                                        <button href="#" class="btn btn-danger m-btn m-btn--icon">
                                            <span>
                                                <input type="hidden" name="confirm" value="0">
                                                <i class="la la-close"></i>
                                                <span>Huỷ</span>
                                            </span>
                                        </button>
                                    </form>
                                @endif
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
function getSession() {
    var getSession = document.getElementById('receip').value;
    if (getSession && getSession === 'success') {
        swal("Gửi thông tin thành công!", "Bạn đã gửi thông tin đón trẻ thành công!", "success");
    }
    if (getSession && getSession === 'error') {
        swal("Gửi thông tin thất bại!", "Thông tin đón trẻ đã tồn tại. Vui lòng kiểm tra lại!", "error");
    }
    if (getSession && getSession === 'error1') {
        swal("Gửi thông tin thất bại!", "Trẻ hôm nay không có mặt tại lớp. Vui lòng liên hệ với cô giáo !", "error");
    }
}
setTimeout(() => {
    getSession()
}, 200);
</script>
@endsection