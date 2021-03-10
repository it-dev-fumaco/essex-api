@extends('client.app')
@section('content')

<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>


<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Gatepass</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li class="active"><a href="/module/gatepass/analytics">Analytics</a></li>
      <li><a href="/client/gatepass/history">Gatepass History</a></li>
      <li><a href="/client/gatepass/unreturned_gatepass">Unreturned Gatepass Item(s)</a></li>
      <li><a href="/client/gatepass/employee_accountability">Employee Accountabilities</a></li>
      <li><a href="/client/gatepass/company_asset">Company Asset</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-md-4" style="text-align: center;">
               <span class="span-title">Total Gatepass</span>
               <span class="span-value">{{ $totals['gatepass'] }}</span>
            </div>
            <div class="col-md-4" style="text-align: center;">
               <span class="span-title">Unreturned Item(s)</span>
               <span class="span-value">{{ $totals['unreturned_items'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Pending Gatepass</span>
               <span class="span-value">{{ $totals['pending'] }}</span>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div style="text-align: center; font-size: 13pt;" id="purpose-rate-filters">Purpose Category Rate: 
                  <select style="width: 21%;" class="year filters">
                     <option value="2015" {{ date('Y') == 2015 ? 'selected' : '' }}>2015</option>
                     <option value="2016" {{ date('Y') == 2016 ? 'selected' : '' }}>2016</option>
                     <option value="2017" {{ date('Y') == 2017 ? 'selected' : '' }}>2017</option>
                     <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                     <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                     <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                     <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                     <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                  </select>
               </div>
               <div style="margin-top: 3%;">
                  <canvas id="purpose-rate-chart" width="300" height="300"></canvas>
               </div>
            </div>
            <div class="col-md-8">
               <div style="text-align: center; font-size: 13pt;" id="gatepass-per-dept-filters">No. of Gatepass per Department
                  <select style="width: 23%;" class="purpose filters">
                     <option value="">-- Purpose --</option>
                     <option value="For Servicing">For Servicing</option>
                     <option value="For Company Activity">For Company Activity</option>
                     <option value="For Personal Use">For Personal Use</option>
                     <option value="Others">Others</option>
                  </select>
                  <select style="width: 10%;" class="year filters">
                     <option value="2015" {{ date('Y') == 2015 ? 'selected' : '' }}>2015</option>
                     <option value="2016" {{ date('Y') == 2016 ? 'selected' : '' }}>2016</option>
                     <option value="2017" {{ date('Y') == 2017 ? 'selected' : '' }}>2017</option>
                     <option value="2018" {{ date('Y') == 2018 ? 'selected' : '' }}>2018</option>
                     <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                     <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                     <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                     <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                  </select>
               </div>
               <div style="padding: 1% 5%;">
                  <canvas id="gatepass-per-dept-chart"></canvas>
               </div>
               
            </div>
         </div>
      </div>
   </div>
</div>


<style type="text/css">
   .span-title{
      display: block;
      font-size: 13pt;
      text-align: center;
   }
   .span-value{
      display: block;
      font-size: 24pt;
      /*font-weight: bold;*/
      padding: 4%;
   }
</style>


@endsection

@section('script')
<script>
   $(document).ready(function(){

      purpose_rate_chart();
      gatepass_per_dept_chart();

      $('#gatepass-per-dept-filters .filters').on('change', function(){
         gatepass_per_dept_chart();
      });

       $('#purpose-rate-filters .filters').on('change', function(){
         purpose_rate_chart();
      });

      function purpose_rate_chart(){
         var year = $('#purpose-rate-filters .year').val();

         $.ajax({
            url: "/module/gatepass/purpose_rate_chart",
            method: "GET",
            data: {year:year},
            success: function(data) {
               var purpose_type = [];
               var total_percentage = [];
               var color_legend = ['#E74C3C', '#2980B9', '#16A085', '#F39C12'];

               for(var i in data) {
                 purpose_type.push(data[i].purpose_type);
                 total_percentage.push(data[i].percentage);
                 color_legend.push(data[i].color_legend);
               }

               var chartdata = {
                  labels: purpose_type,
                  datasets : [{
                     backgroundColor: color_legend,
                     data: total_percentage,
                     label: "Leave/Absence Type"
                  }]
               };

               var ctx = $("#purpose-rate-chart");

               if (window.purposeRateGraph != undefined) {
                  window.purposeRateGraph.destroy();
               }

               window.purposeRateGraph = new Chart(ctx, {
                  type: 'doughnut',
                  data: chartdata,
                  options: {
                     responsive: true,
                     legend: {
                        position: 'bottom',
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

      function gatepass_per_dept_chart(){
         var purpose = $('#gatepass-per-dept-filters .purpose').val();
         var year = $('#gatepass-per-dept-filters .year').val();

         $.ajax({
            url: "/module/gatepass/gatepass_per_dept_chart",
            method: "GET",
            data: {purpose: purpose, year: year},
            success: function(data) {
               var departments = [];
               var totals = [];

               for(var i in data) {
                 departments.push(data[i].department);
                 totals.push(data[i].total);
               }

               var chartdata = {
                  labels: departments,
                  datasets : [{
                     backgroundColor: '#2e86c1',
                     data: totals,
                     label: "No. of Gatepass"
                  }]
               };

               var ctx = $("#gatepass-per-dept-chart");

               if (window.absenceGraph != undefined) {
                  window.absenceGraph.destroy();
               }

               window.absenceGraph = new Chart(ctx, {
                  type: 'bar',
                  data: chartdata,
                  options: {
                     responsive: true,
                     legend: {
                        display: true,
                        position: 'bottom',
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

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>