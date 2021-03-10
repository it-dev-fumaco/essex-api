<!-- The Modal -->
<div class="modal fade" id="delete-shift-schedule-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Shift Schedule</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: -20px 0 -20px 0; font-size: 12pt;">
              <form id="delete-shift-schedule-form">
               @csrf
               <div class="col-sm-12">
                  <input type="hidden" name="schedule_id" class="schedule_id">
                  <input type="hidden" name="schedule_date" class="schedule_date">
                 Delete shift schedule <b><span class="schedule"></span></b> ?
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>
