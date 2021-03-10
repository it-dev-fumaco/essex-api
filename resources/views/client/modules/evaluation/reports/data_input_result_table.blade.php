<div class="col-md-12">
   <h2 class="title-2" style="text-align: center; background-color: #E5E7E9">Employee Data Inputs</h2>
</div>
{{-- PER EMPLOYEE --}}
@if($is_per_department == 0)
@forelse($kpi_result as $kpi)
<div class="col-md-12">
   <h2 class="title-2" style="border: none;">KPI: {{ $kpi['kpi_description'] }}</h2>
   <table class="table table-bordered result-table">
      <tbody>
         <tr> 
            <td rowspan="2" style="width: 200px !important;"><b>Employee Name</b></td>
            @foreach($kpi['kpi_metrics'] as $metric)
            <td colspan="{{ count($metric['data_inputs']) }}">
               <b>{{ $metric['metric_description'] }}</b>
            </td>
            @endforeach
            <td rowspan="2"><b>Date Submitted</b></td>
            <td rowspan="2"><b>Submitted By</b></td>
         </tr>
         <tr>
         @foreach($kpi['kpi_metrics'] as $metric)
            @foreach($metric['data_inputs'] as $input)
            <td style="font-size: 10pt;">{{ $input->data_input }}</td>
            @endforeach
            @endforeach
         </tr>
         @forelse($kpi['employee_result'] as $emp)
         <tr>
            <td>{{ $emp['employee_name'] }}</td>
            @foreach($emp['metric_result'] as $emp_metric)
               @foreach($emp_metric['data_input_result'] as $result)
               <td style="font-size: 12pt; font-weight: bold;">{{ $result['total'] }}</td>
               @endforeach
            @endforeach
            <td>
               <span class="label label-{{ $emp['status'] === 'late' ? 'danger' : 'primary'}}" style="font-size: 9pt;">{{ $emp['date_submitted'] }}</span>
            </td>
            <td>{{ ucwords($emp['submitted_by']) }}</td>
         </tr>
         @empty
         <tr>
            <td colspan="{{ count($kpi['kpi_metrics']) + 3 }}"><h2 class="title-2" style="border: none; text-align: center;">-- No Data Submitted. --</h2></td>
         </tr>
         @endforelse
         @if(count($kpi['employee_result']) > 0)
         <tr>
            <td style="font-size: 12pt; font-weight: bold;">TOTAL</td>
            @foreach($kpi['kpi_metrics'] as $metric)
            <td style="font-size: 13pt; font-weight: bold;" colspan="{{ count($metric['data_inputs'])}}">
               {{ $metric['metric_total'] }}
            </td>
            @endforeach
            <td></td>
            <td></td>
         </tr>
         @endif
      </tbody>
   </table>
</div>

{{-- <div class="col-md-2">
   <h2 class="title-2" style="border: none;">Summary</h2>
   <table class="table table-bordered" border="1" style="border-collapse: collapse;">

      @foreach($kpi['kpi_metrics'] as $metric)
      <tr>
         <td style="text-align: left;">{{ $metric['metric_description'] }}</td>
         <td style="text-align: center; font-size: 13pt; font-weight: bold;">{{ $metric['metric_total'] }}</td>
      </tr>
      @endforeach

</table>
</div> --}}

@empty
<h2 class="title-2" style="border: none; text-align: center;">-- No Record(s) Found. --</h2>
@endforelse  
@endif

{{-- DEPARTMENT --}}
@if($is_per_department == 1)
@forelse($kpi_result as $kpi)
<div class="col-md-12">
   <h2 class="title-2" style="border: none;">KPI: {{ $kpi['kpi_description'] }}</h2>
   <table class="table table-bordered result-table" border="1" style="border-collapse: collapse;">
      <tbody>
         <tr> 
            <td rowspan="2" style="width: 200px !important;"><b>Department</b></td>
            @foreach($kpi['kpi_metrics'] as $metric)
            <td colspan="{{ count($metric['data_inputs']) }}">
               <b>{{ $metric['metric_description'] }}</b>
            </td>
            @endforeach
            <td rowspan="2"><b>Date Submitted</b></td>
            <td rowspan="2"><b>Submitted By</b></td>
         </tr>
         <tr>
         @foreach($kpi['kpi_metrics'] as $metric)
            @foreach($metric['data_inputs'] as $input)
            <td style="font-size: 10pt;">{{ $input->data_input }}</td>
            @endforeach
         @endforeach
         </tr>
         <tr>
            <td style="font-size: 12pt; font-weight: bold;">{{ $department_name }}</td>
            @foreach($kpi['kpi_metrics'] as $metric)
               @foreach($metric['data_inputs'] as $input)
               <td style="font-size: 12pt; font-weight: bold;">{{ $input->total }}</td>
               @endforeach
            @endforeach
            <td>
               <span class="label label-{{ $kpi['status'] === 'late' ? 'danger' : 'primary'}}" style="font-size: 9pt;">{{ $kpi['date_submitted'] }}</span>
            </td>
            <td>{{ ucwords($kpi['submitted_by']) }}</td>
         </tr>
         <tr>
            <td style="font-size: 12pt; font-weight: bold;">TOTAL</td>
            @foreach($kpi['kpi_metrics'] as $metric)
            <td style="font-size: 13pt; font-weight: bold;" colspan="{{ count($metric['data_inputs'])}}">
               {{ $metric['metric_total'] }}
            </td>
            @endforeach
            <td></td>
            <td></td>
         </tr>
      </tbody>
   </table>
</div>

@empty
<h2 class="title-2" style="border: none; text-align: center;">-- No Record(s) Found. --</h2>
@endforelse  
@endif