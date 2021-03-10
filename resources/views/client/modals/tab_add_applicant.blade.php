<div class="modal fade" id="addApplicant">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Applicant</h4>
         </div>
         <div class="modal-body">
            <form action="/tabAddApplicant" method="POST">
            @csrf
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-6" style="margin-top: -30px;">
                     <div class="form-group">
                        <label>Applicant Name:</label>
                        <input type="text" name="employee_name" placeholder="Enter Applicant Name" required>
                     </div>
                     <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" name="nickname" placeholder="Enter Nickname" required>
                     </div>
                     <div class="form-group">
                        <label>Birthdate:</label>
                        <input type="date" name="birthdate" placeholder="Enter Birthdate" required>
                     </div>
                     <div class="form-group">
                        <label>Contact No.:</label>
                        <input type="text" name="contact_no" placeholder="Contact No." required>
                     </div>
                     <div class="form-group">
                        <label>Address:</label>
                        <textarea style="width: 100%;" name="address" placeholder="Enter Address" required></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6" style="margin-top: -30px;">
                     <div class="form-group">
                        <label>Civil Status:</label>
                        <select name="civil_status" required style="height: 35px;">
                           <option value="">Select Civil Status</option>
                           <option value="Single">Single</option>
                           <option value="Married">Married</option>
                           <option value="Widowed">Widowed</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" required>
                           <option value="">Select Gender</option>
                           <option value='Male'>Male</option>
                           <option value='Female'>Female</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>SSS No.:</label>
                        <input type="text" name="sss_no" placeholder="Enter SSS No.">
                     </div>
                     <div class="form-group">
                        <label>TIN No.:</label>
                        <input type="text" name="tin_no" placeholder="Enter TIN No.">
                     </div>
                     <div class="form-group">
                        <label>Position applied for (1st choice):</label>
                        <select name="position_applied_for1" required>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}">{{ $row->designation }}</option>
                          @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Position applied for (2nd choice):</label>
                        <select name="position_applied_for2" required>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}">{{ $row->designation }}</option>
                          @endforeach
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="margin-top: -20px;">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
