<div class="zui-wrapper">
	<div class="zui-scroller">
		@php
			$tblcol_class = count($month_list) >= 5 ? 'col-width-px' : 'col-width-percent';
		@endphp
		<table class="zui-table table-bordered print-kpi-erp">
			<thead>
				<tr>
					<th class="zui-sticky-col">Key Performance Indicator (KPI)</th>
					@foreach($month_list as $month)
					<th class="{{ $tblcol_class }}">{{$month['month']}}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="zui-sticky-col">
						<b>1. 100% Drawing Timeliness</b>
						<div class="pull-right" style="width: 100px;">Target: <b>100%</b></div>
					</td>
					@foreach($result['kpi_timeliness_result'] as $row)
					<td style="text-align: center; font-weight: bolder;">
						@php
							$arrow_class = $row >= 100 ? 'fa-caret-up ar-success' : 'fa-caret-down ar-danger';
						@endphp
						<i class="fa {{ $arrow_class }}"></i> {{$row}}%</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Issued Drawings</b>
					</td>
					@foreach($result['accomplished_dwgs'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Delayed</b>
					</td>
					@foreach($result['delayed_dwgs'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col">
						<b>2. 95% Drawing Completion</b>
						<div class="pull-right" style="width: 100px;">Target: <b>95%</b></div>
					</td>
					@foreach($result['kpi_completion_result'] as $row)
					<td style="text-align: center; font-weight: bolder;">
						@php
							$arrow_class = $row >= 95 ? 'fa-caret-up ar-success' : 'fa-caret-down ar-danger';
						@endphp
						<i class="fa {{ $arrow_class }}"></i> {{$row}}%</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Issued for Lamp post</b>
					</td>
					@foreach($result['accomplished_lamp_post'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Issued for Luminaire</b>
					</td>
					@foreach($result['accomplished_luminaire'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Issued for Installation Guide</b>
					</td>
					@foreach($result['accomplished_ins_guide'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Issued for Others</b>
					</td>
					@foreach($result['accomplished_others'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
						<i class="fa fa-angle-double-right"></i> Data Input: <b>No of Drawings Cancelled</b>
					</td>
					@foreach($result['cancelled_dwgs'] as $row)
					<td style="text-align: center;">{{$row}}</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>