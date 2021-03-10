<!-- The Modal -->
<div class="modal fade" id="delete-shift-group-modal-{{ $row->id }}">
   <div class="modal-dialog">
      <form action="/client/attendance/employee_shifts/delete/{{ $row->id }}" method="POST" autocomplete="off">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Shift Group</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: -20px 0 -20px 0; font-size: 12pt;">
               <div class="col-sm-12">
                  <input type="hidden" name="shift_group_name" value="{{ $row->shift_group_name }}">
                 Delete shift group <b>{{ $row->shift_group_name }}</b> ?
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