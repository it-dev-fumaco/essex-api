
<!-- The Modal -->
<div class="modal fade" id="delete-approver-{{ $approver->approver_id }}">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Approver</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
              <form action="/client/leave_approver/delete/{{ $approver->approver_id }}" method="POST">
               @csrf
               <input type="hidden" name="employee_id" value="{{ $approver->employee_id }}">
               <div class="col-sm-12">
                 Delete Approver <b>{{ $approver->employee_name }}</b> ?
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>
