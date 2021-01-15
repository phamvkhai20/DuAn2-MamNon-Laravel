@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách hồ sơ nhập học')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3 ">
    <div class="">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <div class="m-form m-form--label-align-right  ">
                    <div class="row align-items-center">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-3">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="ml-4 dropdown pt-3 pb-4 mt-2">
                                            <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lọc theo trạng thái
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('nha-truong.nha-truong.admission')}}">Tất cả</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.nha-truong.admission')}}?status=0">Chưa xác nhận</a>
                                                <a class="dropdown-item" href="{{route('nha-truong.nha-truong.admission')}}?status=1">Đã xác nhận</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div>
                                <form action="" class="d-flex">
                                
                                <div class="col-md-12">
                                
                                    <div class="m-input-icon m-input-icon--left">
                                        <input value="{{request()->get('kid_name')}}" name="kid_name" id="searchByName" type="text" class="form-control m-input m-input--solid"
                                            placeholder="Tìm kiếm qua tên">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>

                                </div>
                                <div class="col-md-3">
                                    <div class="m-input-icon m-input-icon--left">
                                        <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
                                    </div>
                                </div>
                                </form>
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
               
            </div>
            <div class="m-portlet__body">

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
                                            <th rowspan="1" colspan="1">Họ tên trẻ</th>
                                            <th rowspan="1" colspan="1">Nickname</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Họ tên phụ huynh</th>
                                            <th rowspan="1" colspan="1">Số điện thoại</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Trạng Thái</th>
                                           
                                            </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Họ tên trẻ</th>
                                            <th rowspan="1" colspan="1">Nickname</th>
                                            <th rowspan="1" colspan="1">Ngày sinh</th>
                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                            <th rowspan="1" colspan="1">Họ tên phụ huynh</th>
                                            <th rowspan="1" colspan="1">Số điện thoại</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Trạng Thái</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @if(count($admissions) == 0)
                                    <tr>
                                        <th colspan="8" class="text-center"><label class="col-lg-10 text-danger">Không tìm thấy hồ sơ nào!</label> </th>
                                    </tr>
                                    @endif
                                        @foreach ($admissions as $admission)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" tabindex="0">{{$admission->kid_name}}</td>
                                            <td>{{$admission->nickname}}</td>
                                            <td>
                                            {{$admission->date_of_birth}}
                                            </td>
                                            <td>{{$admission->address}}</td>
                                            <td>{{$admission->parent_name}}</td>
                                            <td>{{$admission->phone}}</td>
                                            <td>{{$admission->email}}</td>
                                            <td>
                                            <input @if ($admission->status == 1) disabled @endif type="checkbox" data-id="{{ $admission->id }}" name="status" class="js-switch" {{ $admission->status == 1 ? 'checked' : '' }}>
                                            </td>
                                        </tr>
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
                            {{ $admissions->links() }}
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'medium' });
});</script>
<script>


  $(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('nha-truong.nha-truong.updateStatus') }}',
            data: {'status': status, 'id': id},
            success: function (data) {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
}
        });
    });
});
</script>

@endsection
