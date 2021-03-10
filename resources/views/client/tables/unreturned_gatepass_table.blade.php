<table class="table unreturned-gatepass-table">
   <thead>
      <tr>
         <th>Employee Name</th>
         <th>Item(s)</th>
         <th>Purpose</th>
         <th>Returned On</th>
         <th>Item Type</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      @forelse($unreturned_gatepass as $gatepass)
      <tr>
         <td style="width: 18%; text-align: center;">{{ $gatepass->employee_name }}</td>
         <td style="width: 25%;">{{ $gatepass->item_description }}</td>
         <td style="width: 25%;">{{ $gatepass->purpose }}</td>
         <td style="width: 12%; text-align: center;">{{ $gatepass->returned_on }}</td>
         <td style="width: 10%; text-align: center;">{{ $gatepass->item_type }}</td>
         <td style="width: 10%; text-align: center;">
            <a href="#" data-id="{{ $gatepass->gatepass_id }}" id="edit-unreturned-gatepass" class="hover-icon">
               <i class="fa fa-search" style="font-size: 18pt; color: #27AE60;"></i>
            </a></td>
      </tr>
      @empty
      <tr>
         <td colspan="6">No record(s) found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="unreturned_gatepass_pagination">
    {{ $unreturned_gatepass->links() }}
  </div>
</center>

<style type="text/css">
.unreturned-gatepass-table thead th{
   text-align: center;
}
</style>