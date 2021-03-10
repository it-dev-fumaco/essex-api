<!-- The Modal -->
<div class="modal fade" id="actionGatepassModal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <!--  -->
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Gatepass Details</h4>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="action-gatepass-form">
               @csrf
               <input type="hidden" name="gatepass_id" class="gatepass_id">
               <div class="col-md-6" style="padding: 1% 7% 1% 5%;">
                  <div class="pull-right">
                     <span>Action*</span>
                     <select style="width: 220px;" name="status" class="status">
                        <option value="FOR APPROVAL">For Approval</option>
                        <option value="APPROVED">Approved</option>
                        <option value="CANCELLED">Cancelled</option>
                        <option value="DEFERRED">Deferred</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6" style="padding: 1% 7% 1% 5%;">
                 <div class="pull-right">
                     <span>Item Type*</span>
                     <select style="width: 220px;" name="item_type" class="item_type">
                        <option value="Returnable">Returnable</option>
                        <option value="Unreturnable">Unreturnable</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-7">
                  <dl class="row">
                    <dt class="col-sm-4">Gatepass ID:</dt>
                    <dd class="col-sm-8"><span class="gatepass_id_txt"></span></dd>
                    <br>
                    <dt class="col-sm-4">Employee Name:</dt>
                    <dd class="col-sm-8"><span class="employee_name"></span></dd>
                    <br>
                    <dt class="col-sm-4">Date Filed:</dt>
                    <dd class="col-sm-8"><span class="date_filed"></span></dd>
                    <br>
                    <dt class="col-sm-4">Time:</dt>
                    <dd class="col-sm-8"><span class="time"></span></dd>
                    <br>
                    <dt class="col-sm-4">Item(s):</dt>
                    <dd class="col-sm-8"><span class="item_description"></span></dd>
                    <br>
                    <dt class="col-sm-4">Purpose:</dt>
                    <dd class="col-sm-8"><span class="purpose"></span></dd>
                    <br>
                    <dt class="col-sm-4">Returned On:</dt>
                    <dd class="col-sm-8"><span class="returned_on"></span></dd>
                  </dl>
               </div>
               <div class="col-sm-5">
                  <dl class="row">
                     <dt class="col-sm-12"><i>If not connected to FUMACO Inc.</i></dt>
              <br>
              
              <dt class="col-sm-4">Company:</dt>
              <dd class="col-sm-8"><span class="company_name"></span></dd>
              <br>
              <dt class="col-sm-4">Address:</dt>
              <dd class="col-sm-8"><span class="address"></span></dd>
              <br>
              <dt class="col-sm-4">Tel. No.:</dt>
              <dd class="col-sm-8"><span class="tel_no"></span></dd>
              <br>
              <dt class="col-sm-4">Remarks:</dt>
              <dd class="col-sm-8"><span class="remarks"></span></dd>
              <br>
            </dl>

            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
            <input type="hidden" name="department" value="{{ Auth::user()->department_id }}">
          </div>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
      </div>
</form>
    </div>
  </div>
</div> 