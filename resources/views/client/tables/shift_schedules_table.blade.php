<table class="table shift-schedules-table">
   <thead>
      <tr>
         <th>Date</th>
         <th>Time In</th>
         <th>Time Out</th>
         <th>Branch</th>
         <th>Department</th>
         <th>Remarks</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($shift_schedule as $shift)
      <tr>
         <td style="width: 10%; text-align: center;">{{ $shift->sched_date }}</td>
         <td style="width: 12%; text-align: center;">{{ $shift->time_in }}</td>
         <td style="width: 14%; text-align: center;">{{ $shift->time_out }}</td>
         <td style="width: 15%; text-align: center;">{{ $shift->branch_name }}</td>
         <td style="width: 15%; text-align: center;">{{ $shift->department }}</td>
         <td style="width: 24%; text-align: center;">{{ $shift->remarks }}</td>
         <td style="width: 10%; text-align: center;">
            <a href="#" data-id="{{ $shift->schedule_id }}" data-shift="{{ $shift->shift_id }}" data-branch="{{ $shift->branch_id }}" data-department="{{ $shift->department_id }}" data-schedule="{{ $shift->sched_date }}" data-remarks="{{ $shift->remarks }}" id="edit-shift-schedule-btn" class="hover-icon">
               <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60"></i>
            </a>
            <a href="#" data-id="{{ $shift->schedule_id }}" data-schedule="{{ $shift->sched_date }}" id="delete-shift-schedule-btn" class="hover-icon">
               <i class="fa fa-trash" style="font-size: 15pt; color: #C0392B"></i>
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
   <div id="shift-schedules-pagination">
      {{ $shift_schedule->links() }}
   </div>
</center>

<style type="text/css">
.shift-schedules-table thead th{
   text-align: center;
}
</style>