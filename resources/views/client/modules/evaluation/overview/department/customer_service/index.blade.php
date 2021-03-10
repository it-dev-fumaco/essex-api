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
      <li class="active"><a href="/kpi_stats/customer_service/index">Customer Service</a></li>
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
                  <h2 class="title-2">Customer Service Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li class="active"><a href="/kpi_stats/customer_service/index">Performance Indicator(s)</a></li>
                           <li><a href="/kpi_overview/customer_service/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="margin-top: 10px;">
                        <table style="width: 100%;" id="totals-table">
                           <tr>
                              <td>
                                 <span class="span-title">Total Quotation</span>
                                 <span class="span-value quotation">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Total Sales Order</span>
                                 <span class="span-value sales_order">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Total Delivery Receipt</span>
                                 <span class="span-value delivery_note">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Total Sales Invoice</span>
                                 <span class="span-value sales_invoice">0</span>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-5" style="margin-top: 30px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;" id="cs_timeliness_stat"> S.O Approval Timeliness (<3 hours of approval time)
                              <select style="width: 27%;" id="cs_timeliness_month" class="filter1">
                                 <option value="01" {{ date('m') == 01 ? 'selected' : '' }}>January</option>
                                 <option value="02" {{ date('m') == 02 ? 'selected' : '' }}>February</option>
                                 <option value="03" {{ date('m') == 03 ? 'selected' : '' }}>March</option>
                                 <option value="04" {{ date('m') == 04 ? 'selected' : '' }}>April</option>
                                 <option value="05" {{ date('m') == 05 ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == 06 ? 'selected' : '' }}>June</option>
                                 <option value="07" {{ date('m') == 07 ? 'selected' : '' }}>July</option>
                                 <option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                                 <option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                                 <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                                 <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                                 <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                              </select>
                              <select style="width: 15%;" id="cs_timeliness_year" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                          <div id="cs_performance_chart" style="padding-top: 30px;">
                             <table style="width: 100%; padding-top: 30px;text-align: center;" id="totals-table">
                                 <tr>
                                     <table style="width: 100%;text-align: center;line-height: 12px;" id="totals-table">
                                       <tr>
                                           <td colspan="2">
                                              <span class="span-title" style="font-size: 12px;">Average S.O Approval Time</span>
                                               <span class="span-value avg_hr"></span>
                                           </td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <span class="span-title" style="font-size: 12px;">On-time Aprroval Rate</span>
                                             <span class="span-value ontime_rate"></span>
                                             <span class="span-value total_ontime" style="font-size: 10pt;"></span>
                                          </td>
                                           <td>
                                               <span class="span-title" style="font-size: 12px;">Late Aprroval Rate</span>
                                              <span class="span-value late_rate"></span>
                                              <span class="span-value total_late" style="font-size: 10pt;"></span>
                                          </td>
                                       </tr>
                                    </table>
                                 </tr>
                              </table>
                          </div>
                       </div>
                     </div>
                     <div class="col-md-7" style="margin-top: 30px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;" id="csperformance_kpi">Customer Satisfaction: 
                              <select style="width: 19%;" id="filter_month_csperf" class="filter1">
                                 <option value="01" {{ date('m') == 01 ? 'selected' : '' }}>January</option>
                                 <option value="02" {{ date('m') == 02 ? 'selected' : '' }}>February</option>
                                 <option value="03" {{ date('m') == 03 ? 'selected' : '' }}>March</option>
                                 <option value="04" {{ date('m') == 04 ? 'selected' : '' }}>April</option>
                                 <option value="05" {{ date('m') == 05 ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == 06 ? 'selected' : '' }}>June</option>
                                 <option value="07" {{ date('m') == 07 ? 'selected' : '' }}>July</option>
                                 <option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                                 <option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                                 <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                                 <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                                 <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                              </select>
                              <select style="width: 13%;" id="filter_year_csperf" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                          <div id="cs_performance_chart" style="padding-top: 30px; height: 120px;">
                             <table style="width: 100%; padding-top: 30px;text-align: center;" id="totals-table">
                                 <tr>
                                    <table style="width: 100%;text-align: center;line-height: 18px;" id="totals-table">
                                       <tr>
                                          <td style="width: 20%;">
                                             <span class="span-title" style="font-size: 12px;">Product<br> Performance</span><br>
                                              <span style="display: inline;" class="product_status"></span>
                                             <span class="span-value requests product_perf" style="display: inline;"></span>
                                          </td>
                                          <td style="width: 20%;">
                                              <span class="span-title" style="font-size: 12px;">Delivery and Service Performance</span>
                                              <br>
                                              <span style="display: inline;" class="delivery_status"></span>
                                              <span class="span-value requests delivery_service_perf" style="display: inline;"></span>
                                          </td>
                                          <td style="width: 20%;">
                                             <span class="span-title" style="font-size: 12px;">Technical Service Performance</span>
                                              <br>
                                              <span style="display: inline;" class="tech_status"></span>
                                              <span style="display: inline;" class="span-value requests technical_perf"></span>
                                          </td>
                                          <td style="width: 20%;">
                                             <span class="span-title" style="font-size: 12px;">Sales<br> Performance</span>
                                              <br>
                                              <span style="display: inline;" class="sales_status"></span>
                                              <span style="display: inline;" class="span-value requests sales_perf"></span>
                                          </td>
                                          <td style="width: 20%;">
                                             <span class="span-title" style="font-size: 12px;">Pricing / Cost Performance</span>
                                             <br>
                                             <span style="display: inline;" class="price_status"></span>
                                             <span style="display: inline;" class="span-value requests price_cost_perf"></span>
                                          </td>
                                       </tr>
                                    </table>
                                 </tr>
                              </table>
                          </div>
                       </div>
                     </div>
                     <div class="col-md-7" style="padding-top: 30px;">
                        <div class="box">
                              <div style="text-align: center; font-size: 12pt;" id="kpi-1-filters"><b>Product knowledge and competency of all customer service staff</b>
                                 <select style="width: 12%;" class="year filters">
                                    <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                    <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                    <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                    <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                                 </select>
                              </div>
                              <div>
                                 <canvas id="kpi_1_department" height="120"></canvas>
                              </div>
                        </div>      
                     </div>
                     <div class="col-md-5"style="float: left;margin-top: -255px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 12pt;" id="kpi-2-filters"><b>Processing Delivery of Orders Accuracy</b>
                              <select style="width: 15%;" class="year filters_2">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                               </select>
                           </div>
                           <div>
                              <canvas id="kpi_2_department" height="133"></canvas>
                           </div>
                        </div>      
                     </div>
                  <div class="col-md-12" style="margin-top: 5px;">
                     <h2 class="section-title center" style="font-size: 14pt;margin-top: 30px;">Accuracy in Processing and Delivery of Orders</h2>
                  </div>
                  <div class="col-md-6" style="margin-top: 5px;">
                     <div class="box">
                        <div style="text-align: center; font-size: 13pt;" id="within_departmentfault">Internal Department Issues
                           <select style="width: 28%;" id="within_department_fault_month" class="filter1">
                                 <option value="01" {{ date('m') == 01 ? 'selected' : '' }}>January</option>
                                 <option value="02" {{ date('m') == 02 ? 'selected' : '' }}>February</option>
                                 <option value="03" {{ date('m') == 03 ? 'selected' : '' }}>March</option>
                                 <option value="04" {{ date('m') == 04 ? 'selected' : '' }}>April</option>
                                 <option value="05" {{ date('m') == 05 ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == 06 ? 'selected' : '' }}>June</option>
                                 <option value="07" {{ date('m') == 07 ? 'selected' : '' }}>July</option>
                                 <option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                                 <option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                                 <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                                 <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                                 <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                              </select>
                              <select style="width: 20%;" id="within_department_fault_year" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="within_department_fault_chart"></canvas>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 5px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;" id="external_dept_table">External Department Issues
                              <select style="width: 23%;" id="external-department-month" class="filter1">
                                 <option value="">Select Month</option>
                                 <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>January</option>
                                 <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>February</option>
                                 <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>March</option>
                                 <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                 <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>June</option>
                                 <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>July</option>
                                 <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>August</option>
                                 <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                                 <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>October</option>
                                 <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                 <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>December</option>
                              </select>
                              <select style="width: 13%;" id="external-department-year" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <table class="table table-bordered" id="external_dept_issues" style="margin-top: 10px;font-size: 10pt;">
                              <col style="width: 60%;">
                              <col style="width: 5%;">
                              <thead>
                                 <tr>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">No. of Transaction(s)</th>
                                 </tr>
                              </thead>
                              <tbody class="table_list"></tbody>
                           </table>
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
   #rfd-sales-order .span-value{
      font-size: 15pt;
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
   statkpi1();
   statkpi2();
   withindepartment_fault();
   csperformance_Chart();
   salesTotal();
   csTimeliness_Chart();
   externalissueTable();

   // not_within_departments_fault();


      $('#kpi-1-filters .filters').on('change', function(){
      statkpi1();
      });
       $('#kpi-2-filters .filters_2').on('change', function(){
      statkpi2();
       });
       $('#within_departmentfault .filter1').on('change', function(){
      withindepartment_fault();
       });
       $('#csperformance_kpi .filter1').on('change', function(){
      csperformance_Chart();
       });
      //  $('#notwithin_departments_fault .filter1').on('change', function(){
      // not_within_departments_fault();
      //  });
       $('#cs_timeliness_stat .filter1').on('change', function(){
     csTimeliness_Chart();
       });
      $('#external_dept_table .filter1').on('change', function(){
     externalissueTable();
       });
      


         function statkpi1(){
         var year = $('#kpi-1-filters .year').val();
         data = {
          year : year
          } 

         $.ajax({
            url: "/kpi_overview/customer_service/get_kpi_CsStat1",
            method: "GET",
            data: data,
            success: function(data) {
               var month = [];
               var totals = [];
               var targets = [];

               for(var i in data) {
                 month.push(data[i].month);
                 totals.push(data[i].total);
                 targets.push(data[i].target);
               }

               var chartdata = {
                  labels: month,
                  datasets: [{ 
                              
                              backgroundColor: '#E74C3C',
                              borderColor: '#E74C3C',
                              data: totals,
                              fill: false,
                              label: "Result"
                           },{ 
                              
                              backgroundColor: '#5DADE2',
                              borderColor: "#5DADE2",
                              fill: false,
                              data: targets,
                              label: "Target"
                           }
                         ]
               };

               var ctx = $("#kpi_1_department");

               if (window.kpi_graph != undefined) {
                  window.kpi_graph.destroy();
               }


               window.kpi_graph = new Chart(ctx, {
                  type: 'line',
                  data: chartdata,
                     options: {
                     elements: {
                     line: {
                     tension: 0 // disables bezier curves
                           }
                     },
                     responsive: true,
                     legend: {
                        display: true,
                        position: 'top',
                        labels:{
                           boxWidth: 13
                        }
                     }
                  }
               });
            },
            error: function(data) {
               console.log(data);
            }
         });
      }
      function statkpi2(){
         var year = $('#kpi-2-filters .year').val();
         data = {
          year : year
          } 

         $.ajax({
            url: "/kpi_overview/customer_service/get_kpi_CsStat2",
            method: "GET",
            data: data,
            success: function(data) {
               var month = [];
               var totals = [];
               var targets = [];

               for(var i in data) {
                 month.push(data[i].month);
                 totals.push(data[i].total);
                 targets.push(data[i].target);
               }

               var chartdata = {
                  labels: month,
                  datasets: [{ 
                              
                              backgroundColor: '#E74C3C',
                              borderColor: '#E74C3C',
                              data: totals,
                              fill: false,
                              label: "Result"
                           },{ 
                              
                              backgroundColor: '#5DADE2',
                              borderColor: "#5DADE2",
                              fill: false,
                              data: targets,
                              label: "Target"
                           }
                         ]
               };

               var ctx = $("#kpi_2_department");

               if (window.kpi_graph2 != undefined) {
                  window.kpi_graph2.destroy();
               }


               window.kpi_graph2 = new Chart(ctx, {
                  type: 'line',
                  data: chartdata,
                     options: {
                     elements: {
                     line: {
                     tension: 0 // disables bezier curves
                           }
                     },
                     responsive: true,
                     legend: {
                        display: true,
                        position: 'top',
                        labels:{
                           boxWidth: 13
                        }
                     }
                  }
               });
            },
            error: function(data) {
               console.log(data);
            }
         });
      }
      function withindepartment_fault(){
      var year = $('#within_department_fault_year').val();
      var month = $('#within_department_fault_month').val();
      $.ajax({
         url: "/kpi_overview/customer_service/within_department_fault_chart/"+year,
         method: "GET",
         data: {month:month},
         success: function(data) {
            var causes = [];
            var percentage = [];

            for(var i in data) {
               causes.push(data[i].cause);
               percentage.push(data[i].percentage);
            }

            var chartdata = {
               labels: causes,
               datasets : [{
                  backgroundColor: ['#B71C1C','#EF6C00','#1976D2', '#388E3C'],
                  data: percentage,
               }]
            };

            var ctx = $("#within_department_fault_chart");

            if (window.nonDelCtx1 != undefined) {
               window.nonDelCtx1.destroy();
            }

            window.nonDelCtx1 = new Chart(ctx, {
               type: 'pie',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'right',
                     labels:{
                        boxWidth: 13
                     }
                  }
               }
            });
         },
         error: function(data) {
            alert(data);
         }
      });
   }

   function csperformance_Chart(){
      var year = $('#filter_year_csperf').val();
      var month = $('#filter_month_csperf').val();
      $.ajax({
         url: "/kpi_overview/customer_service/cs_performace_chart/"+ year,
         data: {month:month},
         method: "GET",
         success: function(data) {
            var months = [];
            var product_perf = [];
            var delivery_service_perf = [];
            var technical_perf = [];
            var sales_perf = [];
            var price_cost_perf = [];
            var product_perf_status =[];
            var delivery_service_perf_status =[];
            var technical_perf_status =[];
            var sales_perf_status =[];
            var price_cost_perf_status =[];
            var down = 'down';

            for(var i in data) {
               months.push(data[i].month);
               product_perf.push(data[i].product_perf);
               delivery_service_perf.push(data[i].delivery_service_perf);
               technical_perf.push(data[i].technical_perf);
               sales_perf.push(data[i].sales_perf);
               price_cost_perf.push(data[i].price_cost_perf);
               product_perf_status.push(data[i].product_perf_status);
               delivery_service_perf_status.push(data[i].delivery_service_perf_status);
               technical_perf_status.push(data[i].technical_perf_status);
               sales_perf_status.push(data[i].sales_perf_status);
               price_cost_perf_status.push(data[i].price_cost_perf_status);




            }
            $('#cs_performance_chart .product_perf').text(product_perf + '%');
            $('#cs_performance_chart .delivery_service_perf').text(delivery_service_perf + '%');
            $('#cs_performance_chart .technical_perf').text(technical_perf + '%');
            $('#cs_performance_chart .sales_perf').text(sales_perf + '%');
            $('#cs_performance_chart .price_cost_perf').text(price_cost_perf + '%');


            $('#cs_performance_chart .product_status').html( product_perf_status == down ? '<i class="fa fa-arrow-down" style="color:red;"></i>' : '<i class="fa fa-arrow-up" style="color:green;"></i>' );

            $('#cs_performance_chart .delivery_status').html( delivery_service_perf_status == down ? '<i class="fa fa-arrow-down" style="color:red;"></i>' : '<i class="fa fa-arrow-up" style="color:green;"></i>' );

            $('#cs_performance_chart .tech_status').html( technical_perf_status == down ? '<i class="fa fa-arrow-down" style="color:red;"></i>' : '<i class="fa fa-arrow-up" style="color:green;"></i>' );

            $('#cs_performance_chart .sales_status').html( sales_perf_status == down ? '<i class="fa fa-arrow-down" style="color:red;"></i>' : '<i class="fa fa-arrow-up" style="color:green;"></i>' );

            $('#cs_performance_chart .price_status').html( price_cost_perf_status == down ? '<i class="fa fa-arrow-down" style="color:red;"></i>' : '<i class="fa fa-arrow-up" style="color:green;"></i>' );

         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }
   function salesTotal(){
      $.ajax({
         url: "/kpi_overview/customer_service/get_total_sales",
         method: "GET",
         success: function(data) {
            $('#totals-table .sales_order').text(data.total_sales_order);
            $('#totals-table .quotation').text(data.total_quotation);
            $('#totals-table .delivery_note').text(data.total_delivery_note);
            $('#totals-table .sales_invoice').text(data.total_sales_invoices);
         },
         error: function(data) {
            alert(data);
         }
      });
   }
   function csTimeliness_Chart(){
      var year = $('#cs_timeliness_year').val();
      var month = $('#cs_timeliness_month').val();
      $.ajax({
         url: "/kpi_overview/customer_service/get_csTimeliness/"+ year,
         data: {month:month},
         method: "GET",
         success: function(data) {
            var late_rate = [];
            var ontime_rate = [];
            var avr_hrs_submission = [];
            var total_so_ontime = [];
            var total_so_late = [];


            for(var i in data) {
               late_rate.push(data[i].late_rate);
               ontime_rate.push(data[i].ontime_rate);
               avr_hrs_submission.push(data[i].avr_hrs_submission);
               total_so_ontime.push(data[i].total_so_ontime);
               total_so_late.push(data[i].total_so_late);

            }
            $('#cs_performance_chart .ontime_rate').text(ontime_rate + '%');
            $('#cs_performance_chart .late_rate').text(late_rate + '%');
            $('#cs_performance_chart .total_ontime').text(total_so_ontime);
            $('#cs_performance_chart .total_late').text(total_so_late);
            $('#cs_performance_chart .avg_hr').text(avr_hrs_submission + ' hr(s)');
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }
      function externalissueTable(){
      var year = $('#external-department-year').val();
      var month = $('#external-department-month').val();

      $('#external_dept_issues .table_list').empty();
      $.ajax({
         url: "/kpi_overview/customer_service/not_within_department_fault_chart/"+year,
         method: "GET",
         data: {month:month},
         success: function(data) {
            console.log(data);
            var row = '';
            if (data.length > 0) {
               $.each(data, function(i, v){
                  row += '<tr>' +
                     '<td>' + v.cause + '</td>' + 
                     '<td class="text-center">' + v.percentage + '</td>' +
                     '</tr>';
               });
            }else{
               row += '<tr>' +
                     '<td colspan="3" class="text-center">No Records Found.</td>' +
                     '</tr>';

            }

            $('#external_dept_issues .table_list').append(row);
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }


});
</script>
@endsection