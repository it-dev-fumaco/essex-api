<!-- The Modal -->
{{--<div class="modal fade" id="addMultipleChoice">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Multiple Choice</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_multiplechoice_save')}}">
                  @csrf
                  <div class="form-group col-md-6">
                     <label>Exam</label>
                     <input type="text" value="{{$exam->exam_title}}" class="form-control" readonly>
                     <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type == 'Multiple Choice')
                           <div class="form-group">
                              <input type="text" value="{{$examtype->exam_type}}" class="form-control" readonly>
                              <input type="text" name="exam_type_id" id="exam_type_id" value="{{$examtype->exam_type_id}}" hidden>
                           </div>
                        @endif
                     @endforeach
                  </div>
                  <div class="form-group col-md-12">
                     <label>Question</label>
                     <textarea id="questions" name="questions" class="form-control ckeditor" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4">
                     <label>Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1">
                  </div>
                  
                  <div class="form-group col-md-4">
                     <label>Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2">
                  </div>
                  <div class="form-group col-md-4">
                     <label>Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3">
                  </div>
                  <div class="form-group col-md-4">
                     <label>Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4">
                  </div>
                  <div class="form-group col-md-8">
                     <label>Correct Answer</label>
                     <input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer">
                  </div>
               </div>
                  
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
--}}
<!-- The Modal -->
<div class="modal fade" id="addMultipleChoice">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Multiple Choice</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_multiplechoice_save')}}" autocomplete="off">
                  @csrf
                  <div class="form-group col-md-6">
                     <label>Exam</label>
                     <input type="text" value="{{$exam->exam_title}}" id="exam_title" class="form-control" readonly>
                     <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type == 'Multiple Choice')
                           <div class="form-group">
                              <input type="text" value="{{$examtype->exam_type}}" class="form-control" readonly>
                              <input type="text" name="exam_type_id" id="exam_type_id" value="{{$examtype->exam_type_id}}" hidden>
                           </div>
                        @endif
                     @endforeach
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