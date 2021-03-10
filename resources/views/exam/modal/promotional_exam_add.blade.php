<!-- The Modal -->
<div class="modal fade" id="addPromotionalExam">
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
               <form method='post' action="{{route('admin.promotional_exam_save')}}">
                  @csrf
                  <table style="width: 100%">
                     <tr>
                        <td>
                           <div class="form-group" style="padding: 10px">
                              <label>Exam Group</label>
                              <input type="hidden" name="exam_group_id" id="exam_group_id" value="{{$examgroup->exam_group_id}}">
                              <input type="text" name="exam_group_description" id="exam_group_description" class="form-control" value="{{$examgroup->exam_group_description}}" readonly>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" style="padding: 10px">
                              <label>Department</label>
                              <select class="form-control" name="department_id" id="department_id" class="form-control">
                              @foreach($departments as $department)
                                 <option value="{{$department->department_id}}">{{$department->department}}</option>
                              @endforeach
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <div class="form-group">
                              <label>Exam Title</label>
                              <input type="text" class="form-control" name="exam_title" id="exam_title" placeholder="Enter Exam Title" required>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="form-group" style="padding: 10px">
                              <label>Duration In Minutes</label>
                              <input type="number" class="form-control" name="duration_in_minutes" id="duration_in_minutes" placeholder="Enter Duration In Minutes" required>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" style="padding: 10px">
                              <label>Status</label>
                              <select class="form-control" name="status" id="status" class="form-control">
                                 <option value="Active">Active</option>
                                 <option value="Inactive">Inactive</option>
                              </select>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="form-group" style="padding: 10px">
                              <label>Passing Mark</label>
                              <input type="text" class="form-control" name="passing_mark" id="passing_mark" placeholder="Enter Passing Mark" required>
                           </div>
                           <td>
                              <div class="form-group" style="padding: 10px">
                                 <label>Remarks</label>
                                 <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required></textarea>
                              </div>
                           </td>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveExamGroup"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>