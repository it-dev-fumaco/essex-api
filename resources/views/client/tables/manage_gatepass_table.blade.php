<table class="table manage-gatepass-table">
   <thead>
      <tr>
         <th>Employee Name</th>
         <th>Item(s)</th>
         <th>Purpose</th>
         <th>Returned On</th>
         <th>Item Type</th>
         <th>Status</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      @forelse($filteredGatepass as $gatepass)
      <tr>
         <td style="width: 18%; text-align: center;">{{ $gatepass->employee_name }}</td>
         <td style="width: 20%;">{{ $gatepass->item_description }}</td>
         <td style="width: 20%;">{{ $gatepass->purpose }}</td>
         <td style="width: 12%; text-align: center;">{{ $gatepass->returned_on }}</td>
         <td style="width: 10%; text-align: center;">{{ $gatepass->item_type }}</td>
         <td style="width: 10%; text-align: center;">
            @switch(strtolower($gatepass->status))
               @case('approved') 
                  <span class="label label-primary status">Approved</span></h3>
                  @break
               @case('cancelled') 
                  <span class="label label-danger status">Cancelled</span></h3>
                  @break
               @case('disapproved')
                  <span class="label label-danger status">Disapproved</span></h3>
                  @break
               @case('deferred')
                  <span class="label label-danger status">Deferred</span></h3>
                  @break
               @default
                  <span class="label label-warning status">For Approval</span></h3>
            @endswitch
         </td>
         <td style="width: 10%; text-align: center;">
            <a href="#" data-id="{{ $gatepass->gatepass_id }}" id="view-gatepass" class="hover-icon">
               <i class="fa fa-search" style="font-size: 18pt; color: #27AE60;"></i>
            </a>
         @if(strtolower($gatepass->status) == 'approved')
            <a href="#" data-id="{{ $gatepass->gatepass_id }}" id="printGatepass" class="hover-icon">
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
  <div id="manage_gatepass_pagination">
    {{ $filteredGatepass->links() }}
  </div>
</center>

<style type="text/css">
.manage-gatepass-table thead th{
   text-align: center;
}
</style>