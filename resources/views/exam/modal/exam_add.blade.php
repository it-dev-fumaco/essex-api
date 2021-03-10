<!-- The Modal -->
<div class="modal fade" id="addExam">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Exam</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_save')}}" autocomplete="off">
                  @csrf
                  <div class="form-group col-sm-6">
                     <label>Exam Group</label>
                     <select class="form-control" name="exam_group_id" id="exam_group_id" class="form-control">
                     @foreach($examgroups as $examgroup)
                        <option value="{{$examgroup->exam_group_id}}">{{$examgroup->exam_group_description}}</option>
                     @endforeach
                     </select>
                  </div>

                  <div class="form-group col-sm-6">
                     <label>Department</label>
                     <select class="form-control" name="department_id" id="department_id" class="form-control">
                     @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department}}</option>
                     @endforeach
                     </select>
                  </div>

                  <div class="form-group col-sm-12">
                     <label>Exam Title</label>
                     <input type="text" class="form-control" name="exam_title" id="exam_title" placeholder="Enter Exam Title" required>
                  </div>

                  <div class="form-group col-sm-4">
                     <label>Status</label>
                     <select class="form-control" name="status" id="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                     </select>
                  </div>

                  <div class="form-group col-sm-4">
                     <label>Duration In Minutes</label>
                     <input type="number" class="form-control" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" required>
                  </div>

                  <div class="form-group col-sm-4">
                     <label>Passing Mark</label>
                     <input type="text" class="form-control" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" required>
                  </div>

                  <div class="form-group col-sm-12">
                     <label>Remarks</label>
                     <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required></textarea>
                  </div>

            </div>
                  
                  <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" id="saveExam"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>

<script type="text/javascript">
   $('#saveExam').click(function(){
      alert("I AM CLICKED!");
   });
</script>