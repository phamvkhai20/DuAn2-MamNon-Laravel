@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="row">
                        <div class="m-portlet__head-title col 6">
                            <h3 class="m-portlet__head-text">
                                Điểm danh
                            </h3>
                        </div>
                        <div class="input-group date col-6">
                            <input type="text" class="form-control m-input" readonly value="05/20/2017" id="m_datepicker_3" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection