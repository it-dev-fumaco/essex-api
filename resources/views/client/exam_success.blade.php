@extends('client.app')
@section('content')
	<div class="col-md-12" style="margin:auto; height: 23em">
		<h3 class="h3" style="text-align: center">Thank you! Your examination has been successfully submitted!</h3>
		<table class="table">
			<tr>
				<td style="text-align: right">Examination:</td><td>{{$examinee->exam_title}}</td>
				<td style="text-align: right">Examination Date:</td><td>{{date('F, l d, Y',strtotime($examinee->date_taken))}}</td>
			</tr>
			<tr>
				<td style="text-align: right">Examinee:</td><td>{{$examinee->employee_name}}</td>
				<td style="text-align: right">Start Time:</td><td>{{date('h:i:s A',strtotime($examinee->start_time))}}</td>
			</tr>
			<tr>
				<td style="text-align: right">Time Spent:</td><td>{{$time_spent}}</td>
				<td style="text-align: right">End Time</td><td>{{date('h:i:s A',strtotime($examinee->end_time))}}</td>
			</tr>
		</table>
		<a href="/home" class="btn btn-success" style="margin: auto">Go to Homepage</a>
	</div>
@endsection