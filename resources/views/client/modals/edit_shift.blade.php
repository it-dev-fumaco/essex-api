<!-- The Modal -->
<div class="modal fade" id="edit-shift-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Shift</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="edit-shift-form">
               @csrf
               <input type="hidden" name="shift_id" class="shift_id">
               <div class="col-sm-12" style="margin-top: -20px;">
                  <table style="width: 100%;">
                     <tr>
                        <td style="width: 20%;"><span style="font-style: italic;">Schedule Name*</span></td>
                        <td colspan="2" style="width: 28%;"><input type="text" name="schedule_name" class="schedule_name" required></td>
                     </tr>
                     <tr>
                        <td style="width: 20%;"><span style="font-style: italic;">Time In*</span></td>
                        <td style="width: 28%;"><input type="time" name="time_in" class="time_in" required></td>
                        <td style="width: 25%;"><span style="font-style: italic;">Breaktime (hrs)*</span></td>
                        <td style="width: 12%;"><input type="number" name="breaktime" style="width: 60px;" class="breaktime" required></td>
                     </tr>
                     <tr>
                        <td style="width: 20%;"><span style="font-style: italic;">Time Out*</span></td>
                        <td style="width: 28%;"><input type="time" name="time_out" class="time_out" required></td>
                        <td style="width: 25%;"><span style="font-style: italic;">Grace Period (mins)*</span></td>
                        <td style="width: 12%;"><input type="number" name="grace_period" style="width: 60px;" class="grace_period" required></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div></form>
      </div>
   </div>
</div>

<style type="text/css">
   #add-shift-modal table td{
      padding: 8px 0 8px 0;
   }
</style>
