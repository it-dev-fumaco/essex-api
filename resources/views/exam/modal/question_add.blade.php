<!-- The Modal -->
<div class="modal fade" id="addQuestion">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.question_save')}}" id="formAddQuestion" autocomplete="off">
                  @csrf
                  <input type="hidden" name="exam_type" id="exam_type">
                  <div class="form-group col-md-6">
                     <label id="examLbl">Exam</label>
                        <select class="form-control" id="exam_id" name="exam_id" autofocus>
                           <option value="">None</option>
                     @forelse($exams as $exam)
                           <option value="{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                     @empty
                        <option value="">None</option>
                     @endforelse
                        </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label id="examtypeLbl">Exam Type</label>
                     <select class="form-control" name="exam_type_id" id="exam_type_id" data-parsley-required>
                        @foreach($examtypes as $examtype)
                           <option value="{{$examtype->exam_type_id}}">{{$examtype->exam_type}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label id="questionLbl">Question</label>
                     <textarea id="questions" name="questions" class="form-control ckeditor" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op1Lbl">Option 1</label>
                     <input type="text" class="form-control opts" name="option1" id="option1" placeholder="Option 1 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op3Lbl">Option 2</label>
                     <input type="text" class="form-control opts" name="option2" id="option2" placeholder="Option 2 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op2Lbl">Option 3</label>
                     <input type="text" class="form-control opts" name="option3" id="option3" placeholder="Option 3 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op4Lbl">Option 4</label>
                     <input type="text" class="form-control opts" name="option4" id="option4" placeholder="Option 4 (required)">
                  </div>
                  <div class="form-group col-md-8 mc">
                     <label class="calbl">Correct Answer</label>
                     {{--<input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)">--}}
                     <select class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)"></select>
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
