<div class="col-md-12">
	<h2 class="title-2" style="text-align: center; background-color: #E5E7E9">Employee Inputs Generated from ERP</h2>
</div>
<div class="col-md-12">
   <h2 class="title-2" style="border: none;">KPI: 100% Drawing Timeliness</h2>
   <table class="table table-bordered result-table" border="1">
		<tr>
			<td rowspan="2" style="width: 200px !important;"><b>Employee Name</b></td>
			<td><b>Total No of Drawings Issued</b></td>
			<td><b>Total No of drawing delayed</b></td>
			<td rowspan="2"><b>Result</b></td>
		</tr>
		<tr>
			<td style="font-size: 10pt;">No of Issued Drawings</td>
			<td style="font-size: 10pt;">No of Drawings Delayed</td>
		</tr>
		@foreach($result['timeliness_result'] as $row)
		<tr>
			<td>{{ $row['employee_name'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['accomplished_dwgs'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['delayed_dwgs'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['result'] }}%</td>
		</tr>
		@endforeach
		@php
			$total_accomplished = collect($result['timeliness_result'])->sum('accomplished_dwgs');
			$total_delayed = collect($result['timeliness_result'])->sum('delayed_dwgs');
		@endphp
		<tr>
			<td style="font-size: 12pt; font-weight: bold;">TOTAL</td>	
			<td style="font-size: 13pt; font-weight: bold;">{{ $total_accomplished }}</td>
			<td style="font-size: 13pt; font-weight: bold;">{{ $total_delayed }}</td>
			<td></td>
		</tr>
	</table>
</div>
<div class="col-md-12">
   <h2 class="title-2" style="border: none;">KPI: 95% Drawing Completion</h2>
	<table class="table table-bordered result-table" border="1">
		<tr>
			<td rowspan="2" style="width: 200px !important;"><b>Employee Name</b></td>
			<td colspan="4"><b>Total No of Drawings Issued</b></td>
			<td><b>Total No of Drawings Cancelled</b></td>
			<td rowspan="2"><b>Result</b></td>
		</tr>
		<tr>
			<td style="font-size: 10pt;">No of Drawings Issued for Lamp post</td>
			<td style="font-size: 10pt;">No of Drawings Issued for Luminaire</td>
			<td style="font-size: 10pt;">No of Drawings Issued for Installation Guide</td>
			<td style="font-size: 10pt;">No of Drawings Issued for Others</td>
			<td style="font-size: 10pt;">No of Drawings Cancelled</td>
		</tr>
		@foreach($result['completion_result'] as $row)
		<tr>
			<td>{{ $row['employee_name'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['accomplished_lamp_post'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['accomplished_luminaire'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['accomplished_ins_guide'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['accomplished_others'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['cancelled_dwgs'] }}</td>
			<td style="font-size: 12pt; font-weight: bold;">{{ $row['result'] }}%</td>
		</tr>
		@endforeach
		@php
			$rfd_lamp_post = collect($result['completion_result'])->sum('accomplished_lamp_post');
			$rfd_luminaire = collect($result['completion_result'])->sum('accomplished_luminaire');
			$rfd_ins_guide = collect($result['completion_result'])->sum('accomplished_ins_guide');
			$rfd_others = collect($result['completion_result'])->sum('accomplished_others');
			$rfd_cancelled = collect($result['completion_result'])->sum('cancelled_dwgs');
			$total_dwgs = $rfd_lamp_post + $rfd_luminaire + $rfd_ins_guide + $rfd_others;
		@endphp
		<tr>
			<td style="font-size: 12pt; font-weight: bold;">TOTAL</td>
			<td style="font-size: 13pt; font-weight: bold;" colspan="4">{{ $total_dwgs }}</td>
			<td style="font-size: 13pt; font-weight: bold;">{{ $rfd_cancelled }}</td>
			<td></td>
		</tr>
	</table>
</div>
