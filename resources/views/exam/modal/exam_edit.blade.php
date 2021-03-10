<!-- The Modal -->
<div class="modal fade" id="editExam{{$exam->exam_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_update')}}">
                  @csrf
                  <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden="true">
                  <div class="form-group col-md-6">
                     <label>Exam Group</label>
                     <select class="form-control" name="exam_group_id" class="form-control">
                     @foreach($examgroups as $examgroup)
                        <option value="{{$examgroup->exam_group_id}}" {{$exam->exam_group_id==$examgroup->exam_group_id ? "selected" : ""}}>{{$examgroup->exam_group_description}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Department</label>
                     <select class="form-control" name="department_id" class="form-control">
                     @foreach($departments as $department)
                        <option value="{{$department->department_id}}" {{$exam->department_id==$department->department_id ? "selected" : ""}}>{{$department->department}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label>Exam Title</label>
                     <input type="text" class="form-control" name="exam_title" id="exam_title" placeholder="Enter Exam Title" value="{{$exam->exam_title}}" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Duration In Minutes</label>
                     <input type="number" class="form-control" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" value="{{$exam->duration_in_minutes}}" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Status</label>
                     <select class="form-control" name="status" class="form-control">
                        <option value="Active" {{$exam->status=="Active" ? "selected" : ""}}>Active</option>
                        <option value="Inactive" {{$exam->status=="Inactive" ? "selected" : ""}}>Inactive</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Passing Mark</label>
                     <input type="text" class="form-control" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" value="{{$exam->passing_mark}}" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Remarks</label>
                     <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required>{{$exam->remarks}}</textarea>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="updateExam"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>