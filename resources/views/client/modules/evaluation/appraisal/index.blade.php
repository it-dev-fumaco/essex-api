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
@include('client.modules.evaluation.kpi.modals.kpi_designation_edit') --}}
@include('client.modules.evaluation.appraisal.modals.appraisal_add')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li><a href="/evaluation/kpi">KPI List</a></li>
      <li class="active"><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li><a href="/evaluation/kpi_result">KPI Result</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-sm-12 col-md-8 col-md-offset-2">
            <div class="inner-box featured">
               <h2 class="title-2">Performance Appraisal</h2>
               <div class="row">
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" id="create-appraisal-btn">
                        <i class="fa fa-plus"></i> Create
                     </a>
                  </div>

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
                              <th>Employee Name</th>
                              <th>Evaluated By</th>
                              <th>Evaluation Date</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse($performance_appraisal as $i => $row)
                           <tr>
                              <td>{{ $i + 1 }}</td>
                              <td>{{ $row->employee_name }}</td>
                              <td>{{ $row->evaluator }}</td>
                              <td>{{ $row->evaluation_date }}</td>
                              <td>{{ $row->status }}</td>
                              <td>
                                 <a href="/evaluation/appraisal/view/{{ $row->appraisal_result_id }}"><i class="fa fa-search icon-view"></i></a>
                                 {{-- @if(Auth::user()->user_id == 8888) --}}
                                 <a href="#" data-toggle="modal" data-target="#delete-appraisal-modal{{ $row->appraisal_result_id }}"><i class="fa fa-trash icon-delete"></i></a>
                                 {{-- @endif --}}
                              </td>
                           </tr>
                           @include('client.modules.evaluation.appraisal.modals.appraisal_delete')
                           @empty
                           <tr>
                              <td colspan="5">No record(s) found.</td>
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
      $('.modal').on('hidden.bs.modal', function(){
         $(this).find('form')[0].reset();
      });

      $('#create-appraisal-btn').click(function(e){
         e.preventDefault();
         $('#create-appraisal-modal').modal('show');
      });
   });
</script>
@endsection