<div class="modal fade" id="delete-kpi-modal">
   <div class="modal-dialog">
      <form id="delete-kpi-form">
         @csrf
         <input type="hidden" name="id" class="kpi-id">
         <input type="hidden" name="kpi_description" class="kpi-description">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete KPI</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete KPI <span style="font-weight: bold;" class="kpi"></span>?
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
