@extends('./staff/layouts/layout')
@section('title','Sửa lớp học')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">Sửa Lớp</h3>
							
							</div>
							
						</div>
					</div>

					<!-- END: Subheader -->
					<div class="m-content">

						<div class="row">
							<div class="col-lg-12">

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
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">Tên Lớp:</label>
												<div class="col-lg-6">
													<input type="email" class="form-control m-input" placeholder="Nhập tên đầy đủ">
													<!-- <span class="m-form__help">Please enter your full name</span> -->
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">ID Khối :</label>
												<div class="col-lg-6">
													<select name="id_cate" class="form-control">
                                                        <option value="34">a</option>
                                                        <option value="35">b</option>
                                                    </select>
													<!-- <span class="m-form__help">We'll never share your email with anyone else</span> -->
												</div>
											</div>
											<div class="m-form__group m-form__group--last form-group row">
												<label class="col-lg-2 col-form-label">ID Năm Học</label>
												<div class="col-lg-6">
													<select name="id_cate" class="form-control">
                                                        <option value="34">a</option>
                                                        <option value="35">b</option>
                                                    </select>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-6">
														<button type="reset" class="btn btn-success">Sửa</button>
														<a href="{{route('lop.index')}}" class="btn btn-secondary">Quay Lại</a>
													</div>
												</div>
											</div>
										</div>
									</form>

									<!--end::Form-->
								</div>

							</div>
						</div>
					</div>
				</div>

@endsection
