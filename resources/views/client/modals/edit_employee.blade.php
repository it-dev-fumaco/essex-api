<div class="modal fade" id="edit-employee">
   <div class="modal-dialog modal-lg" style="width: 80%;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Employee</h4>
         </div>
         <div class="modal-body">
            <form action="/employee/update" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $employee_profile->id }}">
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>Access ID:</label>
                        <input type="text" class="form-control" name="user_id" value="{{ $employee_profile->user_id }}" placeholder="Enter Access ID" disabled>
                     </div>
                     <div class="form-group">
                        <label>Employee Name:</label>
                        <input type="text" class="form-control" name="employee_name" value="{{ $employee_profile->employee_name }}" placeholder="Enter Employee Name">
                     </div>
                     <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" class="form-control" name="nickname" value="{{ $employee_profile->nick_name }}" placeholder="Enter Nickname">
                     </div>
                     <div class="form-group">
                        <label>Birthdate:</label>
                        <input type="date" class="form-control" name="birthdate" value="{{ $employee_profile->birth_date }}" placeholder="Enter Birthdate">
                     </div>
                     <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" name="address" placeholder="Enter Address">{{ $employee_profile->address }}</textarea>
                     </div>
                     <div class="form-group">
                        <label>Contact No.:</label>
                        <input type="text" class="form-control" name="contact_no" value="{{ $employee_profile->contact_no }}" placeholder="Contact No.">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>Civil Status:</label>
                        <select class="form-control" name="civil_status">
                           <option value="" disabled>Select Civil Status</option>
                           <option value="Single" {{ $employee_profile->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                           <option value="Married" {{ $employee_profile->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                           <option value="Widowed" {{ $employee_profile->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>SSS No.:</label>
                        <input type="text" class="form-control" name="sss_no" value="{{ $employee_profile->sss_no }}" placeholder="Enter SSS No.">
                     </div>
                     <div class="form-group">
                        <label>TIN No.:</label>
                        <input type="text" class="form-control" name="tin_no" value="{{ $employee_profile->tin_no }}" placeholder="Enter TIN No.">
                     </div>
                     <div class="form-group">
                        <label>Department:</label>
                        @if(isset($departments))
                        <select class="form-control" name="department">
                           <option value="" disabled>Select Department</option>
                           @forelse($departments as $department)
                           <option value="{{ $department->department_id }}" {{ $employee_profile->department_id == $department->department_id ? 'selected' : '' }}>{{ $department->department }}</option>
                           @empty
                           <option>No Department(s) Found.</option>
                           @endforelse
                        </select>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Designation:</label>
                        @if(isset($designations))
                        <select class="form-control" name="designation">
                           <option value="" disabled>Select Designation</option>
                           @forelse($designations as $designation)
                           <option value="{{ $designation->des_id }}" {{ $employee_profile->designation_id == $designation->des_id ? 'selected' : '' }}>{{ $designation->designation }}</option>
                           @empty
                           <option>No Designation(s) Found.</option>
                           @endforelse
                        </select>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Shift:</label>
                        <select class="form-control" name="shift">
                           <option value="" disabled>Select Shift</option>
                           @forelse($shifts as $shift)
                           <option value="{{ $shift->shift_id }}" {{ $employee_profile->shift_id == $shift->shift_id ? 'selected' : '' }}>{{ $shift->shift_schedule }}</option>
                           @empty
                           <option>No Shift(s) Found.</option>
                           @endforelse
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>Branch:</label>
                        <select class="form-control" name="branch">
                           <option value="" disabled>Select Branch</option>
                              @forelse($branch as $loc)
                              <option value="{{ $loc->branch_id }}" {{ $employee_profile->branch == $loc->branch_id  }}>{{ $loc->branch_name }}</option>
                              @empty
                              <option>No Branch Found.</option>
                              @endforelse
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Employment Status:</label>
                        <select class="form-control" name="employment_status">
                           <option value="">Select Employment Status</option>
                           <option value="Regular" {{ $employee_profile->employment_status == 'Regular' ? 'selected' : '' }}>Regular</option>
                           <option value="Contractual" {{ $employee_profile->employment_status == 'Contractual' ? 'selected' : '' }}>Contractual</option>
                           <option value="Probationary" {{ $employee_profile->employment_status == 'Probationary' ? 'selected' : '' }}>Probationary</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Telephone (Local No.):</label>
                        <input type="text" class="form-control" value="{{ $employee_profile->telephone }}" name="telephone" placeholder="Enter Local No.">
                     </div>
                     <div class="form-group">
                        <label>User Group:</label>
                        <select class="form-control" name="user_group">
                           <option value="" disabled>Select User Group</option>
                           <option value="Employee" {{ $employee_profile->user_group == 'Employee' ? 'selected' : '' }}>Employee</option>
                           <option value="Manager" {{ $employee_profile->user_group == 'Manager' ? 'selected' : '' }}>Manager</option>
                           <option value="HR Personnel" {{ $employee_profile->user_group == 'HR Personnel' ? 'selected' : '' }}>HR Personnel</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Email:</label>
                        <input type="email" value="{{ $employee_profile->email }}" class="form-control" name="email" placeholder="Enter Email">
                     </div>
                     <div class="form-group">
                        <label>Status:</label>
                        <select class="form-control" name="status">
                           <option value="Active" {{ $employee_profile->status == 'Active' ? 'selected' : '' }}>Active</option>
                           <option value="Inactive" {{ $employee_profile->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
