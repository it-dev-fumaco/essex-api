<div class="modal fade" id="delete-appraisal-modal{{ $row->appraisal_result_id }}">
   <div class="modal-dialog">
      <form method="POST" action="/deleteAppraisal/{{ $row->appraisal_result_id }}">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Performance Appraisal</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" name="id" value="{{ $row->appraisal_result_id }}">
               <input type="hidden" name="employee_name" value="{{ $row->employee_name }}">
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete Performance Appraisal of <span style="font-weight: bold;">{{ $row->employee_name }}</span>?
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
