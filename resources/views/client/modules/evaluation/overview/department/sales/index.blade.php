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
      <li class="active"><a href="/kpi_stats/sales/index">Sales</a></li>
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
                  <h2 class="title-2">Sales Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li class="active"><a href="/kpi_stats/sales/index">Performance Indicator(s)</a></li>
                           <li><a href="/kpi_overview/sales/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="margin-bottom: 20px;">
                        <table style="width: 100%;" id="totals-table">
                           <tr>
                              <td>
                                 <span class="span-title">Total Sales Order(s)</span>
                                 <span class="span-value total-so">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Overdue Sales Order(s)</span>
                                 <span class="span-value total-overdue">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Total Delivery Receipt(s)</span>
                                 <span class="span-value total-dr">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Pending for Delivery</span>
                                 <span class="span-value for-dr">0</span>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-8" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Sales Chart: 
                              <select style="width: 15%;" id="sales-year">
                                 <option value="2017" {{ date('Y') == 2017 ? 'selected' : '' }}>2017</option>
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="sales-chart" height="130"></canvas>
                        </div>
                     </div>
                     <div class="col-md-4" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Annual Sales</div>
                           <div class="row">
                              <div class="col-md-6 text-center">
                                 <span style="font-size: 13pt; display: block;">
                                    {{ $annual_sales['previous_year'] }}
                                 </span>
                                 <span style="font-size: 20pt; display: block; padding: 15px;">
                                    {{ $annual_sales['previous_sales_shorten'] }}
                                 </span>
                              </div>
                              <div class="col-md-6 text-center">
                                 <span style="font-size: 13pt; display: block;">
                                    {{ $annual_sales['current_year'] }}
                                 </span>
                                 <span style="font-size: 20pt; display: block; padding: 15px;">
                                    {{ $annual_sales['current_sales_shorten'] }}
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-8" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Opportunity Stats: 
                              <select style="width: 15%;" id="opportunity-year">
                                 <option value="2017" {{ date('Y') == 2017 ? 'selected' : '' }}>2017</option>
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="opportunity-chart" height="90"></canvas>
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
   $('#sales-year').on('change', function(){
      salesChart();
   });

   $('#opportunity-year').on('change', function(){
      optyStats();
   });

   totals();
   function totals(){
      $.ajax({
         url: "/kpi_overview/sales/totals",
         method: "GET",
         success: function(data) {
            $('#totals-table .total-so').text(data.sales_order);
            $('#totals-table .total-overdue').text(data.overdue_sales_order);
            $('#totals-table .total-dr').text(data.delivery_note);
            $('#totals-table .for-dr').text(data.for_delivery);
         },
         error: function(data) {
            alert(data);
         }
      });
   }

   function currencyFormat(num) {
      return '₱' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
   }

   salesChart();
   function salesChart(){
      var year = $('#sales-year').val();
      $.ajax({
         url: "/kpi_overview/sales/sales_chart/" + year,
         method: "GET",
         success: function(data) {
            var months = [];
            var total = [];
            var regular_sales = [];
            var sales_consignment = [];
            var sales_dr = [];

            for(var i in data) {
               months.push(data[i].month);
               total.push(data[i].total);
               regular_sales.push(data[i].regular_sales);
               sales_consignment.push(data[i].sales_consignment);
               sales_dr.push(data[i].sales_dr);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                     data: total,
                     backgroundColor: '#D68910',
                     borderColor: "#D68910",
                     label: "Overall",
                     fill: false,
                     type: 'line'
                  },{
                     data: regular_sales,
                     backgroundColor: '#2980B9',
                     borderColor: "#2980B9",
                     label: "Regular Sales",
                     fill: false,
                  },
                  {
                     data: sales_consignment,
                     backgroundColor: '#CB4335',
                     borderColor: "#CB4335",
                     label: "Sales on Consignment",
                     fill: false
                  },
                  {
                     data: sales_dr,
                     backgroundColor: '#1E8449',
                     borderColor: "#1E8449",
                     label: "Sales DR",
                     fill: false
                  }]
            };

            var ctx = $("#sales-chart");

            if (window.salesCtx != undefined) {
               window.salesCtx.destroy();
            }

            window.salesCtx = new Chart(ctx, {
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
                  elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                  },
                  scales: {
                     yAxes: [{
                         ticks: {
                             // Include a dollar sign in the ticks
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
            alert('Error fetching data!');
         }
      });
   }

   optyStats();
   function optyStats(){
      var year = $('#opportunity-year').val();
      $.ajax({
         url: "/kpi_overview/sales/opty_stats/" + year,
         method: "GET",
         success: function(data) {
            var lbls = ['Won', 'Quotation', 'Open', 'Lost'];
            var val = [data.won, data.qtn, data.open, data.lost];

            var chartdata = {
               labels: lbls,
               datasets : [{
                     data: val,
                     backgroundColor: '#AED6F1',
                     borderColor: "#0097A7",
                     borderWidth: 2,
                     label: "Total No. of Opportunity",
                  }]
            };

            var ctx = $("#opportunity-chart");
            if (window.optyCtx != undefined) {
               window.optyCtx.destroy();
            }

            window.optyCtx = new Chart(ctx, {
               type: 'horizontalBar',
               data: chartdata,
               options: {
                  responsive: true,
                  legend: {
                     position: 'top',
                     labels:{
                        boxWidth: 11
                     }
                  },
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