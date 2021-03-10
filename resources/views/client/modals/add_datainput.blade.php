<div class="modal fade" id="data_inputmodal">
	<div class="modal-dialog" style="width:730px;height: 300px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">KPI - Data Input List</h4>
			</div>
			<div class="modal-body" style="margin: -20px 20px -20px 20px;">
				<div class="col-sm-7" style="float: left;margin-top: 10px;margin-right: -28px;@if($depart == 'employee')display: none; @endif">
					<label style="width: 33%;">Entry By:</label>
					<select style="width: 49%;" name="entry" id="entry" onchange="entryvalidation()">
						<option value="per_department" selected="selected">KPI per department</option>
						<option value="per_employee">Per employee</option>
					</select>
				</div> 
				<div class="col-sm-5" style="margin-top:30px;float: right; border-style: ridge;">
					<label>KPI Reporting Deadline:</label><br>
					<center><i><label id="show_scheduledDate"></label></i></center>
				</div>
				<div class="col-sm-7" style="float: left;margin-top: 10px;margin-right: -28px;@if($depart == 'employee')display: none; @endif">
					<label style="width: 33%;">Department</label>
					<select style="width: 49%;" name="dept" id="dept" onchange="getemployeeperdept()">
						@foreach($department_heads as $row)
						<option value="{{ $row->department_id }}">{{ $row->department }} </option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-7" style="float: left;margin-top: 10px;margin-right: -28px;display:none;" id="employeelistdiv" >
					<label style="width: 33%;" >Employee Name</label>
					<select style="width: 49%;" name="employeelist" id="employeelist" onchange="createFunction()">
						<option value=""></option>
					</select>
				</div>
				<div class="col-sm-6" style="padding-top: 10px;">
					<label style="width: 40%;">Evaluation Period</label>
					<select style="width: 57%;" name="entrysched" id="entrysched" onchange="createFunction()">
						<option value="Monthly">Monthly</option>
						<option value="Quarterly">Quarterly</option>
						<option value="Semi-Annual">Semi-Annual</option>
						<option value="Annual">Annual</option>
					</select>
				</div>
				<input type="hidden" name="departmentvalidate" id="departmentvalidate" value="{{ $depart }}">
				<div class="row" id="viewdatainput" style="margin-top: 0px;"></div>
			</div>
		</div>
	</div>
</div>