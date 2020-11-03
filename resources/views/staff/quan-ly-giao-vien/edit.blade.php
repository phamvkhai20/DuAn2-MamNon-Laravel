@extends('./staff/layouts/layout')
@section('title','Dashboard')
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
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
									<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
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
															<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
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
						<div class="row">
							<div class="col-lg-6">

								<!--begin::Portlet-->
								<div class="m-portlet">
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
									<form class="m-form">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												<div class="form-group m-form__group">
													<label for="example_input_full_name">Tên:</label>
													<input type="text" class="form-control m-input" placeholder="Nhập đầy đủ tên">
													<!-- <span class="m-form__help">Please enter your full name</span> -->
												</div>
												<div class="form-group m-form__group">
													<label>Email :</label>
													<input type="email" class="form-control m-input" placeholder="Nhập email đầy đủ">
													<!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
												</div>
												<div class="form-group m-form__group">
													<label>Số Điện Thoại</label>
													<input type="text" class="form-control m-input" placeholder="Nhập SĐT đầy đủ">
												</div>
												<div class="form-group m-form__group">
													<label>Mật Khẩu</label>
													<input type="text" class="form-control m-input" placeholder="Nhập mật khẩuđầy đủ">
												</div>
											</div>
										</div>

									</form>
								</div>
							</div>
							<div class="col-lg-6">
								<!--begin::Portlet-->
								<div class="m-portlet">
									<!--begin::Form-->
									<form class="m-form m-form--fit">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												<div class="form-group m-form__group">
													<label for="example_input_full_name">Giới Tính:</label>
												<select name="id_cate" class="form-control">
                                                        <option value="34">Nam</option>
                                                        <option value="35">Nữ</option>
                                                    </select>
												</div>
												<div class="form-group m-form__group">
													<label>Vai Trò :</label>
													<input type="email" class="form-control m-input" placeholder="">
													<!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
												</div>
												<div class="form-group m-form__group">
													<label>Trạng Thái</label>
													<select name="id_cate" class="form-control">
                                                        <option value="34">ab</option>
                                                        <option value="35">bc</option>
                                                    </select>
												</div>
												<div class="form-group m-form__group">
													<label>Ngày Sinh</label>
													<input type="text" class="form-control m-input" placeholder="">
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions">
												<button type="reset" class="btn btn-primary">Thêm</button>
											    <a href="{{route('gv.index')}}" class="btn btn-secondary">Quay Lại</a>
											</div>
										</div>
									</form>

									<!--end::Form-->
								</div>

								<!--end::Portlet-->
							</div>
						</div>

					</div>
				</div>

@endsection
