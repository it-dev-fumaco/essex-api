<!-- The Modal -->
<div class="modal fade" id="add-shift-schedule-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Shift Schedule</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="add-shift-schedule-form">
               @csrf
               <div class="col-sm-12" style="margin-top: -20px;">
                  <table style="width: 100%;">
                     <tr>
                        <td style="vertical-align: middle;"><span style="font-style: italic;">Date*</span></td>
                        <td style="vertical-align: middle;">
                           <div id="datepairExample">
                              <input type="text" name="schedule_date" class="date" style="width: 170px;" required autocomplete="off">
                           </div></td>
                        <td style="vertical-align: middle;"><span style="font-style: italic;">Schedule*</span></td>
                        <td style="vertical-align: middle;">
                           <select style="width: 170px;" name="shift_schedule" required>
                              <option value="">Select Schedule</option>
                              @forelse($employee_shifts as $shift)
                              <option value="{{ $shift->shift_id }}">{{ $shift->shift_schedule }}</option>
                              @empty
                              <option>No records found.</option>
                              @endforelse
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td style="vertical-align: middle;"><span style="font-style: italic;">Branch*</span></td>
                        <td style="vertical-align: middle;">
                           <select style="width: 170px;" name="branch" required>
                              <option value="">Select Branch</option>
                              @forelse($branch_list as $branch)
                              <option value="{{ $branch->branch_id }}">{{ $branch->branch_name }}</option>
                              @empty
                              <option>No records found.</option>
                              @endforelse
                           </select></td>
                        <td rowspan="2" style="vertical-align: top;"><span style="font-style: italic;">Remarks</span></td>
                        <td rowspan="2" style="vertical-align: top;"><textarea rows="3" style="resize: none;" name="remarks"></textarea></td>
                     </tr>
                     <tr>
                        <td style="vertical-align: middle;"><span style="font-style: italic;">Department*</span></td>
                        <td style="vertical-align: middle;">
                           <select style="width: 170px;" name="department" required>
                              <option value="">Select Department</option>
                              @forelse($all_departments as $dept)
                              <option value="{{ $dept->department_id }}">{{ $dept->department }}</option>
                              @empty
                              <option>No records found.</option>
                              @endforelse
                           </select>
                        </td>
                     </tr>
                  </table>
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

<style type="text/css">
   #add-shift-schedule-modal table td{
      padding: 8px 0 8px 0;
   }
</style>
