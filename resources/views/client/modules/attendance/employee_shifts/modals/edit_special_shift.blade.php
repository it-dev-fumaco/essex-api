<div class="modal fade" id="edit-special-shift-modal-{{ $row->schedule_id }}">
   <div class="modal-dialog modal-md">
      <form action="/client/attendance/special_shift/update/{{ $row->schedule_id }}" method="POST" autocomplete="off" id="edit-special-shift-frm">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Special Shift</h4>
         </div>
         <div class="modal-body" id="datepairExample">
            <div class="row">
               <div class="col-md-6">
                  <span>Schedule Date:</span>
                  <span><input type="text" name="schedule_date" class="date" value="{{ $row->sched_date}}" required></span>
               </div>
               <div class="col-md-6">
                  <span>Branch:</span>
                  <span>
                     <select name="branch">
                        <option value="">-- Select Branch --</option>
                        @foreach($branch as $br)
                        <option value="{{ $br->branch_id }}" {{ $row->branch_id == $br->branch_id ? 'selected' : '' }}>{{ $br->branch_name }}</option>
                        @endforeach
                     </select>
                  </span>
               </div>
               <div class="col-md-6">
                  <span>Time In:</span>
                  <span><input type="text" name="time_in" class="time"  value="{{ $row->time_in }}" required></span>
               </div>
               <div class="col-md-6">
                  <span>Department:</span>
                  <span>
                     <select name="department">
                        <option value="">-- Select Department --</option>
                        <option value="-1" {{ $row->department_id == '-1' ? 'selected' : '' }}>All Departments</option>
                        @foreach($department_list as $dept)
                        <option value="{{ $dept->department_id }}" {{ $row->department_id == $dept->department_id ? 'selected' : '' }}>{{ $dept->department }}</option>
                        @endforeach
                     </select>
                  </span>
               </div>
               <div class="col-md-6">
                  <span>Time Out:</span>
                  <span><input type="text" name="time_out" class="time" value="{{ $row->time_out}}" required></span>
               </div>
               <div class="col-md-6">
                  <span>Grace Period:</span>
                  <span><input type="number" name="grace_period" value="{{ $row->grace_period_in_mins }}" required></span>
               </div>
               <div class="col-md-6" style="float: left;">
                  <span>Breaktime (hr):</span>
                  <span><input type="number" name="breaktime" value="{{ $row->breaktime_by_hr}}" required></span>
               </div>
               <div class="col-md-6">
                  <span style="vertical-align: top;">Remarks:</span>
                  <span><textarea rows="3" style="width: 100%;" name="remarks">{{ $row->remarks }}</textarea></span>
               </div>
               <div style="font-size: 8pt; padding-right: 5%;padding-top: 5%;float: right;">
                  <i>Last modified: <b>{{ $row->updated_at }} </b> -{{ $row->last_modified_by }} </i>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>
