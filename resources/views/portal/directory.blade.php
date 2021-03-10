@extends('portal.app')

@section('content')


<div class="main-container">
	<div class="section">
		<div class="container">
			<h1 class="title-2 center" style="margin: -40px 0 0 0;">Phone and Email Directory</h1>
			<div class="row">

				@foreach($departments as $department)
				@if($department->users > 0)
				<div class="col-md-12 col-md-9 col-md-offset-2">
					<br>
					<h3 class="title-2" style="border: 0;">{{ $department->department }}</h3>
					<div class="row">
						<table class="table" style="margin-top: -10px;">
						@foreach($employees as $employee)
							@if($employee->department_id == $department->department_id)
								<tr style="border-bottom: 1px solid #D0D0D0; border-top: 1px solid #D0D0D0;">
									<td style="width: 40%; vertical-align: middle;"><img src="{{ asset('storage/img/user.png') }}" width="30" height="30" style="margin-left: 20px;" />&nbsp;{{ $employee->employee_name }}</td>
									<td style="width: 40%; vertical-align: middle;"><i class="icon-envelope-open"></i>&nbsp;{{ $employee->email }}</td>
									<td style="width: 20%; vertical-align: middle; text-align: center;"><i class="icon-phone"></i>&nbsp;{{ $employee->telephone }}</td>
								</tr>
							@endif
						@endforeach
						</table>


					</div>
				</div>
				@endif
				@endforeach

				
			
			</div>
		</div>
	</div>
</div>

	
@endsection

@section('script')
<script>
$(document).ready(function(){

});
</script>
@endsection