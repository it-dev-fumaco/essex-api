<!-- The Modal -->
<div class="modal fade" id="addApplicantExaminee" onload="loaded()">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Examinee</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.applicant_examinee_save')}}">
                  @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Examinee</label>
                     <select name="user_id" id="user_id" class="form-control">
                     @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->employee_name}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Exam Title</label>
                     <select name="exam_id" id="exam_id" class="form-control">
                     @foreach($exams as $exam)
                        <option value="{{$exam->duration_in_minutes}},{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                     @endforeach
                     </select>
                  </div>   
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Exam Date</label>
                       <input class="form-control" type="date" name="date_of_exam" id="date_of_exam" placeholder="Enter Exam Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Validity Date</label>
                       <input class="form-control" type="date" name="validity_date" id="validity_date" placeholder="Enter Validity Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                  </div>
                  
                  <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" id="saveExamGroup"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
