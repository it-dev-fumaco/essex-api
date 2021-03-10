<div class="modal fade" id="add-shift-group-modal">
   <div class="modal-dialog modal-md">
      <form action="/client/attendance/employee_shifts/create" method="POST">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Shift Group</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12" style="text-align: center;">
                  <div class="form-group">
                     <label>Group Name:</label>
                     <input type="text" class="group-name" name="shift_group_name" placeholder="Group Name" required autocomplete="off">
                  </div>
               </div>
               <div class="col-md-12" id="datepairExample">
                  <table style="width: 100%;" class="tbl-sched">
                     <col style="width: 18%;">
                     <col style="width: 21%;">
                     <col style="width: 21%;">
                     <col style="width: 18%;">
                     <col style="width: 18%;">
                     <thead>
                     <tr style="border-bottom: 2px solid #CCD1D1;">
                        <th>Day of Week</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Break (hr)</th>
                        <th>Grace Period</th>
                     </tr>
                     </thead>
                     <tr>
                        <td>Monday<input type="hidden" name="day_of_week[]" value="Monday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                     <tr>
                        <td>Tuesday<input type="hidden" name="day_of_week[]" value="Tuesday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                     <tr>
                        <td>Wednesday<input type="hidden" name="day_of_week[]" value="Wednesday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                     <tr>
                        <td>Thursday<input type="hidden" name="day_of_week[]" value="Thursday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                     <tr>
                        <td>Friday<input type="hidden" name="day_of_week[]" value="Friday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                     <tr>
                        <td>Saturday<input type="hidden" name="day_of_week[]" value="Saturday"></td>
                        <td><input type="text" name="time_in[]" class="time" autocomplete="off" placeholder="Time In"></td>
                        <td><input type="text" name="time_out[]" class="time" autocomplete="off" placeholder="Time Out"></td>
                        <td><input type="number" name="breadktime[]" placeholder="(hr)"></td>
                        <td><input type="number" name="grace_period[]" placeholder="(mins)"></td>
                     </tr>
                  </table>
               </div>
               <div class="col-md-12" style="text-align: center;">
                  <div class="form-group" style="margin-top: 3%;">
                     <label style="vertical-align: top;">Remarks:</label>
                     <textarea name="remarks" placeholder="Remarks" cols="40" rows="3"></textarea>
                  </div>
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
