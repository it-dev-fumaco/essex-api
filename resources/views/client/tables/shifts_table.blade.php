<table class="table shift-table">
   <thead>
      <tr>
         <th>Schedule</th>
         <th>Time In</th>
         <th>Time Out</th>
         <th>Breaktime (hrs)</th>
         <th>Grace Periond (mins)</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($shifts as $shift)
      <tr>
         <td style="width: 15%; text-align: center;">{{ $shift->shift_schedule }}</td>
         <td style="width: 15%; text-align: center;">{{ $shift->time_in }}</td>
         <td style="width: 15%; text-align: center;">{{ $shift->time_out }}</td>
         <td style="width: 15%; text-align: center;">{{ $shift->breaktime_by_hour }}</td>
         <td style="width: 20%; text-align: center;">{{ $shift->grace_period_in_mins }}</td>
         <td style="width: 20%; text-align: center;">
            <a href="#" data-id="{{ $shift->shift_id }}" id="edit-shift-btn" class="hover-icon">
               <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i>
            </a>
            <a href="#" data-id="{{ $shift->shift_id }}" data-name="{{ $shift->shift_schedule }}" id="delete-shift-btn" class="hover-icon">
               <i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i>
            </a>
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="5">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
   <div id="shifts-pagination">
      {{ $shifts->links() }}
   </div>
</center>

<style type="text/css">
.shift-table thead th{
   text-align: center;
}
</style>