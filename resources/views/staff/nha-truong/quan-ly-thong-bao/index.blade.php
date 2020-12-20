@extends('./staff/nha-truong/layouts/layout')
@section('title','Danh sách các thông báo')
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
                                        <div class="m-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select m-bootstrap-select--solid"
                                                id="m_form_status">
                                                <option value="">All</option>
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
                    <a href="#" class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-arrow-left"></i>
                            <span>Quay lại</span>
                        </span>
                    </a>
                    <a href="{{route('nha-truong.thong-bao.them_moi')}}"
                        class="btn btn-success m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Thêm thông báo</span>
                        </span>
                    </a>
                </div>
            </div>
                        <div class="m-portlet__body">
                            @foreach($notifications as $notification)
                            <div class="m-accordion m-accordion--default" id="m_accordion_{{$notification->id}}" role="tablist">
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab"
                                        id="m_accordion_1_item_{{$notification->id}}_head" data-toggle="collapse"
                                        href="#m_accordion_1_item_{{$notification->id}}_body" aria-expanded="false">
                                        <span class="m-accordion__item-icon"><i class="fa fa-bullhorn m--font-info"></i></span>
                                        <span class="m-accordion__item-title">{{$notification->title}} - {{$notification->created_at}}</span>
                                        <span class="m-accordion__item-mode"></span>
                                    </div>
                                    <div class="m-accordion__item-body collapse" id="m_accordion_1_item_{{$notification->id}}_body"
                                        class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_{{$notification->id}}_head"
                                        data-parent="#m_accordion_{{$notification->id}}">
                                        <div class="m-accordion__item-content">
                                            {!!$notification->note!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="m_table_1_processing" class="dataTables_processing card" style="display: none;">
                            Processing...</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                            <ul class="pagination">
                                {{ $notifications->links() }}
                            </ul>
                    </div>
            </div>
    </div>
</div>
</div>
@endsection