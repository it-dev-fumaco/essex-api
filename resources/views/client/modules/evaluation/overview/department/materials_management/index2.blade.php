@extends('client.app')
@section('content')
<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>
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
      <li class="active"><a href="/kpi_stats/material_management/index">Material Management</a></li>
      <li><a href="/kpi_stats/management/index">Management</a></li>
      <li><a href="/kpi_stats/marketing/index">Marketing</a></li>
      <li><a href="/kpi_stats/assembly/index">Assembly</a></li>
      <li><a href="/kpi_stats/fabrication/index">Fabrication</a></li>
      <li><a href="/kpi_stats/traffic_and_distribution/index">Traffic & Distribution</a></li>
      <li><a href="/kpi_stats/painting/index">Painting</a></li>
      <li><a href="/kpi_stats/filunited/index">Filunited Plant 1</a></li>
      <li><a href="/kpi_stats/production_planning/index">Production Planning</a></li>
   </ul>
                    
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-md-12">
               <div class="inner-b1ox featured">
                  <h2 class="title-2">Materials Management Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li><a href="/kpi_stats/material_management/index">Performance Indicator(s) - Inventory</a></li>
                           <li class="active"><a href="/kpi_stats/material_management/index2">Performance Indicator(s) - Purchasing</a></li>
                           <li><a href="/kpi_overview/material_management/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="margin-bottom: 20px;">
                        <table style="width: 100%;" id="totals-table">
                           <tr>
                              <td>
                                 <span class="span-title">Total Purchase Order(s)</span>
                                 <span class="span-value total-po">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Open Purchase Order(s)</span>
                                 <span class="span-value open-po">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Upcoming Deliveries</span>
                                 <span class="span-value upcoming-po">0</span>
                              </td>
                             {{--  <td>
                                 <span class="span-title">Late Deliveries</span>
                                 <span class="span-value late-po">0</span>
                              </td> --}}
                           </tr>
                        </table>
                     </div>
                     <h2 class="section-title center" style="font-size: 14pt;">Timeliness of Received Purchases</h2>
                     <div class="col-md-6">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Local Purchases: 
                              <select style="width: 15%;" id="local-purchases-timeliness-year" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="local-purchases-timeliness-chart"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Imported Purchases: 
                              <select style="width: 15%;" id="imported-purchases-timeliness-year" class="filter2">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="imported-purchases-timeliness-chart"></canvas>
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

   .span-title{
      display: block;
      font-size: 12pt;
      text-align: center;
      font-weight: bold;
   }

   .span-value{
      display: block;
      font-size: 20pt;
      padding: 4%;
      text-align: center;
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
   $('.filter1').on('change', function(){
      localPurchasesTimeliness();
   });

   $('.filter2').on('change', function(){
      importedPurchasesTimeliness();
   });

   localPurchasesTimeliness();
   function localPurchasesTimeliness(){
      var year = $('#local-purchases-timeliness-year').val();
      
      $.ajax({
         url: "/kpi_overview/material_management/purchase_timeliness/" + year + "/Local",
         method: "GET",
         success: function(data) {
            var months = [];
            var target = [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100];
            var percentage = [];

            for(var i in data) {
               months.push(data[i].month);
               percentage.push(data[i].percentage);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                     data: percentage,
                     backgroundColor: '#3cba9f',
                     borderColor: "#3cba9f",
                     label: "Timeliness (%)",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target (%)",
                     fill: false
                  }]
            };

            var ctx = $("#local-purchases-timeliness-chart");

            if (window.locPurTimelinessCtx != undefined) {
               window.locPurTimelinessCtx.destroy();
            }

            window.locPurTimelinessCtx = new Chart(ctx, {
               type: 'line',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                  }
               }
            });
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }

   importedPurchasesTimeliness();
   function importedPurchasesTimeliness(){
      var year = $('#imported-purchases-timeliness-year').val();
      
      $.ajax({
         url: "/kpi_overview/material_management/purchase_timeliness/" + year + "/Imported",
         method: "GET",
         success: function(data) {
            var months = [];
            var target = [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80];
            var percentage = [];

            for(var i in data) {
               months.push(data[i].month);
               percentage.push(data[i].percentage);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                     data: percentage,
                     backgroundColor: '#3cba9f',
                     borderColor: "#3cba9f",
                     label: "Timeliness (%)",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target (%)",
                     fill: false
                  }]
            };

            var ctx = $("#imported-purchases-timeliness-chart");

            if (window.impPurTimelinessCtx != undefined) {
               window.impPurTimelinessCtx.destroy();
            }

            window.impPurTimelinessCtx = new Chart(ctx, {
               type: 'line',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                  }
               }
            });
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }

   totals();
   function totals(){
      $.ajax({
         url: "/kpi_overview/material_management/purchasing/totals",
         method: "GET",
         success: function(data) {
            $('#totals-table .total-po').text(data.total_po);
            $('#totals-table .open-po').text(data.open_po);
            $('#totals-table .upcoming-po').text(data.upcoming_deliveries);
            // $('#totals-table .late-po').text(data.late_deliveries);
         },
         error: function(data) {
            alert(data);
         }
      });
   }
});
</script>
@endsection