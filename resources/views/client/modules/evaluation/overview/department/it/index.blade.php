@extends('client.app')
@section('content')
<!-- @include('client.modules.nav_menu') -->
<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>

<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Evaluations</h2>
      <a href="/home">
         <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px 10px; margin-top: -70px; float: left;">
         </i>
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
      <li><a href="/kpi_stats/painting/index">Painting</a></li>
      <li><a href="/kpi_stats/filunited/index">Filunited Plant 1</a></li>
      <li><a href="/kpi_stats/production_planning/index">Production Planning</a></li>
            </ul>
         <div class="tab-content">
            <div class="tab-pane in active">
               <div class="row">
                  <div class="col-sm-12 col-md-12">
                     <div class="inner-box featured">
                        <h2 class="title-2">Information Technology Department</h2>
                        <div class="row">
                           <div class="col-md-12" id="message-alert" style="margin-top: 10px;">
                              
                                 <ul class="nav nav-tabs" style="text-align: center;">
                                    <li class="active"><a href="/kpi_stats/Engineeringdepartment">Performance Indicator(s)</a></li>
                                    <li><a href="/kpi/result/InformationTechnologydepartment">KPI Result</a></li>
                                 </ul>
                   
                              @if(session("message"))
                              <div class='alert alert-success alert-dismissible'>
                                 <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                 <center>{!! session("message") !!}</center>
                              </div>
                              @endif
                           </div>
                           <div class="col-md-6" style="padding-top: 30px;">
                                 <div class="box">
                                       <div style="text-align: center; font-size: 12pt;" id="kpi-3-filters"><b>Annual Projects Completed</b><br>
                                       </div>
                                       <br>
                                       <div>
                                          <table style="width: 100%; padding-top: 30px;" id="totals-table">
                                             <tr>
                                                 <table style="width: 100%;" id="totals-table">
                                                   <tr>
                                                      @foreach($data_inputs as $row)
                                                      <td>
                                                         <span class="span-title" style="font-size: 25px;">{{ $row->year }}</span>
                                                         <span class="span-value requests"  style="font-size: 40px;">{{ $row->answer }}</span>
                                                      </td>
                                                      @endforeach
                                                     
                                                   </tr>
                                                </table>
                                               
                                             </tr>
                                          </table>
                                       </div>
                                 </div>
                              </div>
                              <div class="col-md-6" style="padding-top: 30px;">
                                 <div class="box">
                                    <div style="text-align: center; font-size: 12pt;" id="kpi-1-filters"><b>100% on time resolution for technical support Level 1-3:</b>
                                      
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

                              <div class="col-md-6" style="margin-top: -100px;">
                                 <div class="box">
                                    <div style="text-align: center; font-size: 12pt;" id="kpi-2-filters"><b>98% Servers and Network Uptime:</b>
                                      
                                       <select style="width: 20%;" class="year filters">
                                          <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                          <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                          <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                          <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                          <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                                       </select>

                                    </div>
                                    <div>
                                       <canvas id="kpi_2_department"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6" style="padding-top: 30px;">
                                 <div class="box">
                                    <div style="text-align: center; font-size: 12pt;" id="techlevel-rate-filters"><b>Technical Support Level 1-3:</b><br>
                                       <select style="width: 35%;" id="tech_month" class="month filters">
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
                                       <select style="width: 21%;" id="tech_year" class="year filters">
                                          <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                                          <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                                          <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                                          <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                                          <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                                       </select>
                                    </div>
                                    <div style="margin-top: 3%; width: 100%;">
                                       <canvas id="technical-level-chart" height="100"></canvas>
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
      statkpi1();
      statkpi2();
      statkpi3();
      TechnicalLevelStats();


         $('#techlevel-rate-filters .filters').on('change', function(){
         TechnicalLevelStats();
         });
         $('#kpi-1-filters .filters').on('change', function(){
         statkpi1();
         });
         $('#kpi-2-filters .filters').on('change', function(){
         statkpi2();
         });
         $('#kpi-3-filters .filters').on('change', function(){
         statkpi3();
         });

         function TechnicalLevelStats(){
            var tech_year = $('#techlevel-rate-filters .year').val();
            var tech_month = $('#techlevel-rate-filters .month').val();
         // var tech_year = document.getElementById('tech_year').value;
         // var tech_year = document.getElementById('tech_month').value;
         data={
            tech_year : tech_year,
            tech_month: tech_month
         }


         $.ajax({
            url: "/kpi_stats/technicalLevel",
            method: "GET",
            data: data,
            success: function(data) {
               var applicant_status = ['level1', 'level2', 'level3'];
               // var total_percentage = ['50', '30', '20'];
               var color_legend = ['#2096BA', '#0b6ab0', '#e27b1c'];
               var total_percentage = [data.level1, data.level2, data.level3];

               var chartdata = {
                  labels: applicant_status,
                  datasets : [{
                     backgroundColor: color_legend,
                     data: total_percentage,
                  }]
               };

               var ctx = $("#technical-level-chart");

               if (window.technicallevelgraph != undefined) {
                  window.technicallevelgraph.destroy();
               }

               window.technicallevelgraph = new Chart(ctx, {
                  type: 'doughnut',
                  data: chartdata,
                  options: {
                     responsive: true,
                     legend: {
                        position: 'left',
                        labels:{
                           boxWidth: 13
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
      function statkpi1(){
         var year = $('#kpi-1-filters .year').val();
         data = {
          year : year
          } 

         $.ajax({
            url: "/kpi_stats/getdata_it/kpi1",
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
      function statkpi2(){
         var year = $('#kpi-2-filters .year').val();
         data = {
          year : year
          } 
         $.ajax({
            url: "/kpi_stats/getdata_it/kpi2",
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
               var ctx = $("#kpi_2_department");

               if (window.kpi2_graph != undefined) {
                  window.kpi2_graph.destroy();
               }
               window.kpi2_graph = new Chart(ctx, {
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
      function statkpi3(){
         var year = $('#kpi-3-filters .year').val();
         data = {
          year : year
          } 
         $.ajax({
            url: "/kpi_stats/getdata_it/kpi3",
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
               var ctx = $("#kpi_3_department");

               if (window.kpi3_graph != undefined) {
                  window.kpi3_graph.destroy();
               }
               window.kpi3_graph = new Chart(ctx, {
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