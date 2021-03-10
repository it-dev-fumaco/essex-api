@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
@include('client.modules.evaluation.objective.modals.objective_add')
@include('client.modules.evaluation.objective.modals.objective_edit')
@include('client.modules.evaluation.objective.modals.objective_delete')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li class="active"><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li><a href="/evaluation/kpi">KPI List</a></li>
      <li><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li><a href="/evaluation/kpi_result">KPI Result</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
            <div class="inner-box featured">
               <h2 class="title-2">Overall Quality Objective(s)</h2>
               <div class="row">
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-objective-modal">
                        <i class="fa fa-plus"></i> Objective
                     </a>
                  </div>
                  <div class="col-md-12" id="message-alert" style="margin-top: 10px;"></div>
                  <div class="col-md-12" id="objective-list"></div>
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

      $('#add-objective-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/createObjective",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadObjectives();
               $('#message-alert').html('<div class="alert alert-success" style="text-align: center;">' + data.message + '</div>');
               $('#add-objective-modal').modal('hide');
            }
         });  
      });

      $('#edit-objective-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/updateObjective",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadObjectives();
               $('#message-alert').html('<div class="alert alert-success" style="text-align: center;">' + data.message + '</div>');
               $('#edit-objective-modal').modal('hide');
            }
         });  
      });

      $('#delete-objective-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/deleteObjective",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadObjectives();
               $('#message-alert').html('<div class="alert alert-success" style="text-align: center;">' + data.message + '</div>');
               $('#delete-objective-modal').modal('hide');
            }
         });  
      });

      loadObjectives();

      function loadObjectives(page){
         $.ajax({
            url: "/getObjectives?page="+page,
            success: function(response) {
               $('#objective-list').html(response);
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      }

      $(document).on('click', '.edit-objective-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         $.ajax({
            url: "/getObjectiveDetails/"+id,
            success: function(response) {
               $('#edit-objective-modal').modal('show');
               $('#edit-objective-form .objective').val(response.obj_description);
               $('#edit-objective-form .target').val(response.target);
               $('#edit-objective-form .obj_id').val(response.obj_id);
               $('#edit-objective-form .modified_date').text(response.updated_at);
               $('#edit-objective-form .modified_name').text(response.last_modified_by);
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      });

      $(document).on('click', '.delete-objective-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         $.ajax({
            url: "/getObjectiveDetails/"+id,
            success: function(response) {
               $('#delete-objective-modal').modal('show');
               $('#delete-objective-form .dept').text(response.department);
               $('#delete-objective-form .obj').text(response.obj_description);
               $('#delete-objective-form .department').val(response.department_id);
               $('#delete-objective-form .objective').val(response.obj_description);
               $('#delete-objective-form .obj_id').val(response.obj_id);
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      });

      $(document).on('click', '#objective-pagination a', function(e){
         e.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         loadObjectives(page);
      });

      $('.modal').on('hidden.bs.modal', function(){
         $(this).find('form')[0].reset();
      });
   });
</script>
@endsection