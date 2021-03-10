<!-- The Modal -->
<div class="modal fade" id="addExamGroup">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Exam Group</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;"> {{-- method='post' action="{{route('admin.exam_group_save')}}"--}}
               <div id="examGroupErrors"></div>
               <form id="formAddExamGroup">
                  @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Exam Group Description</label>
                     <input type="text" class="form-control" name="exam_group_description" id="exam_group_description" placeholder="Enter Exam Group Description" required>
                  </div>
                  <div class="form-group">
                     <label>Remarks</label>
                     <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required></textarea>
                  </div>
               </div>
            </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveExamGroup"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" id="closeAddExamGroup" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>