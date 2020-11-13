@extends('./staff/layouts/layout')
@section('title','Sửa thông tin giáo viên')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Sửa Giáo Viên</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Forms &amp; Controls</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Form Layouts</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Default Forms</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                    m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#"
                        class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                        <i class="la la-plus m--hide"></i>
                        <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first m--hide">
                                            <span class="m-nav__section-text">Quick Actions</span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">Activity</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                <span class="m-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                <span class="m-nav__link-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-text">Support</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__separator m-nav__separator--fit">
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#"
                                                class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="">
            <!--begin::Portlet-->
            <div class="m-portlet ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Nhập thông tin vào form bên dưới
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form row" enctype="multipart/form-data" action="{{ route('giao-vien.update', $teacher->id) }}" method="post">
                    @csrf
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                        <input hidden name="id" value="{{$teacher->id}}" type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên">
                            <div class="m-form__section m-form__section--first">
                            
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Tên:</label>
                                    <input name="fullname" type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên" value="{{$teacher->fullname}}">
                                    <!-- <span class="m-form__help">Please enter your full name</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Email :</label>
                                    <input name="email"  type="email" class="form-control m-input" placeholder="Nhập email đầy đủ" value="{{$teacher->email}}">
                                    <!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Số Điện Thoại</label>
                                    <input name="phone" type="text" class="form-control m-input" placeholder="Nhập sđt đầy đủ" value="{{$teacher->phone}}">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Mật Khẩu</label>
                                    <input name="password" type="password" class="form-control m-input" placeholder="Nhập mật khẩu đầy đủ" value="{{$teacher->password}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label>Ngày Sinh</label>
                                    <input name="date_of_birth" type="date" class="form-control m-input" placeholder="" value="{{$teacher->date_of_birth}}">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">Giới Tính:</label>
                                    <select name="gender" class="form-control">
                                        <option @if ($teacher->gender == 0) selected @endif value="0">Nữ</option>
                                        <option @if ($teacher->gender == 1) selected @endif value="1">Nam</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Vai Trò :</label>
                                    <select name="teacher_type_id" class="form-control">
                                    @foreach ($teacher_types as $teacher_type)
                                    <option @if($teacher_type->id == $teacher->teacher_type_id ) selected @endif value="{{ $teacher_type->id }}">{{ $teacher_type->teacher_type }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Trạng Thái</label>
                                    <select  name="status" class="form-control">
                                        <option @if ($teacher->status == 0) selected @endif value="0">Khóa</option>
                                        <option @if ($teacher->status == 1) selected @endif value="1">Hoạt Động</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Ảnh</label>
                                    <input name="avatar" type="file" class="form-control m-input" >
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a href="{{route('giao-vien.index')}}" class="btn btn-secondary">Quay Lại</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection