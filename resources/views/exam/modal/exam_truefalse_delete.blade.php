<div class="modal fade" id="deleteTrueFalse{{$truefalse->question_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete True or False</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_truefalse_delete')}}">
                  @csrf
                  <div class="col-sm-12">
                     Delete Question <b>{{$truefalse->questions}}</b> ?
                     <input type="number" name="question_id" id="question_id" value="{{$truefalse->question_id}}" hidden>
                     <input type="number" name="exam_id" id="exam_id" value="{{$truefalse->exam_id}}" hidden>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="deleteQuestion"><i class="fa fa-check"></i> Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>