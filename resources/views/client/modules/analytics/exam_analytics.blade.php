@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Analytics</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/client/analytics/attendance">Attendance</a></li>
      <li><a href="/client/analytics/notice_slip">Absent Notice</a></li>
      <li><a href="/client/analytics/gatepass">Gatepass</a></li>
      <li><a href="/client/analytics/hr">Human Resource</a></li>
      <li class="active"><a href="/client/analytics/exam">Online Exam</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Exam(s)</span>
               <span class="span-value">{{ $totals['total_exams'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Examinee(s)</span>
               <span class="span-value">{{ $totals['total_examinees'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Exam Group(s)</span>
               <span class="span-value">{{ $totals['total_exam_groups'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Total Question(s)</span>
               <span class="span-value">{{ $totals['total_questions'] }}</span>
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
   #tabs .nav-tabs > li {
      float: none;
      display: inline-block;
      /*zoom: 1;*/
   }

</style>


@endsection

@section('script')
<script>
   $(document).ready(function(){
      
      // loadAbsences();
      // loadPerfectAttendance();
      // loadLates();

      $('#monthly-stats-filters .filters').on('change', function(){
         loadAbsences();
         loadPerfectAttendance();
         loadLates();
      });

      function loadAbsences(){
         var month = $('#monthly-stats-filters .month option:selected').text();
         var year = $('#monthly-stats-filters .year').val();

         $("#absences-list tbody").empty();

         $.ajax({
            url: "/getAbsentEmployees",
            method: "GET",
            data: {month: month, year:year},
            success: function(data) {
               console.log(data.length);
               $.each(data, function(i, d){
                  if (d.days_absent > 0) {
                  var row = '<tr>' +
                           '<td class="td-name">' + d.employee_name + '</td>' +
                           '<td class="td-days">' + d.days_absent + '</td>' +
                   '</tr>';
                }

                   $("#absences-list tbody").append(row);
                   $("#total-absent").html(data.length);
               });
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      }

      function loadLates(){
         var month = $('#monthly-stats-filters .month option:selected').text();
         var year = $('#monthly-stats-filters .year').val();

         $("#lates-list tbody").empty();

         $.ajax({
            url: "/lateEmployees",
            method: "GET",
            data: {month: month, year:year},
            success: function(data) {
               $.each(data, function(i, d){
                  if (d.total_lates > 0) {
                  var row = '<tr>' +
                           '<td class="td-name">' + d.employee_name + '</td>' +
                           '<td class="td-days">' + d.total_lates + '</td>' +
                   '</tr>';
                }

                   $("#lates-list tbody").append(row);  
               });
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      }

      function loadPerfectAttendance(){
         var month = $('#monthly-stats-filters .month option:selected').text();
         var year = $('#monthly-stats-filters .year').val();

         $("#perfect-attendance-list tbody").empty();

         $.ajax({
            url: "/getPerfectAttendance",
            method: "GET",
            data: {month: month, year:year},
            success: function(data) {
               $.each(data, function(i, d){
                  if (d.working_days > 0) {
                  var row = '<tr>' +
                           '<td class="td-name">' + d.employee_name + '</td>' +
                           '<td class="td-days">' + d.working_days + '</td>' +
                   '</tr>';
                }

                   $("#perfect-attendance-list tbody").append(row);  
               });
            },
            error: function(data) {
               alert('Error fetching data!');
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