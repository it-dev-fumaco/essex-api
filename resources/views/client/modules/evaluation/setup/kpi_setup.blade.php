@extends('client.app')
@section('content')
<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
}
input, select{
   height: 35px;
   width: 100%;
}
textarea{
   width: 100%;
}
#eval-table td{
   vertical-align: middle;
}

#kpi-tree-table td{
   vertical-align: middle;
}


</style>

<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">KPI per Department Setup</h2>
   <a href="/evaluation/department">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px;margin-top: -50px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
<input type="hidden" id="department-id" value="{{ $dept_details->department_id }}">
<div class="col-md-12">
   <div class="row">
      {{-- <div class="col-sm-12 col-md-8 col-md-offset-2"> --}}
      <div class="col-sm-12">
         <div class="inner-box featured">
            <h2 class="title-2">{{ $dept_details->department }}</h2>
            <div class="row">
               <div class="col-sm-12">
                  <div class="pull-right">
                     <a href="#" id="add-kpi-btn" class="btn btn-success"><i class="fa fa-plus"></i> KPI</a>
                  </div>
                  <br><br>

                  <div id="message-alert" style="padding: 10px;"></div>
                  <div id="kpi-setup-table"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@include('client.modules.evaluation.kpi.modals.kpi_designation_add')
@include('client.modules.evaluation.kpi.modals.kpi_designation_edit')
@include('client.modules.evaluation.kpi.modals.kpi_designation_delete')

@include('client.modules.evaluation.metrics.modals.metrics_add')
@include('client.modules.evaluation.metrics.modals.metrics_edit')
@include('client.modules.evaluation.metrics.modals.metrics_delete')

@include('client.modules.evaluation.employee_inputs.modals.data_input_add')
@include('client.modules.evaluation.employee_inputs.modals.data_input_edit')
@include('client.modules.evaluation.employee_inputs.modals.data_input_delete')

@endsection

@section('script')
<script>
   $(document).ready(function(){
      var dept_id = $('#department-id').val();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      loadEvalTree();
      function loadEvalTree(){
         $.ajax({
            url:"/kpiTree/" + dept_id,
            type:"GET",
            success:function(data){
               $('#kpi-setup-table').html(data);
            }
         });  
      }

      $('#add-kpi-btn').click(function(e){
         e.preventDefault();
         // $('#add-kpi-modal .department-select').val(dept_id);
         $('#add-kpi-modal').modal('show');
      });


      $('#add-kpi-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/createKPI",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               console.log('submit');
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#add-kpi-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.edit-kpi-btn', function(e){
         e.preventDefault();
         $('#edit-kpi-modal #designation-table tbody').empty();
         var id = $(this).data('id');
         var row = '';
         $.ajax({
            url: "/getKpiDetails/"+id,
            success: function(response) {
               $('#edit-kpi-form .period').val(response.kpi_details.evaluation_period);
               $('#edit-kpi-form .department-select').val(response.kpi_details.department_id);
               $('#edit-kpi-form .objective-select').val(response.kpi_details.objective_id);
               $('#edit-kpi-form .kpi-description').val(response.kpi_details.kpi_description);
               $('#edit-kpi-form .target').val(response.kpi_details.target);
               $('#edit-kpi-form .formula').val(response.kpi_details.formula);
               $('#edit-kpi-form .weight-average').val(response.kpi_details.weight_average);
               $('#edit-kpi-form .kpi-id').val(response.kpi_details.kpi_id);
               $('#checkvalue').val(response.kpi_details.set_kpi);
               $('#checkvaluemanual').val(response.kpi_details.set_manual);
               $('#edit-kpi-form .modified_date_kpi').text(response.kpi_details.updated_at);
               $('#edit-kpi-form .modified_name_kpi').text(response.kpi_details.last_modified_by);
               if(response.kpi_details.set_kpi == 1){
                  $('.edit_kpi_perdepartment').prop('checked', true);
                  $(this).is(':checked') ? 1 : 0;
               }

               if(response.kpi_details.set_manual == 1){
                  $('#setmanual').prop('checked', true);
                  $(this).is(':checked') ? 1 : 0;
               }

               $('#edit-kpi-modal').modal('show'); 

               var old_kpi_designation = '';
               $.each(response.kpi_designations, function(i, d){
                  var sel_id = d.designation_id;
                  var kpi_designation_id = d.id;
                  old_kpi_designation += '<input type="hidden" name="old_kpi_designation[]" value="'+d.id+'">';
                  
                  $.ajax({
                     url: "/getDesignations",
                     data: {department: dept_id},
                     cache: false,
                     success: function(response) {
                        $.each(response, function(i, d){
                           selected = (d.des_id == sel_id) ? 'selected' : null;
                           row += '<option value="' + d.des_id + '" '+selected+'>' + d.designation + '</option>';
                        });

                        var tblrow = '<tr>' +
                           '<td><input type="hidden" name="kpi_designation_id[]" value="'+kpi_designation_id+'"</td>' +
                           '<td><select name="kpi_designation_old[]" required>'+row+'</select></td>' +
                           '<td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>' +
                           '</tr>';

                        $("#edit-kpi-modal #designation-table").append(tblrow);
                        $("#edit-kpi-modal #old_ids").html(old_kpi_designation);
                        row = '';
                     },
                     error: function(response) {
                        alert('Error fetching Designation!');
                     }
                  });
               });
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      });

      $('#edit-kpi-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/updateKPI",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#edit-kpi-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.delete-kpi-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');
         
         $('#delete-kpi-form .kpi').text(desc);
         $('#delete-kpi-form .kpi-description').val(desc);
         $('#delete-kpi-form .kpi-id').val(id);
         $('#delete-kpi-modal').modal('show');
      });

      $('#delete-kpi-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/deleteKPI",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#delete-kpi-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.add-metrics-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');

         $('#add-metrics-form .kpi-id').val(id);
         $('#add-metrics-form .kpi-text').text(desc);
         $('#add-metrics-modal').modal('show');

         // $.ajax({
         //    url: "/getKpiDetails/" + id,
         //    success: function(response) {
         //       console.log(response);
         //       $('#add-metrics-form .kpi-id').val(response.kpi_details.kpi_id);
         //       $('#add-metrics-form .kpi-text').text(response.kpi_details.kpi_description);
         //       $('#add-metrics-modal').modal('show');
         //    },
         //    error: function(data) {
         //       alert('Error fetching data!');
         //    }
         // });
      });

      $(document).on('click', '.add-data-inputs-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');

         $('#add-data-inputs-form .metric-id').val(id);
         $('#add-data-inputs-form .metric-text').text(desc);
         $('#add-data-inputs-modal').modal('show');
      });

      $(document).on('click', '.edit-data-input-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');
         var last_modified_by = $(this).data('modified');
         var updated_at = $(this).data('updated');
         $('#edit-data-input-form .data-input-id').val(id);
         $('#edit-data-input-form .data-input').text(desc);
         $('#edit-data-input-form .modified_date_data').text(updated_at);
         $('#edit-data-input-form .modified_name_data').text(last_modified_by);
         $('#edit-data-input-modal').modal('show');
      });

      $('#edit-data-input-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/updateDataInput",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#edit-data-input-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.delete-data-input-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');
         
         $('#delete-data-input-form .input-txt').text(desc);
         $('#delete-data-input-form .input').val(desc);
         $('#delete-data-input-form .data-input-id').val(id);
         $('#delete-data-input-modal').modal('show');
      });

      $('#delete-data-input-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/deleteDataInput",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#delete-data-input-modal').modal('hide');
            }
         });  
      });

      $('#add-data-inputs-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/createDataInputs",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#add-data-inputs-modal').modal('hide');
            }
         });  
      });

      $('#add-metrics-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/createMetrics",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#add-metrics-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.edit-metric-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');

         $.ajax({
            url: "/getMetricDetails/"+id,
            success: function(response) {
               $('#edit-metric-form .metric-id').val(response.metric_id);
               $('#edit-metric-form .metric-name').val(response.metric_name);
               $('#edit-metric-form .metric-description').val(response.metric_description);
               $('#edit-metric-form .formula').val(response.formula_guide);
               $('#edit-metric-form .modified_date_metrics').text(response.updated_at);
               $('#edit-metric-form .modified_name_metrics').text(response.last_modified_by);
               // $('#edit-metric-form .target').val(response.target);
               // $('#edit-metric-form .weight-average').val(response.weight_average);
               $('#edit-metric-form .remarks').val(response.remarks);
               $('#edit-metric-modal').modal('show');
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      });

      $('#edit-metric-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/updateMetric",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#edit-metric-modal').modal('hide');
            }
         });  
      });

      $(document).on('click', '.delete-metric-btn', function(e){
         e.preventDefault();
         var id = $(this).data('id');
         var desc = $(this).data('desc');

         $('#delete-metric-form .metric').text(desc);
         $('#delete-metric-form .metric-description').val(desc);
         $('#delete-metric-form .metric-id').val(id);
         $('#delete-metric-modal').modal('show');
      });

      $('#delete-metric-form').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:"/deleteMetric",
            type:"POST",
            data: $(this).serialize(),
            success:function(data){
               loadEvalTree();
               $('#message-alert').html('<div class="alert alert-success alert-dismissible" style="text-align: center;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.message + '</div>');
               $('#delete-metric-modal').modal('hide');
            }
         });  
      });

      $('#add-metrics-modal .add-row').click(function(e){
         e.preventDefault();
         var i = $("#add-metrics-modal #performance-metrics-table tbody tr").length + 1;
         var row = '<tr>' +
               '<td>' + i +'</td>' +
               '<td><input type="text" name="metric_name[]" required></td>' +
               '<td><input type="text" name="metric[]" required></td>' +
               '<td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>' +
               '</tr>';
         $("#add-metrics-modal #performance-metrics-table").append(row);
      });

      $('#add-data-inputs-modal .add-row').click(function(e){
         e.preventDefault();
         var i = $("#add-data-inputs-modal #data-inputs-table tbody tr").length + 1;
         var row = '<tr>' +
               '<td>' + i +'</td>' +
               '<td><input type="text" name="data_input[]" required></td>' +
               '<td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>' +
               '</tr>';
         $("#add-data-inputs-modal #data-inputs-table").append(row);
      });

      $('#add-kpi-modal .add-row').click(function(e){
         e.preventDefault();
         var row = '';
         $.ajax({
            url: "/getDesignations",
            data: {department: dept_id},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Designation--</option>';
               $.each(response, function(i, d){
                  row += '<option value="' + d.des_id + '">' + d.designation + '</option>';
               });

               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#add-kpi-modal #designation-table").append(tblrow);
               autoRowNumberAddKPI();
            },
            error: function(response) {
               alert('Error fetching Designation!');
            }
         });
      });

      $('#edit-kpi-modal .add-row').click(function(e){
         e.preventDefault();
         var row = '';
         $.ajax({
            url: "/getDesignations",
            data: {department: dept_id},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Designation--</option>';
               $.each(response, function(i, d){
                  row += '<option value="' + d.des_id + '">' + d.designation + '</option>';
               });

               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#edit-kpi-modal #designation-table").append(tblrow);
               autoRowNumberEditKPI();
            },
            error: function(response) {
               alert('Error fetching Designation!');
            }
         });
      });

      $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
      });

      $('.modal').on('hidden.bs.modal', function(){
         $(this).find('form')[0].reset();
      });

      function autoRowNumberAddKPI(){
         $('#add-kpi-modal #designation-table tbody tr').each(function (idx) {
            $(this).children("td:eq(0)").html(idx + 1);
         });
      }

      function autoRowNumberEditKPI(){
         $('#edit-kpi-modal #designation-table tbody tr').each(function (idx) {
            $(this).children("td:eq(0)").html(idx + 1);
         });
      }
   $("#edit_kpi_perdepartment").on("change", function () {
    var val = $(this).val();
    var apply = $(this).is(':checked') ? 1 : 0;
    $('#checkvalue').val(apply);
      });

   $("#setmanual").on("change", function () {
         var val = $(this).val();
         var apply = $(this).is(':checked') ? 1 : 0;
         $('#checkvaluemanual').val(apply);
      });
   });
</script>

@endsection