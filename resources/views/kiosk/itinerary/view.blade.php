@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 97%;">
		<div class="card-header h3 text-center">
			<span class="align-middle">Itinerary Details</span>
			<div class="pull-left">
				<a href="/kiosk/itinerary/history">
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
			@if(session("message"))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<h4 class="alert-heading">Cancelled Itinerary!</h4>
						<p class="mb-0">{!! session('message') !!}</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
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
				@if($itr->workflow_state == 'For Approval')
				<div class="col-md-12 text-center">
					<form method="post" action="/kiosk/itinerary/cancel/{{ $itr->name }}">
						@csrf
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmCancellation">
							<i class="fa fa-ban mr-1" aria-hidden="true"></i>Cancel Itinerary
						</button>
						@include('kiosk.itinerary.modals.confirm_cancellation')
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection