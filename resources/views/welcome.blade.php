<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Asap+Condensed:500"]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
	</script>
	<style>
		.login{
			min-height: 100%;
			background-image: url("{{asset('assets/app/media/img/banner_full_hd.jpg')}}");
			width: 100%;
			background-repeat: no-repeat;
			background-size: contain;
		}
	</style>
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/demo10/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
        type="text/css" />
    <link rel="shortcut icon png" href="https://s3.ap-southeast-1.amazonaws.com/kiddihub-production/images/avatar-trng-mm-non-ty-tu-ty-tu11554690864.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="m-page--fluid m-page--loading-enabled m-page--loading m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">
    <!-- begin::Page loader -->
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
    <div class="m-grid m-grid--hor m-grid--root m-page">
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
                                    <a href="index.html" class="m-brand__logo-wrapper">
                                        <img alt="" style="height:60px"  src="https://mamnonarmstrong.com/wp-content/uploads/2020/08/ARMS-Logo.png"
                                            class="m-brand__logo-desktop" />
                                        <img alt="" style="height:50px" src="https://mamnonarmstrong.com/wp-content/uploads/2020/08/ARMS-Logo.png"
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
                                                    <li
                                                        class="m-menu__item   m-menu__item--submenu m-menu__item--tabs">
                                                        <a style="background:#fff"
                                                            class="m-menu__link m-menu__toggle"><span
																class="m-menu__link-text">Nhà trường</span>
																<i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i>
														</a>
                                                    </li>
                                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                        <a style="background:#fff"
                                                            class="m-menu__link m-menu__toggle "><span
																class="m-menu__link-text">Giáo viên</span>
																<i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i>
															</a>

                                                    </li>
                                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--tabs">
                                                        <a style="background:#fff"
                                                            class="m-menu__link m-menu__toggle"><span
																class="m-menu__link-text">Phụ huynh</span>
																<i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i>
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
                                    <a id="m_aside_header_topbar_mobile_toggle"
                                        class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
	</div>
		<div class="login" style="margin-top:70px">
			<div class="container">
			<div class="row">
			<div class="col-xl-4">
				<div class="row m-row--full-height">
					<div class="col-sm-12 col-md-12 col-lg-6">
						
					</div>
				</div>
			</div>
			<div class="col-xl-4"  style="min-height: 130px">
			</div>
			<div class="col-xl-4 mt-5">
				<div class="m-portlet m-portlet--full-height m-portlet--fit  m-portlet--rounded">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Đăng nhập với tư cách nhà trường
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="m-portlet__nav">
								<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
								</li>
							</ul>
						</div>
					</div>
					<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group">
												<label >Số điện thoại</label>
												<input type="number" class="form-control m-input m-input--square"  placeholder="Số điện thoại">
											</div>
											<div class="form-group m-form__group">
												<label >Mật khẩu</label>
												<input type="password" class="form-control m-input m-input--square" placeholder="mật khẩu">
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="reset" class="btn btn-primary">Đăng nhập</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</form>
				</div>
			</div>
		</div>
			</div>
		</div>
    <script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/demo10/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <script>
    $(window).on('load', function() {
        $('body').removeClass('m-page--loading');
    });
    </script>
</body>
</html>