<div class="modal fade" id="addquestion">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <div class="modal-body">
            <form action="/client/background_check/crudAddQuestion" method="POST">
            @csrf
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Question:</label>
                        <input type="text" class="form-control" name="question" placeholder="Enter Question" required>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
