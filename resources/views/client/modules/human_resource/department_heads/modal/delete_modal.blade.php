
<!-- The Modal -->
<div class="modal fade" id="delete-deptheadlist-{{ $row->id }}">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Department Head</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
           <div class="row" style="margin-top: -20px; margin-bottom: -20px;">
              <form action="/client/modules/human_resource/department_head/delete/{{ $row->id }}" method="POST">
               @csrf
               <input type="hidden" name="employee_id" value="{{ $row->employee_id }}">
               <div class="col-sm-12">
                 Delete Department Head <b>{{ $row->employee_name }}</b> ?
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
