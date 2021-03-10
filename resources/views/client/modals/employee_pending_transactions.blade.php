<div class="modal fade" id="pending-notice-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Pending Absent Notice Slip(s)</h4>
			</div>
			<div class="modal-body">
				<div style="margin-top: -40px;">
					@include('client.tables.employee_pending_notices_table')
				</div>
			</div>
         	<div class="modal-footer">
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         	</div>
      	</div>
   	</div>
</div>

<div class="modal fade" id="pending-gatepass-modal">
   <div class="modal-dialog modal-lg">
      	<div class="modal-content">
      		<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal">&times;</button>
      			<h4 class="modal-title">Pending Gatepass Request(s)</h4>
      		</div>
      		<div class="modal-body">
      			<div style="margin-top: -40px;">
      				@include('client.tables.employee_pending_gatepasses_table')
      			</div>
      		</div>
         	<div class="modal-footer">
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         	</div>
      	</div>
   	</div>
</div>

<div class="modal fade" id="unreturned-items-modal">
   	<div class="modal-dialog modal-lg">
      	<div class="modal-content">
      		<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal">&times;</button>
      			<h4 class="modal-title">Gatepass - Unreturned Item(s)</h4>
      		</div>
      		<div class="modal-body">
         		<div style="margin-top: -40px;">
         			@include('client.tables.employee_unreturned_items_table')
         		</div>
         	</div>
         	<div class="modal-footer">
            	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         	</div>
      	</div>
   	</div>
</div>



<!-- The Modal -->
<div class="modal fade" id="editEmployeeDetailsModal{{$employee_profile->user_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Employee Details</h4>
         </div>
         	
         
         <!-- Modal body -->
         <div class="modal-body">
         	<div class="row" style="margin: 5px;">
	         	<form autocomplete="off" id="editEmployeeDetailsForm{{$employee_profile->user_id}}" method="post" action="{{route('client.update_profile')}}">
	         	@csrf
		         	<div class="form-group col-sm-6">
			            <label>Access ID</label>
			            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Access ID" value="{{$employee_profile->user_id}}" readonly>
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Employee Name</label>
			            <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" value="{{$employee_profile->employee_name}}">
			        </div>

		         	<div class="form-group col-sm-6">
			            <label>Department</label>
	                     @if(isset($departments))
	                     <select class="form-control" name="department" required>
	                        @forelse($departments as $department)
	                        <option value="{{ $department->department_id }}" @if($department->department_id === $employee_profile->department_id){{ "selected" }}@endif>{{ $department->department }}</option>
	                        @empty
	                        <option>No Departments Found.</option>
	                        @endforelse
	                     </select>
	                     @endif
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Designation</label>
	                     @if(isset($designations))
	                     <select class="form-control" name="designation" required>
	                        @forelse($designations as $designation)
	                        <option value="{{ $designation->des_id }}" {{ $designation->des_id === $employee_profile->designation_id ? "selected" : "" }}>{{ $designation->designation }}</option>
	                        @empty
	                        <option>No Designations Found.</option>
	                        @endforelse
	                     </select>
	                     @endif
			        </div>

			        <div class="form-group col-sm-6">
			            <label>User Group</label>
			            <select class="form-control" name="user_group" required>
			            	<option value="Employee" {{$employee_profile->user_group === "Employee" ? "selected" : ""}}>Employee</option>
			            	<option value="Manager" {{$employee_profile->user_group === "Manager" ? "selected" : ""}}>Manager</option>
			            	<option value="HR Personnel" {{$employee_profile->user_group === "HR Personnel" ? "selected" : ""}}>HR Personnel</option>
			            </select>
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Employment Status</label>
			            <select class="form-control" name="employment_status" required>
			            	<option value="Regular" {{$employee_profile->employment_status === "Regular" ? "selected" : ""}}>Regular</option>
			            	<option value="Contractual" {{$employee_profile->employment_status === "Contractual" ? "selected" : ""}}>Contractual</option>
			            	<option value="Probationary" {{$employee_profile->employment_status === "Probationary" ? "selected" : ""}}>Probationary</option>
			            </select>
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Status</label>
			            <select class="form-control" name="status" id="status" required>
			            	<option value="Active" {{$employee_profile->status === "Active" ? "selected" : ""}}>Active</option>
			            	<option value="Inactive" {{$employee_profile->status === "Inactive" ? "selected" : ""}}>Inactive</option>
			            </select>
			        </div>


			        <div class="form-group col-sm-6">
			            <label>Email Address</label>
			            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{$employee_profile->email}}">
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Telephone Number</label>
			            <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" value="{{$employee_profile->telephone}}">
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Contact Number</label>
			            <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number" value="{{$employee_profile->contact_no}}">
			        </div>

			        <div class="form-group col-sm-6">
			            <label>SSS Number</label>
			            <input type="text" class="form-control" name="sss_no" id="sss_no" placeholder="SSS Number" value="{{$employee_profile->sss_no}}">
			        </div>
			        <div class="form-group col-sm-6">
			            <label>TIN Number</label>
			            <input type="text" class="form-control" name="tin_no" id="tin_no" placeholder="TIN Number" value="{{$employee_profile->tin_no}}">
			        </div>


			        <div class="form-group col-sm-6">
			            <label>Civil Status</label>
			            <select class="form-control" id="civil_status" name="civil_status" required>
			            	<option value="Single" {{$employee_profile->civil_status === "Single" ? "selected" : ""}}>Single</option>
			            	<option value="Married" {{$employee_profile->civil_status === "Married" ? "selected" : ""}}>Married</option>
			            	<option value="Widowed" {{$employee_profile->civil_status === "Widowed" ? "selected" : ""}}>Widowed</option>
			            </select>
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Address</label>
			            <textarea class="form-control" name="address" id="address" placeholder="Address">{{$employee_profile->address}}</textarea>
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Birth Date</label>
			            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="{{$employee_profile->birth_date}}">
			        </div>

			        <div class="form-group col-sm-6">
			            <label>Nickname</label>
			            <input type="text" class="form-control" name="nick_name" id="nick_name" placeholder="Nickname" value="{{$employee_profile->nick_name}}">
			        </div>
		    </div>
         </div>
	        <div class="modal-footer">
		        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Update</button>
		        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
		     </div>
		</form>
      </div>
   </div>
</div>





<!-- The Modal -->
<div class="modal fade" id="employeeResetPassword{{$employee_profile->user_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reset Password</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
			<h3>Reset {{$employee_profile->employee_name}}'s password ?</h3>  	
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <a class="btn btn-primary" href="{{route('client.reset_password',$employee_profile->user_id)}}" title="Reset {{$employee_profile->employee_name}}'s Password"><i class="fa fa-refresh" style="font-size: 15pt;"></i> Reset Password</a>

            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
         </div>
      </div>
   </div>
</div>


{{--
<!-- The Modal -->
<div class="modal fade" id="employeeResetLeaves{{$employee_profile->user_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reset Number of Leaves</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
			<h3>Reset {{$employee_profile->employee_name}}'s Number of Leaves ?</h3>  	
			         	
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
         </div>
      </div>
   </div>
</div>

--}}