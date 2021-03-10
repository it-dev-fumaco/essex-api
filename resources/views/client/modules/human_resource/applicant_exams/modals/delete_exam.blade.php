<div class="modal fade" id="deleteExam{{$exam->exam_id}}">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="/client/hr/applicant_exams/delete_exam">
                  @csrf
                  <div class="col-sm-12" style="margin-top: -30px; font-size: 12pt;">
                     Delete Exam <b>{{$exam->exam_title}}</b> ?
                     <input type="number" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden>
                  </div>
               </div>
               <div class="modal-footer" style="margin-top: -20px;">
                    <button type="submit" class="btn btn-primary" id="deleteExam"><i class="fa fa-check"></i> Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>