<table class="table">
   <thead>
      <tr>  
         <th style="text-align: center;">Date</th>  
         <th style="text-align: center;">DOW</th>    
         <th style="text-align: center;">Time In</th>  
         <th style="text-align: center;">Time Out</th>   
         <th style="text-align: center;">Hrs Worked</th>  
         <th style="text-align: center;">Overtime</th>  
         <th style="text-align: center;">Status</th> 
      </tr>
   </thead>
   <tbody>
      @forelse($logs as $row)
      <tr class="{{ $row['attendance_status'] == 'Unfiled Absence' ? 'colorbackground' : '' }}">
         <td style="text-align: center;">{{ $row['transaction_date'] }}</td>
         <td style="text-align: center;">{{ $row['day_of_week'] }}</td>
         <td style="text-align: center;">
            @if($row['time_in'])
          <span class="label label-{{ $row['time_in_status'] === 'late' ? 'danger' : 'success'}}" style="font-size: 9pt;">
            {{ $row['time_in'] }}
          </span>
          @endif
          </td>
         <td style="text-align: center;">{{ $row['time_out'] }}</td>
         <td style="text-align: center;">{{ $row['hrs_worked'] }}</td>
         <td style="text-align: center;">{{ $row['overtime'] }}</td>
         <td style="text-align: center;"><b>{{ $row['attendance_status'] }}</b></td>
      </tr>
      @empty
      <tr>
         <td colspan="8">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<style type="text/css">
.colorbackground{
  background-color: #ec7063;
}
</style>

<center>
  <div id="attendance_pagination">
   {{ $logs->links() }}
  </div>
</center>