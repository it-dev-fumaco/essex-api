<!-- The Modal -->
<div class="modal fade" id="edit-deptheadlist-{{ $row->id }}">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Department Head</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
           <div class="row" style="margin-top: -30px; margin-bottom: -30px;">
               <form action="/client/modules/human_resource/department_head/update/{{ $row->id }}" method="POST">
               @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Department:</label>
                     <select name="department" id="department" required>
                        <option value="">Select Department</option>
                        @forelse($departments as $department)
                        <option value="{{ $department->department_id }}" {{ $department->department_id === $row->department_id ? "selected" : "" }}>{{ $department->department }}</option>
                        @empty
                        <option>No Departments Found.</option>
                        @endforelse
                     </select>
                  </div>
                   <div class="form-group">
                     <label>Employee:</label>
                     @if(isset($employees))
                     <select name="employee" id="employee" required>
                        <option value="">Select Employee</option>
                        @forelse($employees as $employee)
                        <option value="{{ $employee->user_id }}" {{ $employee->user_id === $row->employee_id ? "selected" : "" }}>{{ $employee->employee_name }}</option>
                        @empty
                        <option>No Employees Found</option>
                        @endforelse
                     </select>
                     @endif
                  </div>
                  <div style="font-size: 8pt; padding-right: 3%;float: right;">
                     <i>Last modified: <b>{{ $row->updated_at }} </b> -{{ $row->last_modified_by }} </i>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>