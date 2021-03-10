@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li><a href="/evaluation/kpi">KPI List</a></li>
      <li><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li class="active"><a href="/evaluation/kpi_result">KPI Result</a></li>
      {{-- <li><a href="/evaluation/kpi_result/overview">Overview</a></li> --}}
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-md-12 col-md-10 col-md-offset-1">
            <div class="inner-box featured">
               <h2 class="title-2">KPI Result</h2>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="row" id="filters" style="margin-top: -30px;">
                        <div style="float: right; padding-right: 30px;" class="hover-image">
                           <a href="#" onclick="redirecttopage()" id="overview" data-toggle="modal" data-target="#addAsset">
                           <img src="{{ asset('storage/img/analytics.png') }}" width="50" height="50"/>
                          </a>
                        </div>
                    
                        <div class="col-md-3">
                           <label>Department:</label>
                           <select class="department filter" id="department">
                              <option value="">-- Select Department --</option>
                              @foreach($department_list as $row)
                              <option value="{{ $row->department_id }}">{{ $row->department }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label>Month:</label>
                           <select class="month filter">
                              <option value="01" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
                              <option value="02" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
                              <option value="03" {{ date('m') == 3 ? 'selected' : '' }}>March</option>
                              <option value="04" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
                              <option value="05" {{ date('m') == 5 ? 'selected' : '' }}>May</option>
                              <option value="06" {{ date('m') == 6 ? 'selected' : '' }}>June</option>
                              <option value="07" {{ date('m') == 7 ? 'selected' : '' }}>July</option>
                              <option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                              <option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                              <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                              <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                              <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label>Year:</label>
                           <select class="year filter">
                              <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                              <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                              <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                              <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                           </select>
                        </div>
                     </div>
                     <div id="message"></div>
                     <div id="report-tbl"></div>

                    {{--  <table class="table table-hover" id="report-tbl" border="1">
                        <col style="width: 2%;">
                        <col style="width: 3%;">
                        <col style="width: 70%;">
                        <col style="width: 25%;">
                        <tbody class="table-body"></tbody>
                        <tfoot>
                           <tr>
                              <td colspan="4" style="text-align: center;"><b>-- END --</b></td>
                           </tr>
                        </tfoot>
                     </table> --}}
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
   </div>
</div>

@include('client.modules.evaluation.reports.modals.edit_kpi_datainput_result')
<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
}

.kpi-name{
   background-color: #A9DFBF;
   font-weight: bold;
}


.kpi-name:hover{
   background-color: #A9DFBF !important;
   font-weight: bold;
}

select{
   width: 100%;
}

.designation-name{
   font-weight: bold;
   font-style: italic;
}

</style>
@endsection

@section('script')
<script>
   $(document).ready(function(){

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      loadKpiResult();
      $('#filters .filter').on('change', function(){
         loadKpiResult();
      });

      function loadKpiResult(){
         var department = $('#filters .department').val();
         var month = $('#filters .month').val();
         var year = $('#filters .year').val();

         var data = {
            department: department,
            month: month,
            year: year,
         }

         $('#report-tbl tbody').empty();
         $.ajax({
            url: "/getKpiResult",
            data: data,
            success: function(data){
               $('#report-tbl').html(data);
            }
         });
      }

      $(document).on('click', '.edit-result', function(e){
         e.preventDefault();
         var result_id = $(this).data('id');
         var data_input = $(this).data('input');
         var result = $(this).data('result');
         $('#edit-data-input-result-modal .result-id').val(result_id);
         $('#edit-data-input-result-modal .data-input-name').text(data_input);
         $('#edit-data-input-result-modal .data-input').val(data_input);
         $('#edit-data-input-result-modal .result').val(result);
         
         $('#edit-data-input-result-modal').modal('show');
      });

      $('#update-result-form').on("submit", function(e){
         e.preventDefault();
         $.ajax({
            url: "/updateDataInputResult",
             type:"POST",
            data: $(this).serialize(),
            success: function(data){
               $('#message').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#edit-data-input-modal').modal('hide');

               $('#edit-data-input-result-modal').modal('hide');
               loadKpiResult();
            }
         });
      });

      $('.modal').on('hidden.bs.modal', function(){
         $(this).find('form')[0].reset();
      });
   });
</script>
<script type="text/javascript">
   function redirecttopage(){
      var dept = document.getElementById('department').value;
      if (dept == 9) {
           window.location.href = "/kpi_stats/it/index";
      }else if (dept == 1) {
         window.location.href = "/kpi_stats/accounting/index";
      }else if (dept == 2) {
         window.location.href = "/kpi_stats/sales/index";
      }else if (dept == 3) {
         window.location.href = "/kpi_stats/engineering/index";
      }else if (dept == 4) {
         window.location.href = "/kpi_stats/customer_service/index";
      }else if (dept == 5) {
         window.location.href = "/kpi_stats/qa/index";
      }else if (dept == 6) {
         window.location.href = "/kpi_stats/hr/index";
      }else if (dept == 7) {
         window.location.href = "/kpi_stats/plant_services/index";
      }else if (dept == 8) {
         window.location.href = "/kpi_stats/production/index";
      }else if (dept == 10) {
         window.location.href = "/kpi_stats/material_management/index";
      }else if (dept == 12) {
         window.location.href = "/kpi_stats/management/index";
      }else if (dept == 13) {
         window.location.href = "/kpi_stats/marketing/index";
      }else if (dept == 14) {
         window.location.href = "/kpi_stats/assembly/index";
      }else if (dept == 15) {
         window.location.href = "/kpi_stats/fabrication/index";
      }else if (dept == 16) {
         window.location.href = "/kpi_stats/traffic_and_distribution/index";
      }else if (dept == 17) {
         window.location.href = "/kpi_stats/painting/index";
      }else if (dept == 19) {
         window.location.href = "/kpi_stats/filunited/index";
      }else if (dept == 20) {
         window.location.href = "/kpi_stats/production_planning/index";
      }
   }
</script>
@endsection