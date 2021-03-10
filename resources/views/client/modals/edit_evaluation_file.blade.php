<div class="modal fade" id="edit-evaluation-file-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Evaluation</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-left: 8px; margin-right: 8px;">
          <form id="edit-evaluation-file-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" class="id">
            <input type="hidden" name="eval_file" class="eval-file">
            <div class="col-md-12" style="padding-bottom: 2%;">
              <label style="display: block;">Evaluation Title</label>
              <input type="text" name="title" style="width: 100%; height: 35px;" placeholder="Evaluation Title" class="title">
            </div>
            <div class="col-md-6" style="padding-bottom: 2%;">
              <label style="display: block;">Employee</label>
              <select style="width: 100%; height: 35px;" class="employee" name="employee_id" required>
                <option value="">Select Employee</option>
                @forelse($employees as $employee)
                <option value="{{ $employee->user_id }}">{{ $employee->employee_name }}</option>
                @empty
                <option>No records found.</option>
                @endforelse
              </select>
            </div>
            <div class="col-md-6" style="padding-bottom: 2%;" id="datepairExample">
              <label style="display: block;">Evaluation Date</label>
              <input type="text" name="evaluation_date" style="width: 100%; height: 35px;" class="eval-date date" placeholder="Evaluation Date" autocomplete="off">
            </div>
            <div class="col-md-6">
              <div style="padding: 10% 0 0 0;">
              {{-- <div class="fileUpload btn btn-primary"> --}}
                {{-- <i class="fa fa-folder-open-o"></i><span>Browse..</span> --}}

                <input type="file" class="upload" name="evaluation_file" />
              {{-- </div> --}}</div>
            </div>
            <div class="col-md-6">
              <label style="display: block;">Remarks</label>
              <textarea style="width: 100%; resize: none;" rows="3" name="remarks" class="remarks"></textarea>
            </div>
            <div style="font-size: 8pt;float: right;padding-right: 2%;">
               <i>Last modified: <b><label class="modified_date" style="font-size: 8pt;"></label> </b> -<label class="modified_name" style="font-size: 8pt;"></label> </i>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div></form>
      </div>
   </div>
</div>
<style type="text/css">
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 0;
    cursor: pointer;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>