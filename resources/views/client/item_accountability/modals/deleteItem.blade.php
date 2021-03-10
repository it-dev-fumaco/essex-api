<div class="modal fade" id="delete-itemlist-{{ $row->id }}">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Issued Item</h4>
         </div>
         <div class="modal-body">
            <form action="/deleteItem" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $row->id }}">
               <input type="hidden" name="item_code" value="{{ $row->item_code }}">
               <div class="row" style="margin-top: -3%;">
                  <div class="col-sm-12">
                     <span style="font-size: 12pt;">Delete Issued Item - <b>{{ $row->item_code }}</b> ?</span>
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