<div class="modal fade" id="add-metrics-modal">
   <div class="modal-dialog modal-lg">
      <form id="add-metrics-form">
         @csrf
         <input type="hidden" name="kpi_id" class="kpi-id">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Performance Metrics</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-md-12" id="div-text" style="font-size: 12pt; text-align: center;">
                  <span style="padding-left: 30px;">KPI:</span>
                  <b><span class="kpi-text"></span></b>
               </div>             
               <div class="col-sm-12">
                  <a href="#" class="btn btn-primary add-row">
                     <i class="fa fa-plus"></i> Add
                  </a>
                  <table class="table" id="performance-metrics-table">
                     <thead>
                        <tr>
                           <th style="width: 5%; text-align: center;">No.</th>
                           <th style="width: 30%; text-align: center;">Metric Name</th>
                           <th style="width: 40%; text-align: center;">Description</th>
                           <th style="width: 5%; text-align: center;"></th>
                        </tr>
                     </thead>
                     <tbody class="table-body">
                        <tr>
                           <td>1</td>
                           <td><input type="text" name="metric_name[]" required></td>
                           <td><input type="text" name="metric[]" required></td>
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