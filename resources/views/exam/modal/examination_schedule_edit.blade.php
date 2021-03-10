<!-- The Modal -->
<div class="modal fade" id="editExaminationSchedule{{$examinee->examinee_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Examinee</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.examination_schedule_update')}}">
                  @csrf
                  <input type="text" name="examinee_id" id="examinee_id" value="{{$examinee->examinee_id}}" hidden="true">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Examinee</label>
                     <input type="text" class="form-control" value="{{$examinee->employee_name}}" readonly>
                     <input type="text"  name="user_id" id="user_id" value="{{$examinee->user_id}}" hidden>
                  </div>
                  <div class="form-group">
                     <label>Exam Title</label>
                     @foreach($exams as $exam)
                       @if($exam->exam_id == $examinee->exam_id)
                          <input type="text" class="form-control" value="{{$exam->exam_title}}" readonly>
                          <input type="hidden"  name="exam_id" id="exam_id" value="{{$examinee->exam_id}}">
                        @endif
                     @endforeach
                     {{--<select name="exam_id" id="exam_id" class="form-control">
                     @foreach($exams as $exam)
                        <option value="{{$exam->duration_in_minutes}},{{$exam->exam_id}}" {{$exam->exam_id == $examinee->exam_id ? "selected" : ""}}>{{$exam->exam_title}}</option>
                     @endforeach
                     </select>--}}
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Exam Date</label>
                       <input class="form-control" type="date" name="date_of_exam" id="date_of_exam" placeholder="Enter Exam Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d',strtotime($examinee->date_of_exam))}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Validity Date</label>
                       <input class="form-control" type="date" name="validity_date" id="validity_date" placeholder="Enter Validity Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d',strtotime($examinee->date_of_exam))}}" required>
                    </div>
                  </div>
                  
              </div>
            </div>
                  <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" id="saveExamGroup"><i class="fa fa-check"></i> Update</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
         <!-- Modal footer -->
      </div>
   </div>
</div>
