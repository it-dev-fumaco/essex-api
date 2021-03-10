<table class="table manage-notice-table">
   <thead>
      <tr>
         <th>Employee Name</th>
         <th>Type</th>
         <th>From - To</th>
         <th>Reason</th>
         <th>Status</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      @forelse($filteredNotices as $notice)
      <tr>
         <td style="width: 20%;">{{ $notice->employee_name }}</td>
         <td style="width: 15%; text-align: center;">{{ $notice->leave_type }}</td>
         <td style="width: 20%; text-align: center;">{{ $notice->date_from }} - {{ $notice->date_to }}</td>
         <td style="width: 20%;">{{ $notice->reason }}</td>
         <td style="width: 10%; text-align: center;">
            @switch($notice->status)
               @case('APPROVED') 
                  <span class="label label-primary status">Approved</span></h3>
                  @break
               @case('CANCELLED') 
                  <span class="label label-danger status">Cancelled</span></h3>
                  @break
               @case('DISAPPROVED')
                  <span class="label label-danger status">Disapproved</span></h3>
                  @break
               @default
                  <span class="label label-warning status">For Approval</span></h3>
            @endswitch
         </td>
         <td style="width: 20%; text-align: center;"><a href="#" data-id="{{ $notice->notice_id }}" id="view-notice" class="hover-icon">
               <i class="fa fa-search" style="font-size: 18pt; color: #27AE60;"></i>
            </a>
         @if(strtolower($notice->status) == 'approved')
            <a href="#" data-id="{{ $notice->notice_id }}" id="printAbsent" class="hover-icon">
               <i class="fa fa-print" style="font-size: 18pt; color: #85929E"></i>
            </a>
            @endif</td>
      </tr>
      @empty
      <tr>
         <td colspan="6">No record(s) found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="manage_notices_pagination">
    {{ $filteredNotices->links() }}
  </div>
</center>

<style type="text/css">
.manage-notice-table thead th{
   text-align: center;
}
</style>