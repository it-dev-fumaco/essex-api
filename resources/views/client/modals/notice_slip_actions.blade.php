<!-- The Modal -->
<div class="modal fade" id="actionNoticeModal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <!--  -->
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Absent Notice Details</h4>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="action-notice-form">
               @csrf
               
               <div class="col-md-12">
                  <div class="pull-ri1ght">
                     <span>Action*</span>
                     <select style="width: 170px;" name="status" class="status">
                        <option value="FOR APPROVAL">For Approval</option>
                        <option value="APPROVED">Approved</option>
                        <option value="DISAPPROVED">Disapproved</option>
                        <option value="CANCELLED">Cancelled</option>
                        <option value="DEFERRED">Deferred</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
            <dl class="row">
              <dt class="col-sm-4">Employee Name:</dt>
              <dd class="col-sm-8 employee_name"></dd>
              <br>
              <dt class="col-sm-4">Department:</dt>
              <dd class="col-sm-8 department"></dd>
              <br>
              <dt class="col-sm-4">Type of Absence:</dt>
              <dd class="col-sm-8 leave_type"></dd>
              <br>
              <dt class="col-sm-4">From - To:</dt>
              <dd class="col-sm-8"><span class="date_from_txt"></span> — <span class="date_to_txt"></span></dd>
              <br>
              <dt class="col-sm-4">Reported through:</dt>
              <dd class="col-sm-8 means"></dd>
              <br>
              <dt class="col-sm-4">Reason:</dt>
              <dd class="col-sm-8 reason"></dd>
              <br>
              <dt class="col-sm-4">Approved by:</dt>
              <dd class="col-sm-8"></dd>
            </dl>
          </div>
          <div class="col-sm-6">
            <dl class="row">
              <dt class="col-sm-4">Notice ID:</dt>
              <dd class="col-sm-8 notice_id_txt"></dd>
              <br>
              <dt class="col-sm-4">Status:</dt>
              <dd class="col-sm-8 status_txt"></dd>
              <br>
              <dt class="col-sm-4">Date Filed:</dt>
              <dd class="col-sm-8 date_filed"></dd>
              <br>
              <dt class="col-sm-4">Time:</dt>
              <dd class="col-sm-8"><span class="time_from"></span> — <span class="time_to"></span></dd>
              <br>
              <dt class="col-sm-4">Received by:</dt>
              <dd class="col-sm-8 info_by"></dd>
              <br>
              <dt class="col-sm-4">Remarks:</dt>
              <dd class="col-sm-8"><textarea name="remarks" cols="30" rows="4" class="remarks"></textarea></dd>
            </dl>
            <input type="hidden" name="notice_id" class="notice_id">
            <input type="hidden" name="user_id" class="user_id">
            <input type="hidden" name="leave_type" class="leave_type_id">
            <input type="hidden" name="date_from" class="date_from">
            <input type="hidden" name="date_to" class="date_to">
            <input type="hidden" name="approved_by" value="{{ Auth::user()->user_id }}">
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