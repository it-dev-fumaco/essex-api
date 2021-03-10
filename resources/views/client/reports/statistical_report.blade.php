@extends('admin.app')
@section('content')
<br><br><br><br>
<div class="row">
	<div class="col-sm-12">
		<h2 class="section-title center" style="margin-top: -50px;">Absences/Leaves Statistical Report</h2>
		<a href="/admin">
         <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -70px; float: left;"></i>
      </a>
      <div class="row">
         <div class="col-sm-12">
            <div class="inner-box featured">
               <div class="filters">
                  <form action="/admin/report_date_filters" method="GET">
                     @csrf
                     <input type="hidden" name="report_name" value="statistical_report">
                     <span>From:</span>
                     <input type="date" name="date_from" id="date_from" placeholder="From" value="{{ $date_filters['from_date'] }}" required>
                     <span>To:</span>
                     <input type="date" name="date_to" id="date_to" placeholder="To" value="{{ $date_filters['to_date'] }}" required>
                     <input type="submit" value="Submit">
                  
                     <input type="button" value="Refresh Attendance" id="refresh-attendance-btn">
                   </form>
               </div>
               <table class="table" id="statistical-table">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Total Absences (day(s))</th>
                        <th>Total Late</th>
                        <th>Total OT</th>
                        <th>Total Working Hrs</th>
                        <th>% Working Rate</th>
                        <th>% Absence Rate</th>
                     </tr>
                  </thead>
                  <tbody class="table-body">
                     @foreach($data as $index => $emp)
                     <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td>{{ $emp['employee_name'] }}</td>
                        <td>{{ $emp['designation'] }}</td>
                        <td style="text-align: center;">{{ $emp['total_absence'] }}</td>
                        <td style="text-align: center;">{{ $emp['total_lates'] }} min(s)</td>
                        <td style="text-align: center;">{{ $emp['total_overtime'] }} hr(s)</td>
                        <td style="text-align: center;">{{ $emp['total_working_hrs'] }} hr(s)</td>
                        <td style="text-align: center;">{{ number_format($emp['working_rate'], 2) }} %</td>
                        <td style="text-align: center;">{{ number_format($emp['absence_rate'], 2) }} %</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="loading">Loading&#8230;</div>
<style type="text/css">
  /* Absolute Center Spinner */
  .loading {
    position: fixed;
    z-index: 999;
    height: 2em;
    width: 2em;
    overflow: visible;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
  }

  /* Transparent Overlay */
  .loading:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.3);
  }

  /* :not(:required) hides these rules from IE9 and below */
  .loading:not(:required) {
    /* hide "loading..." text */
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
  }

  .loading:not(:required):after {
    content: '';
    display: block;
    font-size: 10px;
    width: 1em;
    height: 1em;
    margin-top: -0.5em;
    -webkit-animation: spinner 1500ms infinite linear;
    -moz-animation: spinner 1500ms infinite linear;
    -ms-animation: spinner 1500ms infinite linear;
    -o-animation: spinner 1500ms infinite linear;
    animation: spinner 1500ms infinite linear;
    border-radius: 0.5em;
    -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
    box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  }

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


   #statistical-table th{
      text-align: center;
   }
   .filters{
      float: left;
      width: 70%;
      z-index: 1;
      padding: 10px 15px;
   }
   .filters input{
      height: 35px;
      margin-right: 0.5%;
   }
</style>
@endsection

@section('script')
<script>

$(document).ready(function() {
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.loading').hide();
  $('#statistical-table').DataTable({
    "bLengthChange": false,
    "pageLength": 100,
    "dom": '<"top"f>rt<"bottom"ip><"clear">'
  });

  $(document).ajaxStart(function () {
    console.log("Triggered ajaxStart Event.");
    $(".loading").show();
  });

  $(document).ajaxSend(function (event, jqxhr, settings) {
    console.log("Triggered ajaxSend Event.<br/>");
  });

  $(document).ajaxComplete(function (event, jqxhr, settings) {
    console.log("Triggered ajaxComplete Event.<br/>");
  });

  $(document).ajaxStop(function () {
    console.log("Triggered ajaxStop Event.<br/>");
  });

  $(document).ajaxSuccess(function (event, jqxhr, settings) {
    console.log("Triggered ajaxSuccess Event.<br/>");
    $(".loading").hide();
    location.reload();
  });

  $(document).ajaxError(function (event, jqxhr, settings, thrownError) {
    console.log("Triggered ajaxError Event.<br/>");
  });

  $('#refresh-attendance-btn').on('click', function(){
    var from = $('#date_from').val();
    var to = $('#date_to').val();

    data = {
      date_from: from,
      date_to: to
    }

    $.ajax({
      type: "POST",
      url: "/admin/updateEmployeesLogs",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      data: data,
      success: function (result, status, xhr) {
        console.log(result);
      },
    });
  });
});
</script>
@endsection