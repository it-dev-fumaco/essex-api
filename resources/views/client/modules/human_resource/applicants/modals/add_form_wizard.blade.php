<div class="modal fade" id="add-applicant-modal">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Applicant Registration Wizard</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 multi_step_form" style="margin-top: -60px;">
            <div id="msform" style="margin-top: -30px;">
              <ul id="progressbar">
                <li class="active">Register Applicant</li>
                <li>Register Exam</li>
                <li>Applicant Detail(s)</li>
              </ul>

              <fieldset id="register-applicant-fs" style="margin-top: -30px;">
                <form id="register-applicant-frm" autocomplete="off" style="text-align: left !important;">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Applicant Name:</label>
                        <input type="text" class="form-control1 req" name="employee_name" placeholder="Enter Applicant Name" required>
                      </div>
                      <div class="form-group">
                        <label>Nickname:</label>
                        <input type="text" class="form-control1 req" name="nickname" placeholder="Enter Nickname" required>
                      </div>
                      <div class="form-group" id="datepairExample" style="position: relative; z-index: 100000 !important;">
                        <label>Birthdate:</label>
                        <input type="text" class="form-control1 req date" name="birthdate" placeholder="Enter Birthdate" required>
                      </div>
                      <div class="form-group">
                        <label>Contact No.:</label>
                        <input type="text" class="form-control1 req" name="contact_no" placeholder="Contact No." required>
                      </div>
                      <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control1 req" name="address" placeholder="Enter Address" required></textarea>
                      </div>
                      <div class="form-group">
                          <label>Gender:</label>
                          <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Civil Status:</label>
                        <select class="form-control1 req" name="civil_status" required>
                          <option value="">Select Civil Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>SSS No.:</label>
                        <input type="text" class="form-control1" name="sss_no" placeholder="Enter SSS No.">
                      </div>
                      <div class="form-group">
                        <label>TIN No.:</label>
                        <input type="text" class="form-control1" name="tin_no" placeholder="Enter TIN No.">
                      </div>
                       <div class="form-group">
                        <label>Job Source:</label>
                        <select name="job_source" required class="form-control1 req">
                          <option value="">Select Job Source</option>
                          <option value="Jobstreet">Jobstreet</option>
                          <option value="Indeed">Indeed</option>
                          <option value="Walk-in">Walk-in</option>
                          <option value="Referrals">Referrals</option>
                          <option value="LinkedIn">LinkedIn</option>
                          <option value="Others">Others</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Position applied for (1st choice):</label>
                        <select class="form-control1 req" name="position_applied_for1" required>
                          <option value="">Select 1st Choice</option>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}">{{ $row->designation }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Position applied for (2nd choice):</label>
                        <select class="form-control1 req" name="position_applied_for2" required>
                          <option value="">Select 2nd Choice</option>
                          @foreach($designation_list as $row)
                          <option value="{{ $row->des_id }}">{{ $row->designation }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
                  <button type="button" class="next action-button">Continue</button>
              </fieldset>

              <fieldset id="register-exams-fs">
                <form id="register-exams-frm" style="text-align: left !important;">
                  <input type="hidden" class="applicant_id" name="applicant_id">
                  <div class="row">
                    <div class="col-sm-12" id="datepairExample" style="position: relative; z-index: 100000 !important;">
                      <div class="pull-right">
                        <button type="button" class="btn btn-primary add-new">
                          <i class="fa fa-plus"></i> Add
                        </button>
                      </div>
                      <table class="table" id="exams-table">
                        <col width="50%">
                        <col width="20%">
                        <col width="20%">
                        <col width="10%">
                        <thead>
                          <tr>
                            <th style="width: 50%;">Exam Title</th>
                            <th style="width: 20%;">Exam Date</th>
                            <th style="width: 20%;">Validity Date</th>
                            <th style="width: 10%;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
                <button type="button" class="action-button previous previous_button">Back</button>
                <button type="button" class="next action-button">Finish</button>
              </fieldset>
       
              <fieldset id="applicant-exam-details-fs" style="padding:2% 7%;">
                <div class="row" style="font-size: 11pt; text-align: left !important;">
                  <div class="col-md-4">Applicant Name:</div>
                  <div class="col-md-8" style="font-weight: bold;">
                    <span class="applicant-name"></span>
                  </div>
                  <div class="col-md-4">Position applied for (1st choice):</div>
                  <div class="col-md-8" style="font-weight: bold;">
                    <span class="position-1"></span>
                  </div>
                  <div class="col-md-4">Position applied for (2nd choice):</div>
                  <div class="col-md-8" style="font-weight: bold;">
                    <span class="position-2"></span>
                  </div>
                </div>
                <table class="table">
                  <col width="40%">
                  <col width="20%">
                  <col width="20%">
                  <col width="20%">
                  <thead>
                    <tr>
                      <th>Exam Title</th>
                      <th>Exam Code</th>
                      <th>Exam Date</th>
                      <th>Validity Date</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
                <button type="button" class="action-button" data-dismiss="modal">Close</button>
              </fieldset>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>