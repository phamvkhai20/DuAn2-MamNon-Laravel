@extends('./staff/giao-vien/layouts/layout')
@section('title','Thêm sổ liên lạc')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
        <div class="">
            <div class="m-portlet ">
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

                @php
                  use Carbon\Carbon;
                @endphp
                <div class="m-portlet__body">
                    @foreach($contactBooks as $contactBook)
                    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible fade show" role="alert">
                        <div class="m-alert__icon">
                        <i class="flaticon-chat-1"></i>
                        </div>
                        <div class="m-alert__text">
                            <strong>Số liên lạc </strong> Ngày : {{Carbon::parse($contactBook->date)->format('d-m-Y')}}
                        </div>
                        <div class="m-alert__actions" style="width: 220px;">
                            <a href="{{route('giao-vien.chi-tiet-so-lien-lac',['id'=>session('class'),'date'=>$contactBook->date])}}" class="btn btn-primary m-btn m-btn--icon m-btn--wide"
                                data-dismiss="alert1" aria-label="Close"><span>
                                    <i class="la la-arrow-circle-right"></i>
                                    <span>Xem chi tiết</span>
                                </span> 
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection