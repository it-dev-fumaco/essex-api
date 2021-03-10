<!-- The Modal -->
<div class="modal fade" id="editGatepassModal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Gatepass Details</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="edit-gatepass-form">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                  <input type="hidden" name="gatepass_id" class="gatepass_id">
                  <div class="col-md-12" id="datepairExample">
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Date*</span>
                           <input type="text" style="width: 220px;" name="date_filed" class="date_filed date">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; height: 50px;">
                        <span style="font-style: italic; line-height: 30px;">If not connected to FUMACO Inc.</span>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Returned on*</span>
                           <input type="text" style="width: 220px;" name="returned_on" class="returned_on date">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 10%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Company Name*</span>
                           <input type="text" style="width: 220px;" name="company_name" class="company_name">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Time*</span>               
                           <select style="width: 220px;" name="time" class="time">
                              <option></option>
                              <option value="07:00:00">7:00 AM</option>
                              <option value="08:00:00">8:00 AM</option>
                              <option value="09:00:00">9:00 AM</option>
                              <option value="10:00:00">10:00 AM</option>
                              <option value="11:00:00">11:00 AM</option>
                              <option value="12:00:00">12:00 PM</option>
                              <option disabled>---------</option>
                              <option value="13:00:00">1:00 PM</option>
                              <option value="14:00:00">2:00 PM</option>
                              <option value="15:00:00">3:00 PM</option>
                              <option value="16:00:00">4:00 PM</option>
                              <option value="17:00:00">5:00 PM</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 10%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Address*</span>
                           <input type="text" style="width: 220px;" name="address" class="address">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Purpose*</span>
                           <input type="text" style="width: 220px;" name="purpose" class="purpose">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 10%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Tel. No.*</span>
                           <input type="text" style="width: 220px;" name="tel_no" class="tel_no">
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%;">
                        <div class="pull-right">
                           <span style="font-style: italic;vertical-align: top;">Item(s)*</span>
                           <textarea name="item_description" rows="4" cols="28" class="item_description"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-6" style="padding:1%; padding-right: 10%;">
                        <div class="pull-right">
                           <span style="font-style: italic;vertical-align: top;">Remarks*</span>
                           <textarea name="remarks" rows="4" cols="28" class="remarks"></textarea>
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%; height: 50px;">
                        <div class="pull-right">
                           <span style="font-style: italic;">Item Type*</span>
                           <select style="width: 220px;" name="item_type" class="item_type">
                              <option value="Returnable">Returnable</option>
                              <option value="Unreturnable">Unreturnable</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6" style="padding: 1%; padding-right: 5%;">
                        <div style="margin-left: 100px;">
                           <div class="status"></div>
                           <div style="padding: 10px 15px 0 5px; display: block;" class="divStatus" hidden><span>Approved by:</span> <span class="approved_by" style="font-weight: bold;"></span></div>
                           <div style="padding: 5px 15px 0 5px; display: block;" class="divStatus" hidden><span>Date approved:</span> <span class="date_approved" style="font-weight: bold;"></span></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" id="print-gatepass"><i class="fa fa-print"></i></i>Print</button>
         <button type="button" class="btn btn-warning" id="cancel-gatepass"><i class="fa fa-ban"></i></i>Cancel Gatepass</button>
         <button type="submit" class="btn btn-primary" id="update-gatepass"><i class="fa fa-check"></i>Update</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
      </div>
      </form>

    </div>
  </div>
</div>

