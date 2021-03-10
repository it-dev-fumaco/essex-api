<div class="modal fade" id="deleteExaminationSchedule{{$examinee->examinee_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Exam Type</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.examination_schedule_delete')}}">
                  @csrf
                  <div class="col-sm-12">
                     Delete Exam Type <b>{{$examinee->examinee_id}}</b> ?
                     <input type="number" name="examinee_id" id="examinee_id" value="{{$examinee->examinee_id}}" hidden>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="deleteExamType"><i class="fa fa-check"></i> Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>