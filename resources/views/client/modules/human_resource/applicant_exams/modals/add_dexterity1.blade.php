<div class="modal fade" id="addDexterity1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="/client/applicant_exams/add_question"  autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group col-md-6" style="margin-top: -30px;">
                     <label>Exam</label>  
                     <input type="hidden" name="exam_id" value="{{ $exam->exam_id }}">
                     <input type="text" value="{{ $exam->exam_title }}" readonly>
                  </div>
                  <div class="form-group col-md-6" style="margin-top: -30px;">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type_id == 14)
                           <div class="form-group">
                              <input type="text" name="exam_type" value="{{$examtype->exam_type}}" readonly>
                              <input type="hidden" name="exam_type_id" value="{{ $examtype->exam_type_id}}">
                           </div>
                        @endif
                     @endforeach
                  </div>
                   <div class="form-group col-md-12">
                     <input type="file" name="qimage[]" id="qimage" multiple="true">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Question</label>
                     <textarea name="questions" class="form-control ckeditor" id="ckeditor-dexterity1" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 1</label>
                     <input type="text" name="option1" placeholder="Option 1">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 2</label>
                     <input type="text" name="option2" placeholder="Option 2">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 3</label>
                     <input type="text" name="option3" placeholder="Option 3">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 4</label>
                     <input type="text" name="option4" placeholder="Option 4">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Correct Answer</label>
                     <input type="text" name="correct_answer" placeholder="Enter Correct Answer">
                  </div>
               </div>

               
               
               <div class="modal-footer" style="margin-top: -30px;">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>