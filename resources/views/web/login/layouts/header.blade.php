<div class="m-page-loader m-page-loader--base">
    <div class="m-blockui">
        <span>Please wait...</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>
<!-- end::Page Loader -->

<!-- begin:: Page -->
<div class="">
    <!-- begin::Header -->
    <header id="m_header" class="m-grid__item m-header " m-minimize="minimize" m-minimize-mobile="minimize"
        m-minimize-offset="10" m-minimize-mobile-offset="10">
        <div class="m-header__top">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- begin::Brand -->
                    <div class="m-stack__item m-brand m-stack__item--left">
                        <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="{{route('web.home')}}" class="m-brand__logo-wrapper">
                                    <img alt="" style="height:50px"
                                        src="{{asset('assets/demo/img/logo/logo-mamNon.png')}}"
                                        class="m-brand__logo-desktop" />
                                    <img alt="" style="height:45px"
                                        src="{{asset('assets/demo/img/logo/logo-mamNon.png')}}"
                                        class="m-brand__logo-mobile" />
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- begin::Quick Actions-->
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push"
                                    m-dropdown-toggle="click" aria-expanded="true">
                                    <div class="m-stack__item m-stack__item--fluid m-header-menu-wrapper">
                                        <button
                                            class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light "
                                            id="m_aside_header_menu_mobile_close_btn"><i
                                                class="la la-close"></i></button>
                                        <div id="m_header_menu"
                                            class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
                                            <ul class="m-menu__nav  m-menu__nav--submenu-arrow "
                                                style="text-align:left">
                                                <li class="m-menu__item   m-menu__item--submenu m-menu__item--tabs">
                                                    <a style="background:#fff" href="{{route('login.school')}}"
                                                        class="m-menu__link "><span class="m-menu__link-text">Nhà
                                                            trường</span>
                                                        <i class="m-menu__hor-arrow la la-angle-down"></i><i
                                                            class="m-menu__ver-arrow la la-angle-right"></i>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                    <a style="background:#fff" href="{{route('login.teacher')}}"
                                                        class="m-menu__link"><span class="m-menu__link-text">Giáo
                                                            viên</span>
                                                        <i class="m-menu__hor-arrow la la-angle-down"></i><i
                                                            class="m-menu__ver-arrow la la-angle-right"></i>
                                                    </a>

                                                </li>
                                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                    <a style="background:#fff" class="m-menu__link "
                                                        href="{{route('login.parent')}}"><span
                                                            class="m-menu__link-text">
                                                            Phụ huynh
                                                        </span>
                                                        <i class="m-menu__hor-arrow la la-angle-down"></i><i
                                                            class="m-menu__ver-arrow la la-angle-right"></i>
                                                    </a>

                                                </li>
                                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                    <a style="background:#fff" class="m-menu__link "
                                                        href="{{route('web.nop-ho-so')}}"><span
                                                            class="m-menu__link-text">
                                                            Nộp hồ sơ nhập học
                                                        </span>
                                                        <i class="m-menu__hor-arrow la la-angle-down"></i><i
                                                            class="m-menu__ver-arrow la la-angle-right"></i>
                                                    </a>

                                                </li>
                                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                    <a style="background:#fff" class="m-menu__link "
                                                        href="{{route('web.gioi-thieu')}}"><span
                                                            class="m-menu__link-text">
                                                           Giới thiệu
                                                        </span>
                                                        <i class="m-menu__hor-arrow la la-angle-down"></i><i
                                                            class="m-menu__ver-arrow la la-angle-right"></i>
                                                    </a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a id="m_aside_header_menu_mobile_toggle"
                                    class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>