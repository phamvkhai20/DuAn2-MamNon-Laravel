
@extends('./staff/layouts/layout')
@section('title','Dashboard')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">@yield('title')</h3>
            </div>
        </div>
    </div>
    <div class="m-content">
    <div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Base Form Controls
												</h3>
											</div>
										</div>
									</div>

									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group m--margin-top-10">
												<div class="alert m-alert m-alert--default" role="alert">
													The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
												</div>
											</div>
											<div class="form-group m-form__group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
												<span class="m-form__help">We'll never share your email with anyone else.</span>
											</div>
											<div class="form-group m-form__group">
												<label for="exampleInputPassword1">Password</label>
												<input type="password" class="form-control m-input" id="exampleInputPassword1" placeholder="Password">
											</div>
											<div class="form-group m-form__group">
												<label>Static:</label>
												<p class="form-control-static">email@example.com</p>
											</div>
											<div class="form-group m-form__group">
												<label for="exampleSelect1">Example select</label>
												<select class="form-control m-input" id="exampleSelect1">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>
											<div class="form-group m-form__group">
												<label for="exampleSelect2">Example multiple select</label>
												<select multiple="" class="form-control m-input" id="exampleSelect2">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>
											<div class="form-group m-form__group">
												<label for="exampleTextarea">Example textarea</label>
												<textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="reset" class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</form>

									<!--end::Form-->
								</div>
    </div>
</div>
@endsection
