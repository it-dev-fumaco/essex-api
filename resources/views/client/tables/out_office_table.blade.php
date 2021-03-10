<table class="table">
   <thead>
      <tr>
         <th colspan="4">OUT OF OFFICE</th>
      </tr>
   </thead>
   <tbody>
   @forelse($absentToday as $absent_today)
      <tr>
         <td>{{ $absent_today['employee_name'] }}</td>
         <td>{{ $absent_today['leave_type'] }}</td>
         <td><i class="fa fa-calendar"></i> {{ $absent_today['date_from'] }} <i class="fa fa-long-arrow-right"></i> <i class="fa fa-calendar"></i> {{ $absent_today['date_to'] }}</td>
         <td><i class="icon-clock"></i> {{ $absent_today['time_from'] }} <i class="fa fa-long-arrow-right"></i> <i class="icon-clock"></i> {{ $absent_today['time_to'] }}</td>
      </tr>
   @empty
      <tr>
         <td>No records found.</td>
      </tr>
   @endforelse
   </tbody>
</table>