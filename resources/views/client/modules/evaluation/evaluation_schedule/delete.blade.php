<div class="modal fade" id="delete-eval-sched-modal{{ $row->eval_sched_id }}">
   <div class="modal-dialog">
      <form method="POST" action="/evaluation/schedule/{{ $row->eval_sched_id }}/delete">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Evaluation Schedule</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" name="id" value="{{ $row->eval_sched_id }}">
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete Evaluation Schedule <span style="font-weight: bold;">{{ $row->period }} ({{ $row->start_date }})</span>?
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
