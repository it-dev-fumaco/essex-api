<!-- The Modal -->
<div class="modal fade" id="add-employee-leave-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Employee Leave</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form action="/client/leave_balance/create" method="POST">
               @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Employee:</label>
                     @if(isset($employees))
                     <select class="form-control" name="employee" required>
                        <option value="">Select Employee</option>
                        @forelse($employees as $employee)
                        <option value="{{ $employee->user_id }}">{{ $employee->employee_name }}</option>
                        @empty
                        <option>No Employee(s) Found.</option>
                        @endforelse
                     </select>
                     @endif
                  </div>
                  <div class="form-group">
                     <label>Leave Type:</label>
                     @if(isset($leave_types))
                     <select class="form-control" name="leave_type" required>
                        <option value="">Select Leave Type</option>
                        @forelse($leave_types as $leave_type)
                        <option value="{{ $leave_type->leave_type_id }}">{{ $leave_type->leave_type }}</option>
                        @empty
                        <option>No Leave Type(s) Found.</option>
                        @endforelse
                     </select>
                     @endif
                  </div>
                  <div class="form-group">
                     <label>Total no. of Leave(s):</label>
                     <input type="number" class="form-control" name="total" placeholder="Enter Total no. of Leave(s)" required>
                  </div>
                  <div class="form-group">
                     <label>Year:</label>
                     <input type="text" class="form-control" name="year" id="year" value="{{ date('Y') }}" placeholder="Enter Year" required>
                  </div>
               </div>
               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div></form>
      </div>
   </div>
</div>