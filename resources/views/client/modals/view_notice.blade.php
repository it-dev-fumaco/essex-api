<!-- The Modal -->
<div class="modal fade" id="viewNoticeModal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Absent Notice Details</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <form id="manager-cancel-notice-frm">
            <div class="row" style="margin: 7px;">
               <div class="col-sm-6" style="margin-top: -25px;">
                 <input type="hidden" class="notice-id-val" name="notice_id">
                <input type="hidden" class="date-from-val" name="date_from">
                <input type="hidden" class="date-to-val" name="date_to">
                <input type="hidden" class="leave-type-id-val" name="leave_type">
                <input type="hidden" class="user-id-val" name="user_id">
                  <table style="width: 100%; margin-left: 50px;" class="left-table">
                     <tr>
                        <td class="row-label">Employee Name:</td>
                        <td><span class="employee-name"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Department:</td>
                        <td><span class="department"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Type of Absence:</td>
                        <td><span class="leave-type"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">From - To:</td>
                        <td><span class="date-from"></span> - <span class="date-to"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Time:</td>
                        <td><span class="time-from"></span> - <span class="time-to"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Reported through:</td>
                        <td><span class="reported-through"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Time Reported:</td>
                        <td><span class="time-reported"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Received by:</td>
                        <td><span class="received-by"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Reason:</td>
                        <td><span class="reason"></span></td>
                     </tr>
                  </table>
               </div>
               <div class="col-sm-6" style="margin-top: -25px;">
                  <table style="width: 100%;" class="right-table">
                     <tr>
                        <td class="row-label">Notice ID:</td>
                        <td><span class="notice-id"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Date Filed:</td>
                        <td><span class="date-filed"></span></td>
                     </tr>
                     <tr>
                        <td class="row-label">Remarks:</td>
                        <td rowspan="2"><span class="remarks"></span></td>
                     </tr>
                     <tr>
                        <td></td>
                     </tr>
                     <tr>
                        <td class="row-label">Status:</td>
                        <td><div class="status"></div></td>
                     </tr>
                     <tr class="hidden-row">
                        <td class="row-label">Approved by:</td>
                        <td><span class="approved-by"></span></td>
                     </tr>
                     <tr class="hidden-row">
                        <td class="row-label">Date Approved:</td>
                        <td><span class="date-approved"></span></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning" id="manager-cancel-notice"><i class="fa fa-ban"></i></i>Cancel Notice</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
      </div>
      </form>
    </div>
  </div>
</div> 



<style type="text/css">
  #viewNoticeModal table td{
    padding: 3px;
  }

  #viewNoticeModal .left-table .row-label{
    text-align: left;
    width: 35%;
  }

  #viewNoticeModal .right-table .row-label{
    text-align: left;
    width: 30%;
  }

  .row-label{
    font-weight: bold;
  }
</style>