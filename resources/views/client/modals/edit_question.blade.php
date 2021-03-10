<!-- The Modal -->
<div class="modal fade" id="edit-question-modal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Question</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="edit-question-form">
                  @csrf
                  <input type="hidden" name="question_id" class="question-id">
                  <input type="hidden" class="exam-type">
                  <div class="form-group col-md-12">
                     <label>Question</label>
                     <textarea id="questions" name="questions" class="form-control ckeditor question" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4 option">
                     <label>Option 1</label>
                     <input type="text" class="form-control opts option1" name="option1" placeholder="Option 1 (required)">
                  </div>
                  <div class="form-group col-md-4 option">
                     <label>Option 2</label>
                     <input type="text" class="form-control opts option2" name="option2" placeholder="Option 2 (required)">
                  </div>
                  <div class="form-group col-md-4 option">
                     <label>Option 3</label>
                     <input type="text" class="form-control opts option3" name="option3" placeholder="Option 3 (required)">
                  </div>
                  <div class="form-group col-md-4 option">
                     <label>Option 4</label>
                     <input type="text" class="form-control opts option4" name="option4" placeholder="Option 4 (required)">
                  </div>
                  <div class="form-group col-md-8 answerDiv">
                     <label>Correct Answer</label>
                     <select class="form-control correct_answer" name="correct_answer" placeholder="Correct Answer (required)"></select>
                  </div>
               </div>
                  
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>

         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
