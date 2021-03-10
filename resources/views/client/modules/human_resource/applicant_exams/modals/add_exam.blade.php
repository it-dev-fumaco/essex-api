<!-- The Modal -->
<div class="modal fade" id="addExam">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="/client/hr/applicant_exams/add_exam" autocomplete="off">
                  @csrf
                  <div class="form-group col-sm-6" style="margin-top: -30px;">
                     <label>Exam Group</label>
                     <select name="exam_group_id" id="exam_group_id">
                     @foreach($examgroups as $examgroup)
                        <option value="{{$examgroup->exam_group_id}}">{{$examgroup->exam_group_description}}</option>
                     @endforeach
                     </select>
                  </div>

                  <div class="form-group col-sm-6" style="margin-top: -30px;">
                     <label>Department</label>
                     <select name="department_id" id="department_id">
                        <option value="-1">All Departments</option>
                      <option value="0">Applicants</option>
                     @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department}}</option>
                     @endforeach
                     </select>
                  </div>

                  <div class="form-group col-sm-12">
                     <label>Exam Title</label>
                     <input type="text" name="exam_title" id="exam_title" placeholder="Enter Exam Title" required>
                  </div>

                  <div class="form-group col-sm-6">
                     <label>Status</label>
                     <select name="status" id="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                     </select>
                  </div>

                  <div class="form-group col-sm-6">
                     <label>Duration In Minutes</label>
                     <input type="number" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" required>
                  </div>

                  <div class="form-group col-sm-6">
                     <label>Passing Mark</label>
                     <input type="text" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" required>
                  </div>

                  <div class="form-group col-sm-6">
                     <label>Remarks</label>
                     <textarea name="remarks" id="remarks" placeholder="Enter Remarks"></textarea>
                  </div>

            </div>
                  
                  <div class="modal-footer" style="margin-top: -20px;">
                       <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
