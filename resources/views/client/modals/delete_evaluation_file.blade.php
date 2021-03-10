<!-- The Modal -->
<div class="modal fade" id="delete-evaluation-file-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Evaluation</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: -20px 0 -20px 0; font-size: 12pt;">
              <form id="delete-evaluation-file-form">
               @csrf
               <div class="col-sm-12">
                  <input type="hidden" name="id" class="id">
                  <input type="hidden" name="evaluation_title" class="eval-title">
                 Delete evaluation <b><span class="title"></span></b> for <b><span class="employee"></span></b> ?
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
