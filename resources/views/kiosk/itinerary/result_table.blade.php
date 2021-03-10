			@if(session("message"))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<h4 class="alert-heading">Request sent to Managers!</h4>
						<p class="mb-0">Please see below details of your itinerary slip.</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			@endif
			
				@if($itr->workflow_state == 'For Approval')
				<div class="row justify-content-center" style="margin-top: -20px;">
					<div id="wait_gif">
				    	<img src="{{ asset('storage/wait.gif') }}"  width="200" height="150"/>
					</div>
				</div>
				@elseif ($itr->workflow_state == 'Approved')
				<div class="row justify-content-center" style="margin-top: -20px;">
					<div id="approve_gif">
				    	<img src="{{ asset('storage/approve.gif') }}"  width="200" height="150"/>
					</div>
				</div>
				@elseif ($itr->workflow_state == 'Cancelled')
				<div class="row justify-content-center" style="margin-top: -20px;">
					<div id="cancel_gif">
				    	<img src="{{ asset('storage/disapproved.gif') }}"  width="200" height="150"/>
					</div>
				</div>
				@endif

			<div class="row justify-content-center">
				<div class="col-8">
					@php 
						if ($itr->workflow_state == 'For Approval') {
							$status_color = 'warning';
						}elseif ($itr->workflow_state == 'Approved') {
							$status_color = 'success';
						}else{
							$status_color = 'danger';
						}
					@endphp
					<h3 class="text-center m-3">
						<span class="badge badge-{{$status_color}}">{{ $itr->workflow_state }}</span>
					</h3>
					<dl class="row">
						<dt class="col-md-3">Transaction Date:</dt>
						<dd class="col-md-3">{{ $itr->transaction_date }}</dd>
						<dt class="col-md-3">Itinerary No:</dt>
						<dd class="col-md-3">{{ $itr->name }}</dd>
					</dl>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-sm table-bordered text-center">
						<col style="width: 3%;">
						<col style="width: 19%;">
						<col style="width: 19%;">
						<col style="width: 10%;">
						<col style="width: 8%;">
						<col style="width: 22%;">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Location</th>
								<th scope="col">Project</th>
								<th scope="col">Itinerary Date</th>
								<th scope="col">Time</th>
								<th scope="col">Purpose</th>
							</tr>
						</thead>
						<tbody>
							@foreach($itr_chld as $row)
							<tr>
								<td>{{ $row->idx }}</td>
								<td>{{ $row->itinerary_location }}</td>
								<td>{{ $row->project }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->time }}</td>
								<td>{{ $row->purpose }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<ul class="list-inline">
						<li class="list-inline-item">Companion(s): </li>
						@forelse($itr_companion as $row)
						<li class="list-inline-item">{{ $row->employee_name }}</li>
						@empty
						<li class="list-inline-item">No companion(s)</li>
						@endforelse
					</ul>
				</div>
			</div>
		</div>