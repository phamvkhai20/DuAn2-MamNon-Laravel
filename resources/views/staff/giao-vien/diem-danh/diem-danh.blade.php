@extends('./staff/giao-vien/layouts/layout')
@section('title','Điểm danh')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
   
    <!-- END: Subheader -->
    <div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Điểm danh
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Điểm danh đên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Điểm danh về</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                    <div class="row">
                        @foreach($kids as $index=>$kid)
                        <div class=" col image_kid_attendance d-flex justify-content-center"
                            style="background-image: url({{asset('/upload/avatar/'.$kid->kid_avatar)}}); margin:20px">
                            <div class="box_group_name">
                                <b> Phạm văn khải</b>
                            </div>
                            <div class="box_group_button">
                                <div class="row">
                                    <span class=" col-6 m-switch m-switch--outline m-switch--success">
                                        <label style="margin-bottom: 0;margin-left:10px">
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                    <a href="#" class="col-6" data-toggle="modal" data-target="#m_modal_1_2"
                                        class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link"
                                        style="padding: 0;padding-top:15px;">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="modal fade" id="m_modal_1_2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Điểm danh</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true"
                                                data-height="200">
                                                ss
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                    containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
    </div>
        <div class="m-nav-sticky" style="margin-top: 30px;width:100px;height:100px">
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" data-placement="left">
                <button class="btn-primary button_attendance">Điểm danh</button>
            </li>

        </div>
    </div>
</div>
@endsection