<!-- The Modal -->
<div class="modal fade" id="edit-data-input-result-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit KPI Input Result</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: -20px 0 -20px 0; font-size: 12pt;">
              <form id="update-result-form" autocomplete="off">
               @csrf
               <div class="col-sm-12" style="text-align: center;">
                  <input type="hidden" name="result_id" class="result-id">
                  <input type="hidden" name="data_input" class="data-input">
                  <b><span class="data-input-name"></span>: </b><input type="text" name="result" class="result" style="width: 20%; text-align: center;">
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
         </div>
         </form>
      </div>
   </div>
</div>
