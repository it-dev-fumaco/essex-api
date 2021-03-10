<div class="modal fade" id="reset-employee-leaves">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reset Employee Leave(s)</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
              <form action="/employee/reset_leaves" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $employee_profile->user_id }}">
               <input type="hidden" name="employee_name" value="{{ $employee_profile->employee_name }}">
               <div class="col-sm-12">
                 Reset no. of leave(s) for employee <b>{{ $employee_profile->employee_name }}</b> ?
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Reset</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>