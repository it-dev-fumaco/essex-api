    <table class="table fixed_header">
   <thead>
      <tr>  
         <th style="text-align: center;">Date</th>
         <th style="text-align: center;">Time In</th>  
         <th style="text-align: center;">Time Out</th>   
         <th style="text-align: center;">Shift Schedule</th>  
         <th style="text-align: center;">Hrs Worked</th>  
         <th style="text-align: center;">Overtime</th>  
      </tr>
   </thead>
   <tbody>
      @forelse($data['biometric_logs'] as $row)
      <tr>
         <td style="text-align: center;">{{ $row['transaction_date'] }}</td>
         <td style="text-align: center;"><span style="float: left;">{{ $row['time_in'] }}</span>
            <span class="label label-{{ $row['status'] === 'late' ? 'danger' : 'primary'}}">{{ $row['status'] }}</span>
         </td>
         <td style="text-align: center;">{{ $row['time_out'] }}</td>
         <td style="text-align: center;">{{ $row['shift_schedule'] }}</td>
         <td style="text-align: center;">{{ $row['hrs_worked'] }}</td>
         <td style="text-align: center;">{{ $row['overtime'] }}</td>
      </tr>
      @empty
      <tr>
         <td>No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>


<div class="col-sm-8">
   <fieldset>
      <legend>Summary</legend>
      <div class="col-sm-7" style="padding: 8px 8px 8px 20px;">Duration: <span class="duration">
        <strong>{{ $data['summary']['date_from'] }} — {{ $data['summary']['date_to'] }}</strong></span></div>
      <div class="col-sm-5" style="padding: 8px 8px 8px 20px;">Overtime Hour(s): <span class="result">{{ $data['summary']['ot_hours'] }}</span></div>
      <div class="col-sm-7" style="padding: 8px 8px 8px 20px;">Total Working Day(s): <span class="result">{{ $data['summary']['working_days'] }}</span></div>
      <div class="col-sm-5" style="padding: 8px 8px 8px 20px;">Total Hour(s) worked: <span class="result">{{ $data['summary']['hrs_worked'] }}</span></div>
      <div class="col-sm-7" style="padding: 8px 8px 8px 20px;">Required Working Hour(s): <span class="result">{{ $data['summary']['reqHrs'] }}</span></div>
      <div class="col-sm-5" style="padding: 8px 8px 8px 20px;">Total Deduction(s): <span class="result">{{ $data['summary']['deductions'] }}</span> <strong>min(s)</strong></div>
      <div class="col-sm-7" style="padding: 8px 8px 8px 20px;">Total Late(s): <span class="result">{{ $data['summary']['total_lates'] }}</span> <strong>min(s)</strong></div>
   </fieldset>
</div>

<div class="col-sm-4" style="font-size: 10pt;">
   <fieldset>
      <legend>Attendance Policy</legend>
      @forelse($data['policy'] as $rule)
      <dd>{{ $rule->from_minute }}-{{ $rule->to_minute }} min(s) late = {{ $rule->deduction_in_mins }} min(s) deduction</dd>
      @empty
      <dd>No Records Found.</dd>
      @endforelse
   </fieldset>
</div>




<style type="text/css">
   .fixed_header{
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
}

.fixed_header tbody{
  display:block;
  width: 100%;
  overflow: auto;
  height: 300px;
}

.fixed_header thead tr {
   display: block;
}

.fixed_header th, .fixed_header td {
  width: 200px;
}

.duration {
   /*font-size: 12pt;*/
   vertical-align:middle;
   padding-left: 5px;
}

.result{
   vertical-align:middle;
   padding-left: 5px;
   }
</style>