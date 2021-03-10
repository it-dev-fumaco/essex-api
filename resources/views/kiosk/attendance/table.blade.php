<table class="table table-sm table-bordered text-center">
  <col style="width: 15%;">
  <col style="width: 15%;">
  <col style="width: 13%;">
  <col style="width: 13%;">
  <col style="width: 12%;">
  <col style="width: 12%;">
  <col style="width: 18%;">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">DoW</th>
      <th scope="col">Time In</th>
      <th scope="col">Time Out</th>
      <th scope="col">Hrs Worked</th>
      <th scope="col">Overtime</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
</table>
<div class="table-wrapper-scroll-y my-custom-scrollbar mb-3">
<table class="table table-sm table-bordered text-center">
  <col style="width: 15%;">
  <col style="width: 15%;">
  <col style="width: 13%;">
  <col style="width: 13%;">
  <col style="width: 12%;">
  <col style="width: 12%;">
  <col style="width: 18%;">
<tbody>
	@forelse($logs as $row)
      <tr class="{{ $row['attendance_status'] == 'Unfiled Absence' ? 'colorbackground' : '' }}">
         <td>{{ date('d-M-Y', strtotime($row['transaction_date'])) }}</td>
         <td>{{ $row['day_of_week'] }}</td>
         <td>
            @if($row['time_in'])
          <span class="badge badge-{{ $row['time_in_status'] === 'late' ? 'danger' : 'success'}}" style="font-size: 9pt;">
            {{ $row['time_in'] }}
          </span>
          @endif
          </td>
         <td>{{ $row['time_out'] }}</td>
         <td>{{ $row['hrs_worked'] }}</td>
         <td>{{ $row['overtime'] }}</td>
         <td><b>{{ $row['attendance_status'] }}</b></td>
      </tr>
      @empty
      <tr>
         <td colspan="8">No Records Found.</td>
      </tr>
      @endforelse

</tbody>
</table>
</div>
<style type="text/css">
  .my-custom-scrollbar {
position: relative;
height: 365px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

/* Scrollbar styles */
::-webkit-scrollbar {
width: 0.3%;
height: 0.3%;
background-color: #F5F5F5;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
   background-color: #555;
   border-radius: 0.1%;
}

.colorbackground{
  background-color: #ec7063;
}
</style>