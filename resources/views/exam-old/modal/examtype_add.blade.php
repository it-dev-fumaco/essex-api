<!-- The Modal -->
<div class="modal fade" id="addExamType">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Exam Type</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_type_save')}}">
                  @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Exam Type</label>
                     <input type="text" class="form-control" name="exam_type" id="exam_type" placeholder="Enter Exam Type" required>
                  </div>
                  <div class="form-group">
                     <label>Instructions</label>
                     <textarea class="form-control" name="instruction" id="instruction" placeholder="Enter Instructions" required></textarea>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveExamType"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>