<div class="modal fade" id="edit-metric-modal">
   <div class="modal-dialog modal-lg">
      <form id="edit-metric-form">
         @csrf
         <input type="hidden" name="id" class="metric-id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Performance Metric</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Metric Name:</label>
                     <input type="text" name="metric_name" class="metric-name" required>
                  </div>
                  <div class="form-group">
                     <label>Metric Description:</label>
                     <textarea rows="2" name="metric" class="metric-description" required></textarea>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Remarks:</label>
                     <textarea name="remarks" rows="5" class="remarks"></textarea>
                  </div>
               </div>
               <div style="font-size: 8pt;float: right; padding-right: 2%;">
                  <i>Last modified: <b><label class="modified_date_metrics" style="font-size: 8pt;"></label> </b> -<label class="modified_name_metrics" style="font-size: 8pt;"></label> </i>
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