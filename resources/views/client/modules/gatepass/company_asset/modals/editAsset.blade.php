<div class="modal fade" id="edit-assetlist-{{ $assets->id }}">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Item Asset</h4>
         </div>
         <div class="modal-body">
            <form action="/editAsset" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{ $assets->id }}">
                  <div class="row" style="margin: 7px;">
                  <div class="col-sm-12" align="center">
                    <div class="form-group">
                           <label>Classification:</label>
                           <select name="assetclass" style="width: 260px;" required>
                                 <option value="{{ $assets->assetclass }}">{{ $assets->assetclass }}</option>
                                 <option value="Mobile Phone">Mobile Phone</option>
                                 <option value="Laptop">Laptop</option>
                                 <option value="Tablet">Tablet</option>
                                 <option value="Vehicle">Vehicle</option>
                           </select>
                     </div>
                  </div>
                  <div class="col-sm-6" style="padding-top: 10px">
                     <div class="form-group">
                        <label style="width: 33%;">Status:</label>
                           <select name="status" style="width: 150px;" required>
                               
                                 <option>@if($assets->status = 'Active') Active
                                 @else( Returned ) @endif</option>
                                 <option>@if($assets->status = 'Returned') Returned
                                 @else( Active ) @endif</option>
                           </select>
                     </div>
                     <div class="form-group">
                        <label style="width: 33%;">Asset Code:</label>
                        <input type="text" name="asset_code" style="width: 150px;" value="{{ $assets->asset_code }}" placeholder="Asset Code" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 33%;">Brand:</label>
                        <input type="text" name="brand" style="width: 150px;" value="{{ $assets->brand }}" placeholder="Brand" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 33%;">Qty:</label>
                        <input type="text" name="qty" style="width: 150px;" value="{{ $assets->qty }}" placeholder="Qty" required>
                     </div>
                  </div>
                  <div class="col-sm-6" style="padding-top: 10px">
                     <div class="form-group">
                        <label style="width: 33%;">Model:</label>
                        <input type="text" name="model" style="width: 150px;" value="{{ $assets->model }}" placeholder="Model" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 33%;">Serial No.:</label>
                        <input type="text" name="serial" style="width: 150px;" value="{{ $assets->serial_no }}" placeholder="Serial No." required>
                     </div>
                     <div class="form-group">
                        <label style="width: 40%;">Mc Address:</label>
                        <input type="text" name="mcaddress" style="width: 200px;" value="{{ $assets->mcaddress }}" placeholder="Mc Address" required>
                     </div>
                     
                  </div>
                  <div class="col-sm-12" style="padding-top: 10px">
                     <label style="width: 30%;">Asset Description:</label>
                   <input type="text" name="assetdesc" style="width: 150px;" value="{{ $assets->asset_desc }}" placeholder="Mc Address">
                   <input type="hidden" name="issuedbyid" value="{{ Auth::user()->user_id }}"/>
                  </div>
                  <div class="col-sm-12" style="padding-top: 10px">
                     <label style="width: 30%;">Image:</label>
                     <div class="fileUpload btn btn-primary">
                       <i class="fa fa-folder-open-o"></i>
                        <span>Browse..</span>
                        <input type="file" class="upload" multiple="" id="selectedFiles" name="imageFile" />
                     </div>
                  </div>
                  <input type="hidden" name="filepathorig" value="{{ $assets->filepath }}">
               </div>   
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
