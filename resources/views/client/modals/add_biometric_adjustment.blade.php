<!-- The Modal -->
<div class="modal fade" id="add-biometric-adjustment-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Biometric Adjustment</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form id="add-biometric-adjustment-form"
               @csrf
               <div class="col-sm-12" style="margin-top: -20px;">
                  <table style="width: 100%;">
                     <tr>
                        <td style="vertical-align: middle;">
                           <span style="font-style: italic;">Employee*</span>
                        </td>
                        <td style="vertical-align: middle;">
                           <select style="width: 170px;" name="employee_id" required>
                              <option value="">Select Employee</option>
                              @forelse($employees as $employee)
                              <option value="{{ $employee->user_id }}">{{ $employee->employee_name }}</option>
                              @empty
                              <option>No records found.</option>
                              @endforelse
                           </select>
                        </td>
                        <td style="vertical-align: middle;">
                           <span style="font-style: italic;">Date*</span>
                        </td>
                        <td style="vertical-align: middle;">
                           <div id="datepairExample">
                              <input type="text" name="transaction_date" class="date" style="width: 170px;" required autocomplete="off">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td style="vertical-align: middle;"><span style="font-style: italic;">Transaction*</span></td>
                        <td style="vertical-align: middle;">
                           <select style="width: 170px;" name="transaction" required>
                              <option value="">Select Transaction</option>
                              <option value="7">TIME IN</option>
                              <option value="8">TIME OUT</option>
                           </select>
                        </td>
                        
                        <td style="vertical-align: middle;">
                           <span style="font-style: italic;">Time*</span>
                        </td>
                        <td style="vertical-align: middle;">
                           <input type="time" name="adjusted_time" style="width: 170px;" required autocomplete="off">
                        </td>
                     </tr>
                     <tr>
                        
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div></form>
      </div>
   </div>
</div>

<style type="text/css">
   #add-biometric-adjustment-modal table td{
      padding: 8px;
   }
</style>
