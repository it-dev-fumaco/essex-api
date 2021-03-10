<!-- The Modal -->
<div class="modal fade" id="addExaminee">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Examinee</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">{{--method='post' action="{{route('admin.examinee_save')}}"--}}

                <div id="errorDiv"></div>
               <form  id="formAddExaminee" data-parsley-validate>
                  @csrf
                  <div class="form-group col-md-12">
                     <label>Department</label>
                     <select name="department_id" id="department_id" class="form-control">
                      <option value="0">None</option>
                     @forelse($departments as $dept)
                        <option value="{{$dept->department_id}}">{{$dept->department}}</option>
                     @empty
                        <option value="0">None</option>
                      @endforelse
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Examinee</label>
                     <select name="user_id" id="user_id" class="form-control">
                     @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->employee_name}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Exam Title</label>
                     <select name="exam_id" id="exam_id" class="form-control">
                     @foreach($exams as $exam)
                        <option value="{{$exam->duration_in_minutes}},{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                     @endforeach
                     </select>
                  </div>  
                    <div class="form-group col-md-6">
                       <label>Exam Date</label>
                       <input class="form-control" type="date" name="date_of_exam" id="date_of_exam" placeholder="Enter Exam Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                       <label>Validity Date</label>
                       <input class="form-control" type="date" name="validity_date" id="validity_date" placeholder="Enter Validity Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                  
            </div>
                  <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" id="saveExaminee"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" id="closeAddExamineeForm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>  