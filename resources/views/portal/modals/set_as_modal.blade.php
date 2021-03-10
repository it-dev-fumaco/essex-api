<!-- The Modal -->
<div class="modal fade" id="setImageAsModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Set As</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
              <form action="/setAsFeatured" method="POST">
               @csrf
               <input type="hidden" name="album_id" class="album_id">
               <input type="hidden" name="image_path" class="image_path">
               <div class="col-sm-12">
                  <p style="font-size: 12pt;">Set as feature image for album <b><span class="album_name"></span></b>?</p>
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Set</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>