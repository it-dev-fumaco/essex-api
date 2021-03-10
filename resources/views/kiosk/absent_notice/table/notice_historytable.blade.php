<table class="table table-sm table-bordered text-center">
	<col style="width: 5%;">
	<col style="width: 12%;">
	<col style="width: 12%;">
	<col style="width: 18%;">
	<col style="width: 25%;">
	<col style="width: 12%;">
	<col style="width: 16%;">
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">From</th>
			<th scope="col">To</th>
			<th scope="col">Absence Type</th>
			<th scope="col">Reason</th>
			<th scope="col">Status</th>
			<th scope="col">Approved by</th>
		</tr>
	</thead>
</table>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
	<table class="table table-sm table-bordered text-center">
		<col style="width: 5%;">
		<col style="width: 12%;">
		<col style="width: 12%;">
		<col style="width: 18%;">
		<col style="width: 25%;">
		<col style="width: 12%;">
		<col style="width: 16%;">
		<tbody>
			@forelse($logs as $notice_slip)
			<tr>
				<td>{{ $notice_slip->notice_id }}</td>
				<td >{{ $notice_slip->date_from }} - {{ $notice_slip->time_from }}</td>
				<td >{{ $notice_slip->date_to }} - {{ $notice_slip->time_to }}</td>
				<td >{{ $notice_slip->leave_type }}</td>
				<td>{{ $notice_slip->reason }}</td>
				<td>
					@switch(strtolower($notice_slip->status))
						@case('approved') 
						<span class="badge badge-primary">APPROVED</span>
						@break
						@case('cancelled') 
						<span class="badge badge-danger">CANCELLED</span>
						@break
						@case('disapproved')
						<span class="badge badge-danger">DISAPPROVED</span>
						@break
						@case('deferred')
						<span class="badge badge-danger">DEFERRED</span>
						@break
						@default
						<span class="badge badge-warning">FOR APPROVAL</span>
					@endswitch
				</td>
				<td>{{ $notice_slip->approver }}</td>
			</tr>
			@empty
			<tr>
				<td colspan="6">No records found.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>

<style type="text/css">
  .my-custom-scrollbar {
position: relative;
height: 380px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

/* Scrollbar styles */
::-webkit-scrollbar {
width: 0.3%;
height: 0.3%;
background-color: #F5F5F5;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
	border-radius: 0.1%;
}
</style>