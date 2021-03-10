<div class="zui-wrapper">
	<div class="zui-scroller">
		@php 
			$tblcol_class = count($month_list) >= 5 ? 'col-width-px' : 'col-width-percent';
		@endphp
		<table class="zui-table table-bordered print-kpi-manual">
			<thead>
			<tr>
				<th class="zui-sticky-col" id="timeliness-th" style="font-size: 8pt;">Timeliness of Report Submission <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></th>
				@foreach($kpi_timeliness as $i => $row)
				<th style="font-size: 8pt; text-transform: capitalize;" id="n{{$i}}">
					@forelse($row['timeliness_det'] as $det)
					<div style="display: block;">{{ $det->evaluation_period }}: {{ $det->due_date }} <span class="label label-{{ $det->status === 'late' ? 'danger' : 'primary'}}" style="font-size: 7pt;">{{ $det->status }}</span></div>
					@empty
					--
					@endforelse
				</th>
				@endforeach
			</tr>
			<tr>
				<th class="zui-sticky-col">Key Performance Indicator (KPI)</th>
				@foreach($month_list as $row)
				<th class="{{ $tblcol_class }}">
					{{ $row['month'] }}
				</th>
				@endforeach
			</tr>
			</thead>
			<tbody>
				@forelse($quantitative_kpi_result as $n => $kpi)
				<tr>
					<td class="zui-sticky-col" style="font-weight: bold;">{{ $n + 1 }}. {{ $kpi['kpi_description'] }}</td>
					@foreach($kpi['kpi_result_per_month'] as $row)
					<td>{!! $row['total'] != null ? $row['total'] : '&nbsp;' !!}</td>
					@endforeach
				</tr>
				@foreach($kpi['metrics'] as $metric)
				{{-- <tr>
				<td class="zui-sticky-col" style="padding-left: 50px;">
				<i class="fa fa-angle-double-right"></i> <b>{{ $metric['metric_description'] }}</b>
				</td>
				@foreach($metric['metrics_per_month'] as $result)
				<td style="text-align: center;"><b>{{ $result['total'] }}</b></td>
				@endforeach
				</tr> --}}
				@foreach($metric['data_inputs'] as $input)
				<tr>
					<td class="zui-sticky-col" style="padding-left: 50px;">
					<i class="fa fa-angle-double-right"></i> Data Input: <b>{{ $input['data_input'] }}</b>
					</td>
					@foreach($input['result_per_month'] as $result)
					<td style="text-align: center;"><b>{{$result['total']}}</b></td>
					@endforeach
				</tr>
				@endforeach
				@endforeach
				@empty
				<tr>
					<td>No Records Found.</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	var h = document.getElementById('n0').offsetHeight;
	var tdh = h + 'px';
	document.getElementById('timeliness-th').style.height = tdh;
</script>