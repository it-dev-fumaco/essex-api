@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/evaluation/appraisal">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -40px; float: left;"></i>
   </a>
   <h2 class="section-title center" style="padding: 0;">Performance Appraisal Sheet</h2>
   <div class="center">
      <span style="display: block; font-size: 11pt;">Evaluation Period: <b>{{ date('F Y', strtotime($appraisal_details['evaluation_period_from'])) }} - {{ date('F Y', strtotime($appraisal_details['evaluation_period_to'])) }}</b></span>
      <span style="display: block; font-size: 11pt;">Purpose: <b>{{ $appraisal_details['purpose'] }}</b></span>
   </div>
</div>
<form action="/saveAppraisal" method="post">
   @csrf
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">Employee Detail(s) <small class="pull-right">Last Evaluation Date: <b>{{ $appraisal_details['last_evaluation_date'] ? $appraisal_details['last_evaluation_date'] : '-- -- ----' }}</b></small></h2>
         <div class="row">
            <div class="col-md-12">
               <table style="width: 100%;">
                  <tr>
                     <td style="width: 10%;">Name:</td>
                     <td style="width: 28%;"><b>{{ $employee_details->employee_name }}</b></td>
                     <td style="width: 15%;">Employment Status:</td>
                     <td style="width: 19%;"><b>{{ $employee_details->employment_status }}</b></td>
                     <td style="width: 10%;">Date Joined:</td>
                     <td style="width: 18%;"><b>{{ $employee_details->date_joined }}</b></td>
                  </tr>
                  <tr>
                     <td>Designation:</td>
                     <td><b>{{ $employee_details->designation }}</b></td>
                     <td>Department:</td>
                     <td><b>{{ $employee_details->department }}</b></td>
                     <td>Shift Group:</td>
                     <td><b>{{ $employee_details->shift_group_name }}</b></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="padding: 6px 35px 6px 15px !important;">
                        Employee Statistics
                     </a>
                  </h4>
               </div>
               <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body" style="background-color: #fff; padding: 10px; margin: 0;">
                     <div class="row" style="padding: 0; margin: 0;" id="employee-stats">
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Lates</span>
                           <span class="span-value lates">0 min(s)</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Working Rate</span>
                           <span class="span-value working-rate">0%</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Absence Rate</span>
                           <span class="span-value absence-rate">0%</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Unfiled Absence(s)</span>
                           <span class="span-value unfiled-absence">0</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="padding: 6px 35px 6px 15px !important;">
                        KPI Quantitative Result
                     </a>
                  </h4>
               </div>
               <div id="collapseTwo" class="panel-collapse in">
                  <div class="panel-body" style="background-color: #fff; padding: 10px 0;">
                     <div class="col-md-12" style="padding: 0;">
                        <div id="kpi-manual-entry"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="kpi-erp-div">
            <div class="panel-group" id="accordion">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="padding: 6px 35px 6px 15px !important;">
                           KPI Data Inputs Generated from ERP
                        </a>
                     </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse in">
                     <div class="panel-body" style="background-color: #fff; padding: 10px 0;">
                        <div class="col-md-12" style="padding: 0;">
                           <div id="kpi-from-erp"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <h3 class="kpi-qual-text">KPI Qualitative</h3>
         <div class="row">
            <div class="col-md-12">
               <a href="#" class="btn btn-primary" id="add-criteria-btn" style="padding: 8px 17px;"><i class="fa fa-plus"></i>Add Criteria</a>
               {{-- <a href="#" class="btn btn-primary" id="add-new-criteria-btn" style="padding: 8px 17px;"><i class="fa fa-plus"></i>Add New KPI</a> --}}
               <br><br>
               <table class="table table-bordered" id="appraisal-table">
                  <thead>
                     <tr>
                        <th style="width: 5%; text-align: center;">No.</th>
                        <th style="width: 40%; text-align: center;">Evaluation Criteria/Category/KPI</th>
                        <th style="width: 30%; text-align: center;" colspan="3">Rating</th>
                        <th style="width: 20%; text-align: center;">Comment(s)</th>
                        <th style="width: 5%; text-align: center;"></th>
                     </tr>
                  </thead>
                  <tbody class="table-body">
                     @foreach($qualitative_kpi as $i => $row)
                     <tr>
                        <td class="center">{{ $i + 1 }}</td>
                        <td><input type="hidden" name="kpi[]" value="{{ $row->kpi_id }}">{{ $row->kpi_description }}</td>
                        <td class="center"><label class="rating-rdbtn"><input type="radio" name="rating{{ $row->kpi_id }}" value="Below Average" required> Below Average</label></td>
                        <td class="center"><label class="rating-rdbtn"><input type="radio" name="rating{{ $row->kpi_id }}" value="Average" required> Average</label></td>
                        <td class="center"><label class="rating-rdbtn"><input type="radio" name="rating{{ $row->kpi_id }}" value="Above Average" required> Above Average</label></td>
                        <td class="center"><textarea name="comment[]"></textarea></td>
                        <td class="center"><a class="delete" href="#"><i class="fa fa-trash"></i></a></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-8">
               <div class="form-group">
                  <label>Strength(s)/Good Point(s)/Accomplishment(s)</label>
                  <textarea name="good_points" rows="5"></textarea>
               </div>
               <div class="form-group">
                  <label>Improvement Areas</label>
                  <textarea name="improvement_areas" rows="4"></textarea>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Overall Rating</label>
                  <input type="text" name="overall_rating" placeholder="Overall Rating" required>
               </div>
               <div class="form-group">
                  <table align="center" style="border:1px solid; width: 85%;">
                     <tr>
                        <td colspan="2" style="padding: 10px 0 0 15px;"><label>Rating</label></td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">< 50</td>
                        <td style="padding-left: 30px; width: 60%;">Below Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">50 - 60</td>
                        <td style="padding-left: 30px; width: 60%;">Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">61 - 69</td>
                        <td style="padding-left: 30px; width: 60%;">Above Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; padding-bottom: 10px; width: 33%;">70 - 100</td>
                        <td style="padding-left: 30px; padding-bottom: 10px; width: 60%;">Excellent</td>
                     </tr>
                  </table>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-3" style="text-align: right;"><label>Ratee:</label></div>
                     <div class="col-md-9">
                        <span style="display: block;">{{ Auth::user()->employee_name }}</span>
                        <span style="display: block;">{{ $designation }}</span>
                        <span style="display: block;">{{ date('m-d-Y') }}</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label>Action/Recommendation</label>
                  <select name="recommendation" required>
                     <option value="">-- Action --</option>
                     <option value="Best suited to his/her position">Best suited to his/her position</option>
                     <option value="Needs further training">Needs further training</option>
                     <option value="Not suited for the job">Not suited for the job</option>
                     <option value="For Promotion">For Promotion</option>
                     <option value="For Probationary">For Probationary</option>
                     <option value="For Regularization">For Regularization</option>
                  </select>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-group">
                  <label>Trainings Recommended/Other Remarks</label>
                  <textarea name="remarks" rows="5"></textarea>
               </div>
            </div>
            <div class="col-md-12" style="text-align: center;">
               <input type="hidden" name="status" value="Draft">
               <input type="hidden" name="evaluation_date" value="{{ date('Y-m-d') }}">
               <input type="hidden" name="evaluated_by" value="{{ Auth::user()->user_id }}">
               <input type="hidden" name="employee_id" value="{{ $employee_details->user_id }}" id="employee-id">
               <input type="hidden" name="purpose" value="{{ $appraisal_details['purpose'] }}">
               <input type="hidden" name="evaluation_from" value="{{ $appraisal_details['evaluation_period_from'] }}" id="evaluation-period-from">
               <input type="hidden" name="evaluation_to" value="{{ $appraisal_details['evaluation_period_to'] }}" id="evaluation-period-to">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Save as Draft</button>
            </div>
         </div>
      </div>
   </div>
</div>
</form>
<style>
   .ar-success{
      font-size: 15pt; color: green;
   }

   .ar-danger{
      font-size: 15pt; color: red;
   }
   input[type='text'], input[type='number'], select{
      height: 35px;
      width: 100%;
      padding: 3px;
   }
   textarea{
      width: 100%;
      padding: 3px;
   }
   .span-title{
      display: block;
      font-size: 13pt;
      text-align: center;
   }
   .span-value{
      display: block;
      font-size: 14pt;
      padding: 4%;
   }
   .rating-list span{
      display: block;
   }
   .rating-rdbtn{
      font-size: 9pt;
   }
   #accordion .panel-title{
      text-transform: uppercase;
      letter-spacing: 1px;
   }
   .kpi-qual-text{
      /*449d44*/
      background-color: #5cb85c;
      padding: 4px 35px 4px 15px;
      font-size: 16px;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      color: #ffffff;
      text-transform: uppercase;
      letter-spacing: 1px;
   }

   table td{
      vertical-align: middle;
   }
   #appraisal-table .fa-trash{
      color: #A93226;
      font-size: 13pt;
   }

   


.zui-table {
    /*border: none;*/
    border-collapse: separate;
    /*border-spacing: 0;*/
    width: 100%;
    /*font: normal 13px Arial, sans-serif;*/
    /*table-layout: fixed;*/
}

.zui-table thead th {
    /*background-color: #DDEFEF;*/
    /*border: none;*/
    /*color: #336B6B;*/
    padding: 5px 3px;
      
    text-align: center;
    text-transform: uppercase;
    /*text-shadow: 1px 1px 1px #fff;*/
    /*white-space: nowrap;*/
}
.zui-table tbody td {
   /* border-bottom: solid 1px;
    border-right: solid 1px;*/
    /*border-left: solid 1px;*/
    /*color: #333;*/
    padding: 6px 3px;
    /*text-shadow: 1px 1px 1px #fff;*/
    /*white-space: nowrap;*/
}
.zui-wrapper {
    position: relative;
}
.zui-scroller {
    margin-left: 45%;
    overflow-x: auto;
    overflow-y: visible;
    /*padding-bottom: 5px;*/
    width: 55%;
}
.zui-table .zui-sticky-col {
    /*border-left: solid 1px;*/
    /*border-right: solid 1px;*/
    left: 0;
    position: absolute;
    top: auto;
    /*border: 1px solid red;*/
    width: 45%;
}

.col-width-px{
   min-width: 110px !important;
   /*border: 1px solid blue;*/
   /*color: red;*/
}
.col-width-percent{
   min-width: 20em !important;
   /*max-width: 20%;*/
   /*border: 1px solid green;*/
   /*color: green;*/
}

</style>

<div class="modal fade" id="add-criteria-modal">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Qualitative KPI</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 0; margin-top: -20px;">
               <div class="col-md-12">
                  <a href="#" class="btn btn-primary" id="add-new-criteria-btn" style="padding: 8px 17px;"><i class="fa fa-plus"></i>Add New KPI</a>
                  <div class="form-group">
                     <label>Select KPI:</label>
                     <select name="kpi" class="kpi-select" required>
                        {{-- @foreach($qualitative_kpi as $row)
                        <option value="{{ $row->kpi_id }}">{{ $row->kpi_description }}</option>
                        @endforeach --}}
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -25px;">
            <button type="button" class="btn btn-primary" id="add-to-criteria-btn"><i class="fa fa-plus"></i> Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="add-new-criteria-modal">
   <div class="modal-dialog modal-md">
      <form id="add-new-criteria-frm">
         @csrf
         <input type="hidden" name="objective" value="0">
         <input type="hidden" name="department" value="0">
         <input type="hidden" name="category" value="Qualitative">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create New Qualitative KPI</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 0; margin-top: -20px;">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>KPI:</label>
                     <textarea name="kpi_description" required></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -25px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>


@endsection

@section('script')
<script>
   $(document).ready(function(){
      // $('#timeliness-th').height($('#n0').height());

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $('#add-to-criteria-btn').click(function(e){
         e.preventDefault();
         var kpi_id = $('#add-criteria-modal .kpi-select').val();
         var kpi_description = $('#add-criteria-modal .kpi-select option:selected').text();
         
         addCriteriaRow(kpi_id, kpi_description);
         $('#add-criteria-modal').modal('hide');
         autoRowNumber();
      });

      $('#add-criteria-btn').click(function(e){
         e.preventDefault();
         loadQualitativeKPI();
         $('#add-criteria-modal').modal('show');
      });

      $('#add-new-criteria-btn').click(function(e){
         e.preventDefault();
         $('#add-new-criteria-modal').modal('show');
      });

      $('#add-new-criteria-frm').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/createKPI",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               // addCriteriaRow(data.id, data.description);
               console.log(data.id);
               loadQualitativeKPI(data.id);
               $('#add-new-criteria-modal').modal('hide');
            }
         });  
      });

      $(document).on("click", ".delete", function(e){
         e.preventDefault();
        $(this).parents("tr").remove();
        autoRowNumber();
      });

      function autoRowNumber(){
         $('#appraisal-table tbody tr').each(function (idx) {
            $(this).children("td:eq(0)").html(idx + 1);
         });
      }
      
      function loadQualitativeKPI(selected_id){
         $('.kpi-select').empty();
         var row = '';
         $.ajax({
            url:"/qualitativeKpi",
            success:function(data){
               console.log(data);
               $.each(data, function(i, d){
                  selected = (d.kpi_id == selected_id) ? 'selected' : null;
                  row += '<option value="' + d.kpi_id + '" ' + selected + '>' + d.kpi_description + '</option>';
               });
               $('.kpi-select').append(row);
            }
         });  
      }

      function addCriteriaRow(kpi_id, kpi_description){
         var row = '<tr>' +
            '<td class="center"></td>' +
            '<td><input type="hidden" name="kpi[]" value="' + kpi_id + '">' + kpi_description + '</td>' +
            '<td class="center"><label class="rating-rdbtn"><input type="radio" name="rating'+kpi_id+'" value="Below Average" required> Below Average</label></td>' +
            '<td class="center"><label class="rating-rdbtn"><input type="radio" name="rating'+kpi_id+'" value="Average" required> Average</label></td>' +
            '<td class="center"><label class="rating-rdbtn"><input type="radio" name="rating'+kpi_id+'" value="Above Average" required> Above Average</label></td>' +
            '<td class="center"><textarea name="comment[]"></textarea></td>' +
            '<td class="center"><a class="delete" href="#"><i class="fa fa-trash"></i></a></td>' +
         '</tr>';

         $("#appraisal-table").append(row);
      }

      $(document).on('show.bs.modal', '.modal', function (event) {
         var zIndex = 1040 + (10 * $('.modal:visible').length);
         $(this).css('z-index', zIndex);
         setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
         }, 0);
      });

      $('#appraisal-table').on( 'change keyup keydown paste cut', 'textarea', function (){
         $(this).height(0).height(this.scrollHeight);
      }).find( 'textarea' ).change();

      loadEmpStats();
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

      loadEmpDataInputsERP();
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

      loadEmpDataInputsManualEntry();
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
@endsection