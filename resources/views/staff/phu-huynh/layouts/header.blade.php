@php
		use App\Models\Notification;
		use Carbon\Carbon;
		$notifications=Notification::where('range','4')->where('receiver_id',Auth::guard('parent')->user()->id)->orderBy('id', 'desc')->paginate(5);
		@endphp
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
							<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click"
										 m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">9 New</span>
														<span class="m-dropdown__header-subtitle">User Notifications</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alerts
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				
																				@foreach($notifications as $notification)
																				<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																	<span class="m-list-timeline__icon flaticon-user"></span>
																	<span class="m-list-timeline__text"><a href="">{{substr($notification->title,0,45)}}{{strlen($notification->title)>45?'...':''}}</a></span>
																	<span class="m-list-timeline__time">

																	@php
																		$time =strtotime(Carbon::now())- strtotime($notification->created_at) ;
																		if(($time/60)<60){
																			echo round($time/60).' phút trước.';
																		}else {
																			echo $notification->created_at;
																		};
																	@endphp
																	</span>
																</div>
																				@endforeach
																				
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">New order received</a>
																					<span class="m-list-timeline__time">Just now</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																					<a href="" class="m-list-timeline__text">New invoice received</a>
																					<span class="m-list-timeline__time">20 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">Production server up</a>
																					<span class="m-list-timeline__time">5 hrs</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">New order received</a>
																					<span class="m-list-timeline__time">7 hrs</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">System shutdown</a>
																					<span class="m-list-timeline__time">11 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">Production server down</a>
																					<span class="m-list-timeline__time">3 hrs</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">All caught up!<br>No new logs.</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
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