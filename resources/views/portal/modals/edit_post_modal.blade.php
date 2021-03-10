<!-- The Modal -->
<div class="modal fade" id="editPostModal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Post</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method="POST" action="/updatePost" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="original_post_title" class="original_post_title">
               <input type="hidden" name="original_post_content" class="original_post_content">
               <input type="hidden" name="original_post_image" class="original_post_image">
               <input type="hidden" name="post_id" class="post_id">
               <div class="col-sm-12">
                  <div class="fileUpload btn btn-primary">
            <i class="fa fa-folder-open-o"></i>
            <span>Browse..</span>
            <input type="file" class="upload" name="featuredImage"/>
          </div>
        
          
                  <div class="form-group">
                     <label>Title:</label>
                     <input type="text" class="form-control post_title" name="post_title" placeholder="Post Title" " required>
                  </div>
                  <div class="form-group">
                     <label>Content:</label>
                     <textarea name="post_content" class="form-control post_content ckeditor" rows="20" required></textarea>
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