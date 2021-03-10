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
      @forelse($dates as $row)
      <tr class="@if( $row['stat'] == 'Unfiled Absence') ]
      colorbackground @endif">
        
         <td style="text-align: center;">{{ $row['range'] }}</td>
         <td style="text-align: center;">{{ $row['day'] }}</td>
         <td style="text-align: center;"><span class="label label-{{ $row['status'] === 'late' ? 'danger' : 'success'}}" style="font-size: 9pt;">{{ $row['timein'] }}</span></td>
         <td style="text-align: center;">{{$row['timeout'] }}</td>
         <td style="text-align: center;">{{ $row['hrs_worked'] }}</td>
         <td style="text-align: center;">{{ $row['ot'] }}</td>
         <td style="text-align: center;"><b>{{ $row['stat'] }}</b></td>

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
  <div id="attendancetablehr">
   {{ $dates->links() }}
  </div>
</center>