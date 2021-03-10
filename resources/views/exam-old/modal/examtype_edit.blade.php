<!-- The Modal -->
<div class="modal fade" id="editExamType{{$examtype->exam_type_id}}">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Exam Type</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_type_update')}}">
                  @csrf
               <div class="col-sm-12">
               <input type="text" name="exam_type_id" id="exam_type_id" value="{{$examtype->exam_type_id}}" hidden="true">
                  <div class="form-group">
                     <label>Exam Type</label>
                     <input type="text" class="form-control" name="exam_type" id="exam_type" placeholder="Enter Exam Type" value='{{$examtype->exam_type}}' required>
                  </div>
                  <div class="form-group">
                     <label>Instructions</label>
                     <textarea type="text" class="form-control" name="instruction" id="instruction" placeholder="Enter Instructions" required>{{$examtype->instruction}}</textarea>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="editExamType"><i class="fa fa-check"></i> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>