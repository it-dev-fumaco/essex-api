<!-- The Modal -->
<div class="modal fade editExamGroup" id="editExamGroup{{$examgroup->exam_group_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Exam Group</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_group_update')}}">
                  @csrf
               <div class="col-sm-12">
               <input type="text" name="exam_group_id" id="exam_group_id" value="{{$examgroup->exam_group_id}}" hidden="true">
                  <div class="form-group">
                     <label>Exam Group Description</label>
                     <input type="text" class="form-control" name="exam_group_description" id="exam_group_description" placeholder="Enter Exam Group Description" value="{{$examgroup->exam_group_description}}" required>
                  </div>
                  <div class="form-group">
                     <label>Remarks</label>
                     <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required>{{$examgroup->remarks}}</textarea>
                  </div>
               </div>
            </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveExamGroup"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" id="closeEditExamGroup" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>