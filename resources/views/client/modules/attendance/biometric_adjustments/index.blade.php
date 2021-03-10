@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Attendance</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/attendance/analytics">Analytics</a></li> --}}
      <li><a href="/module/attendance/history">Attendance History</a></li>
      <li><a href="/module/attendance/employee_shifts">Shift(s)</a></li>
      <li class="active"><a href="/module/attendance/biometric_adjustments">Attendance Adjustment(s)</a></li>
      <li><a href="/module/attendance/late_employees">Late Employee(s) Monitoring</a></li>
      <li><a href="/module/attendance/holiday_entry">Holiday/Events List</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
        <div class="row">
         <div class="col-sm-12">
            <div class="inner-box featured">
              <h2 class="title-2">Attendance Adjustments</h2>
              <div class="tabs-section">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-monitoring" data-toggle="tab">For Adjustment</a></li>
                        <li><a href="#tab-adjustments" data-toggle="tab">Adjustments History</a></li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane in active" id="tab-monitoring">
                           <a href="#" class="btn btn-primary" style="float: right; z-index: 1;" id="attendanceAjdUpdateall">
                            <i class="fa fa-pencil"></i> Update All
                           </a>
                           <div class="row">
                              <div class="col-sm-12">
                                 <div id="for-adjustments-filters">
                                     <span>From:</span>
                                       <input type="date" name="date_from" id="date_from" class="filters" value="{{ Carbon\Carbon::parse('first day of this month')->format('Y-m-d') }}">
                                       <span>To:</span>
                                       <input type="date" name="date_to" id="date_to" class="filters" value="{{ Carbon\Carbon::parse('last day of this month')->format('Y-m-d') }}">

                                 </div>
                                
                                     <div class="alert-message"></div>
                                 <div id="adj-monitoring"></div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab-adjustments">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="alert-message"></div>
                                 <div id="biometric-adjustments"></div>
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
</div>

<!-- MODAL ADD ADJUSTMENT -->
<div class="modal fade" id="add-adjustment-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Attendance Adjustment</h4>
         </div>
         <!-- Modal body -->
          <form id="add-biometric-adjustment-form" method="post">
            @csrf
         <div class="modal-body">
           
            <div class="row">
               <div class="col-sm-12">
                  <table style="width: 100%;">
                     <tr>
                        <td style="padding: 1%;"><span style="font-style: italic;">Employee*</span></td>
                        <td style="padding: 1%;">
                          <input type="hidden" name="employee_id" class="access-id">
                          <input type="hidden" name="rowid_data" class="rowid_data">
                          <input type="text" name="employee_name" class="employee-name" readonly>
                        </td>
                        <td style="padding: 1%;">
                           <span style="font-style: italic;">Date*</span>
                        </td>
                        <td style="padding: 1%;">
                           <input type="text" name="transaction_date" class="transaction-date" readonly>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding: 1%;"><span style="font-style: italic;">Transaction*</span></td>
                        <td style="padding: 1%;">
                           <select class="transaction-type" name="transaction" readonly>
                              <option value="">Select Transaction</option>
                              <option value="7">TIME IN</option>
                              <option value="8">TIME OUT</option>
                           </select>
                        </td>
                        <td style="padding: 1%;">
                           <span style="font-style: italic;">Time*</span>
                        </td>
                        <td style="padding: 1%;">
                           <input type="time" name="adjusted_time" class="adjdata_data" required autocomplete="off" autofocus>
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
         </div>
      </form>
      </div>
   </div>
</div>
<!-- END MODAL -->

<!-- MODAL DELETE ADJUSTMENT -->
<div class="modal fade" id="delete-biometric-adjustment-modal">
   <div class="modal-dialog">
      <form id="delete-adjustment-form">
         @csrf
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Delete Adjustment</h4>
            </div>
            <div class="modal-body">
               <div class="row" style="font-size: 12pt;">
                  <div class="col-sm-12">
                     <input type="hidden" name="biometric_id" class="biometric_id">
                     Delete adjustment <b><span class="shift_name"></span></b> ?
                  </div>               
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
               <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- END MODAL -->
  

@endsection

@section('script')
<script>
$(document).ready(function() {
   $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

   loadAdjustmentMonitoring();
   loadBiometricAdjustments();

  $(document).on('click', '.add-adjustment-btn', function(event){
    event.preventDefault();
    $('#add-adjustment-modal .access-id').val($(this).data('empid'));
    $('#add-adjustment-modal .employee-name').val($(this).data('empname'));
    $('#add-adjustment-modal .transaction-type').val($(this).data('transaction'));
    $('#add-adjustment-modal .transaction-date').val($(this).data('date'));
    $('#add-adjustment-modal .adjdata_data').val($(this).data('adjdata'));
    $('#add-adjustment-modal .rowid_data').val($(this).data('rowid'));
    $('#add-adjustment-modal').modal('show');
  });

  $('#add-biometric-adjustment-form').on('submit', function(event){
      event.preventDefault();    
            console.log($(this).serialize());
      $.ajax({
         url: "/addAdjustment",
         type: "POST",
         data: $(this).serialize(),
         success: function(data){
            console.log($(this).serialize());
            $('#tab-monitoring .alert-message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><center>' + data.message + '</center></div>');
            loadBiometricAdjustments();
            loadAdjustmentMonitoring();
            $('#add-adjustment-modal').modal('hide'); 
         }
      });
   });

   function loadAdjustmentMonitoring(page){
      var start = $('#for-adjustments-filters #date_from').val();
      var end = $('#for-adjustments-filters #date_to').val();

      var data = {start: start, end:end}

      $.ajax({
         url: "/adj_monitoring?page="+page,
         data: data,
         success:function(data){
               $('#adj-monitoring').html(data);
            }
      });
   }

   function loadBiometricAdjustments(page){
      $.ajax({
         url: "/adj_history?page="+page,
         success: function(data){
            $('#biometric-adjustments').html(data);
         }
      });
   }

   $(document).on('click', '#biometric-adjustments-pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      loadBiometricAdjustments(page);
   });

   $(document).on('click', '#for-adjustments-table-pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      loadAdjustmentMonitoring(page);
   });

   $('#for-adjustments-filters .filters').on('change', function(){
      loadAdjustmentMonitoring();
   });

   $(document).on('click', '#delete-biometric-adjustment-btn', function(event){
      event.preventDefault();    
      $('#delete-adjustment-form .biometric_id').val($(this).data('id'));
      $('#delete-biometric-adjustment-modal').modal('show'); 
   });

   $(document).on('click', '#attendanceAjdUpdateall', function(event){
      event.preventDefault();    
      $.ajax({
         url: "/AttandanceAdjUpdateall",

         beforeSend: function(){
            $("#attendanceAjdUpdateall").text("Updating...");
         },
         success: function(data){
         loadBiometricAdjustments();
         loadAdjustmentMonitoring();
         $.bootstrapGrowl("<i class=\"fa fa-check-circle-o\" style=\"font-size: 60pt; float: left; padding-right: 10px;\"></i><span style=\"display:block; font-size: 16pt; font-weight: bold; padding-top: 5px;\">" + data.message + "</span><span style=\"font-size: 10pt;\"><br></span>", {
                        type: 'success',
                        align: 'center',
                        delay: 2000,
                        width: 450,
                        offset: {from: 'top', amount: 300},
                        stackup_spacing: 20
                    });
         },
         complete: function(){
            $("#attendanceAjdUpdateall").html("<i class=\"fa fa-pencil\"></i> Update All");
         }
      });
   });

   $(document).on('submit', '#delete-adjustment-form', function(event){
      event.preventDefault();    
      $.ajax({
         url: "/deleteAdjustment",
         type: "POST",
         data: $(this).serialize(),
         success: function(data){
            loadBiometricAdjustments();
            loadAdjustmentMonitoring();
            $('#tab-adjustments .alert-message').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><center>' + data.message + '</center></div>');
            $('#delete-biometric-adjustment-modal').modal('hide'); 
         }
      });
   });

   $(document).on('click', '#attendanceAjdUpdateall', function(event){
      event.preventDefault();    
      $.ajax({
         url: "/AttendanceAdjUpdateall",

         beforeSend: function(){
            $("#attendanceAjdUpdateall").text("Updating...");
         },
         success: function(data){
         loadBiometricAdjustments();
         loadAdjustmentMonitoring();
         $.bootstrapGrowl("<i class=\"fa fa-check-circle-o\" style=\"font-size: 60pt; float: left; padding-right: 10px;\"></i><span style=\"display:block; font-size: 16pt; font-weight: bold; padding-top: 5px;\">" + data.message + "</span><span style=\"font-size: 10pt;\"><br></span>", {
                        type: 'success',
                        align: 'center',
                        delay: 2000,
                        width: 450,
                        offset: {from: 'top', amount: 300},
                        stackup_spacing: 20
                    });
         },
         complete: function(){
            $("#attendanceAjdUpdateall").html("<i class=\"fa fa-pencil\"></i> Update All");
         }
      });
   });
});
</script>

@endsection

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>