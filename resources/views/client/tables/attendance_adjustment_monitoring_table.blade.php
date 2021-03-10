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
                        <td>{{ $row->employee_id }}</td>
                        <td>{{ $row->employee_name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->bio_date }}</td>
                        <td>{{ $row->timein != 0 ? $row->timein : '--' }}</td>
                        <td>{{ $row->timeout != 0 ? $row->timeout : '--' }}</td>
                        <td>
                          <a href="#" class="add-adjustment-btn" data-empid="{{ $row->employee_id }}" data-date="{{ $row->bio_date }}" data-empname="{{ $row->employee_name }}" data-transaction="{{ $row->timein == 0 ? 7 : 8 }}"><i class="fa fa-pencil"></i> Update</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>

               <center>
  <div id="for-adjustments-table-pagination">
    {{ $biometrics->links() }}
  </div>
</center>