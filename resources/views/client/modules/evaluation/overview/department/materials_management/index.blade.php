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
                           <li class="active"><a href="/kpi_stats/material_management/index">Performance Indicator(s) - Inventory</a></li>
                           <li><a href="/kpi_stats/material_management/index2">Performance Indicator(s) - Purchasing</a></li>
                           <li><a href="/kpi_overview/material_management/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" style="margin-bottom: 20px;">
                        <table style="width: 100%;" id="totals-table">
                           <tr>
                              <td>
                                 <span class="span-title">Total Stock Entries</span>
                                 <span class="span-value total-ste">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Open Stock Entries</span>
                                 <span class="span-value open-ste">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Material Receipt(s)</span>
                                 <span class="span-value mr-ste">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Material Issue(s)</span>
                                 <span class="span-value mi-ste">0</span>
                              </td>
                              <td>
                                 <span class="span-title">Material Transfer for Manufacture</span>
                                 <span class="span-value mtfm-ste">0</span>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <h2 class="section-title center" style="font-size: 14pt;">Inventory Accuracy</h2>
                     <div class="col-md-5">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Overall Inventory Accuracy: 
                              <select style="width: 18%;" id="overall-inventory-year">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="overall-inventory-chart" height="154"></canvas>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Monthly Inventory Accuracy: 
                              <select style="width: 15%;" id="monthly-inv-month" class="filter">
                                 <option value="">Select Month</option>
                                 <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Jan</option>
                                 <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Feb</option>
                                 <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Mar</option>
                                 <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>Apr</option>
                                 <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Jun</option>
                                 <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Jul</option>
                                 <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Aug</option>
                                 <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>Sept</option>
                                 <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oct</option>
                                 <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>Nov</option>
                                 <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Dec</option>
                              </select>
                              <select style="width: 13%;" id="monthly-inv-year" class="filter">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <table class="table table-bordered" id="monthly-inv-chart" style="margin-top: 10px;">
                              <col style="width: 30%;">
                              <col style="width: 30%;">
                              <col style="width: 20%;">
                              <col style="width: 20%;">
                              <thead>
                                 <tr>
                                    <th class="text-center">Item Classification</th>
                                    <th class="text-center">Warehouse</th>
                                    <th class="text-center">Accuracy (%)</th>
                                    <th class="text-center">Target (%)</th>
                                 </tr>
                              </thead>
                              <tbody class="item-classification"></tbody>
                           </table>
                        </div>
                     </div>
                     <div class="col-md-12" style="margin-top: 20px;">
                        <h2 class="section-title center" style="font-size: 14pt;">Stock Movements</h2>
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">
                              <select style="width: 20%;" id="item-classification-select" class="filter2">
                                 <option value="">All Item Classification</option>
                                 @foreach($item_classification as $class)
                                 <option value="{{ $class->name }}">{{ $class->name }}</option>
                                 @endforeach
                              </select>
                              <select style="width: 10%;" id="item-classification-year" class="filter2">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <canvas id="item-classification-chart" height="78"></canvas>
                        </div>
                     </div>
                     <div class="col-md-12" style="margin-top: 20px;">
                        <div class="box">
                           <div style="text-align: center; font-size: 13pt;">Top 10 Fast Moving Items: 
                              <select style="width: 15%;" id="item-movement-month" class="filter1">
                                 <option value="">Select Month</option>
                                 <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Jan</option>
                                 <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Feb</option>
                                 <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Mar</option>
                                 <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>Apr</option>
                                 <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>May</option>
                                 <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Jun</option>
                                 <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Jul</option>
                                 <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Aug</option>
                                 <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>Sept</option>
                                 <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oct</option>
                                 <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>Nov</option>
                                 <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Dec</option>
                              </select>
                              <select style="width: 13%;" id="item-movement-year" class="filter1">
                                 <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                 <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                 <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                 <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                 <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                              </select>
                           </div>
                           <table class="table table-bordered" id="item-movement-tbl" style="margin-top: 10px;">
                              <col style="width: 20%;">
                              <col style="width: 40%;">
                              <col style="width: 20%;">
                              <thead>
                                 <tr>
                                    <th class="text-center">Item Code</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Item Classification</th>
                                    <th class="text-center">No. of Transaction(s)</th>
                                 </tr>
                              </thead>
                              <tbody class="item-list"></tbody>
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
   $('#overall-inventory-year').on('change', function(){
      overallInvAccuracyChart();
   });

   $('.filter').on('change', function(){
      monthlyInvAccuracyTbl();
   });

   $('.filter1').on('change', function(){
      itemMovementTbl();
   });

   $('.filter2').on('change', function(){
      itemClassMovement();
   });

   overallInvAccuracyChart();
   function overallInvAccuracyChart(){
      var year = $('#overall-inventory-year').val();
      $.ajax({
         url: "/kpi_overview/material_management/inv_accuracy/"+ year,
         method: "GET",
         success: function(data) {
            var months = [];
            var average = [];

            for(var i in data) {
               months.push(data[i].month);
               average.push(data[i].average);
            }

            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#2e86c1',
                  data: average,
                  label: "Overall Average (%)"
               }]
            };

            var ctx = $("#overall-inventory-chart");

            if (window.overallAccCtx != undefined) {
               window.overallAccCtx.destroy();
            }

            window.overallAccCtx = new Chart(ctx, {
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

   monthlyInvAccuracyTbl();
   function monthlyInvAccuracyTbl(){
      var year = $('#monthly-inv-year').val();
      var month = $('#monthly-inv-month').val();

      $('#monthly-inv-chart .item-classification').empty();
      $.ajax({
         url: "/kpi_overview/material_management/inv_accuracy/"+ year,
         method: "GET",
         success: function(data) {
            var row = '';
            $.each(data, function(i, d){
               if (d.month_no == month) {
                  if (d.audit_per_month.length > 0) {

                     $.each(d.audit_per_month, function(i, v){
                        var target = parseFloat(v.percentage_sku);
                        var percentage = parseFloat(v.average_accuracy_rate);
                        stat = (percentage >= v.percentage_sku) ? 'fa-thumbs-up' : 'fa-thumbs-down';
                        color = (percentage >= v.percentage_sku) ? 'green' : 'red';
                        row += '<tr>' +
                           '<td>' + v.item_classification + '</td>' +
                           '<td>' + v.warehouse + '</td>' + 
                           '<td class="text-center"><i class="fa '+stat+'" style="color:'+color+';"></i> ' + percentage.toFixed(2) + '%</td>' + 
                           '<td class="text-center">' + target.toFixed(2) + '%</td>' +
                           '</tr>';
                     });
                  }else{
                     row += '<tr>' +
                           '<td colspan="4" class="text-center">No Records Found.</td>' +
                           '</tr>';

                  }
               }
            });

            $('#monthly-inv-chart .item-classification').append(row);
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }

   itemMovementTbl();
   function itemMovementTbl(){
      var year = $('#item-movement-year').val();
      var month = $('#item-movement-month').val();

      $('#item-movement-tbl .item-list').empty();
      $.ajax({
         url: "/kpi_overview/material_management/item_movements/" + year,
         method: "GET",
         data: {month:month},
         success: function(data) {
            var row = '';
            if (data.length > 0) {
               $.each(data, function(i, v){
                  row += '<tr>' +
                     '<td class="text-center">' + v.code + '</td>' +
                     '<td>' + v.description + '</td>' + 
                     '<td class="text-center">' + v.item_classification + '</td>' +
                     '<td class="text-center">' + v.total_transactions + '</td>' +
                     '</tr>';
               });
            }else{
               row += '<tr>' +
                     '<td colspan="3" class="text-center">No Records Found.</td>' +
                     '</tr>';
            }

            $('#item-movement-tbl .item-list').append(row);
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
   }

   itemClassMovement();
   function itemClassMovement(){
      var item_class = $('#item-classification-select').val();
      var year = $('#item-classification-year').val();
      $.ajax({
         url: "/kpi_overview/material_management/item_class_movements/"+ year,
         method: "GET",
         success: function(data) {
            var months = [];
            var total_transactions = [];
            var transactions_per_class = [];

            for(var i in data) {
               months.push(data[i].month);
               total_transactions.push(data[i].total_transactions);
               if (item_class) {
                  per_class = data[i].transactions_per_class;
                  class_val = (per_class[item_class]) ? per_class[item_class] : 0;
                  transactions_per_class.push(class_val);
                  
               }
            }

            var data = (item_class) ? transactions_per_class : total_transactions;
            var chartdata = {
               labels: months,
               datasets : [{
                  backgroundColor: '#27AE60',
                  data: data,
                  label: "No. of Transaction(s)"
               }]
            };

            var ctx = $("#item-classification-chart");

            if (window.itemClassMovementCtx != undefined) {
               window.itemClassMovementCtx.destroy();
            }

            window.itemClassMovementCtx = new Chart(ctx, {
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
         url: "/kpi_overview/material_management/inventory/totals",
         method: "GET",
         success: function(data) {
            $('#totals-table .total-ste').text(data.total_ste);
            $('#totals-table .open-ste').text(data.open_ste);
            $('#totals-table .mr-ste').text(data.mr_ste);
            $('#totals-table .mtfm-ste').text(data.mtfm_ste);
            $('#totals-table .mi-ste').text(data.mi_ste);
         },
         error: function(data) {
            alert(data);
         }
      });
   }
});
</script>
@endsection