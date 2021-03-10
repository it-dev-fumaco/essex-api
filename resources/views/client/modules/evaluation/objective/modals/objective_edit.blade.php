<div class="modal fade" id="edit-objective-modal">
   <div class="modal-dialog">
      <form id="edit-objective-form">
         @csrf
         <input type="hidden" name="id" class="obj_id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Objective</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Objective:</label>
                     <textarea name="objective" class="objective" placeholder="Department Objective"></textarea>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">
                     <label>Target (%):</label>
                     <input type="number" name="target" class="target" step="0.01" placeholder="Target">
                  </div>
               </div>
               <div style="font-size: 8pt;float: right;padding-right: 2%;">
                  <i>Last modified: <b><label class="modified_date" style="font-size: 8pt;"></label> </b> -<label class="modified_name" style="font-size: 8pt;"></label> </i>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -30px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>