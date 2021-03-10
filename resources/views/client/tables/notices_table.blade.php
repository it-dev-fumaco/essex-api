<table class="table notice-table">
   <thead>
      <tr>  
         <th>ID</th>
         <th>Type</th>
         <th>From - To</th>    
         <th>Reason</th>
         <th>Status</th> 
         <th>Actions</th> 
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($notice_slips as $notice_slip)
      <tr>
         <td style="width: 8%; text-align: center;">{{ $notice_slip->notice_id }}</td>
         <td style="width: 21%; text-align: center;">{{ $notice_slip->leave_type }}</td>
         <td style="width: 21%; text-align: center;">{{ $notice_slip->date_from }} -{{ $notice_slip->date_to }}</td>
         <td style="width: 25%;">{{ $notice_slip->reason }}</td>
         <td style="width: 15%; text-align: center;">
            @switch(strtolower($notice_slip->status))
               @case('approved') 
                  <span class="label label-primary status">APPROVED</span></h3>
                  @break
               @case('cancelled') 
                  <span class="label label-danger status">CANCELLED</span></h3>
                  @break
               @case('disapproved')
                  <span class="label label-danger status">DISAPPROVED</span></h3>
                  @break
               @case('deferred')
                  <span class="label label-danger status">DISAPPROVED</span></h3>
                  @break
               @default
                  <span class="label label-warning status">FOR APPROVAL</span></h3>
            @endswitch
         </td>
         <td style="width: 10%; text-align: center;">
            <a href="#" data-id="{{ $notice_slip->notice_id }}" id="editAbsent" class="hover-icon">
               <i class="fa fa-search" style="font-size: 18pt; color: #27AE60"></i>
            </a>
            @if(strtolower($notice_slip->status) == 'approved')
            <a href="#" data-id="{{ $notice_slip->notice_id }}" id="printAbsent" class="hover-icon">
               <i class="fa fa-print" style="font-size: 18pt; color: #85929E"></i>
            </a>
            @endif
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="6">No records found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
   <div id="notices_pagination">
      {{ $notice_slips->links() }}
   </div>
</center>

<style type="text/css">
.notice-table thead th{
   text-align: center;
}
</style>