<div class="modal fade" id="addAbstract">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="/tabAddQuestion"  autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group col-md-6">
                     <label>Exam</label>  
                     <input type="hidden" name="exam_id" value="{{ $exam->exam_id }}">
                     <input type="text" value="{{ $exam->exam_title }}" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type_id == 13)
                           <div class="form-group">
                              <input type="text" name="exam_type" value="{{ $examtype->exam_type }}" class="form-control" readonly>
                              <input type="hidden" name="exam_type_id" value="{{ $examtype->exam_type_id }}">
                           </div>
                        @endif
                     @endforeach
                  </div>
                   <div class="form-group col-md-12">
                     <input class="form-control" type="file" name="qimage[]" id="qimage" multiple="true">
                  </div>
                  <div class="form-group col-md-12" hidden>
                     <label>Question</label>
                     <textarea name="questions" class="form-control ckeditor" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 1</label>
                     <input type="text" class="form-control" name="option1" placeholder="Option 1">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 2</label>
                     <input type="text" class="form-control" name="option2" placeholder="Option 2">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 3</label>
                     <input type="text" class="form-control" name="option3" placeholder="Option 3">
                  </div>
                  <div class="form-group col-md-4" hidden>
                     <label>Option 4</label>
                     <input type="text" class="form-control" name="option4" placeholder="Option 4">
                  </div>
                  <div class="form-group col-md-12">
                     <label>Correct Answer</label>
                     <select class="form-control" name="correct_answer">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                     </select>
                  </div>
               </div>

               
               
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>