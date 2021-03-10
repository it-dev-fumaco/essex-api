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
      <li class="active"><a href="/kpi_stats/accounting/index">Accounting</a></li>
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
                  <h2 class="title-2">Accounting Department</h2>
                  <div class="pull-right" style="text-align: right; margin-bottom: -70px;">
                     <img src="{{ asset('storage/live.gif') }}" style="width: 15%;">
                     <i>Real-time data from Live ERP</i>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li><a href="/kpi_stats/accounting/index">Performance Indicator(s) - Sales</a></li>
                           <li class="active"><a href="/kpi_stats/accounting/index2">Performance Indicator(s) - Purchases</a></li>
                           <li><a href="/kpi_overview/accounting/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  @php 
                     $class =( Auth::user()->department_id != 1 && !in_array(Auth::user()->user_id, [8888, 0001, 0101, 2090])) ? 'hidden' : ''
                  @endphp
                  <div class="row" {{ $class }}>
                     <h2 class="section-title center">Purchases</h2>
                     <div class="col-md-6">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Purchase Invoice(s): 
                              <select style="width: 15%;" id="pinv-per-month-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="sinv-per-month-chart" height="150"></canvas>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Cash Disbursement: 
                              <select style="width: 35%;" id="cash-disbursement-branch" class="filter2">
                                 <option value="">All Branch</option>
                                 <option value="FUMACO Plant 2">FUMACO Plant 2</option>
                                 <option value="FUMACO Sales Office">FUMACO Sales Office</option>
                              </select>
                              <select style="width: 15%;" id="cash-disbursement-year" class="filter2">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="cash-disbursement-chart" height="150"></canvas>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-12" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Purchase Invoice Analysis Chart: 
                              <select style="width: 35%;" id="pinv-analysis-ctx-branch" class="filter3" hidden>
                                 <option value="">All Branch</option>
                                 <option value="Plant 2">FUMACO Plant 2</option>
                                 <option value="Sales Office">FUMACO Sales Office</option>
                                 <option value="Filunited">Filunited</option>
                              </select>
                              <select style="width: 15%;" id="pinv-analysis-ctx-year" class="filter3">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="pinv-analysis-ctx-chart" height="50"></canvas>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-12" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Purchase Invoice Analysis:
                              <select style="width: 25%;" class="filter1" id="pinv-analysis-branch" hidden>
                                 <option value="">All Branches</option>
                                 <option value="Plant 2">Plant 2</option>
                                 <option value="Sales Office">Sales Office</option>
                                 <option value="Filunited">Filunited</option>
                              </select>
                              <select style="width: 15%;" class="filter1" id="pinv-analysis-month">
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
                              <select style="width: 15%;" class="filter1" id="pinv-analysis-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <table class="table table-bordered" id="pinv-analysis-tbl" style="margin-top: 10px; font-size: 11pt;">
                              <thead>
                                 <tr>
                                    <th class="text-center">Total PI</th>
                                    <th class="text-center">Cash PI</th>
                                    <th class="text-center">Credit PI</th>
                                    <th class="text-center">Beyond Terms</th>
                                    <th class="text-center">Delinquent</th>
                                    <th class="text-center">%</th>
                                 </tr>
                              </thead>
                              <tbody></tbody>
                           </table>
                           <div style="text-align: center; font-size: 13pt;">Delinquent Purchase Invoice(s)
                              <table class="table table-bordered" style="margin-top: 10px; font-size: 11pt;">
                                 <col style="width: 150px;">
                                 <col style="width: 150px;">
                                 <col style="width: 150px;">
                                 <col style="width: 350px;">
                                 <col style="width: 200px;">
                                 <col style="width: 104px;">
                                 <thead>
                                    <tr>
                                       <th class="text-center">Date</th>
                                       <th class="text-center">Terms</th>
                                       <th class="text-center">Inv No.</th>
                                       <th class="text-center">Supplier</th>
                                       <th class="text-center">Amount</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                              </table>
                              <table class="table table-bordered tbl1" id="delinquent-inv-tbl" style="margin-top: -21px; font-size: 11pt;">
                                 <tbody></tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Top 10 Expenses: 
                              <select style="width: 15%;" id="top-expenses-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <center>
                              <canvas id="top-expenses-chart" height="100"></canvas>
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

   #delinquent-inv-tbl tbody{
     display:block;
     width: 100%;
     overflow: auto;
     height: 250px;
   }

   .tbl1 td:nth-child(1) {width: 150px;}
   .tbl1 td:nth-child(2) {width: 150px;}
   .tbl1 td:nth-child(3) {width: 150px;}
   .tbl1 td:nth-child(4) {width: 350px;}
   .tbl1 td:nth-child(5) {width: 200px;}
   .tbl1 td:nth-child(6) {width: 96px;}

   /* Scrollbar styles */
   table ::-webkit-scrollbar {
   width: 8px;
   height: 15px;
   background-color: #F5F5F5;
   border-radius: 3px;
   }

   table ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #555;
      border-radius: 3px;
   }
</style>
@endsection

@section('script')
<script>
$(document).ready(function(){
   console.log('ready');

   pinvPerMonth();

   $('#pinv-per-month-year').on('change', function(){
      pinvPerMonth();
   });

   $('.filter3').on('change', function(){
      pinvAnalysisCtx();
   });

   $('.filter2').on('change', function(){
      cashDisbursement();
   });

   $('.filter1').on('change', function(){
      pinvAnalysis();
   });

   $('#top-expenses-year').on('change', function(){
      topExpenses();
   });

   function currencyFormat(num) {
      return '₱' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
   }

   function pinvPerMonth(){
      var year = $('#pinv-per-month-year').val();
      $.ajax({
         url: "/kpi_overview/accounting/pinv_per_month/"+ year,
         method: "GET",
         success: function(data) {
            var months = [];
            var total = [];
            var cash_pinv = [];
            var other_pinv = [];

            for(var i in data) {
               months.push(data[i].month);
               total.push(data[i].total);
               cash_pinv.push(data[i].cash_pinv);
               other_pinv.push(data[i].other_pinv);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#1976D2',
                  data: total,
                  label: "Total no. of Purchase Invoice(s)"
               },
               {
                  backgroundColor: '#388E3C',
                  data: cash_pinv,
                  label: "No. of Cash Purchase Invoice(s)"
               },
               {
                  backgroundColor: '#E53935',
                  data: other_pinv,
                  label: "No. of Credit Purchase Invoice(s)"
               }]
            };

            var ctx = $("#sinv-per-month-chart");

            if (window.pinvPerMonthCtx != undefined) {
               window.pinvPerMonthCtx.destroy();
            }

            window.pinvPerMonthCtx = new Chart(ctx, {
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
            alert('Error fetching Purchase Invoice per Month!');
         }
      });
   }

   pinvAnalysis();
   function pinvAnalysis(){
      var branch = $('#pinv-analysis-branch').val();
      var month = $('#pinv-analysis-month').val();
      var year = $('#pinv-analysis-year').val();

      data = {
         month: month,
         branch: branch
      }

      $('#delinquent-inv-tbl tbody').empty();
      $('#pinv-analysis-tbl tbody').empty();
      $.ajax({
         url: "/kpi_overview/accounting/pinv_analysis/" + year,
         method: "GET",
         data: data,
         success: function(data) {
            var row = '<tr><td class="text-center">' + data.total_pinv + '</td>' +
               '<td class="text-center">' + data.cash_pinv + '</td>' +
               '<td class="text-center">' + data.credit_pinv + '</td>' +
               '<td class="text-center">' + data.beyond_terms + '</td>' +
               '<td class="text-center">' + data.delinquent_pinv + '</td>' +
               '<td class="text-center">' + data.percentage + '%</td></tr>';

            var row1 = '';
            $.each(data.delinquent, function(i, v){
               row1 += '<tr><td class="text-center">' + v.posting_date + '</td>' +
                  '<td class="text-center">' + v.tc_name + '</td>' +
                  '<td class="text-center">' + v.bill_no + '</td>' +
                  '<td class="text-center">' + v.supplier + '</td>' +
                  '<td class="text-center">' + currencyFormat(parseInt(v.grand_total)) + '</td>' +
                  '<td class="text-center">' + v.status + '</td></tr>';
            });
            
            $('#delinquent-inv-tbl tbody').append(row1);
            $('#pinv-analysis-tbl tbody').append(row);
         },
         error: function(data) {
            alert('Error fetching Purchase Invoice Analysis!');
         }
      });
   }

   cashDisbursement();
   function cashDisbursement(){
      var branch = $('#cash-disbursement-branch').val();
      var year = $('#cash-disbursement-year').val();
      $.ajax({
         url: "/kpi_overview/accounting/cash_disbursement/"+ year,
         method: "GET",
         data: {branch: branch},
         success: function(data) {
            var months = [];
            var total = [];

            for(var i in data) {
               months.push(data[i].month);
               total.push(data[i].total);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#1976D2',
                  data: total,
                  label: "Grand Total"
               }]
            };

            var ctx = $("#cash-disbursement-chart");

            if (window.cashDisCtx != undefined) {
               window.cashDisCtx.destroy();
            }

            window.cashDisCtx = new Chart(ctx, {
               type: 'bar',
               data: chartdata,
               options: {
                  tooltips: {
                     callbacks: {
                        label: function(tooltipItem) {
                           return currencyFormat(tooltipItem.yLabel);
                        }
                     }
                  },
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  scales: {
                     yAxes: [{
                         ticks: {
                             callback: function(value, index, values) {
                                 return currencyFormat(value);
                             }
                         }
                     }]
                  }
               }
            });
         },
         error: function(data) {
            alert('Error fetching Cash Disbursement!');
         }
      });
   }

   topExpenses();
   function topExpenses(){
      var year = $('#top-expenses-year').val();
      $.ajax({
         url: "/kpi_overview/accounting/top_expenses/"+ year,
         method: "GET",
         success: function(data) {
            var expense_type = [];
            var total = [];

            for(var i in data) {
               expense_type.push(data[i].expense_type);
               total.push(data[i].total);
            }

            var chartdata = {
               labels: expense_type,
               datasets : [{
                  backgroundColor: '#3cba9f',
                  data: total,
                  label: "Total Amount"
               }]
               
            };

            var ctx = $("#top-expenses-chart");

            if (window.topExpCtx != undefined) {
               window.topExpCtx.destroy();
            }

            window.topExpCtx = new Chart(ctx, {
               type: 'horizontalBar',
               data: chartdata,
               options: {
                   tooltips: {
                     callbacks: {
                        label: function(tooltipItem) {
                           return currencyFormat(tooltipItem.xLabel);
                        }
                     }
                  },
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  scales: {
                     xAxes: [{
                         ticks: {
                             callback: function(value, index, values) {
                                 return currencyFormat(value);
                             }
                         }
                     }]
                  }
               }
            });
         },
         error: function(data) {
            alert('Error fetching Top Expenses!');
         }
      });
   }

   pinvAnalysisCtx();
   function pinvAnalysisCtx(){
      var branch = $('#pinv-analysis-ctx-branch').val();
      var year = $('#pinv-analysis-ctx-year').val();
      $.ajax({
         url: "/kpi_overview/accounting/pinv_analysis_ctx/"+ year,
         method: "GET",
         data: {branch: branch},
         success: function(data) {
            var months = [];
            var total = [];

            for(var i in data) {
               months.push(data[i].month);
               total.push(data[i].total);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#1976D2',
                  fill: false,
                  borderColor: "#1976D2",
                  data: total,
                  label: "Grand Total"
               }]
            };

            var ctx = $("#pinv-analysis-ctx-chart");

            if (window.pinvAnalysisCtx2 != undefined) {
               window.pinvAnalysisCtx2.destroy();
            }

            window.pinvAnalysisCtx2 = new Chart(ctx, {
               type: 'line',
               data: chartdata,
               options: {
                  tooltips: {
                     callbacks: {
                        label: function(tooltipItem) {
                           return tooltipItem.yLabel + "%";
                        }
                     }
                  },
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
                  scales: {
                     yAxes: [{
                         ticks: {
                             callback: function(value, index, values) {
                                 return value + "%";
                             }
                         }
                     }]
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
            alert('Error fetching Purchase Invoice Analysis Chart!');
         }
      });
   }
});
</script>
@endsection