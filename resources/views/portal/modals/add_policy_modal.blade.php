<!-- The Modal -->
<div class="modal fade" id="addPolicyModal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Policy</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method="POST" action="/addPolicy" enctype="multipart/form-data">
               @csrf
               <div class="col-sm-12">
                 {{--  <div class="fileUpload btn btn-primary">
            <i class="fa fa-folder-open-o"></i>
            <span>Browse..</span>
            <input type="file" class="upl1oad" name="file_attachment"/>
          </div> --}}
          <input class="form-contr1ol" type="file" name="file_attachment">
                <div class="form-group">
                     <label>Department:</label>
                     @if(isset($department_list))
                     <select class="form-control" name="department" required>
                        <option value="0">All Department(s)</option>
                        @forelse($department_list as $department)
                        <option value="{{ $department->department_id }}">{{ $department->department }}</option>
                        @empty
                        <option>No Departments Found.</option>
                        @endforelse
                     </select>
                     @endif
                  </div>
                  <div class="form-group">
                     <label>Title:</label>
                     <input type="text" class="form-control" name="subject" placeholder="Subject" " required>
                  </div>
                  <div class="form-group">
                     <label>Content:</label>
                     <textarea name="description" class="form-control ckeditor" rows="20" placeholder="Description" required></textarea>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>
<style type="text/css">
     .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
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