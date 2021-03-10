<!-- The Modal -->
<div class="modal fade" id="addExam">
   <div class="modal-dialog modal-md">
      <form method='post' action="/tabAddExam" autocomplete="off">
      @csrf
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6" style="margin-top: -30px;">
                  <div class="form-group">
                     <label>Exam Group</label>
                     <select name="exam_group_id" id="exam_group_id">
                     @foreach($examgroups as $examgroup)
                        <option value="{{$examgroup->exam_group_id}}">{{$examgroup->exam_group_description}}</option>
                     @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6" style="margin-top: -30px;">
                  <div class="form-group">
                     <label>Department</label>
                     <select name="department_id" id="department_id">
                        <option value="-1">All Departments</option>
                      <option value="0">Applicants</option>
                     @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department}}</option>
                     @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Exam Title</label>
                     <input type="text" name="exam_title" id="exam_title" placeholder="Enter Exam Title" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Status</label>
                     <select name="status" id="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Duration In Minutes</label>
                     <input type="number" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Passing Mark %</label>
                     <input type="text" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" required>
                     <i class="fa fa-info-circle"></i> Specify the passing mark of exam.
                  </div>
                  <div class="alert">
                     
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Remarks</label>
                     <textarea style="width: 100%;" rows="3" name="remarks" id="remarks" placeholder="Enter Remarks"></textarea>
                  </div>
               </div>
            </div>
                  
                  <div class="modal-footer" style="margin-top: -25px;">
                       <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
              
         </div>
         <!-- Modal footer -->
      </div>
       </form>
   </div>
</div>
