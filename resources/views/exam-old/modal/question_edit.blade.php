<!-- The Modal -->
<div class="modal fade" id="editQuestion{{$question->question_id}}">
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
               <form method='post' action="{{route('admin.question_update')}}">
                  @csrf
                  
               <div class="col-sm-12">
               <input type="text" name="question_id" id="question_id" value="{{$question->question_id}}" hidden="true">
                  <div class="form-group">
                     <label>Exam</label>
                     <select name="exam_id" class="form-control">
                        <option value="" {{$question->exam_id == null ? "selected" : ""}}>None</option>
                     @forelse($exams as $exam)
                        <option value="{{$exam->exam_id}}" {{$question->exam_id == $exam->exam_id ? "selected" : ""}}>{{$exam->exam_title}}</option>
                        @empty
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Exam type</label>
                     <select name="exam_type_id" class="form-control">
                     @forelse($examtypes as $examtype)
                        <option value="{{$examtype->exam_type_id}}" {{$question->exam_type_id == $examtype->exam_type_id ? "selected" : ""}}>{{$examtype->exam_type}}</option>
                        @empty
                        <option value="" {{$question->exam_type_id == null ? "selected" : ""}}>None</option>
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Question</label>
                     <textarea id="ckeditor" name="questions" class="form-control ckeditor" rows="1" required>{{$question->questions}}</textarea>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1" value="{{$question->option1}}">
                  </div>
                  <div class="form-group">
                     <label>Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2" value="{{$question->option2}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3" value="{{$question->option3}}">
                  </div>
                  <div class="form-group">
                     <label>Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4" value="{{$question->option4}}">
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Correct Answer</label>
                     <input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer" value="{{$question->correct_answer}}">
                  </div>

               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="updateQuestion"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>