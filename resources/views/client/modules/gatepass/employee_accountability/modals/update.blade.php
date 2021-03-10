<div class="modal fade" id="updatemodal">
   <div class="modal-dialog" style="width:720px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Issued Item</h4>
         </div>
         <div class="modal-body">
            <form action="/addAsset" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-12" align="center">
                    <div class="form-group">
                     <label>Category:</label>
                          
                           <input type="text" id="updatecategory" class="updatecategory" name="updatecategory" style="width: 150px;" placeholder="updatecategory">
                           <br>
                           <label>Item Code:</label>
   
                                
                           <input type="text" id="updateitemcode" class="updateitemcode" name="updateitemcode" style="width: 150px;" placeholder="updateitemcode">      
                     </div>
                  </div>

                  <div class="col-sm-6" style="padding-top: 10px">
                     <div class="form-group">
                        <label style="width: 44%;">Item Classification:</label>
                        <input type="text" id="updateitem_category" class="updateitem_category" name="updateitem_category" style="width: 150px;" placeholder="Item Classification">
                     </div>
                     <div class="form-group">
                        <label style="width: 44%;">Name:</label>
                        <input type="text" id="updatename" class="updatename" name="updatename" style="width: 150px;" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <label style="width: 44%;">Description:</label>
                        <input type="text" id="updatedescc" class="updatedescc" name="updatedescc" style="width: 150px;" placeholder="Description">
                     </div>
                     <div class="form-group">
                        <label style="width: 44%;">Purchase Date:</label>
                        <input type="text" id="updatepurchase_date" class="updatepurchase_date" name="updatepurchase_date" style="width: 150px;" placeholder="Purchase Date">
                     </div>
                     <div class="form-group">
                        <label style="width: 44%;">Purchase Order No:</label>
                        <input type="text" id="updatepurchase_order" class="updatepurchase_order" name="updatepurchase_order" style="width: 150px;" placeholder="Purchase Order No">
                     </div>
                     <div class="form-group">
                        <label style="width: 44%;">Status:</label>
                        <input type="text" id="updatestatus" class="updatestatus" name="updatestatus" style="width: 150px;" placeholder="Status">
                     </div>
                    


                  </div>
                  <div class="col-sm-6" style="padding-top: 10px">
                     <div class="form-group">
                        <label style="width: 44%;">Qty:</label>
                        <input type="text" id="updateqty" name="updateqty" style="width: 150px;" placeholder="Qty">
                     </div>
                     <div class="form-group" id="brand">
                        <label style="width: 44%;">Brand:</label>
                        <input type="text" id="updatebrand" name="updatebrand" style="width: 150px;" placeholder="Brand">
                     </div>
                     
                     <div class="form-group" id="model">
                        <label style="width: 44%;">Model:</label>
                        <input type="text" id="updatemodel" name="updatemodel" style="width: 150px;" placeholder="Model">
                     </div>

                     <div class="form-group" id="mc">
                        <label style="width: 44%;">Mc Address:</label>
                        <input type="text" id="updatemcaddress" name="updatemcaddress" style="width: 150px;" placeholder="Mc Address">
                     </div>
                     <div class="form-group" id="serial">
                        <label style="width: 44%;">Serial No:</label>
                        <input type="text" id="updateserial_no" name="updateserial_no" style="width: 150px;" placeholder="Serial No">
                     </div>
                      
                      <div class="form-group" id="plate">
                        <label style="width: 44%;">Plate No:</label>
                        <input type="text" id="updateplate" name="updateplate" style="width: 150px;" placeholder="Plate No.">
                     </div>

                     
                  </div>
                  <div class="col-sm-12" style="padding-top: 10px">
                     <label style="width: 30%;">Issued to:</label>
                     <select name="updateissued_to" style="width: 260px;" required>
                        <option value=""></option>
                        @foreach($user as $users)                                     
                        <option value="{{$users->user_id }}"> 
                           {{$users->employee_name }} </option>
                        @endforeach      
                     </select>
                   <input type="hidden" name="issued_by" value="{{ Auth::user()->user_id }}"/>
                  </div>
                  <div class="col-sm-12" style="padding-top: 10px">
                     <label style="width: 30%;">Image:</label>
                     <div class="fileUpload btn btn-primary">
                       <i class="fa fa-folder-open-o"></i>
                        <span>Browse..</span>
                        <input type="file" class="upload" multiple="" id="selectedFiles" name="imageFile[]" />
                     </div>
                  </div>
                  
               </div>
            </div>

          

            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-check"></i> Submit</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
