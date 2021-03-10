<div class="modal fade" id="delete-objective-modal">
   <div class="modal-dialog">
      <form id="delete-objective-form">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Objective</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" name="id" class="obj_id">
               <input type="hidden" name="objective" class="objective">
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete Objective <span style="font-weight: bold;" class="obj"></span>?
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer" style="margin-top: -35px;">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
       </form>
   </div>
</div>
