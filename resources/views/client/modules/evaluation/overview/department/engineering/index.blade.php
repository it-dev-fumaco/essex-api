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
      <li class="active"><a href="/kpi_stats/engineering/index">Engineering</a></li>
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
                  <h2 class="title-2">Engineering Department</h2>
                  <div class="pull-right" style="text-align: right; margin-bottom: -70px;">
                     <img src="{{ asset('storage/live.gif') }}" style="width: 15%;">
                     <i>Real-time data from Live ERP</i>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li class="active"><a href="/kpi_stats/Engineeringdepartment">Performance Indicator(s)</a></li>
                           <li><a href="/kpi_overview/engineering/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                     <div class="col-md-12" style="margin-top: 10px;">
                        <table style="width: 100%;" id="totals-table">
                           <tr>
                              <td>
                                 <span class="span-title">Request(s)</span>
                                 <span class="span-value requests">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Approved</span>
                                 <span class="span-value approved">0</span>
                              </td>
                              <td>
                                 <span class="span-title">In Process</span>
                                 <span class="span-value in-process">0</span>
                              </td>
                              <td>
                                 <span class="span-title">For Approval</span>
                                 <span class="span-value for-approval">0</span>
                              </td>
                              <td>
                                 <span class="span-title">For Checking</span>
                                 <span class="span-value for-checking">0</span>
                              </td>
                              <td>
                                 <span class="span-title">For Revision</span>
                                 <span class="span-value for-revision">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Cancelled</span>
                                 <span class="span-value cancelled">0</span>
                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Request for Drawings: 
                              <select style="width: 10%;" id="rfd-per-month-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="rfd-per-month-chart" height="78"></canvas>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">RFD Distribution: 
                              <select style="width: 20%;" id="rfd-distribution-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="rfd-distribution-chart"></canvas>
                              <div><span>RFD Success Rate:</span>
                                    <span id="success-rate-text">0</span></div>
                           </center>
                        </div>
                     </div>  
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">RFD <i class="fa fa-angle-double-right"></i> Sales Conversion: 
                              <select style="width: 20%;" id="rfd-success-rate-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <table style="width: 100%; margin-top: 18px;" id="rfd-sales-order">
                              <tr>
                                 <td>
                                    <span class="span-title">Lamp Post</span>
                                    <span class="span-value lamp-post">0</span>
                                 </td>
                                 <td>
                                    <span class="span-title">Luminaires</span>
                                    <span class="span-value luminaire">0</span>
                                 </td>
                                 <td>
                                    <span class="span-title">Installation Guide</span>
                                    <span class="span-value ins-guide">0</span>
                                 </td>
                                 <td>
                                    <span class="span-title">Others</span>
                                    <span class="span-value others">0</span>
                                 </td>
                              </tr>
                           </table>
                           <canvas id="rfd-success-rate-chart" height="102"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                        <div style="text-align: center; font-size: 13pt;" id="rfd-timeliness-filters">RFD Timeliness: 
                           <select style="width: 30%;" class="category filter">
                              <option value="">Overall</option>
                              <option value="Lamp Post">Lamp Post</option>
                              <option value="Luminaire">Luminaire</option>
                              <option value="Installation Guide">Installation Guide</option>
                              <option value="Others">Others</option>
                           </select>
                           <select style="width: 20%;" class="year filter">
                              <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                              <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                              <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                              <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                              <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                           </select>
                        </div>
                        <canvas id="rfd-timeliness-chart"></canvas>
                     </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">RFD Completion: 
                              <select style="width: 20%;" id="rfd-completion-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="rfd-completion-chart"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">RFD Quality: 
                              <select style="width: 20%;" id="rfd-quality-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="rfd-quality-chart"></canvas>
                           <div style="text-align: center;">
                              <i class="fa fa-info-circle"></i> Note: Updated from Data Inputs.
                           </div>
                           <div style="text-align: center;">
                              Last Updated: <span>{{ date('F d, Y', strtotime($last_update)) }}</span>
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

   rfdTotals();
   rfdMonthlyTotalChart();
   rfdDistributionChart();
   rfdTimeliness();
   rfdCompletion();
   rfdQuality();

   $('#rfd-per-month-year').on('change', function(){
      rfdMonthlyTotalChart();
   });

   $('#rfd-distribution-year').on('change', function(){
      rfdDistributionChart();
   });

   $('#rfd-timeliness-filters .filter').on('change', function(){
      rfdTimeliness();
   });

   $('#rfd-completion-year').on('change', function(){
      rfdCompletion();
   });

   $('#rfd-quality-year').on('change', function(){
      rfdQuality();
   });

   $('#rfd-success-rate-year').on('change', function(){
      rfdSuccessRateChart();
   });

   rfdSuccessRateChart();

   function rfdSuccessRateChart(){
      var year = $('#rfd-success-rate-year').val();
      $.ajax({
         url: "/kpi_overview/engineering/rfd_success_rate/"+ year,
         method: "GET",
         success: function(data) {
            $('#rfd-sales-order .lamp-post').text(data.rfd_lamp_post_rate);
            $('#rfd-sales-order .luminaire').text(data.rfd_luminaire_rate);
            $('#rfd-sales-order .ins-guide').text(data.rfd_ins_guide_rate);
            $('#rfd-sales-order .others').text(data.rfd_others_rate);

            var months = [];
            var lamp_post = [];
            var luminaire = [];
            var ins_guide = [];
            var others = [];

            for(var i in data.chart_data) {
               months.push(data.chart_data[i].month);
               lamp_post.push(data.chart_data[i].lamp_post);
               luminaire.push(data.chart_data[i].luminaire);
               ins_guide.push(data.chart_data[i].ins_guide);
               others.push(data.chart_data[i].others);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#558B2F',
                  data: lamp_post,
                  label: "SO - Lamp Post"
               },
               {
                  backgroundColor: '#00838F',
                  data: luminaire,
                  label: "SO - Luminaire"
               },
               {
                  backgroundColor: '#3F51B5',
                  data: ins_guide,
                  label: "SO - Installation Guide"
               },
               {
                  backgroundColor: '#E53935',
                  data: others,
                  label: "SO - Others"
               }]
               
            };

            var ctx = $("#rfd-success-rate-chart");

            if (window.rfdSuccessRateCtx != undefined) {
               window.rfdSuccessRateCtx.destroy();
            }

            window.rfdSuccessRateCtx = new Chart(ctx, {
               type: 'bar',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  scales: {
                     xAxes: [{ stacked: true }],
                     yAxes: [{ stacked: true }]
                  },
                  tooltips: {
                     mode: 'label',
                     callbacks: {
                        label: function(t, d) {
                           var dstLabel = d.datasets[t.datasetIndex].label;
                           var yLabel = t.yLabel;
                           return dstLabel + ': ' + yLabel;
                        }
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

   function rfdMonthlyTotalChart(){
      var year = $('#rfd-per-month-year').val();
      $.ajax({
         url: "/kpi_overview/engineering/rfd_per_month/"+ year,
         method: "GET",
         success: function(data) {
            var months = [];
            var total_rfd_per_month = [];
            var total_rfd_for_others = [];
            var total_rfd_for_lamp_post = [];
            var total_rfd_for_luminaires = [];

            for(var i in data) {
               months.push(data[i].month);
               total_rfd_per_month.push(data[i].total_rfd_per_month);
               total_rfd_for_others.push(data[i].total_rfd_for_others);
               total_rfd_for_lamp_post.push(data[i].total_rfd_for_lamp_post);
               total_rfd_for_luminaires.push(data[i].total_rfd_for_luminaires);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#F1C40F',
                  data: total_rfd_for_others,
                  label: "No. of RFD for Others"
               },
               {
                  backgroundColor: '#2e86c1',
                  data: total_rfd_for_lamp_post,
                  label: "No. of RFD for Lamp Post"
               },
               {
                  backgroundColor: '#E74C3C',
                  data: total_rfd_for_luminaires,
                  label: "No. of RFD for Luminaire"
               },
               {
                  backgroundColor: '#27AE60',
                  data: total_rfd_per_month,
                  label: "No. of RFD per Month"
               }]
               
            };

            var ctx = $("#rfd-per-month-chart");

            if (window.rfdPerMonthCtx != undefined) {
               window.rfdPerMonthCtx.destroy();
            }

            window.rfdPerMonthCtx = new Chart(ctx, {
               type: 'bar',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
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

   function rfdDistributionChart(){
      var year = $('#rfd-distribution-year').val();
      $.ajax({
         url: "/kpi_overview/engineering/rfd_distribution/"+year,
         method: "GET",
         success: function(data) {
            $('#success-rate-text').text(data.success_rate);
            var labels = ['No. of RFD for Lamp Post', 'No. of RFD for Luminaire', 'No. of RFD for Others'];
            var total_percentage = [data.rfd_for_lamp_post, data.rfd_for_luminaires, data.rfd_for_others];

            var chartdata = {
               labels: labels,
               datasets : [{
                  backgroundColor: ['#2980B9','#27AE60','#E74C3C'],
                  data: total_percentage,
                  label: "RFD Distribution"
               }]
            };

            var ctx = $("#rfd-distribution-chart");

            if (window.leaveGraph != undefined) {
               window.leaveGraph.destroy();
            }

            window.leaveGraph = new Chart(ctx, {
               type: 'pie',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
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

   function rfdTotals(){
      $.ajax({
         url: "/kpi_overview/engineering/rfd_totals",
         method: "GET",
         success: function(data) {
            $('#totals-table .requests').text(data.total_rfd_requests);
            $('#totals-table .in-process').text(data.total_rfd_in_process);
            $('#totals-table .for-checking').text(data.total_rfd_for_checking);
            $('#totals-table .for-approval').text(data.total_rfd_for_approval);
            $('#totals-table .approved').text(data.total_rfd_approved);
            $('#totals-table .for-revision').text(data.total_rfd_for_revision);
            $('#totals-table .cancelled').text(data.total_rfd_cancelled);
         },
         error: function(data) {
            alert(data);
         }
      });
   }

   function rfdTimeliness(){
      var year = $('#rfd-timeliness-filters .year').val();
      var category = $('#rfd-timeliness-filters .category').val();
      
      $.ajax({
         url: "/kpi_overview/engineering/rfd_timeliness/" + year,
         method: "GET",
         data: {category: category},
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
                     label: "Dept. Drawing Timeliness",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target",
                     fill: false
                  }]
            };

            var ctx = $("#rfd-timeliness-chart");

            if (window.rfdTimelinessCtx != undefined) {
               window.rfdTimelinessCtx.destroy();
            }

            window.rfdTimelinessCtx = new Chart(ctx, {
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

   function rfdCompletion(){
      var year = $('#rfd-completion-year').val();
      $.ajax({
         url: "/kpi_overview/engineering/rfd_completion/" + year,
         method: "GET",
         success: function(data) {
            var months = [];
            var target = [95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95, 95];
            var percentage = [];

            for(var i in data.months) {
               months.push(data.months[i]);
               percentage.push(data.percentage[i]);
            }
            
            var chartdata = {
               labels: months,
               datasets : [{
                     data: percentage,
                     backgroundColor: '#3cba9f',
                     borderColor: "#3cba9f",
                     label: "Dept. Drawing Completion",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target",
                     fill: false
                  }]
            };

            var ctx = $("#rfd-completion-chart");

            if (window.rfdCompletionCtx != undefined) {
               window.rfdCompletionCtx.destroy();
            }

            window.rfdCompletionCtx = new Chart(ctx, {
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

   function rfdQuality(){
      var year = $('#rfd-quality-year').val();
      $.ajax({
         url: "/kpi_overview/engineering/rfd_quality/" + year,
         method: "GET",
         success: function(data) {
            var months = [];
            var target = [98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98];
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
                     label: "Dept. Drawing Quality",
                     fill: false
                  },
                  {
                     data: target,
                     backgroundColor: '#3e95cd',
                     borderColor: "#3e95cd",
                     label: "Target",
                     fill: false
                  }]
            };

            var ctx = $("#rfd-quality-chart");

            if (window.rfdQualityCtx != undefined) {
               window.rfdQualityCtx.destroy();
            }

            window.rfdQualityCtx = new Chart(ctx, {
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
});
</script>
@endsection