<div class="modal fade" id="delete-training-{{ $row->training_id }}">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Training</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
              <form action="/module/hr/delete_training" method="POST">
               @csrf
               <input type="hidden" name="training_id" value="{{ $row->training_id }}">
               <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                 Delete Training <b>{{ $row->training_title }}</b> ?
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