<div class="modal fade" id="delete-employee-{{ $employee->id }}">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Employee</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
              <form action="/client/employee/delete/{{ $employee->id }}" method="POST">
               @csrf
               <input type="hidden" name="employee_name" value="{{ $employee->employee_name }}">
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete Employee <b>{{ $employee->employee_name }}</b> ?
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer" style="margin-top: -30px;">
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>