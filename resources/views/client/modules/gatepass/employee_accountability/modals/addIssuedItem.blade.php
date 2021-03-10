<div class="modal fade" id="addAsset" role="dialog" aria-hidden="true">
   <div class="modal-dialog" style="width:720px;height: 300px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Issued Item</h4>
         </div>
         <div class="modal-body">
            <form action="/addAsset" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="row" style="margin: 2px; padding-top:0;padding-bottom: 0;">
                  <div class="col-sm-12" align="center">
                    <div class="form-group">
                     <label style="width: 30%;">Issued to:</label>
                        <select name="issued_to" style="width: 260px;" required>
                           <option value=""></option>
                           @foreach($user as $users)                                     
                           <option value="{{$users->user_id }}"> 
                                 {{$users->employee_name }} </option>
                           @endforeach      
                        </select>
                        <input type="hidden" name="issued_by" value="{{ Auth::user()->user_id }}"/>
                        <input type="hidden" name="issued_by_name" value="{{ Auth::user()->employee_name }}"/>
                        <label style="width: 30%;">Category:</label>
                           <select name="category" style="width: 260px;" id="category" 
                           onchange="function_one()" >
                                 <option value=""></option>
                                 <option value="tabAsset">Fix Asset</option>
                                 <option value="tabItem">Item</option>

                                 
                           </select>
                           <br>
                           <label style="width: 30%;">Item Code:</label>
                           <select name="item_code" style="width: 260px;"  id="itemcode" 
                           onchange="function_imei()" class="clearme">
                           <option value=""></option>
                           </select>
                           <!-- <select name="item_code" style="width: 260px;" id="itemcode" 
                           onchange="function_imei()">
                                 <option value="">Select</option>  
                           </select> -->
                     </div>
                  </div>
                  <h5>Item Details</h5>
                  <hr>
                  <div  class="col-sm-12">
                     <div class="col-sm-4 imgUp"  style="margin-left: 0px;">
                           <div class="imagePreview"></div>
                              <label class="btn btn-primary" style="width: 150px;height: 45px;">
                               Upload<input type="file" class="uploadFile img" id="selectedFiles" name="imageFile[]" style="width: 0px;height: 0px;overflow: hidden;">
                           </label>
                     </div>
                     <div class="col-sm-8" style=" padding-bottom: 10px;line-height: 15px;">
                        <div>
                        <label>Name:</label>
                        <input type="text" id="name" class="clearme" name="name" style="width: 50%;border: 0px none;font-weight: 50%;" placeholder="Name" readonly>
                        </div>
                        <div style="line-height: 15px;">
                        <label>Item Classification:</label>
                        <input type="text" id="item_category" class="clearme" name="item_category" style="width: 50%;border: 0px none;" placeholder="Item Classification" readonly>
                        </div>
                     </div>
                     <div  class="col-sm-5" style="line-height: 10px;">
                        <label>Description:</label>
                        <!-- <input type="text" id="desc" class="clearme" name="desc" style="width: 100%;border: 0px none;" placeholder="Description" readonly> -->
                        <textarea id="desc" class="clearme" name="desc" style="width: 80%;border: 0px none;resize: none;" placeholder="Description" readonly></textarea>
                     </div>
                     <div  class="col-sm-3" style="line-height: 25px;">
                        
                           <label style="width: 20%;">Qty:</label>
                           <input type="text" class="clearme" id="qty" name="qty" style="width: 80px;" placeholder="Qty" required>
                     </div>
                     <div class="col-sm-4" style="line-height: 15px;float: left;">
                        
                        <label>Purchase Date:</label>
                        <input type="text" id="purchase_date" class="clearme" name="purchase_date" style="width: 50%;border: 0px none;" placeholder="Purchase Date" readonly>
                        
                     </div>
                     <div class="col-sm-4" style="line-height: 15px;">
                        <label>Purchase Order No:</label>
                        <input type="text" id="purchase_order" class="clearme" name="purchase_order" style="width: 50%;border: 0px none;" placeholder="P.O no." readonly>
                     </div>
                     <div class="col-sm-6" style="line-height: 20px;">
                        <label>Status:</label>
                        <input type="text" id="status" class="clearme" name="status" style="width: 50%;border: 0px none;" placeholder="Status" readonly>
                     </div>
                  </div>

                  <br>
                  <h5 style="margin-left: 0px;">Additional Details</h5>
                  <hr>
                  <div class="col-sm-6">
                     
                     <div class="brandu" id="brandd" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Brand:</label>
                        <input type="text" class="clearme" id="brand" name="brand" style="width: 150px;" placeholder="Brand">
                     </div>
                     
                     <div class="modelu" id="modeld" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Model:</label>
                        <input type="text" class="clearme" id="model" name="model" style="width: 150px;" placeholder="Model">
                     </div>

                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Color:</label>
                        <input type="text" class="clearme" id="color" name="color" style="width: 150px;" placeholder="Color">
                     </div>

                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Engine no.:</label>
                        <input type="text" class="clearme" id="engine" name="engine" style="width: 150px;" placeholder="Engine No.">
                     </div>
                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Chasis no.:</label>
                        <input type="text" class="clearme" id="chasis" name="chasis" style="width: 150px;" placeholder="Chasis No.">
                     </div>

                  </div>
                  <div class="col-sm-6" >
                     <div class="mcu" id="mcd"  style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Mc Address:</label>
                        <input type="text" class="clearme" id="mcaddress" name="mcaddress" style="width: 150px;" placeholder="Mc Address">
                     </div>
                     <div class="serialu" id="seriald" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Serial No:</label>
                        <input type="text" class="clearme" id="serial_no" name="serial_no" style="width: 150px;" placeholder="Serial No">
                     </div>
                      
                      <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Plate No:</label>
                        <input type="text" class="clearme" id="plate" name="plate" style="width: 150px;" placeholder="Plate No.">
                     </div>

                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">Driver License No.:</label>
                        <input type="text" class="clearme" id="dln" name="dln" style="width: 150px;" placeholder="Driver License No.">
                     </div>
                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">DL Type:</label>
                        <input type="text" class="clearme" id="dl_type" name="dl_type" style="width: 150px;" placeholder="DL Type">
                     </div>
                     <div class="plateu" id="plated" style="line-height: 25px;">
                        <label style="width: 44%;line-height: 35px;">RC No.:</label>
                        <input type="text" class="clearme" id="rc_no" name="rc_no" style="width: 150px;" placeholder="RC No.">
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

