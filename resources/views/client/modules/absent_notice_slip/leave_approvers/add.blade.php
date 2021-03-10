<!-- The Modal -->
<div class="modal fade" id="add-approver-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Approver</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form action="/client/leave_approver/create" method="POST">
               @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Department:</label>
                     @if(isset($departments))
                     <select class="form-control" name="department" required>
                        <option value="">Select Department</option>
                        @forelse($departments as $department)
                        <option value="{{ $department->department_id }}">{{ $department->department }}</option>
                        @empty
                        <option>No Department(s) Found.</option>
                        @endforelse
                     </select>
                     @endif
                  </div>
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