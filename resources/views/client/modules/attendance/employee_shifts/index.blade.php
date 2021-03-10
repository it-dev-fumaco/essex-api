@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Attendance</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/attendance/analytics">Analytics</a></li> --}}
      <li><a href="/module/attendance/history">Attendance History</a></li>
      <li class="active"><a href="/module/attendance/employee_shifts">Shift(s)</a></li>
      <li><a href="/module/attendance/biometric_adjustments">Attendance Adjustment(s)</a></li>
      <li><a href="/module/attendance/late_employees">Late Employee(s) Monitoring</a></li>
      <li><a href="/module/attendance/holiday_entry">Holiday/Events List</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
   <div class="col-sm-5">
      <div class="inner-box featured">
         <h2 class="title-2">Employee Shift(s)</h2>
         <div class="row">
            <div class="col-md-12">
               <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-shift-group-modal">
                  <i class="fa fa-plus"></i> Shift Group
               </a>
               @if(session("msg_shift_group"))
               <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <center>{!! session("msg_shift_group") !!}</center>
               </div>
               @endif
               <table class="table">
                  <col style="width: 10%;">
                  <col style="width: 45%;">
                  <col style="width: 35%;">
                  <col style="width: 10%;">
                  <thead>
                     <tr>
                        <th style="text-align: center;">ID</th>
                        <th>Group Name</th>
                        <th style="text-align: center;">Remarks</th>
                        <th style="text-align: center;">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($shift_groups as $row)
                     <tr>
                        <td style="text-align: center;">{{ $row->id }}</td>
                        <td>{{ $row->shift_group_name }}</td>
                        <td style="text-align: center;">{{ $row->remarks }}</td>
                        <td style="text-align: center;">
                           <a href="#" data-id="{{ $row->id }}" class="edit-shift-group"><i class="fa fa-pencil icon-edit"></i></a>
                           <a href="#" data-toggle="modal" data-target="#delete-shift-group-modal-{{ $row->id }}"><i class="fa fa-trash icon-delete"></i></a>
                        </td>
                        @include('client.modules.attendance.employee_shifts.modals.delete_shift_group')
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
    <div class="col-sm-7">
      <div class="inner-box featured">
         <h2 class="title-2">Special Shift(s)</h2>
         <div class="row">
            <div class="col-md-12">
               <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-special-shift-modal">
                  <i class="fa fa-plus"></i> Special Shift
               </a>
               @if(session("msg_special_shift"))
               <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <center>{!! session("msg_special_shift") !!}</center>
               </div>
               @endif
               <table class="table">
                  <thead>
                     <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Time In</th>
                        <th style="text-align: center;">Time Out</th>
                        <th style="text-align: center;">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($custom_shifts as $row)
                     <tr>
                        <td style="text-align: center;">{{ $row->schedule_id }}</td>
                        <td style="text-align: center;">{{ $row->sched_date }}</td>
                        <td style="text-align: center;">{{ date("g:i a", strtotime($row->time_in)) }}</td>
                        <td style="text-align: center;">{{ date("g:i a", strtotime($row->time_out)) }}</td>
                        <td style="text-align: center;">
                           <a href="#" data-toggle="modal" data-target="#edit-special-shift-modal-{{ $row->schedule_id }}"><i class="fa fa-pencil icon-edit"></i></a>
                           <a href="#" data-toggle="modal" data-target="#delete-special-shift-modal-{{ $row->schedule_id }}"><i class="fa fa-trash icon-delete"></i></a>
                        </td>
                        @include('client.modules.attendance.employee_shifts.modals.edit_special_shift')
                        @include('client.modules.attendance.employee_shifts.modals.delete_special_shift')
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


      </div>
   </div>
</div>

@include('client.modules.attendance.employee_shifts.modals.add_shift_group')
@include('client.modules.attendance.employee_shifts.modals.add_special_shift')

@include('client.modules.attendance.employee_shifts.modals.edit_shift_group')

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.timepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/jquery.timepicker.css') }}" />
<script type="text/javascript" src="{{ asset('css/js/datepicker/datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/bootstrap-datepicker.css') }}" />
<script>
$(document).ready(function() {

    $('#datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#datepairExample .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    // initialize datepair
    $('#datepairExample').datepair();

    $('.edit-shift-group').click(function(e){
      e.preventDefault();
      var id = $(this).data('id');
      
      $("#edit-shift-group-modal table tbody").empty();

      $.ajax({
         url: "/client/attendance/employee_shifts/details/" + id,
         method: "GET",
         success: function(data) {
            $("#edit-shift-group-modal .group-name").val(data.group_details.shift_group_name);
            $("#edit-shift-group-modal .remarks").val(data.group_details.remarks);
            $("#edit-shift-group-modal .shift-group-id").val(data.group_details.id);

            $.each(data.schedule, function(i, d){
               var row = '<tr>' +
                        '<td>' + d.day_of_week + '<input type="hidden" name="shift_id[]" value="' + d.shift_id + '"></td>' +
                        '<td><input type="time" name="time_in[]" placeholder="Time In" value="' + d.time_in + '"></td>' +
                        '<td><input type="time" name="time_out[]" placeholder="Time Out" value="' + d.time_out + '"></td>' +
                        '<td><input type="number" name="breadktime[]" placeholder="(hr)" value="' + d.breaktime_by_hour + '"></td>' +
                        '<td><input type="number" name="grace_period[]" placeholder="(mins)" value="' + d.grace_period_in_mins + '"></td>' +
                '</tr>';

                $("#edit-shift-group-modal table tbody").append(row);  
            });

            $('#edit-shift-group-modal').modal('show');
         },
         error: function(data) {
            alert('Error fetching data!');
         }
      });
    });

});
</script>

@endsection

<style>
#add-shift-modal .group-name{
   height: 35px;
   width: 50%;
   padding: 2px;
}
.tbl-sched input{
   height: 30px;
   width: 100%;
}

.tbl-sched td{
   padding: 0.5em;
}

.tbl-sched thead th{
   text-align: center;
   padding-bottom: 3px;
}

#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}

#add-special-shift-modal input, select{
   height: 30px;
   width: 100%;
}

#datepairExample input, select{
   height: 30px;
   width: 100%;
}


</style>
