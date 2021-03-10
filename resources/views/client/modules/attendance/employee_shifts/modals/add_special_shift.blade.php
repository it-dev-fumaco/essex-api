<div class="modal fade" id="add-special-shift-modal">
   <div class="modal-dialog modal-md">
      <form action="/client/attendance/special_shift/create" method="POST" autocomplete="off">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Special Shift</h4>
         </div>
         <div class="modal-body" id="datepairExample">
            <div class="row">
               <div class="col-md-6">
                  <span>Schedule Date:</span>
                  <span><input type="text" name="schedule_date" class="date" required></span>
               </div>
               <div class="col-md-6">
                  <span>Branch:</span>
                  <span>
                     <select name="branch">
                        <option value="">-- Select Branch --</option>
                        @foreach($branch as $row)
                        <option value="{{ $row->branch_id }}">{{ $row->branch_name }}</option>
                        @endforeach
                     </select>
                  </span>
               </div>
               <div class="col-md-6">
                  <span>Time In:</span>
                  <span><input type="text" name="time_in" class="time" required></span>
               </div>
               <div class="col-md-6">
                  <span>Department:</span>
                  <span>
                     <select name="department">
                        <option value="">-- Select Department --</option>
                        <option value="-1">All Departments</option>
                        @foreach($department_list as $row)
                        <option value="{{ $row->department_id }}">{{ $row->department }}</option>
                        @endforeach
                     </select>
                  </span>
               </div>
               <div class="col-md-6">
                  <span>Time Out:</span>
                  <span><input type="text" name="time_out" class="time" required></span>
               </div>
               <div class="col-md-6">
                  <span>Grace Period:</span>
                  <span><input type="number" name="grace_period" required></span>
               </div>
               <div class="col-md-6" style="float: left;">
                  <span>Breaktime (hr):</span>
                  <span><input type="number" name="breaktime" required></span>
               </div>
               <div class="col-md-6">
                  <span style="vertical-align: top;">Remarks:</span>
                  <span><textarea rows="3" style="width: 100%;" name="remarks"></textarea></span>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>
