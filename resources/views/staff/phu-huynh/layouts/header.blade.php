	<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
	    <div class="m-container m-container--fluid m-container--full-height">
	        <div class="m-stack m-stack--ver m-stack--desktop">
	            <div class="m-stack__item m-brand  m-brand--skin-dark ">
	                <div class="m-stack m-stack--ver m-stack--general">
	                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
	                        <a href="{{route('nha-truong.nha-truong.index')}}" class="m-brand__logo-wrapper">
	                            <img alt="" style="height:60px" src="{{asset('assets/demo/img/logo/logo-mamNon.png')}}" />
	                        </a>
	                    </div>
	                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
	                        <a href="javascript:;" id="m_aside_left_minimize_toggle"
	                            class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
	                            <span></span>
	                        </a>
	                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
	                            class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
	                            <span></span>
	                        </a>

	                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
	                            class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
	                            <i class="flaticon-more"></i>
	                        </a>
	                    </div>
	                </div>
	            </div>
	            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
	                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
	                    id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
	                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
	                    <div class="m-stack__item m-topbar__nav-wrapper">
	                        <ul class="m-topbar__nav m-nav m-nav--inline">
	                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
	                                m-dropdown-toggle="click">
	                                <a href="#" class="m-nav__link m-dropdown__toggle">

	                                    <span
	                                        class="m-topbar__username m--hidden-tablet m--hidden-mobile m--padding-right-15">
	                                        <span class="m-topbar__welcome m--hidden-tablet m--hidden-mobile"
	                                            style="color:#000">Hello,&nbsp;</span>
	                                        <span
	                                            class="m-link">{{Auth::guard('parent')->user()->parent_name}}</span></span>
	                                    <span class="m-topbar__userpic">
	                                        <img src="{{asset('/upload/avatar/' . Auth::guard('parent')->user()->parent_avatar)}}"
	                                            class="m--img-rounded m--marginless m--img-centered" alt="" />
	                                    </span>
	                                </a>
	                                <div class="m-dropdown__wrapper">
	                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"
	                                        style="color:#fff"></span>
	                                    <div class="m-dropdown__inner">
	                                        <div class="m-dropdown__header m--align-center"
	                                            style="background: #fff; background-size: cover;">
	                                            <div class="m-card-user m-card-user--skin-dark">
	                                                <div class="m-card-user__pic">
	                                                    <img src="assets/app/media/img/users/user4.jpg"
	                                                        class="m--img-rounded m--marginless" alt="" />
	                                                </div>
	                                                <div class="m-card-user__details">
	                                                    <span class="m-card-user__name m--font-weight-500"
	                                                        style="color:#231010">{{Auth::guard('parent')->user()->parent_name}}</span>
	                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link"
	                                                        style="color:#000">{{Auth::guard('parent')->user()->phone}}</a>
	                                                    <br>
	                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link"
	                                                        style="color:#000">{{Auth::guard('parent')->user()->email}}</a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="m-dropdown__body">
	                                            <div class="m-dropdown__content">
	                                                <ul class="m-nav m-nav--skin-light">

	                                                    <li class="m-nav__item">
	                                                        <a href="profile.html" class="m-nav__link">
	                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
	                                                            <span class="m-nav__link-title">
	                                                                <span class="m-nav__link-wrap">
	                                                                    <span class="m-nav__link-text">Thông tin cá
	                                                                        nhân</span>
	                                                                    <span class="m-nav__link-badge"><span
	                                                                            class="m-badge m-badge--success">2</span></span>
	                                                                </span>
	                                                            </span>
	                                                        </a>
	                                                    </li>
	                                                    <li class="m-nav__item">
	                                                        <a href="profile.html" class="m-nav__link">
	                                                            <i class="m-nav__link-icon flaticon-share"></i>
	                                                            <span class="m-nav__link-text">Activity</span>
	                                                        </a>
	                                                    </li>
	                                                    <li class="m-nav__item">
	                                                        <a href="profile.html" class="m-nav__link">
	                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
	                                                            <span class="m-nav__link-text">Messages</span>
	                                                        </a>
	                                                    </li>
	                                                    <li class="m-nav__separator m-nav__separator--fit">
	                                                    </li>
	                                                    <li class="m-nav__item">
	                                                        <a href="{{ route('logout.parent') }}"
	                                                            class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
	                                                    </li>
	                                                </ul>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</header>