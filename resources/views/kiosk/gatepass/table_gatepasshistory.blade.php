<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-sm table-bordered" style="text-align: center;">
							<col style="width: 5%;">
							<col style="width: 20%;">
 							<col style="width: 20%;">
 							<col style="width: 20%;">
 							<col style="width: 15%;">
    						<thead>
   							<tr>
					        		<th scope="col">No.</th>
					        		<th scope="col">Item(s)</th>
					        		<th scope="col">Purpose</th>
						        	<th scope="col">Return On</th>
						        	<th scope="col">Item Type</th>
						        	<th scope="col">Status</th>
						        	<th scope="col">Approved By</th>
   							</tr>
    						</thead>
    						<tbody>
    							 @forelse($logs as $gatepass)
      						<tr>
						        	<td>{{ $gatepass->gatepass_id }}</td>
						        	<td>{{ $gatepass->item_description }}</td>
						        	<td>{{ $gatepass->purpose }}</td>
						        	<td>{{ $gatepass->returned_on }}</td>
						        	<td>{{ $gatepass->item_type }}</td>
						        	<td>
                        @switch(strtolower($gatepass->status))
            @case('approved') 
            <span class="badge badge-primary">APPROVED</span>
            @break
            @case('cancelled') 
            <span class="badge badge-danger">CANCELLED</span>
            @break
            @case('disapproved')
            <span class="badge badge-danger">DISAPPROVED</span>
            @break
            @case('deferred')
            <span class="badge badge-danger">DEFERRED</span>
            @break
            @default
            <span class="badge badge-warning">FOR APPROVAL</span>
          @endswitch
          </td>
						        	<td>{{ $gatepass->approved_by }}</td>
      						</tr>
      						@empty
      						<tr>
      						   <td colspan="7">No records found.</td>
      						</tr>
      						@endforelse
      						
      					</tbody>
      				</table>
      				{{-- <div class="col-md-12">
  						<div id="gatepass_pagination">
   							{{ $logs->links('vendor.pagination.custom') }}
  						</div>
					</div>
 --}}
</div>
<style type="text/css">
  .my-custom-scrollbar {
position: relative;
height: 380px;
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
</style>


<style type="text/css">
.colorbackground{
  background-color: #ec7063;
}
</style>