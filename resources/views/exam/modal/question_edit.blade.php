<!-- The Modal -->
<div class="modal fade qedit" id="editQuestion{{$question->question_id}}">
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
               <form id="formEditQuestion" method='post' action="{{route('admin.question_update')}}" data-parsley-validate autocomplete="off">
                  @csrf
                  <input type="hidden" name="question_id" id="question_id" value="{{$question->question_id}}">
                  <input type="hidden" name="exam_type" id="exam_type">
                  <div class="form-group col-md-6">
                     <label id="disp">Exam</label>
                     <select name="exam_id" class="form-control">
                        <option value="">None</option>
                     @forelse($exams as $exam)
                        <option value="{{$exam->exam_id}}" {{$exam->exam_id==$question->exam_id ? "selected" : ""}}>{{$exam->exam_title}}</option>
                     @empty
                        <option value="">None</option>                        
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     <select name="exam_type_id" id="exam_type_id" class="form-control" data-parsley-required data-parsley-required-message="Please select one." disabled>
                     @forelse($examtypes as $examtype)
                        <option value="{{$examtype->exam_type_id}}" {{$examtype->exam_type_id==$question->exam_type_id ? "selected" : ""}}>{{$examtype->exam_type}}</option>
                     @empty
                        <option value="">None</option>
                     @endforelse
                     </select>
                  </div>

                  <div class="form-group col-md-12">
                     <label>Question</label>
                     <textarea id="ckeditor" name="questions" class="form-control ckeditor" rows="1" required>{{$question->questions}}</textarea>
                  </div>
                  
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1" value="{{$question->option1}}">
                  </div>
                  <div class="form-group  col-sm-4">
                     <label class="lbl">Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2" value="{{$question->option2}}">
                  </div>
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3" value="{{$question->option3}}">
                  </div>
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4" value="{{$question->option4}}">
                  </div>
                  <div class="form-group mc col-md-8">
                     <label class="calbl">Correct Answer</label>
                     <input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer" value="{{$question->correct_answer}}">
                     <input type="hidden" name="sagot" id="sagot" value="{{$question->correct_answer}}">
                  </div>
                  <div class="form-group hidden tf col-md-12">
                     <label class="tflbl">Correct Answer</label>
                     <select name="catf" id="catf" class="form-control">
                        <option value="True" {{$question->correct_answer=="True" ? "selected" : ""}}>True</option>
                        <option value="False" {{$question->correct_answer=="False" ? "selected" : ""}}>False</option>
                     </select>
                  </div>
               
               
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
                </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>   
