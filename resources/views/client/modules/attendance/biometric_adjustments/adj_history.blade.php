<table class="table biometric-adjustments-table">
   <thead>
      <tr>
         <th>Employee</th>
         <th>Transaction</th>
         <th>Date</th>
         <th>Time</th>
         <th>Adjusted by</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($adjustments as $adjustment)
      <tr>
         <td style="width: 15%; text-align: center;">{{ $adjustment->employee_name }}</td>
         <td style="width: 15%; text-align: center;">{{ $adjustment->adj_type == 7 ? 'TIME IN' : 'TIME OUT' }}</td>
         <td style="width: 15%; text-align: center;">{{ $adjustment->transaction_date }}</td>
        
         @if($adjustment->adj_type == 7)
         <td style="width: 15%; text-align: center;">{{ $adjustment->time_in }}</td>
         @else
         <td style="width: 15%; text-align: center;">{{ $adjustment->time_out }}</td>
         @endif
          <td style="width: 15%; text-align: center;">{{ $adjustment->last_modified_by }}</td>
         <td style="width: 10%">
             <a href="#" class="add-adjustment-btn" data-rowid="{{ $adjustment->id }}" data-empid="{{ $adjustment->user_id }}" data-date="{{ $adjustment->transaction_date }}" data-empname="{{ $adjustment->employee_name }}" data-transaction="{{ $adjustment->adj_type == 7 ? 7 : 8 }}" data-adjdata="{{ $adjustment->adj_type == 7 ? $adjustment->time_in : $adjustment->time_out }}"><i class="fa fa-pencil icon-edit"></i> Update</a>
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