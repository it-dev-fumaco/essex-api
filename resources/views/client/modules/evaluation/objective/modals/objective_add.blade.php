<div class="modal fade" id="add-objective-modal">
   <div class="modal-dialog">
      <form id="add-objective-form">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Objective</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Objective:</label>
                     <textarea name="objective" placeholder="Department Objective"></textarea>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">
                     <label>Target (%):</label>
                     <input type="number" name="target" step="0.01" placeholder="Target">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -30px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>