

<table class="table notice-for-approval-table">
   <thead>
      <tr>
         <th>ID</th>
         <th>Employee Name</th>
         <th>Department</th>
         <th>Type</th>
         <th>From - To</th>
         <th>Reason</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($pending_notices as $notice_slip)
      <tr>
         <td style="width: 5%; text-align: center;">{{ $notice_slip->notice_id }}</td>
         <td style="width: 17%; text-align: center;">{{ $notice_slip->employee_name }}</td>
         <td style="width: 20%; text-align: center;">{{ $notice_slip->department }}</td>
         <td style="width: 16%; text-align: center;">{{ $notice_slip->leave_type }}</td>
         <td style="width: 17%; text-align: center;">{{ $notice_slip->date_from }} - {{ $notice_slip->date_to }}</td>
         <td style="width: 20%;">{{ $notice_slip->reason }}</td>
         <td style="width: 5%; text-align: center;"><a href="#" id="actionNotice" data-id="{{ $notice_slip->notice_id }}"><i class="fa fa-search" style="font-size: 18pt; color: green;"></i></a></td>
      </tr>
      @empty
      <tr>
         <td colspan="7">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="pending_notices_pagination">
    {{ $pending_notices->links() }}
  </div>
</center>

<style type="text/css">
.notice-for-approval-table thead th{
   text-align: center;
}
</style>