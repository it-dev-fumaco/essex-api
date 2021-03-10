<div class="modal fade" id="delete-assetlist-{{ $assets->id }}">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Item Asset</h4>
         </div>
         <div class="modal-body">
            <form action="/deleteAsset" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $assets->id }}">
               <input type="hidden" name="asset_code" value="{{ $assets->asset_code }}">
               <div class="row" style="margin-top: -3%;">
                  <div class="col-sm-12">
                     <span style="font-size: 12pt;">Delete Item Asset - <b>{{ $assets->asset_code }}</b> ?</span>
                  </div>               
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
               </div>
            </form>
          </div>
      </div>
   </div>
</div>