@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -70px; float: left;"></i>
   </a>
</div>
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/kpi_stats/accounting/index">Accounting</a></li>
      <li><a href="/kpi_stats/sales/index">Sales</a></li>
      <li><a href="/kpi_stats/engineering/index">Engineering</a></li>
      <li><a href="/kpi_stats/customer_service/index">Customer Service</a></li>
      <li><a href="/kpi_stats/qa/index">Q.A.</a></li>
      <li><a href="/kpi_stats/hr/index">H.R.</a></li>
      <li><a href="/kpi_stats/plant_services/index">Plant Services</a></li>
      <li><a href="/kpi_stats/production/index">Production</a></li>
      <li class="active"><a href="/kpi_stats/it/index">I.T.</a></li>
      <li><a href="/kpi_stats/material_management/index">Material Management</a></li>
      <li><a href="/kpi_stats/management/index">Management</a></li>
      <li><a href="/kpi_stats/marketing/index">Marketing</a></li>
      <li><a href="/kpi_stats/assembly/index">Assembly</a></li>
      <li><a href="/kpi_stats/fabrication/index">Fabrication</a></li>
      <li><a href="/kpi_stats/traffic_and_distribution/index">Traffic & Distribution</a></li>
      <li><a href="/kpi_stats/paitning/index">Painting</a></li>
      <li><a href="/kpi_stats/filunited/index">Filunited Plant 1</a></li>
      <li><a href="/kpi_stats/production_planning/index">Production Planning</a></li>
   </ul>
                    
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-md-12">
               <div class="inner-box featured">
                  <h2 class="title-2" style="text-align: center;">Information Technology Department</h2>
                  <ul class="nav nav-tabs" style="text-align: center;">
                     <li><a href="/kpi_stats/InformationTechnologydepartment">Performance Indicator(s)</a></li>
                     <li class="active"><a href="/kpi_overview/engineering/kpi_result">KPI Result</a></li>
                  </ul>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="row" id="filters" style="margin-top: -30px;">
                           <div class="col-md-3"></div>
                           <input type="hidden" class="department filter" value="9">
                           <div class="col-md-2">
                              <label>Evaluation Period:</label>
                              <select class="evaluation-period filter">
                                 <option value="Monthly">Monthly</option>
                                 <option value="Quarterly">Quarterly</option>
                                 <option value="Semi-Annual">Semi-Annual</option>
                                 <option value="Annual">Annual</option>
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
                                       <option value="2018" {{ date('y') == 18 ? 'selected' : '' }}>2018</option>
                                       <option value="2019" {{ date('y') == 19 ? 'selected' : '' }}>2019</option>
                                       <option value="2020" {{ date('y') == 20 ? 'selected' : '' }}>2020</option>
                                       <option value="2021" {{ date('y') == 21 ? 'selected' : '' }}>2021</option>
                                       <option value="2022" {{ date('y') == 22 ? 'selected' : '' }}>2022</option>
                                       <option value="2023" {{ date('y') == 23 ? 'selected' : '' }}>2023</option>
                                       <option value="2024" {{ date('y') == 24 ? 'selected' : '' }}>2024</option>
                                       <option value="2025" {{ date('y') == 25 ? 'selected' : '' }}>2025</option>
                                       <option value="2026" {{ date('y') == 26 ? 'selected' : '' }}>2026</option>
                                       <option value="2027" {{ date('y') == 27 ? 'selected' : '' }}>2027</option>
                                       <option value="2028" {{ date('y') == 28 ? 'selected' : '' }}>2028</option>
                                       <option value="2029" {{ date('y') == 29 ? 'selected' : '' }}>2029</option>
                                       <option value="2030" {{ date('y') == 30 ? 'selected' : '' }}>2030</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div id="data-input-result-table" style="overflow-y: auto;"></div>
                        </div>
                        <!-- <div class="row">
                           <div id="erp-data-input-result-table"></div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<style>
   #tabs .nav-tabs > li {
      float: none;
      display: inline-block;
      padding: 5px 0;
   }

   .nav-tabs li a{
      padding: 10px 8px;
      font-size: 8pt;
   }

   table td{
      vertical-align: middle !important;
      text-align: center;
   }

   input, select{
      height: 35px;
      width: 100%;
      padding: 3px;
   }

   textarea{
      width: 100%;
   }
</style>
@endsection

@section('script')
<script>
 $(document).ready(function(){
   console.log('ready');
   loadKpiResultPerDept();
   loadErpDataInputsPerEmp();

   $('#filters .filter').on('change', function(){
      loadKpiResultPerDept();
      loadErpDataInputsPerEmp();
   });

   function loadKpiResultPerDept(){
      var department = $('#filters .department').val();
      var month = $('#filters .month').val();
      var year = $('#filters .year').val();
      var period = $('#filters .evaluation-period').val();

      var data = {
         month: month,
         year: year,
         period: period,
      }

      $.ajax({
         url: "/ITKpiResult/"+department,
         data: data,
         success: function(data){
            $('#data-input-result-table').html(data);
         }
      });
   }

   function loadErpDataInputsPerEmp(){
      var month = $('#filters .month').val();
      var year = $('#filters .year').val();
      var period = $('#filters .evaluation-period').val();

      var data = {
         month: month,
         year: year,
         period: period,
      }

      $.ajax({
         url: "/kpi_overview/engineering/emp_data_inputs",
         data: data,
         success: function(data){
            $('#erp-data-input-result-table').html(data);
         }
      });
   }
});
</script>
@endsection