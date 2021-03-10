<div class="modal fade" id="edit-data-input-modal">
   <div class="modal-dialog modal-lg">
      <form id="edit-data-input-form">
         @csrf
         <input type="hidden" name="id" class="data-input-id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Data Input</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Data Input:</label>
                     <textarea rows="5" name="input" class="data-input" required></textarea>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Remarks:</label>
                     <textarea name="remarks" class="remarks"></textarea>
                  </div>
               </div>
               <div style="font-size: 8pt;float: right; padding-right: 3%;">
                  <i>Last modified: <b><label class="modified_date_data" style="font-size: 8pt;"></label> </b> -<label class="modified_name_data" style="font-size: 8pt;"></label> </i>
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