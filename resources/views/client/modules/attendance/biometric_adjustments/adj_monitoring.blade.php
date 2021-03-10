<table class="table" id="for-adjustments-table">
   <thead>
      <tr>
         <th>No.</th>
         <th>Access ID</th>
         <th>Employee Name</th>
         <th>Designation</th>
         <th>Date</th>
         <th>Time In</th>
         <th>Time Out</th>
         <th>Actions</th>
      </tr>
      </thead>
                  <tbody class="table-body">
                     @foreach($biometrics as $index => $row)
                     <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->user_id }}</td>
                        <td>{{ $row->employee_name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->transaction_date }}</td>
                        <td>{{ $row->time_in != null ? $row->time_in : '--' }}</td>
                        <td>{{ $row->time_out != null ? $row->time_out : '--' }}</td>
                        <td>
                          <a href="#" class="add-adjustment-btn" data-rowid="{{ $row->id }}" data-empid="{{ $row->user_id }}" data-date="{{ $row->transaction_date }}" data-empname="{{ $row->employee_name }}" data-transaction="{{ $row->time_in == 0 ? 7 : 8 }}"><i class="fa fa-pencil icon-edit"></i> Update</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
<!-- SELECT * FROM `biometric_logs` WHERE `user_id`=2140 and `transaction_date`='2019-08-02' -->
               <center>
  <div id="for-adjustments-table-pagination">
    {{ $biometrics->links() }}
  </div>
</center>