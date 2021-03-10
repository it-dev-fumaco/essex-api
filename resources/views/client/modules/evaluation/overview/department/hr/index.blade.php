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
      <li class="active"><a href="/kpi_stats/hr/index">H.R.</a></li>
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
                  <h2 class="title-2">Human Resource Department</h2>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="nav nav-tabs" style="text-align: center;">
                           <li class="active"><a href="/kpi_stats/hr/index">Performance Indicator(s)</a></li>
                           <li><a href="/kpi_overview/hr/kpi_result">KPI Result</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8" style="padding-top: 30px;">
                                 <div class="box">
                                    <div style="text-align: center; font-size: 12pt;" id="kpi-1-filters"><b>99% Implementation of Annual Training Plan</b>
                                      
                                       <select style="width: 10%;" class="year filters">
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

         $('#kpi-1-filters .filters').on('change', function(){
         statkpi1();
         });

         function statkpi1(){
         var year = $('#kpi-1-filters .year').val();
         data = {
          year : year
          } 

         $.ajax({
            url: "/kpi_overview/hr/get_kpiStat1",
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
                              
                              backgroundColor: '#e27b1c',
                              borderColor: '#e27b1c',
                              data: totals,
                              fill: false,
                              label: "Result"
                           },{ 
                              
                              backgroundColor: '#0b6ab0',
                              borderColor: "#0b6ab0",
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
});
</script>

@endsection