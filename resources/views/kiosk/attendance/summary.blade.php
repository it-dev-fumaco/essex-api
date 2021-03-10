@extends('kiosk.app')
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 97%;">
		{{-- <div class="card-header h4">Attendance</div> --}}
		<div class="card-header h4 text-center">
			<span class="align-middle">Last Cut-off Attendance Summary</span>
		<div class="pull-left">
        	<a href="/kiosk/attendance">
          		<img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
        	</a>
      </div>
		<div class="pull-right">
        	<a href="/kiosk/home">
          		<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
        	</a>
      </div>
  	</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						{{-- <h3 class="h4-responsive text-center">Last 30 Day(s) Attendance Summary</h3> --}}
						<dl class="row pl-5 mt-2">
						  	<dt class="col-md-3 pl-5">Date Period</dt>
						  	<dd class="col-md-9">
						  		{{ date('F d, Y', strtotime($summary_details['date_from'])) }} — {{ date('F d, Y', strtotime($summary_details['date_to'])) }}
						  	</dd>

						  	<dt class="col-md-3 pl-5">Required Working Days</dt>
						  	<dd class="col-md-3">{{ $summary_details['working_days'] }} Day(s)</dd>

						  	<dt class="col-md-3 pl-5">Total Overtime Hours</dt>
						  	<dd class="col-md-3">{{ collect($employee_logs)->sum('overtime') }} hr(s)</dd>

						  	<dt class="col-md-3 pl-5">Total Working Hours</dt>
						  	<dd class="col-md-3">{{ collect($employee_logs)->sum('hrs_worked') }} hr(s)</dd>

						  	<dt class="col-md-3 pl-5">Total Lates</dt>
						  	<dd class="col-md-3">{{ collect($employee_logs)->sum('late_in_minutes') }} min(s)</dd>
						</dl>
					</div>
					<div class="col-md-12">
						<h5 class="h5-responsive text-center">Overtime Biometric Logs</h5>
							<div class="table-responsive">
								<table class="table table-sm table-bordered text-center">
    								<thead>
   									<tr>
   										<th scope="col">Date</th>
								         <th scope="col">DOW</th>
								         <th scope="col">Time In</th>  
								         <th scope="col">Time Out</th>   
								         <th scope="col">Hrs Worked</th>  
								         <th scope="col">Overtime</th>  
								         <th scope="col">Status</th> 
   									</tr>
    								</thead>
    								<tbody>
    								@forelse($overtime_logs as $row)
    								<tr>
         							<td>{{ date('d-M-Y', strtotime($row['transaction_date'])) }}</td>
         							<td>{{ $row['day_of_week'] }}</td>
         							<td>
            							@if($row['time_in'])
          								<span class="badge badge-{{ $row['time_in_status'] === 'late' ? 'danger' : 'success'}}" style="font-size: 9pt;">{{ $row['time_in'] }}</span>
          								@endif
          							</td>
							         <td>{{ $row['time_out'] }}</td>
							         <td>{{ $row['hrs_worked'] }}</td>
							         <td>{{ $row['overtime'] }}</td>
							         <td><b>{{ $row['attendance_status'] }}</b></td>
      							</tr>
      							@empty
	      						<tr>
							        	<td colspan="7">No records found.</td>
	      						</tr>
	      						@endforelse
      						</tbody>
      					</table>
      				</div>
					</div>
					{{-- <div class="col-md-12 text-center">
						<a href="/kiosk/attendance" class="btn btn-primary redirect">
							<i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Back
						</a>
						<a href="/kiosk/home" class="btn btn-primary redirect">
							<i class="fa fa-home mr-1" aria-hidden="true"></i>Home
						</a>
					</div> --}}
				</div>
			</div>
		</div>
</div>
@endsection