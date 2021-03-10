<div class="modal fade" id="add-data-inputs-modal">
   <div class="modal-dialog modal-lg">
      <form id="add-data-inputs-form">
         @csrf
         <input type="hidden" name="metric_id" class="metric-id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Data Inputs</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-md-12" style="font-size: 12pt; text-align: center;">
                  <span style="padding-left: 30px;">Metric:</span>
                  <b><span class="metric-text"></span></b>
               </div>             
               <div class="col-sm-12">
                  <a href="#" class="btn btn-primary add-row">
                     <i class="fa fa-plus"></i> Add
                  </a>
                  <table class="table" id="data-inputs-table">
                     <thead>
                        <tr>
                           <th style="width: 5%; text-align: center;">No.</th>
                           <th style="width: 70%; text-align: center;">Data Input(s)</th>
                           <th style="width: 5%; text-align: center;"></th>
                        </tr>
                     </thead>
                     <tbody class="table-body">
                        <tr>
                           <td>1</td>
                           <td><input type="text" name="data_input[]" required></td>
                           <td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>
                        </tr>
                     </tbody>
                  </table>
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