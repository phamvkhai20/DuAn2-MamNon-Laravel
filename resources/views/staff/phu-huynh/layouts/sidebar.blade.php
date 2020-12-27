<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a
                    href="{{route('phu-huynh.index',['id'=>session('id_kid_default')])}}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Bảng tin</span>

                            <!-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> -->
                        </span></span></a></li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Trẻ</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            @foreach(session('kids') as $key=>$kid)
            <li class="m-menu__item m-menu__item--active" aria-haspopup="true"><a href="#" class="m-menu__link ">
                    <style>
                    .image__kid {   
                        width: 50px;
                        height: 50px;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        position: relative;
                        border-radius: 5px;
                        padding: 10px;
                    }
                    </style>
                    <form method="post" action="{{route('phu-huynh.set-default-kid')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kid->id }}">
                        <button type="submit" class="box_kid row d-flex justify-content-center">
                            <div class=" m-menu__link-icon image__kid"
                                style="background-image: url(<?php echo '/upload/avatar/' . $kid->kid_avatar ?> )">
                            </div>
                            @if(session('id_kid_default')==$kid->id)
                            <span class=" m-menu__link-text col-md-7">
                                {{strstr($kid->kid_name,' ')}}
                            </span>
                            @else
                            <span class=" m-menu__link-text col-md-7" style="color:#fff">
                                {{strstr($kid->kid_name,' ')}}
                            </span>
                            @endif

                        </button>
                    </form>
                </a></li>
            @endforeach
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin học phí</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-life-saver"></i><span class="m-menu__link-text">Điểm danh
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a
                                href="{{route('phu-huynh.diem-danh',['id'=>session('id_kid_default')])}}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Điểm danh</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a
                                href="{{route('phu-huynh.lich-su-nghi',['id'=>session('id_kid_default')])}}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Xin nghỉ</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Thông tin cho trẻ</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('phu-huynh.so-lien-lac',['id'=>session('id_kid_default')])}}"
                    class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-book"></i><span
                        class="m-menu__link-text">Sổ liên lạc
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>

            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text" style="color:#868aa8;font-size:15px">Tiện ích nhà trường</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('phu-huynh.dang-ki-don.lich-su',['id'=>session('id_kid_default')])}}"
                    class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-reorder"></i><span
                        class="m-menu__link-text">Thông tin đón trẻ
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('phu-huynh.gop-y.index')}}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-envelope-o"></i><span
                        class="m-menu__link-text">Góp ý nhà trường
                    </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Thông báo
            </span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route('phu-huynh.thong-bao.index')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Danh sách các thông báo</span></a></li>
                   </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{route('phu-huynh.ho-so-ca-nhan.index')}}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-yc-square"></i><span class="m-menu__link-text">Hồ sơ cá nhân</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
           
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="{{ route('logout.parent') }}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon la la-power-off"></i><span class="m-menu__link-text">Đăng xuất</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
            </li>
           
        </ul>
    </div>
</div>