<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-sm table-bordered" style="text-align: center;">
							<col style="width: 5%;">
 							<col style="width: 40%;">
 							<col style="width: 40%;">
 							<col style="width: 15%;">
    						<thead>
   							<tr>	
					        		<th scope="col">No.</th>
					        
						        	<th scope="col">Item(s)</th>
						        	<th scope="col">Purpose</th>
						        	<th scope="col">Returned On</th>
						        	<th scope="col">Returnable</th>
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
      						</tr>
      						@empty
						    <tr>
						       <td colspan="6">No record(s) found.</td>
						    </tr>
						    @endforelse
      						
      					</tbody>
      				</table>
      				{{-- <div class="col-md-12">
  						<div id="unreturned_pagination">
   							{{ $logs->links('vendor.pagination.custom') }}
  						</div>
					</div> --}}

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