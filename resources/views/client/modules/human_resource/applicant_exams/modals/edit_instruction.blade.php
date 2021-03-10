<div class="modal fade" id="editInstruction{{ $e->exam_type_id }}">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Instruction for {{ $e->exam_type }}</h4>
         </div>
         <div class="modal-body">
            <form method='post' action="/client/hr/applicant_exams/insturctions/update" autocomplete="off">
               @csrf
               <input type="hidden" name="exam_type_id" value="{{ $e->exam_type_id }}">
               <input type="hidden" name="exam_type" value="{{ $e->exam_type }}">
               <div class="row" style="margin-top: -3%;">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Instructions</label>
                        <textarea name="instruction" class="form-control ckeditor" rows="1" required>{{ $e->instruction }}</textarea>
                     </div>
                  </div>
                  <div style="font-size: 8pt; padding-right: 3%;float: right;">
                    <i>Last modified: <b>{{ $e->updated_at }} </b> -{{ $e->last_modified_by }} </i>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>
