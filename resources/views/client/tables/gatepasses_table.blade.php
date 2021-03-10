<table class="table gatepass-table">
   <thead>
      <tr>  
         <th>ID</th>   
         <th>Item</th>    
         <th>Purpose</th>
         <th>Returned On</th>
         <th>Item Type</th>
         <th>Status</th>
         <th>Actions</th> 
      </tr>
   </thead>
   <tbody>
      @forelse($gatepasses as $gatepass)
      <tr>
         <td style="width: 50px; text-align: center;">{{ $gatepass->gatepass_id }}</td>
         <td style="width: 50px;">{{ $gatepass->item_description }}</td>
         <td style="width: 50px;">{{ $gatepass->purpose }}</td>
         <td style="width: 50px; text-align: center;">{{ $gatepass->returned_on }}</td>
         <td style="width: 50px; text-align: center;">{{ $gatepass->item_type }}</td>
         <td style="width: 50px; text-align: center;">
            @switch(strtolower($gatepass->status))
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
                  <span class="label label-warning status">FOR APPROVAL</span>
            @endswitch
         </td>
         <td style="width: 50px; text-align: center;">
            <a href="#" data-id="{{ $gatepass->gatepass_id }}" id="editGatepass" class="hover-icon">
               <i class="fa fa-search" style="font-size: 18pt; color: #27AE60;"></i>
            </a>
            @if(strtolower($gatepass->status) == 'approved')
            <a href="#" data-id="{{ $gatepass->gatepass_id }}" id="printGatepass" class="hover-icon">
               <i class="fa fa-print" style="font-size: 18pt; color: #85929E"></i>
            </a>
            @endif
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="7">No records found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="gatepass_pagination">{{ $gatepasses->links() }}</div>
</center>

<style type="text/css">
.gatepass-table thead th{
   text-align: center;
}
</style>