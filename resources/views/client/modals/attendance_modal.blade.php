<div class="modal fade" id="attendanceModal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-title"><h4>Attendance</h4></div>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form></form>
               <div class="col-md-12" id="datepairExample" style="text-align: center;">
                  <label>Employee</label>
                  <select style="width: 200px;" class="employee attendanceHistoryFilter" id="attendanceHistoryFilter_employee">
                     @forelse(in_array($designation, ['Human Resources Head', 'HR Payroll Assistant']) ? $employees : $employees_per_dept as $employee)
                     <option value="{{ $employee->user_id }}" {{ Auth::user()->user_id == $employee->user_id ? 'selected' : '' }}>{{ $employee->employee_name }}</option>
                     @empty
                     <option disabled>No Records Found.</option>
                     @endforelse
                  </select>
                  <label style="margin-left: 30px;">From</label>
                  <input type="text" class="date attendanceHistoryFilter" autocomplete="off" id="attendanceHistoryFilter_start" value="{{ Carbon\Carbon::parse('this week -7 days')->format('Y-m-d') }}">
                  <label style="margin-left: 10px;">To</label>
                  <input type="text" class="date attendanceHistoryFilter" autocomplete="off" id="attendanceHistoryFilter_end" value="{{ Carbon\Carbon::parse('now')->format('Y-m-d') }}">
                  
               </div>
               <div class="col-md-12">
                  <div id="attendance-history"></div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>