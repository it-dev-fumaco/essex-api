<!-- The Modal -->
<div class="modal fade" id="gatepassModal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Gatepass</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <div class="tabs-section">
                  @if(in_array($designation, ['Operations Manager', 'Human Resources Head', 'Director of Operations', 'President', 'Product Manager']))
                  <ul class="nav nav-tabs">
                     <li class="active"><a href="#tab-gatepass-form" data-toggle="tab">Gatepass Form</a></li>
                     <li><a href="#tab-item-accountability" data-toggle="tab">Item Accountability</a></li>
                  </ul>
                  @endif
                  <div class="tab-content">
                     <div class="tab-pane in active" id="tab-gatepass-form">
                        <div class="row">
                           <span style="font-size: 14pt; margin-left: 5%;">Create new gatepass</span>
                           <form id="add-gatepass-form">
                              @csrf
                              <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                              <div class="col-md-12" id="datepairExample" style="margin-top: 10px;">
                                 <table style="width: 100%;">
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%; width: 50%;">
                                          <span style="font-style: italic;">Date*</span>
                                          <input type="text" class="date" style="width: 220px;" name="date_filed" autocomplete="off">
                                       </td>
                                       <td style="width: 50%;"><span style="font-style: italic; line-height: 30px;">If not connected to FUMACO Inc.</span></td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;">
                                          <span style="font-style: italic;">Returned on*</span>
                                          <input type="text" style="width: 220px;" class="date" name="returned_on" autocomplete="off">
                                       </td>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Company Name*</span>
                                       <input type="text" style="width: 220px;" name="company_name"></td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Time*</span>               
                                       <select style="width: 220px;" name="time">
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
                                       </select></td>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Address*</span>
                                       <input type="text" style="width: 220px;" name="address"></td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Purpose Type*</span>
                                       <select style="width: 220px;" name="purpose_type" required>
                                          <option value=""></option>
                                          <option value="For Servicing">For Servicing</option>
                                          <option value="For Company Activity">For Company Activity</option>
                                          <option value="For Personal Use">For Personal Use</option>
                                          <option value="Others">Others</option>
                                       </select></td>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Tel. No.*</span>
                                       <input type="text" style="width: 220px;" name="tel_no"></td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;">Purpose*</span>
                                       <input type="text" style="width: 220px;" name="purpose"></td>
                                       <td rowspan="2" style="text-align: right; padding: 1% 5% 1% 1%; vertical-align: top"><span style="font-style: italic;vertical-align: top;">Item(s)*</span>
                                       <textarea name="item_description" rows="4" cols="28"></textarea></td>
                                    </tr>
                                    <tr>
                                       <td style="text-align: right; padding: 1% 5% 1% 1%;"><span style="font-style: italic;vertical-align: top;">Remarks*</span>
                                       <textarea name="remarks" rows="4" cols="28"></textarea></td>
                                    </tr>
                                 
                                 </table>
                              </div>
                              <div class="col-sm-12 center" style="margin-top: 2%;">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Request for Approval</button>
                              </div>
                           </form>
                        </div>
                     </div>
                        <div class="tab-pane" id="tab-item-accountability">
                           <div class="row">
                              <div class="col-sm-12" style="margin-top: 1%;">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>ID</th>
                                          <th>Item Code</th>
                                          <th>Description</th>
                                          <th>Qty</th>
                                          <th>Date Issued</th>
                                          <th>Issued by</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($emp_item_accountability as $row)
                                       <tr>
                                          <td>{{ $row->item_id }}</td>
                                          <td>{{ $row->item_code }}</td>
                                          <td>{{ $row->item_desc }}</td>
                                          <td>{{ $row->qty }}</td>
                                          <td>{{ $row->date_issued }}</td>
                                          <td>{{ $row->issued_by }}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                    
                                 </table>
                              </div>
                           </div>
                        </div>

                      
                     </div>
                  </div>



               
               
               
                  
               </div>
            </div>

    </div>
  </div>
</div>
