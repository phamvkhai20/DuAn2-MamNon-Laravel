@extends('./staff/phu-huynh/layouts/layout')
@section('title','Sổ liên lạc')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
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
            <div class="m-3">
                <div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">
                @foreach($contactBook as $key=>$cb)
                    <div class="m-accordion__item ">
                        <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_{{$key}}_head"
                            data-toggle="collapse" href="#m_accordion_1_item_{{$key}}_body" aria-expanded="    false">
                            <span class="m-accordion__item-icon"><i class="la la-comment"></i></span>
                            <span class="m-accordion__item-title">{{$cb->title}}</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        @if($key==0)
                        <div class="m-accordion__item-body collapse show" id="m_accordion_1_item_{{$key}}_body" class=" "
                            role="tabpanel" aria-labelledby="m_accordion_1_item_{{$key}}_head"
                            data-parent="#m_accordion_1">
                        @else
                        <div class="m-accordion__item-body collapse " id="m_accordion_1_item_{{$key}}_body" class=" "
                            role="tabpanel" aria-labelledby="m_accordion_1_item_{{$key}}_head"
                            data-parent="#m_accordion_1">
                        @endif
                            <div class="m-3">
                                <ul>

														
                                    @foreach($cb->replyToComment as $replyToComment)
                                    <li>{{$replyToComment->comment->title}} : {{$replyToComment->response_comment->name}}</li>
                                    @if($replyToComment->note!=="null")
                                    <p style="padding: 10px; margin: 10px 0 5px 0; border: 4px solid #efefef" id="m_blockui_1_content">
                                    Khác : {{$replyToComment->note}}
                                    </p>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <p class="pl-5">Thêm lúc : {{$replyToComment->created_at}}</p>
                        </div>
                    </div>
                @endforeach

                </div>
                <br>
            </div>
            
        </div>
    </div>
</div>
@endsection