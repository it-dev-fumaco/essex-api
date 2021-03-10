@extends('client.app')
@section('content')
<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>
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
      <li class="active"><a href="/client/analytics/notice_slip">Absent Notice</a></li>
      <li><a href="/client/analytics/gatepass">Gatepass</a></li>
      <li><a href="/client/analytics/hr">Human Resource</a></li>
      <li><a href="/client/analytics/exam">Online Exam</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
         <div class="inner-box featured">
         <div class="row">
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Total Approved Absent Slip</span>
               <span class="span-value">{{ $totals['total_approved'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Total Disapproved Absent Slip</span>
               <span class="span-value">{{ $totals['total_disapproved'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Total Cancelled Absent Slip</span>
               <span class="span-value">{{ $totals['total_cancelled'] }}</span>
            </div>
            <div class="col-md-3" style="text-align: center;">
               <span class="span-title">Total Pending Absent Slip</span>
               <span class="span-value">{{ $totals['total_pending'] }}</span>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div style="text-align: center; font-size: 13pt;" id="leave-stats-filters">Monthly Statistics: 
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
                  <canvas id="leave-stats-chart" width="300" height="300"></canvas>
               </div>
            </div>
            <div class="col-md-8">
               <div style="text-align: center; font-size: 13pt;" id="absence-rate-filters">Absence Rate
                  <select style="width: 27%;" class="department filters">
                     <option value="">All Department</option>
                     @foreach($department_list as $row)
                     <option value="{{ $row->department_id }}">{{ $row->department }}</option>
                     @endforeach
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
                  <canvas id="absence-rate-chart"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
         <div class="row" style="margin-top: -40px;">
             <div class="inner-box featured">
         <div class="row">
            <div class="col-md-12">
               <h3 class="section-title center">Leave Allocation</h3>
            </div>
            <div class="col-md-6">
               <center>
                  <div style="width: 70%;">
                     <span class="span-title" style="margin: 3%;">Vacation Leave Entitlement</span>
                     <canvas id="v-leave-chart"></canvas>
                     <div style="margin: 3%;">Pending For Approval: <span id="pending-vl">0</span></div>
                  </div>
               </center>
            </div>
            
            <div class="col-md-6">
               <center>
                  <div style="width: 70%;">
                     <span class="span-title" style="margin: 3%;">Sick Leave Entitlement</span>
                     <canvas id="s-leave-chart"></canvas>
                     <div style="margin: 3%;">Pending For Approval: <span id="pending-sl">0</span></div>
                  </div>
               </center>
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
      /*font-weight: bold;*/
      padding: 4%;
   }
</style>

@endsection

@section('script')
<script>
   $(document).ready(function(){

      leaveStats();
      absenceRate();
      leaveAllocationChart();

      $('#absence-rate-filters .filters').on('change', function(){
         absenceRate();
      });

       $('#leave-stats-filters .filters').on('change', function(){
         leaveStats();
      });

      function leaveStats(){
         var month = $('#leave-stats-filters .month').val();
         var year = $('#leave-stats-filters .year').val();

         $.ajax({
            url: "/module/absent_notice_slip/leave_types_stats",
            method: "GET",
            data: {month:month, year:year},
            success: function(data) {
               var leave_types = [];
               var total_percentage = [];
               var color_legend = [];

               for(var i in data) {
                 leave_types.push(data[i].leave_type);
                 total_percentage.push(data[i].percentage);
                 color_legend.push(data[i].color_legend);
               }

               var chartdata = {
                  labels: leave_types,
                  datasets : [{
                     backgroundColor: color_legend,
                     data: total_percentage,
                     label: "Leave/Absence Type"
                  }]
               };

               var ctx = $("#leave-stats-chart");

               if (window.leaveGraph != undefined) {
                  window.leaveGraph.destroy();
               }

               window.leaveGraph = new Chart(ctx, {
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

      function absenceRate(){
         var department = $('#absence-rate-filters .department').val();
         var year = $('#absence-rate-filters .year').val();

         $.ajax({
            url: "/module/absent_notice_slip/absence_rate/" + year,
            method: "GET",
            data: {department: department},
            success: function(data) {
               var month = [];
               var total_days = [];
               var total_users = [];

               for(var i in data) {
                 month.push(data[i].month);
                 total_days.push(data[i].total_days);
                 total_users.push(data[i].total_users);
               }

               var chartdata = {
                  labels: month,
                  datasets : [{
                     backgroundColor: '#F1C40F',
                     data: total_users,
                     label: "Total no. of Employees Filed"
                  },
                  {
                     backgroundColor: '#2e86c1',
                     data: total_days,
                     label: "Total no. of Absence in Days"
                  }]
               };

               var ctx = $("#absence-rate-chart");

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

      function leaveAllocationChart(){
         $.ajax({
            url: "/leaveAllocationChart",
            method: "GET",
            success: function(data) {
               $('#pending-sl').text(data.sick_leave.pending);
               $('#pending-vl').text(data.vacation_leave.pending);
               
               var chartdata_s = {
                  labels: ['Taken', 'Planned', 'Unallocated'],
                  datasets : [{
                     backgroundColor: ['#2980B9','#27AE60','#E74C3C'],
                     data: [data.sick_leave.taken, data.sick_leave.planned, data.sick_leave.unallocated],
                  }]
               };

               var chartdata_v = {
                  labels: ['Taken', 'Planned', 'Unallocated'],
                  datasets : [{
                     backgroundColor: ['#2980B9','#27AE60','#E74C3C'],
                     data: [data.vacation_leave.taken, data.vacation_leave.planned, data.vacation_leave.unallocated],
                  }]
               };

               var ctx_v = $("#v-leave-chart");
               var ctx_s = $("#s-leave-chart");

               if (window.vLeaveChart != undefined) {
                  window.vLeaveChart.destroy();
               }

               if (window.sLeaveChart != undefined) {
                  window.sLeaveChart.destroy();
               }

               window.vLeaveChart = new Chart(ctx_v, {
                  type: 'pie',
                  data: chartdata_v,
                  options: {
                     responsive: true,
                     legend: {
                        position: 'right',
                        labels:{
                           boxWidth: 13,
                           fontSize: 12,
                           padding: 20,
                           generateLabels: function(chart) {
                    var data = chart.data;
                    if (data.labels.length && data.datasets.length) {
                        return data.labels.map(function(label, i) {
                            var meta = chart.getDatasetMeta(0);
                            var ds = data.datasets[0];
                            var arc = meta.data[i];
                            var custom = arc && arc.custom || {};
                            var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
                            var arcOpts = chart.options.elements.arc;
                            var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
                            var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
                            var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);

                     // We get the value of the current label
                     var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];

                            return {
                                // Instead of `text: label,`
                                // We add the value to the string
                                text: label + " : " + value,
                                fillStyle: fill,
                                strokeStyle: stroke,
                                lineWidth: bw,
                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                index: i
                            };
                        });
                    } else {
                        return [];
                    }
                }
                        }
                     }
                  }
               });

               window.sLeaveChart = new Chart(ctx_s, {
                  type: 'pie',
                  data: chartdata_s,
                  options: {
                     responsive: true,
                     legend: {
                        display: true,
                        position: 'right',
                        labels:{
                           boxWidth: 13,
                           fontSize: 12,
                           padding: 20,
                           generateLabels: function(chart) {
                    var data = chart.data;
                    if (data.labels.length && data.datasets.length) {
                        return data.labels.map(function(label, i) {
                            var meta = chart.getDatasetMeta(0);
                            var ds = data.datasets[0];
                            var arc = meta.data[i];
                            var custom = arc && arc.custom || {};
                            var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
                            var arcOpts = chart.options.elements.arc;
                            var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
                            var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
                            var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);

                     // We get the value of the current label
                     var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];

                            return {
                                // Instead of `text: label,`
                                // We add the value to the string
                                text: label + " : " + value,
                                fillStyle: fill,
                                strokeStyle: stroke,
                                lineWidth: bw,
                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                index: i
                            };
                        });
                    } else {
                        return [];
                    }
                }
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

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>
