<!-- The Modal -->
<div class="modal fade" id="viewGatepassModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gatepass Details</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form></form>
        <div class="row">
          <div class="col-sm-6" style="margin-top: -25px;">
            <table style="width: 100%; margin-left: 50px;" class="left-table">
              <tr>
                <td class="row-label">Gatepass ID:</td>
                <td><span class="gatepass-id"></span></td>
              </tr>
              <tr>
                <td class="row-label">Employee Name:</td>
                <td><span class="employee-name"></span></td>
              </tr>
               <tr>
                <td class="row-label">Date Filed:</td>
                <td><span class="date-filed"></span></td>
              </tr>
               <tr>
                <td class="row-label">Time:</td>
                <td><span class="time"></span></td>
              </tr>
               <tr>
                <td class="row-label">Item(s):</td>
                <td><span class="items"></span></td>
              </tr>
               <tr>
                <td class="row-label">Purpose:</td>
                <td><span class="purpose"></span></td>
              </tr>
               <tr>
                <td class="row-label">Returned On:</td>
                <td><span class="returned-on"></span></td>
              </tr>
              <tr>
                <td class="row-label">Item Type:</td>
                <td><span class="item-type"></span></td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6" style="margin-top: -25px;">
            <table style="width: 100%;" class="right-table">
              <tr>
                <td colspan="2" style="font-weight: bold; font-style: italic;">If not connected to FUMACO Inc.</td>
              </tr>
              <tr>
                <td class="row-label">Company:</td>
                <td><span class="company-name"></span></td>
              </tr>
              <tr>
                <td class="row-label">Address:</td>
                <td><span class="address"></span></td>
              </tr>
              <tr>
                <td class="row-label">Tel. No.:</td>
                <td><span class="tel-no"></span></td>
              </tr>
              <tr>
                <td class="row-label">Remarks:</td>
                <td><span class="remarks"></span></td>
              </tr>
              <tr>
                <td class="row-label">Item Status:</td>
                <td><span class="item-status"></span></td>
              </tr>
              <tr>
                <td class="row-label">Status:</td>
                <td><div class="status"></div></td>
              </tr>
              <tr class="hidden-row">
                <td class="row-label">Approved by:</td>
                <td><span class="approved_by"></span></td>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
      </div>
    </div>
  </div>
</div> 

<style type="text/css">
  #viewGatepassModal table td{
    padding: 5px;
  }

  #viewGatepassModal .left-table .row-label{
    text-align: left;
    width: 35%;
  }

  #viewGatepassModal .right-table .row-label{
    text-align: left;
    width: 30%;
  }

  .row-label{
    font-weight: bold;
  }
</style>