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
               <div class="inner-b1ox featured">
                  <h2 class="title-2">Traffic & Distribution Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li class="active"><a href="/kpi_stats/traffic_and_distribution/index">Performance Indicator(s)</a></li>
                           <li><a href="/kpi_overview/traffic_and_distribution/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Completion of Daily Delivery Schedule: 
                              <select style="width: 20%;" id="del-completion-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="delivery-completion-chart"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Delivery of Products in Good Condition: 
                              <select style="width: 20%;" id="del-good-condition-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="del-good-condition-chart"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;" id="causes-non-delivery">Non-Delivery Causes by T&D: 
                              <select style="width: 15%;" id="causes-non-delivery-month1" class="filter1">
                                 <option value="">Month</option>
                                 <option value="01">Jan</option>
                                 <option value="02">Feb</option>
                                 <option value="03">Mar</option>
                                 <option value="04">Apr</option>
                                 <option value="05">May</option>
                                 <option value="06">Jun</option>
                                 <option value="07">Jul</option>
                                 <option value="08">Aug</option>
                                 <option value="09">Sept</option>
                                 <option value="10">Oct</option>
                                 <option value="11">Nov</option>
                                 <option value="12">Dec</option>
                              </select>
                              <select style="width: 15%;" id="causes-non-delivery-year1" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="causes-non-delivery-chart1"></canvas>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 12.5pt;" id="causes-non-delivery2">Non-Delivery Customer-related Causes: 
                              <select style="width: 15%;" id="causes-non-delivery-month2" class="filter2">
                                 <option value="">Month</option>
                                 <option value="01">Jan</option>
                                 <option value="02">Feb</option>
                                 <option value="03">Mar</option>
                                 <option value="04">Apr</option>
                                 <option value="05">May</option>
                                 <option value="06">Jun</option>
                                 <option value="07">Jul</option>
                                 <option value="08">Aug</option>
                                 <option value="09">Sept</option>
                                 <option value="10">Oct</option>
                                 <option value="11">Nov</option>
                                 <option value="12">Dec</option>
                              </select>
                              <select style="width: 15%;" id="causes-non-delivery-year2" class="filter2">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="causes-non-delivery-chart2"></canvas>
                           </center>
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
   deliveryCompletion();
   deliveryGoodCondition();
   causesNonDeliveryDept();
   causesNonDeliveryCust();

   $('#del-completion-year').on('change', function(){
      deliveryCompletion();
   });

   $('#del-good-condition-year').on('change', function(){
      deliveryGoodCondition();
   });

   $('.filter1').on('change', function(){
      causesNonDeliveryDept();
   });

   $('.filter2').on('change', function(){
      causesNonDeliveryCust();
   });
   
   function deliveryCompletion(){
      var year = $('#del-completion-year').val();      
      $.ajax({
         url: "/kpi_overview/traffic_and_distribution/delivery_completion/" + year,
         method: "GET",
         success: function(data) {
            var months = [];
            var target = [95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95];
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
                  label: "Completion (%)",
                  fill: false
               },
               {
                  data: target,
                  backgroundColor: '#3e95cd',
                  borderColor: "#3e95cd",
                  label: "Target (95%)",
                  fill: false
               }]
            };

            var ctx = $("#delivery-completion-chart");

            if (window.delCompletionCtx != undefined) {
               window.delCompletionCtx.destroy();
            }

            window.delCompletionCtx = new Chart(ctx, {
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
            alert('Error fetching Delivery Completion!');
         }
      });
   }

   function deliveryGoodCondition(){
      var year = $('#del-good-condition-year').val();
      $.ajax({
         url: "/kpi_overview/traffic_and_distribution/delivery_good_condition/" + year,
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
                     label: "Percentage (%)",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target (100%)",
                     fill: false
                  }]
            };

            var ctx = $("#del-good-condition-chart");

            if (window.deliveryGoodCtx != undefined) {
               window.deliveryGoodCtx.destroy();
            }

            window.deliveryGoodCtx = new Chart(ctx, {
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

   function causesNonDeliveryDept(){
      var year = $('#causes-non-delivery-year1').val();
      var month = $('#causes-non-delivery-month1').val();
      $.ajax({
         url: "/kpi_overview/traffic_and_distribution/non_delivery_dept_cause/"+year,
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

            var ctx = $("#causes-non-delivery-chart1");

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

   function causesNonDeliveryCust(){
      var year = $('#causes-non-delivery-year2').val();
      var month = $('#causes-non-delivery-month2').val();
      $.ajax({
         url: "/kpi_overview/traffic_and_distribution/non_delivery_cust_cause/"+year,
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
                  backgroundColor: ['#F44336', '#4DD0E1', '#66BB6A', '#FBC02D', '#0D47A1', '#6A1B9A'],
                  data: percentage,
               }]
            };

            var ctx = $("#causes-non-delivery-chart2");

            if (window.nonDelCtx2 != undefined) {
               window.nonDelCtx2.destroy();
            }

            window.nonDelCtx2 = new Chart(ctx, {
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
});
</script>
@endsection