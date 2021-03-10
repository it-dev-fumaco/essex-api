<table>
   <tr>
      <td colspan="4" style="text-align: center; font-weight: bold; font-size: 12pt; text-transform: uppercase;">Performance Appraisal Sheet</td>
   </tr>
   <tr>
      <td colspan="4" style="text-align: center;">Evaluation Period: {{ date('F Y', strtotime($appraisal_details['evaluation_period_from'])) }} - {{ date('F Y', strtotime($appraisal_details['evaluation_period_to'])) }}</td>
   </tr>
   <tr>
      <td colspan="4" style="text-align: center;">Purpose: {{ $appraisal_details['purpose'] }}</td>
   </tr>
   <tr style="border-top: 1px solid; border-bottom: 1px solid;">
      <td colspan="2" style="font-weight: bold; text-transform: uppercase;">Employee Detail(s)</td>
      <td colspan="2" style="text-align: right;">Last Evaluation Date: <b>{{ $appraisal_details['last_evaluation_date'] ? $appraisal_details['last_evaluation_date'] : '-- -- ----' }}</b></td>
   </tr>
    <tr>
      <td colspan="4"></td>
   </tr>
   <tr>
      <td style="width: 15%;">Name:</td>
      <td style="width: 35%;"><b>{{ $employee_details->employee_name }}</b></td>
      <td style="width: 20%;">Employment Status:</td>
      <td style="width: 30%;"><b>{{ $employee_details->employment_status }}</b></td>
   </tr>
   <tr>
      <td>Designation:</td>
      <td><b>{{ $employee_details->designation }}</b></td>
      <td>Department:</td>
      <td><b>{{ $employee_details->department }}</b></td>
   </tr>
</table>
<br>
<table id="employee-stats">
   <tr style="border-top: 1px solid; border-bottom: 1px solid;">
      <td colspan="4" style="font-weight: bold; text-transform: uppercase;">Employee Statistics</td>
   </tr>
   <tr>
      <td style="width: 25%; text-align: center;">Lates</td>
      <td style="width: 25%; text-align: center;">Working Rate</td>
      <td style="width: 25%; text-align: center;">Absence Rate</td>
      <td style="width: 25%; text-align: center;">Unfiled Absence(s)</td>
   </tr>
   <tr>
      <td style="width: 25%; text-align: center;"><span class="lates">0 min(s)</span></td>
      <td style="width: 25%; text-align: center;"><span class="working-rate">0%</span></td>
      <td style="width: 25%; text-align: center;"><span class="absence-rate">0%</span></td>
      <td style="width: 25%; text-align: center;"><span class="unfiled-absence">0</span></td>
   </tr>
</table>
<br>
<table>
   <tr{{--  style="border-top: 1px solid grey; border-bottom: 1px solid grey;" --}}>
      <td colspan="4" style="font-weight: bold; text-transform: uppercase;">KPI Quantitative Result</td>
   </tr>
</table>
<div id="kpi-manual-entry"></div>
<br>
<table id="kpi-erp-div">
   <tr{{--  style="border-top: 1px solid grey; border-bottom: 1px solid grey;" --}}>
      <td colspan="4" style="font-weight: bold; text-transform: uppercase;">KPI Data Inputs Generated from ERP</td>
   </tr>
</table>
<div id="kpi-from-erp"></div>
<br>
<table>
   <tr{{--  style="border-top: 1px solid grey; border-bottom: 1px solid grey;" --}}>
      <td colspan="4" style="font-weight: bold; text-transform: uppercase;">KPI Qualitative</td>
   </tr>
</table>
<table class="qualitative-tbl">
   <thead>
      <tr>
         <th style="width: 5%; text-align: center;">No.</th>
         <th style="width: 45%; text-align: center;">Evaluation Criteria/Category/KPI</th>
         <th style="width: 15%; text-align: center;">Rating</th>
         <th style="width: 35%; text-align: center;">Comment(s)</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @foreach($qualitative_kpi_set as $i => $row)
      <tr>
         <td style="text-align: center;">{{ $i + 1 }}</td>
         <td style="text-align: justify;">{{ $row->kpi_description }}</td>
         <td style="text-align: center;">{{ $row->rating }}</td>
         <td style="text-align: justify;">{{ $row->comment }}</td>
      </tr>
      @endforeach
   </tbody>
</table>
<br>
<table class="appraisal-tbl">
   <tr>
      <td style="width: 70%; font-weight: bold; border-bottom: 1px solid grey;">Strength(s)/Good Point(s)/Accomplishment(s)</td>
      <td style="width: 2%;"></td>
      <td style="width: 28%; font-weight: bold; border-bottom: 1px solid grey;">Overall Rating</td>
   </tr>
   <tr>
      <td>{{ $appraisal_result->good_points }}</td>
      <td></td>
      <td style="font-size: 15pt; vertical-align: top; text-align: center;">{{ $appraisal_result->overall_ratings }}</td>
   </tr>
   <tr>
      <td style="font-weight: bold; border-bottom: 1px solid grey;">Improvement Areas</td>
      <td></td>
      <td style="font-weight: bold; border-bottom: 1px solid grey;">Recommendation</td>
   </tr>
   <tr>
      <td>{{ $appraisal_result->improvement_areas }}</td>
      <td></td>
      <td>{{ $appraisal_result->recommendations }}</td>
   </tr>
   <tr>
      <td style="font-weight: bold; border-bottom: 1px solid grey;">Trainings Recommended/Other Remarks</td>
      <td></td>
      <td style="font-weight: bold; border-bottom: 1px solid grey;">Evaluated by</td>
   </tr>
   <tr>
      <td>{{ $appraisal_result->remarks }}</td>
      <td></td>
      <td>
         <span style="display: block; font-weight: bold;">{{ $ratee->employee_name }}</span>
         <span style="display: block;">{{ $ratee->designation }}</span>
         <span style="display: block;">{{ $appraisal_result->evaluation_date }}</span>
      </td>
   </tr>
</table>


<style type="text/css">
   *{
      font-size: 7pt;
      font-family: sans-serif;
   }
   table{
      border-collapse: collapse;
      width: 100%;
   }
   table th, td{
      padding: 5px;
   }

   .zui-table{border: 1px solid;}

   .print-kpi-manual th, .print-kpi-manual td{
      border: 1px solid;
   }

   .qualitative-tbl th, .qualitative-tbl td{
      border: 1px solid;
   }

   .print-kpi-erp th, .print-kpi-erp td{
      border: 1px solid;
   }

   .pull-right{
      float: right;
   }

   .appraisal-tbl tr{
      page-break-inside: avoid;
   }

</style>

<input type="hidden" value="{{ $appraisal_details['evaluation_period_from'] }}" id="evaluation-period-from">
<input type="hidden" value="{{ $appraisal_details['evaluation_period_to'] }}" id="evaluation-period-to">
<input type="hidden" value="{{ $employee_details->user_id }}" id="employee-id">

<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
<script>
   $(document).ready(function(){
      loadEmpStats();
      loadEmpDataInputsManualEntry();
      loadEmpDataInputsERP();
      function loadEmpStats(){
         var employee_id = $('#employee-id').val();
         var evaluation_period_from = $('#evaluation-period-from').val();
         var evaluation_period_to = $('#evaluation-period-to').val();

         data = {
            evaluation_period_from : evaluation_period_from,
            evaluation_period_to : evaluation_period_to
         }

         $.ajax({
            url:"/employeeStats/"+employee_id,
            type: "GET",
            data: data,
            success:function(data){
               $('#employee-stats .lates').text(data.total_lates);
               $('#employee-stats .absence-rate').text(data.absence_rate);
               $('#employee-stats .unfiled-absence').text(data.unfiled_absences);
               $('#employee-stats .working-rate').text(data.working_rate);
            },
            error: function(data) {
               alert('Error fetching Employee Stats!');
            }
         });  
      }

      function loadEmpDataInputsERP(){
         var employee_id = $('#employee-id').val();
         var evaluation_period_from = $('#evaluation-period-from').val();
         var evaluation_period_to = $('#evaluation-period-to').val();

         data = {
            evaluation_period_from : evaluation_period_from,
            evaluation_period_to : evaluation_period_to
         }

         $.ajax({
            url:"/employee_erp_data_inputs/"+employee_id,
            type: "GET",
            data: data,
            success:function(data){
               if (!data) {
                  $('#kpi-erp-div').hide();
               }
               $('#kpi-from-erp').html(data);
            },
            error: function(data) {
               alert('Error fetching ERP Data Inputs!');
            }
         });  
      }

      function loadEmpDataInputsManualEntry(){
         var employee_id = $('#employee-id').val();
         var evaluation_period_from = $('#evaluation-period-from').val();
         var evaluation_period_to = $('#evaluation-period-to').val();

         data = {
            evaluation_period_from : evaluation_period_from,
            evaluation_period_to : evaluation_period_to
         }

         $.ajax({
            url:"/employee_manual_data_inputs/"+employee_id,
            type: "GET",
            data: data,
            success:function(data){
               $('#kpi-manual-entry').html(data);
            },
            error: function(data) {
               alert('Error fetching Manual Entry Data Inputs!');
            }
         });  
      }
   });
</script>

<script type="text/javascript">
   $(document).ajaxStart(function () {
       console.log("Triggered ajaxStart Event.");
   });

   $(document).ajaxSend(function (event, jqxhr, settings) {
      console.log("Triggered ajaxSend Event.<br/>");
   });

   $(document).ajaxComplete(function (event, jqxhr, settings) {
      console.log("Triggered ajaxComplete Event.<br/>");
   });

   $(document).ajaxStop(function () {
      console.log("Triggered ajaxStop Event.<br/>");
      window.print();
      window.close();
   });

   $(document).ajaxSuccess(function (event, jqxhr, settings) {
      console.log("Triggered ajaxSuccess Event.<br/>");
   });

   $(document).ajaxError(function (event, jqxhr, settings, thrownError) {
      console.log("Triggered ajaxError Event.<br/>");
   });
</script>