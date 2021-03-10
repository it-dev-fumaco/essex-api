@extends('client.app')
@section('content')
<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>

<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li class="active"><a href="/module/hr/analytics">Analytics</a></li>
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      {{-- <li><a href="/module/hr/background_check">Background Investigation Form</a></li> --}}
      <li><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li><a href="/module/hr/exam_results">Exam Result(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="inner-box featured" style="text-align: center;">
               <h2 class="title-2">Employee Analytics</h2>
               <div class="row">
                  <div class="col-md-4" style="text-align: center;">
                     <span class="span-title">Total Employee(s)</span>
                     <span class="span-value">{{ $totals['employees'] }}</span>
                  </div>
                  <div class="col-md-4" style="text-align: center;">
                     <span class="span-title">Regular Employee(s)</span>
                     <span class="span-value">{{ $totals['regular'] }}</span>
                  </div>
                  <div class="col-md-4" style="text-align: center;">
                     <span class="span-title">Probationary/Contractual</span>
                     <span class="span-value">{{ $totals['contractual_probationary'] }}</span>
                  </div>
                  <div class="col-md-12">
                     <center>
                        <div style="width: 60%;"><canvas id="employee-per-dept-chart"></canvas></div>
                     </center>
                  </div>
               </div>
            </div>
           
         </div>
         <div class="row">
            <div class="inner-box featured" style="text-align: center;">
               <h2 class="title-2">Applicant Analytics</h2>
               <div class="row">
                   <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Applicant(s)</span>
               <span class="span-value">{{ $totals['applicants'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Hired</span>
               <span class="span-value">{{ $totals['hired'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Declined</span>
               <span class="span-value">{{ $totals['declined'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Not Qualified</span>
               <span class="span-value">{{ $totals['not_qualified'] }}</span>
            </div>
            <div class="col-md-4">
               <div style="text-align: center; font-size: 13pt;" id="hiring-rate-filters">Hiring Rate: 
                  <select style="width: 30%;" class="month filters">
                     <option value="1" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
                     <option value="2" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
                     <option value="3" {{ date('m') == 3 ? 'selected' : '' }}>March</option>
                     <option value="4" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
                     <option value="5" {{ date('m') == 5 ? 'selected' : '' }}>May</option>
                     <option value="6" {{ date('m') == 6 ? 'selected' : '' }}>June</option>
                     <option value="7" {{ date('m') == 7 ? 'selected' : '' }}>July</option>
                     <option value="8" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                     <option value="9" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                     <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                     <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                     <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                  </select>
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
                  <canvas id="hiring-rate-chart" width="300" height="300"></canvas>
               </div>
            </div>
            <div class="col-md-8">
               <div style="text-align: center; font-size: 13pt;" id="applicant-chart">No. of Applicant(s)
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
                  <canvas id="applicant-bar-chart"></canvas>
               </div>
               
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
      padding: 4%;
   }
</style>

@endsection

@section('script')
<script>
   $(document).ready(function(){

      hiringRate();
      absenceRate();
      employeesPerDept();

      $('#applicant-chart .filters').on('change', function(){
         absenceRate();
      });

       $('#hiring-rate-filters .filters').on('change', function(){
         hiringRate();
      });

      function hiringRate(){
         var month = $('#hiring-rate-filters .month').val();
         var year = $('#hiring-rate-filters .year').val();

         $.ajax({
            url: "/module/hr/hiring_rate",
            method: "GET",
            data: {month:month, year:year},
            success: function(data) {
               var applicant_status = ['Hired', 'Declined', 'Not Qualified'];
               // var total_percentage = ['50', '30', '20'];
               var color_legend = ['#27AE60', '#E74C3C', '#DC7633'];
               var total_percentage = [data.hired, data.declined, data.not_qualified];

               var chartdata = {
                  labels: applicant_status,
                  datasets : [{
                     backgroundColor: color_legend,
                     data: total_percentage,
                     label: "Hiring Rate"
                  }]
               };

               var ctx = $("#hiring-rate-chart");

               if (window.hiringRateGraph != undefined) {
                  window.hiringRateGraph.destroy();
               }

               window.hiringRateGraph = new Chart(ctx, {
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
               alert('Error fetching data!');
            }
         });
      }

      function absenceRate(){
         var year = $('#applicant-chart .year').val();

         $.ajax({
            url: "/module/hr/applicants_chart",
            method: "GET",
            data: {year: year},
            success: function(data) {
               var month = [];
               var totals = [];

               for(var i in data) {
                 month.push(data[i].month);
                 totals.push(data[i].total);
               }

               var chartdata = {
                  labels: month,
                  datasets : [{
                     backgroundColor: '#2e86c1',
                     data: totals,
                     // label: "No. of Applicant(s)"
                  }]
               };

               var ctx = $("#applicant-bar-chart");

               if (window.absenceGraph != undefined) {
                  window.absenceGraph.destroy();
               }

               window.absenceGraph = new Chart(ctx, {
                  type: 'bar',
                  data: chartdata,
                  options: {
                     responsive: true,
                     legend: {
                        display: false,
                        position: 'bottom',
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

      function employeesPerDept(){
         $.ajax({
            url: "/module/hr/employees_per_dept_chart",
            method: "GET",
            // data: {year: year},
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
                     backgroundColor: '#CD6155',
                     data: totals,
                     label: "No. of Employee(s)"
                  }]
               };

               var ctx = $("#employee-per-dept-chart");

               if (window.empPerDeptGraph != undefined) {
                  window.empPerDeptGraph.destroy();
               }

               window.empPerDeptGraph = new Chart(ctx, {
                  type: 'bar',
                  data: chartdata,
                  
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

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>