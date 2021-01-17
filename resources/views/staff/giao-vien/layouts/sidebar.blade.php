<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @if(!empty(session('classArray')))
            @foreach(session('classArray') as $key=>$class)
            <li class="m-menu__item m-menu__item--active" aria-haspopup="true"><a href="#" class="m-menu__link ">
                    <style>
                        .image__kid {
                            background-position: center;
                            background-repeat: no-repeat;
                            width: 40px;
                            background-size: cover;
                            position: relative;
                            border-radius: 5px;
                        }
                    </style>
                    <form method="post" action="{{route('phu-huynh.set-default-kid')}}">
                        @csrf
                        <button type="submit" class="box_kid row d-flex justify-content-center">
                            <span class=" m-menu__link-text">
                                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px;padding-top:10px">
                                    {{($class->class->name)}}</h4>
                            </span>
                        </button>
                    </form>
                </a></li>

            @endforeach
            @endif

            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{route('giao-vien.index')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Bảng tin</span>
                            <!-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> -->
                        </span></span></a></li>
            @if(!empty(session('classArray'))&&!empty(session('class')))
            <li class="m-menu__section ">

                <!-- classArray -->
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin học phí</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la  la-list-alt"></i><span class="m-menu__link-text">Quản lý điểm
                        danh</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.giao_dien_diem_danh',['id'=>session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Điểm danh ngày</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.xem_diem_danh',['id'=>session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Xem điểm danh</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.giao_dien_diem_danh_don_muon',['id'=>session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Đón muộn</span></a></li>
                    </ul>
                </div>
            </li>
            <!-- <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin cho trẻ</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li> -->
            <!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-book"></i><span class="m-menu__link-text">Sổ liên lạc
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.danh-sach-so-lien-lac-ngay',['id'=>session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.them-so-lien-lac',['id'=>session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới</span></a></li>
                    </ul>
                </div>
            </li> -->

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin lớp học</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la  la-child"></i><span class="m-menu__link-text">Quản lý trẻ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.danh-sach-tre',['id'=> session('class')])}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách trẻ</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Quản lý thông báo
                        </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.thong-bao.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách các thông báo</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.thong-bao.them_moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới thông báo</span></a></li>
                    </ul>
                </div>
            </li>
            @endif
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-power-off"></i><span class="m-menu__link-text">Cài đặt</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('giao-vien.change_password',[Auth::guard('teacher')->user()->id])}}" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Đổi mật khẩu</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('logout.teacher') }}" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Đăng xuất</span></a></li>
                    </ul>
                </div>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('logout.teacher') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Đăng xuất</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>

        </ul>
    </div>
</div>