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
               <form id="formAddQuestion" method='post' action="{{route('admin.question_save')}}" data-parsley-validate>
                  @csrf
                  <input type="hidden" name="exam_type" id="exam_type">
                  <div class="form-group col-md-6">
                     <label id="disp">Exam</label>
                     <select name="exam_id" class="form-control">
                        <option value="">None</option>
                     @forelse($exams as $exam)
                        @if($loop->first)
                           <option value="{{$exam->exam_id}}" selected>{{$exam->exam_title}}</option>
                        @else
                           <option value="{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                        @endif
                     @empty
                        <option value="">None</option>                        
                     @endforelse
                     </select>
                  </div>
         
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     <select name="exam_type_id" id="exam_type_id" class="form-control" data-parsley-required data-parsley-required-message="Please select one.">
                     @forelse($examtypes as $examtype)
                        @if($loop->first)
                           <option value="{{$examtype->exam_type_id}}" selected>{{$examtype->exam_type}}</option>
                        @else
                           <option value="{{$examtype->exam_type_id}}">{{$examtype->exam_type}}</option>
                        @endif
                     @empty
                        <option value="">None</option>
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group">
                     <div id="qerror" class="alert alert-danger hidden"></div>
                     <label>Question</label>
                     <textarea id="questions" name="questions" class="form-control ckeditor" rows="1" data-parsley-required data-parsley-required-message=false></textarea>
                  </div>
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1">
                  </div>
                  <div class="form-group  col-sm-4">
                     <label class="lbl">Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2">
                  </div>
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3">
                  </div>
                  <div class="form-group col-sm-4">
                     <label class="lbl">Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4">
                  </div>
                  <div class="form-group mc col-md-8">
                     <label class="calbl">Correct Answer</label>
                     <input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer">
                  </div>
                  <div class="form-group hidden tf">
                     <label class="tflbl">Correct Answer</label>
                     <select name="catf" id="catf" class="form-control">
                        <option value="True" selected>True</option>
                        <option value="False">False</option>
                     </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
