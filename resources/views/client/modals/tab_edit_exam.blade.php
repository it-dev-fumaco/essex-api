<!-- The Modal -->
<div class="modal fade" id="editExam{{$exam->exam_id}}">
   <div class="modal-dialog modal-md">
      <form method='post' action="/tabUpdateExam">
      @csrf
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden="true">
               <div class="col-md-6" style="margin-top: -30px;">
                  <div class="form-group">
                     <label>Exam Group</label>
                     <select name="exam_group_id">
                     @foreach($examgroups as $examgroup)
                        <option value="{{$examgroup->exam_group_id}}" {{$exam->exam_group_id==$examgroup->exam_group_id ? "selected" : ""}}>{{$examgroup->exam_group_description}}</option>
                     @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6" style="margin-top: -30px;">
                  <div class="form-group">
                     <label>Department</label>
                     <select name="department_id">
                        <option value="-1" {{$exam->department_id== -1 ? "selected" : ""}}>All Departments</option>
                      <option value="0" {{$exam->department_id== 0 ? "selected" : ""}}>Applicants</option>
                     @foreach($departments as $department)
                        <option value="{{$department->department_id}}" {{$exam->department_id==$department->department_id ? "selected" : ""}}>{{$department->department}}</option>
                     @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Exam Title</label>
                     <input type="text" name="exam_title" id="exam_title" placeholder="Enter Exam Title" value="{{$exam->exam_title}}" required>
                  </div>
               </div>
               <div class="col-md-12">
                    <div class="form-group">
                     <label>Exam Title</label>
                     <input type="text" name="exam_title" id="exam_title" placeholder="Enter Exam Title" value="{{$exam->exam_title}}" required>
                  </div>
               </div>
                <div class="col-md-6">
                   <div class="form-group">
                     <label>Duration In Minutes</label>
                     <input type="number" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" value="{{$exam->duration_in_minutes}}" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <label>Status</label>
                     <select name="status">
                        <option value="Active" {{$exam->status=="Active" ? "selected" : ""}}>Active</option>
                        <option value="Inactive" {{$exam->status=="Inactive" ? "selected" : ""}}>Inactive</option>
                     </select>
                  </div>
               </div>
                <div class="col-md-6">
                   <div class="form-group">
                     <label>Passing Mark</label>
                     <input type="text" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" value="{{$exam->passing_mark}}" required>
                  </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                     <label>Remarks</label>
                     <textarea style="width: 100%;" rows="3" name="remarks" id="remarks" placeholder="Enter Remarks">{{$exam->remarks}}</textarea>
                  </div>
                 </div>
                 
                  
                  
                  
                <div style="font-size: 8pt; padding-right: 5%;float: right;">
               <i>Last modified: <b>{{ $exam->updated_at }} </b> -{{ $exam->last_modified_by }} </i>
               </div>
               </div>
               <div class="modal-footer" style="margin-top: -25px;">
                    <button type="submit" class="btn btn-primary" id="updateExam"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               
         </div>
         <!-- Modal footer -->
      </div>
      </form>
   </div>
</div>