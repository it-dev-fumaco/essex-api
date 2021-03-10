@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
@include('client.modules.evaluation.evaluation_schedule.add')
<div class="col-md-12">
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li><a href="/evaluation/kpi">KPI List</a></li>
      <li><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li class="active"><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li><a href="/evaluation/kpi_result">KPI Result</a></li>
      {{-- <li><a href="/evaluation/kpi_datainput/overview">Overview</a></li> --}}
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-sm-12 col-md-8 col-md-offset-2">
            <div class="inner-box featured">
               <h2 class="title-2">Evaluation Schedule(s)</h2>
               <div class="row">
                 {{--  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-eval-sched-modal">
                        <i class="fa fa-plus"></i> New
                     </a>
                  </div> --}}
                  <div class="col-md-12" id="message-alert" style="margin-top: 10px;">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{!! session("message") !!}</center>
                     </div>
                     @endif
                  </div>
                  <div class="col-md-12">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Period</th>
                              <th>Start Date</th>
                              <th>Year</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse($eval_scheds as $i => $row)
                           <tr>
                              <td>{{ $i + 1 }}</td>
                              <td>{{ $row->period }}</td>
                              <td>{{ $row->start_date }}</td>
                              <td>{{ $row->year }}</td>
                              <td>{{ $row->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                              <td>
                                 <a href="/evaluation/schedule/{{ $row->eval_sched_id }}/view"><i class="fa fa-search icon-view"></i></a>
                                 <a href="#" data-toggle="modal" data-target="#edit-eval-sched-modal{{ $row->eval_sched_id }}">
                                    <i class="fa fa-pencil icon-edit"></i>
                                 </a>
                                 <a href="#" data-toggle="modal" data-target="#delete-eval-sched-modal{{ $row->eval_sched_id }}">
                                    <i class="fa fa-trash icon-delete"></i>
                                 </a>
                              </td>
                           </tr>
                           @include('client.modules.evaluation.evaluation_schedule.edit')
                           @include('client.modules.evaluation.evaluation_schedule.delete')
                           @empty
                           <tr>
                              <td colspan="5">No Evaluation Schedule(s) found.</td>
                           </tr>
                           @endforelse
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

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
input[type=text], select{
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
<script type="text/javascript" src="{{ asset('css/js/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/bootstrap-datepicker.css') }}" />
<script>
   $(document).ready(function(){
      $('#datepairExample .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
      });
   });
</script>
@endsection