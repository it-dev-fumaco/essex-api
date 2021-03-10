@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
{{-- @include('client.modules.evaluation.kpi.modals.kpi_designation_add')
@include('client.modules.evaluation.kpi.modals.kpi_designation_edit')
@include('client.modules.evaluation.kpi.modals.kpi_designation_delete')

@include('client.modules.evaluation.metrics.modals.metrics_add') --}}
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li class="active"><a href="/evaluation/kpi">KPI List</a></li>
      <li><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li><a href="/evaluation/kpi_result">KPI Result</a></li>
      
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-md-12 col-sm-12">
            <div class="inner-box featured">
               <h2 class="title-2">KPI List</h2>
               <div class="row" id="kpi-filters">
                  <div class="col-md-4">
                     <label>Objective:</label>
                     <select class="objective-select">
                        <option value="">Select Objective</option>
                        @forelse($objective_list as $row)
                        <option value="{{ $row->obj_id }}">{{ $row->obj_description }}</option>
                        @empty
                        <option>No Objective(s) Found.</option>
                        @endforelse
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label>Department:</label>
                     <select class="department-select">
                        <option value="">Select Department</option>
                        @forelse($department_list as $row)
                        <option value="{{ $row->department_id }}">{{ $row->department }}</option>
                        @empty
                        <option>No Department(s) Found.</option>
                        @endforelse
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12" id="message-alert" style="margin-top: 10px;"></div>
                  <div class="col-md-12" id="kpi-designation-list"></div>
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
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      loadKPI();

      $('#kpi-filters select').on('change', function(){
         loadKPI();
      });

      $(document).on('click', '#kpi-designation-pagination a', function(e){
         e.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         loadKPI(page);
      });

      $('#kpi-filters .department-select').on('change', function(){
         loadObjectives($(this).val());
      });

      function loadKPI(page){
         var department_id = $('#kpi-filters .department-select').val();
         var objective_id = $('#kpi-filters .objective-select').val();
         var kpi_id = $('#kpi-filters .kpi-select').val();

         var data = {
            department: department_id,
            objective: objective_id,
            kpi: kpi_id,
         }

         $.ajax({
            url: "/getKPI?page="+page,
            data: data,
            success: function(response) {
               $('#kpi-designation-list').html(response);
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      }
   });
</script>
@endsection