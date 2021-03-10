@extends('client.app')
@section('content')
<script src="{{ asset('js/charts/Chart.min.js') }}"></script>
<script src="{{ asset('js/charts/utils.js') }}"></script>

<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Absent Notice Slip</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li class="active"><a href="/module/absent_notice_slip/analytics">Analytics</a></li>
      <li><a href="/module/absent_notice_slip/history">Absent Notice History</a></li>
      <li><a href="/module/absent_notice_slip/leave_analytics/{{ Carbon\Carbon::parse('first day of this month')->format('Y-m-d') }}/{{ Carbon\Carbon::parse('last day of this month')->format('Y-m-d') }}">Employee Leave Analytics</a></li>
      <li><a href="/module/absent_notice_slip/leave_approvers">Leave Approver(s)</a></li>
      <li><a href="/module/absent_notice_slip/leave_balances">Leave Balance(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
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
                  {{-- <select style="width: 22%;" class="department filters">
                     <option value="0">All Departments</option>
                     @foreach($department_list as $row)
                     <option value="{{ $row->department_id }}">{{ $row->department}}</option>
                     @endforeach
                  </select> --}}
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

      // var d = new Date();
      // for (var i = 0; i <= 3; i++) {
      //    var option = "<option value=" + parseInt(d.getFullYear() + i) + ">" + parseInt(d.getFullYear() + i) + "</option>";
      //    $('#absence-rate-filters .year').append(option);
      // }

      // for (var i = 0; i <= 3; i++) {
      //    var option = "<option value=" + parseInt(d.getFullYear() + i) + ">" + parseInt(d.getFullYear() + i) + "</option>";
      //    $('#leave-stats-filters .year').append(option);
      // }

      leaveStats();
      absenceRate();

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
         // var dept = $('#absence-rate-filters .department').val();
         var year = $('#absence-rate-filters .year').val();

         $.ajax({
            url: "/module/absent_notice_slip/absence_rate",
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
                     // label: "Leave/Absence Type"
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