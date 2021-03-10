<div class="modal fade" id="edit-applicant-{{ $applicant->id }}">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Applicant</h4>
         </div>
         <div class="modal-body">
            <form action="/client/applicant/update/{{$applicant->id}}" method="POST">
               @csrf
               <div class="row" style="margin: 7px;">
                  <div class="col-sm-6" style="margin-top: -30px;">
                     <div class="form-group">
                        <label>Employee Name:</label>
                        <input type="text" name="employee_name" value="{{ $applicant->employee_name }}" placeholder="Enter Employee Name">
                     </div>
                     <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" name="nickname" value="{{ $applicant->nick_name }}" placeholder="Enter Nickname">
                     </div>
                     <div class="form-group" id="datepairExample">
                        <label>Birthdate:</label>
                        <input type="text" class="date" name="birthdate" placeholder="Enter Birthdate" value="{{ $applicant->birth_date }}" required autocomplete="off">
                      </div>
                     <div class="form-group">
                        <label>Contact No.:</label>
                        <input type="text" name="contact_no" value="{{ $applicant->contact_no }}" placeholder="Contact No.">
                     </div>
                     <div class="form-group">
                        <label>Address:</label>
                        <textarea name="address" placeholder="Enter Address">{{ $applicant->address }}</textarea>
                     </div>
                     <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" required>
                           <option value="">Select Gender</option>
                           <option value='Male' {{ $applicant->gender == 'Male' ? 'selected' : '' }}>Male</option>
                           <option value='Female' {{ $applicant->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6" style="margin-top: -30px;">
                     <div class="form-group">
                        <label>Civil Status:</label>
                        <select name="civil_status">
                           <option value="" disabled>Select Civil Status</option>
                           <option value="Single" {{ $applicant->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                           <option value="Married" {{ $applicant->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                           <option value="Widowed" {{ $applicant->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>SSS No.:</label>
                        <input type="text" name="sss_no" value="{{ $applicant->sss_no }}" placeholder="Enter SSS No.">
                     </div>
                     <div class="form-group">
                        <label>TIN No.:</label>
                        <input type="text" name="tin_no" value="{{ $applicant->tin_no }}" placeholder="Enter TIN No.">
                     </div>
                      <div class="form-group">
                        <label>Job Source:</label>
                        <select name="job_source" required>
                          <option value="Jobstreet" {{ $applicant->job_source == 'Jobstreet' ? 'selected' : '' }}>Jobstreet</option>
                          <option value="Indeed" {{ $applicant->job_source == 'Indeed' ? 'selected' : '' }}>Indeed</option>
                          <option value="Walk-in" {{ $applicant->job_source == 'Walk-in' ? 'selected' : '' }}>Walk-in</option>
                          <option value="Referrals" {{ $applicant->job_source == 'Referrals' ? 'selected' : '' }}>Referrals</option>
                          <option value="LinkedIn" {{ $applicant->job_source == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                          <option value="Others" {{ $applicant->job_source == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                      </div>

                     <div class="form-group">
                        <label>Position applied for (1st choice):</label>
                        <select name="position_applied_for1" required>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}" {{ $applicant->position_applied_for1 == $row->des_id ? 'selected' : '' }}>{{ $row->designation }}</option>
                          @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Position applied for (2nd choice):</label>
                        <select name="position_applied_for2" required>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}" {{ $applicant->position_applied_for2 == $row->des_id ? 'selected' : '' }}>{{ $row->designation }}</option>
                          @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="font-size: 8pt;float: right;padding-right: 5%; padding-top: 10px;">
                    <i>Last modified: <b><label class="modified_date" style="font-size: 8pt;">{{ $applicant->updated_at }}</label> </b> -<label class="modified_name" style="font-size: 8pt;">{{ $applicant->last_modified_by }}</label> </i>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="margin-top: -30px;">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
