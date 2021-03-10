<div class="modal fade" id="deleteApplicantExaminee{{$appexaminee->examinee_id}}">
  {{$appexaminee->examinee_id}}
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
             <form method='post' action="{{route('admin.applicant_examinee_delete')}}">
                @csrf
                <div class="row" style="margin: 7px;">
                  <div class="col-sm-12">
                     Delete Examinee <b>{{$appexaminee->employee_name}}</b> for Exam <b>{{$appexaminee->exam_title}}</b>?
                     <input type="number" name="examinee_id" id="examinee_id" value="{{$appexaminee->examinee_id}}" hidden>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="deleteExam"><i class="fa fa-check"></i> Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
             </form>
          </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
