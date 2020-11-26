@extends('./staff/nha-truong/layouts/layout')
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
			<!--end::Form-->
		</div>
	</div>
</div>
@endsection