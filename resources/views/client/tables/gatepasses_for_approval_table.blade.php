<table class="table gatepass-for-approval-table">
   <thead>
      <tr>
         <th>ID</th>
         <th>Employee Name</th>
         <th>Item(s)</th>
         <th>Purpose</th>
         <th>Item Type</th>
         <th>Item Status</th>
         <th>Returned On</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($pending_gatepasses as $gatepass)
      <tr>
         <td style="width: 5%; text-align: center;">{{ $gatepass->gatepass_id }}</td>
         <td style="width: 17%; text-align: center;">{{ $gatepass->employee_name }}</td>
         <td style="width: 23%;">{{ $gatepass->item_description }}</td>
         <td style="width: 20%;">{{ $gatepass->purpose }}</td>
         <td style="width: 10%; text-align: center;">{{ $gatepass->item_type }}</td>
         <td style="width: 10%; text-align: center;">{{ $gatepass->item_status }}</td>
         <td style="width: 10%; text-align: center;">{{ $gatepass->returned_on }}</td>
         <td style="width: 5%; text-align: center;"><a href="#" id="actionGatepass" data-id="{{ $gatepass->gatepass_id }}"><i class="fa fa-search" style="font-size: 18pt; color: green;"></i></a></td>
      </tr>
      
      @empty
      <tr>
         <td colspan="8">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="pending_gatepass_pagination">
    {{ $pending_gatepasses->links() }}
  </div>
</center>

<style type="text/css">
.gatepass-for-approval-table thead th{
   text-align: center;
}
</style>