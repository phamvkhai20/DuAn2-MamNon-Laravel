<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{route('nha-truong.nha-truong.index')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Bảng tin</span>
                </a></li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin học phí</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-child"></i><span class="m-menu__link-text">Quản lý
                        điểm danh</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.diem-danh.list')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Điểm danh toàn trường</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tổng hợp điểm danh trẻ</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.change')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Trẻ nghỉ nhiều liên tục</span></a></li>
                    </ul>
                </div>
            </li>
            <!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-child"></i><span class="m-menu__link-text">Quản lý dịch
                        vụ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách dịch vụ</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm dịch vụ mới</span></a></li>
                    </ul>
                </div>
            </li> -->
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin trường học</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-child"></i><span class="m-menu__link-text">Quản lý
                        trẻ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách trẻ</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới trẻ</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.tre.change')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Chuyển lớp</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-female"></i><span class="m-menu__link-text">Quản lý phụ
                        huynh</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.phu-huynh.list')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách phụ hyunh</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.phu-huynh.create')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới phụ hyunh</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-mortar-board"></i><span class="m-menu__link-text">Quản lý
                        giáo viên</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.giao-vien.list')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh giáo viên</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.giao-vien.them')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới giáo viên</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-th-large"></i><span class="m-menu__link-text">Quản lý lớp
                        học</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.lop.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách lớp học</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.lop.them-moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới lớp học</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.lop.them-moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Xếp lớp</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.lop.them-moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Đã tốt nghiệp</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-th-large"></i><span class="m-menu__link-text">Quản lý khối
                        học</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.khoi.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách khối lớp</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.khoi.them_moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới khối lớp</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.khoi.them_moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới khối lớp</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Quản lý năm
                        học</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.nam.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách năm học</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('nha-truong.nam.them_moi')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thêm mới năm học</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('logout.school') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Đăng xuất</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>


        </ul>
    </div>
</div>