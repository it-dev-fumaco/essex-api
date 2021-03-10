<!-- The Modal -->
<div class="modal fade" id="editEssay{{$essay->question_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Essay</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_essay_update')}}">
                  @csrf
                  <input type="hidden" name="question_id" id="question_id" value="{{$essay->question_id}}">
                  <div class="form-group col-md-6">
                     <label>Exam</label>
                     <input type="text" value="{{$exam->exam_title}}" class="form-control" readonly>
                     <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type == 'Essay')
                           <div class="form-group">
                              <input type="text" value="{{$examtype->exam_type}}" class="form-control" readonly>
                              <input type="text" name="exam_type_id" id="exam_type_id" value="{{$examtype->exam_type_id}}" hidden>
                           </div>
                        @endif
                     @endforeach
                  </div>
                  <div class="form-group">
                     <label>Question</label>
                     <textarea id="ckeditor" name="questions" class="form-control ckeditor" rows="1">{{$essay->questions}}</textarea>
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
