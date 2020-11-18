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
     

        <div class="m-section">
            <div class="m-section__content">
                <table class="table table-bordered m-table m-table--border-success">
                    <thead>
						
                        <tr>
                            <th>Ngày</th>
							@foreach($getAttendance as $gg)
							<th>{{substr($gg->date,8,2)}}</th>
							@endforeach
                        </tr>
                    </thead>
                    <tbody>
						@foreach($studentInClass as $student)
							<tr>
								<td>{{$student->fullname}}</td>
									@foreach($student->attendance as $attendances)
										@if($attendances->status==1)
											<td>Vắng</td>
										@else
											<td>Đi</td>
										@endif
									@endforeach
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection