<div class="modal fade" id="addItem">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Issue Item</h4>
         </div>
         <div class="modal-body">
            <form action="/addItem" method="POST">
            @csrf
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-12" align="center">
                    <div class="form-group">
                           <label>Class:</label>
                           <select name="itemclass" style="width: 260px;" required>
                                 <option value="">Select Classification</option>
                                 <option value="Mobile Phone">Mobile Phone</option>
                                 <option value="Laptop">Laptop</option>
                                 <option value="Tablet">Tablet</option>
                                 <option value="Vehicle">Vehicle</option>
                           </select>
                     </div>
                  </div>
                  <div class="col-sm-6" style="padding-top: 10px">
                      
                     <div class="form-group">
                        <label style="width: 30%;">Item Code:</label>
                        <input type="text" name="item_code" style="width: 150px;" value="" placeholder="Item Code" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Item Category:</label>
                        <input type="text" name="brand" style="width: 150px;" placeholder="Item Category" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Item Name:</label>
                        <input type="text" name="brand" style="width: 150px;" placeholder="Item Name" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Item Description:</label>
                        <input type="text" name="brand" style="width: 150px;" placeholder="Item Description" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Purchase Date:</label>
                        <input type="text" name="brand" style="width: 150px;" placeholder="Purchase Date" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Brand:</label>
                        <input type="text" name="brand" style="width: 150px;" placeholder="Brand" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Qty:</label>
                        <input type="text" name="qty" style="width: 150px;" placeholder="Qty" required>
                     </div>
                  </div>
                  <div class="col-sm-6" style="padding-top: 10px">
                     <div class="form-group">
                        <label style="width: 30%;">Model:</label>
                        <input type="text" name="model" style="width: 150px;" placeholder="Model" required>
                     </div>
                     <div class="form-group">
                        <label style="width: 30%;">Serial No.:</label>
                        <input type="text" name="serial" style="width: 150px;" placeholder="Serial No." required>
                     </div>
                     <div class="form-group">
                        <label style="width: 40%;">Mc Address:</label>
                        <input type="text" name="mcaddress" style="width: 200px;" placeholder="Mc Address" required>
                     </div>
                     
                  </div>
                  <div class="col-sm-12" style="padding-top: 10px">
                     <label style="width: 30%;">Item Description:</label>
                   <textarea name="itemdesc" style="width: 250px;" placeholder="Mc Address">
                   </textarea>
                   <input type="hidden" name="issuedby" value="{{ Auth::user()->employee_name }}"/>
                   <input type="hidden" name="issuedbyid" value="{{ Auth::user()->user_id }}"/>
                   <input type="hidden" name="issuedto" value="{{-- $user_id --}}"/>
                     
                  </div>
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
