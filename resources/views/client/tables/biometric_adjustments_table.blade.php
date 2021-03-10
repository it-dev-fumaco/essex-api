<table class="table biometric-adjustments-table">
   <thead>
      <tr>
         <th>Employee</th>
         <th>Transaction</th>
         <th>Date</th>
         <th>Time</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($adjustments as $adjustment)
      <tr>
         <td style="width: 25%; text-align: center;">{{ $adjustment->employee_name }}</td>
         <td style="width: 21%; text-align: center;">{{ $adjustment->trans_type == 7 ? 'TIME IN' : 'TIME OUT' }}</td>
         <td style="width: 22%; text-align: center;">{{ $adjustment->bio_date }}</td>
         <td style="width: 22%; text-align: center;">{{ $adjustment->bio_time }}</td>
         <td style="width: 10%; text-align: center;">
            <a href="#" data-id="{{ $adjustment->biometric_id }}" id="delete-biometric-adjustment-btn" class="hover-icon">
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
   <div id="biometric-adjustments-pagination">
      {{ $adjustments->links() }}
   </div>
</center>

<style type="text/css">
.biometric-adjustments-table thead th{
   text-align: center;
}
</style>