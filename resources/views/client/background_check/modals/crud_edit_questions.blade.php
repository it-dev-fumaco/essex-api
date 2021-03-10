<div class="modal fade" id="edit-questions-{{ $questions->question_id }}">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Question</h4>
         </div>
         <div class="modal-body">
            <form action="/crudEditQuestion" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $questions->question_id }}">
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Question:</label>
                        <input type="text" class="form-control" name="question" value="{{ $questions->question }}" placeholder="Enter Employee Name">
                     </div>
                  </div>
                  
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
