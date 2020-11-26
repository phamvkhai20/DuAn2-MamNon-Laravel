<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
        class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{route('phu-huynh.index')}}"
                    class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span
                        class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
                                class="m-menu__link-text">Bảng tin</span>
                            <!-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> -->
                        </span></span></a></li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin học phí</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-list-alt"></i><span class="m-menu__link-text">Điểm danh
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-life-saver
"></i><span class="m-menu__link-text">Dịch vụ
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nam.them_moi')}}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Đăng kí dịch vụ</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nam.them_moi')}}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Thông tin sử dụng dịch vụ</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin cho trẻ</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('nam.index')}}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-book"></i><span class="m-menu__link-text">Sổ liên lạc
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>

            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('nam.them_moi')}}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-bell"></i><span class="m-menu__link-text">Thông báo - sự kiện
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Tiện ích nhà trường</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('nam.them_moi')}}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-reorder"></i><span class="m-menu__link-text">Thông tin đón trẻ
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>

            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('nam.them_moi')}}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-envelope-o
"></i><span class="m-menu__link-text">Góp ý nhà trường
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>

            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{ route('logout.parent') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-power-off
"></i><span class="m-menu__link-text">Đăng xuất</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>


        </ul>
    </div>
</div>