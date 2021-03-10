<!-- The Modal -->
<div class="modal fade" id="delete-special-shift-modal-{{ $row->schedule_id }}">
   <div class="modal-dialog">
      <form action="/client/attendance/special_shift/delete/{{ $row->schedule_id }}" method="POST" autocomplete="off">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Special Shift</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: -20px 0 -20px 0; font-size: 12pt;">
               <div class="col-sm-12">
                  <input type="hidden" name="sched_date" value="{{ $row->sched_date }}">
                 Delete special shift <b>{{ $row->sched_date }}</b> ?
               </div>               
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </form>
   </div>
</div>