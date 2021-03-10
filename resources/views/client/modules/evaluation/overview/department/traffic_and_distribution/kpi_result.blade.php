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
      <li><a href="/kpi_stats/it/index">I.T.</a></li>
      <li><a href="/kpi_stats/material_management/index">Material Management</a></li>
      <li><a href="/kpi_stats/management/index">Management</a></li>
      <li><a href="/kpi_stats/marketing/index">Marketing</a></li>
      <li><a href="/kpi_stats/assembly/index">Assembly</a></li>
      <li><a href="/kpi_stats/fabrication/index">Fabrication</a></li>
      <li class="active"><a href="/kpi_stats/traffic_and_distribution/index">Traffic & Distribution</a></li>
      <li><a href="/kpi_stats/painting/index">Painting</a></li>
      <li><a href="/kpi_stats/filunited/index">Filunited Plant 1</a></li>
      <li><a href="/kpi_stats/production_planning/index">Production Planning</a></li>
   </ul>
                    
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-md-12">
               <div class="inn1er-box featured">
                  <h2 class="title-2">Traffic & Distribution Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li><a href="/kpi_stats/traffic_and_distribution/index">Performance Indicator(s)</a></li>
                           <li class="active"><a href="/kpi_overview/traffic_and_distribution/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="row" id="filters" style="margin-top: -30px;">
                           <div class="col-md-3"></div>
                           <input type="hidden" class="department filter" value="16">
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
                                 @foreach($year_list as $row)
                                 <option value="{{ $row->year }}" {{ date('Y') == $row->year ? 'selected' : '' }}>{{ $row->year }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="row box">
                           <div id="data-input-result-table"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<style type="text/css">
   .box{
      -webkit-box-shadow: 0px 0px 8px 1px rgba(212,212,212,1);
      -moz-box-shadow: 0px 0px 8px 1px rgba(212,212,212,1);
      box-shadow: 0px 0px 8px 1px rgba(212,212,212,1);
      border: 1px solid #D5DBDB;
      padding: 15px;
   }
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

   $('#filters .filter').on('change', function(){
      loadKpiResultPerDept();
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
         url: "/departmentKpiResult/"+department,
         data: data,
         success: function(data){
            $('#data-input-result-table').html(data);
         }
      });
   }

});
</script>
@endsection