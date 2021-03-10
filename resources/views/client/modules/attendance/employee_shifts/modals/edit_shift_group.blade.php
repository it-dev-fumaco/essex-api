<div class="modal fade" id="edit-shift-group-modal">
   <div class="modal-dialog modal-md">
      <form action="/client/attendance/employee_shifts/update" method="POST" autocomplete="off">
         @csrf
         <input type="hidden" name="shift_group_id" class="shift-group-id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Shift Group</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12" style="text-align: center;">
                  <div class="form-group">
                     <label>Group Name:</label>
                     <input type="text" class="group-name" name="shift_group_name" placeholder="Group Name" required>
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
                     <tbody class="tbody-sched"></tbody>
                  </table>
               </div>
               <div class="col-md-12" style="text-align: center;">
                  <div class="form-group" style="margin-top: 3%;">
                     <label style="vertical-align: top;">Remarks:</label>
                     <textarea name="remarks" class="remarks" placeholder="Remarks" cols="40" rows="3"></textarea>
                  </div>
               </div>
               <div style="font-size: 8pt;float: right;padding-right: 5%;">
               <i>Last modified: <b><label class="modified_date" style="font-size: 8pt;"></label> </b> - <label class="modified_name" style="font-size: 8pt;"></label> </i>
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
