@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
@include('client.modules.human_resource.training.modals.add_modal')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/hr/analytics">Analytics</a></li> --}}
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      {{-- <li><a href="/module/hr/background_check">Background Investigation Form</a></li> --}}
      <li><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li><a href="/module/hr/exam_results">Exam Result(s)</a></li>
      <li><a href="/module/hr/department_head_list">Department Head(s)</a></li>
      <li><a href="/module/hr/designation">Designation(s)</a></li>
      <li class="active"><a href="/module/hr/designation">Training(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Training(s)</h2>
               <div class="row">
                  <div class="col-md-12">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{{ session("message") }}</center>
                     </div>
                     @endif           
                  </div>
                  <input type="hidden" name="department_id" id="department_id">
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-training-modal" style="float: left; z-index: 1;">
                        <i class="fa fa-plus"></i> Employee Training
                     </a>
                     <table class="table" id="example">
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Training Date</th>
                              <th>Department</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                           @foreach($training as $index => $row)
                           <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $row->training_title }}</td>
                              <td>{{ $row->training_desc }}</td>
                              <td>{{ $row->training_date }}</td>
                              <td>{{ $row->department_name }}</td>
                              <td>{{ $row->status }}</td>
                              <td>
                                 <a href="/module/hr/training_profile/{{ $row->training_id }}" class="hover-icon">
                                    <i class="fa fa-search" style="font-size: 15pt; color: #2980B9;"></i>
                                 </a>
                                 <a href="#" class="hover-icon edit-training-btn" data-id="{{ $row->training_id }}">
                                    <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i>
                                 </a>
                                 <a href="#" data-toggle="modal" data-target="#delete-training-{{ $row->training_id }}">
                                    <i class="fa fa-trash icon-delete"></i> 
                                 </a>
                                 @include('client.modules.human_resource.training.modals.edit_modal')
                                 @include('client.modules.human_resource.training.modals.delete_modal')

                                 @endforeach
                              </td>
                           </tr>
                        </tbody>
                     </table>
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
      $('#example').DataTable({
            "bLengthChange": false,
            "ordering": false,
            "dom": '<"top"f>rt<"bottom"ip><"clear">'
      });
      // $(document).on("click", ".delete_me", function(){
      //    alert('hi');
      //    $(this).parents("tr").remove();

      // });
      $('#add-training-modal').on('click', '.delete_me', function () {
         $(this).parents("tr").remove();
      });
      $('#edit-training-modal').on('click', '.delete_me', function () {
         $(this).parents("tr:first").remove();
      });
      // $('.del').live('click',function(){
      //    $(this).parent().parent().remove();
      // });
      // $('.delete_me').click(function(){
      //    $(this).parents("tr").remove();
      // });
      $('#add-training-modal .add-row').click(function(e){
         e.preventDefault();
         var row = '';
         var department = $('#department').val();
         if(department != 'All'){
            
            $.ajax({
            url: "/module/hr/training/employee_list",
            data: {department: department},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
         }else{
         $.ajax({
            url: "/module/hr/training/employee_list_edit",
            data: {department: department},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });

         }

      });
      $(document).on('click', '.edit-training-btn', function(e){
         e.preventDefault();
         $('#edit-training-modal #designation-table tbody').empty();
         var id = $(this).data('id');
         var row = '';
         $.ajax({
            url: "/module/hr/training_details/"+ id,
            success: function(response) {
               $('#edit-form-training .training_title').val(response.training.training_title);
               $('#edit-form-training .training_desc').val(response.training.training_desc);
               $('#edit-form-training .training_date').val(response.training.training_date);
               $('#edit-form-training .department_id').val(response.training.department);
               $('#edit-form-training .proposed_by').val(response.training.proposed_by);
               $('#edit-form-training .training_status').val(response.training.status);
               $('#edit-form-training .training_id').val(response.training.training_id);
               $('#edit-form-training .remarks_edit').val(response.training.remarks);
               // alert(response.training.training_id);
               $('#department_id').val(response.training.department);
               remarks_edit
               $(".department_name_edit").val(response.training.department_name);

               var department = response.training.department;
               // $('#edit-form-training .modified_date_kpi').text(response.kpi_details.updated_at);
               // $('#edit-form-training .modified_name_kpi').text(response.kpi_details.last_modified_by);
               

               $('#edit-training-modal').modal('show'); 

               var old_kpi_designation = '';
               if (department != 'All') {
                  $.each(response.training_attendees, function(i, d){
                  var sel_id = d.user_id;

                  old_kpi_designation += '<input type="hidden" name="old_kpi_designation[]" value="'+d.attendies_id+'">';
                  
                  $.ajax({
                     url: "/module/hr/training/employee_list",
                     data: {department: department},
                     cache: false,
                     success: function(response) {                                              
                        $.each(response, function(i, d){
                           selected = (d.user_id == sel_id) ? 'selected' : null;
                           row += '<option value="' + d.user_id + '" '+selected+'>' + d.employee_name + '</option>';
                           console.log(selected);
                        });

                        var tblrow = '<tr>' +
                           '<td><input type="hidden" name="kpi_designation_id[]" value="'+d.attendies_id+'"></td>' +
                           '<td><select name="kpi_designation_old[]" required>'+row+'</select></td>' +
                           '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                           '</tr>';

                        $("#edit-form-training #designation-table").append(tblrow);
                        $("#edit-form-training #old_ids").html(old_kpi_designation);
                        row = '';
                     },
                     error: function(response) {
                        alert('Error fetching Designation!');
                     }
                  });
               });
            }else{
                  $.each(response.training_attendees, function(i, d){
                  var sel_id = d.user_id;

                  old_kpi_designation += '<input type="hidden" name="old_kpi_designation[]" value="'+d.attendies_id+'">';
                  
                  $.ajax({
                     url: "/module/hr/training/employee_list_edit",
                     cache: false,
                     success: function(response) {                                              
                        $.each(response, function(i, d){
                           selected = (d.user_id == sel_id) ? 'selected' : null;
                           row += '<option value="' + d.user_id + '" '+selected+'>' + d.employee_name + '</option>';
                           console.log(selected);
                        });

                        var tblrow = '<tr>' +
                           '<td><input type="hidden" name="kpi_designation_id[]" value="'+d.attendies_id+'"></td>' +
                           '<td><select name="kpi_designation_old[]" required>'+row+'</select></td>' +
                           '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                           '</tr>';

                        $("#edit-form-training #designation-table").append(tblrow);
                        $("#edit-form-training #old_ids").html(old_kpi_designation);
                        row = '';
                     },
                     error: function(response) {
                        alert('Error fetching Designation!');
                     }
                  });
               });

               }
            },
            error: function(data) {
               alert('Error fetching data!');
            }
         });
      });
      $('#edit-training-modal .add-row').click(function(e){
         e.preventDefault();
         var row = '';
         var department = $('.department_id').val();
         if (department != "All") {
            $.ajax({
            url: "/module/hr/training/employee_list",
            data: {department: department},
            cache: false,

            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#edit-training-modal #designation-table").append(tblrow);
               autoRowNumberEdit();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });

         }else{
            $.ajax({
            url: "/module/hr/training/employee_list_edit",
            data: {department: department},
            cache: false,

            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#edit-training-modal #designation-table").append(tblrow);
               autoRowNumberEdit();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
         }

      });
   });
</script>
<script type="text/javascript">
      function autoRowNumber(){
      $('#add-training-modal #attendies_table tbody tr').each(function (idx) {
         if(idx == 0){
            idx = 0;
          
         }
         $(this).children("td:eq(0)").html(idx + 1);
      });
   }
</script>
<script type="text/javascript">
   function autoRowNumberEdit(){
         $('#edit-training-modal #designation-table tbody tr').each(function (idx) {
            if(idx == 0){
            idx = 0;
         }
            $(this).children("td:eq(0)").html(idx + 1);
         });
      }
</script>
<script type="text/javascript">
   function employeelist(){
         var row = '';
         var department = $('#department').val();
         var department_name = $("#department option:selected").text();
         $(".department_name_add").val(department_name);
         if(department != 'All'){
         $.ajax({
            url: "/module/hr/training/employee_list",
            data: {department: department},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';
               $('#attendies_table tr').remove();

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
      }else{
         $.ajax({
            url: "/module/hr/training/employee_list_edit",
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';
               $('#attendies_table tr').remove();

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
      }
   }
</script>
<script type="text/javascript">
   function employeelist_edit(){
         var row = '';
         var department = $('#edit-training-modal #department_id').val();
         var department_name = $("#edit-training-modal #department_id option:selected").text();
         $(".department_name_edit").val(department_name);
         if(department != 'All'){
         $.ajax({
            url: "/module/hr/training/employee_list",
            data: {department: department},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';
               $('#attendies_table tr').remove();

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
      }else{
         $.ajax({
            url: "/module/hr/training/employee_list_edit",
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';
               $('#attendies_table tr').remove();

               $("#add-training-modal #attendies_table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });
      }
   }
</script>
<!-- <script type="text/javascript">
   function employeelist_edit(){
         var row = '';
         var department = $('.department_id').val();


         $.ajax({
            url: "/module/hr/training/employee_list",
            data: {department: department},
            cache: false,
            success: function(response) {
               row += '<option value="">--Select Employee--</option>';
               
               $.each(response, function(i, d){
                  row += '<option value="' + d.user_id + '">' + d.employee_name + '</option>';
               });
               var tblrow = '<tr>' +
                  '<td></td>' +
                  '<td><select name="kpi_designation_new[]" required>'+row+'</select></td>' +
                  '<td><a class="delete_me"><i class="fa fa-trash icon-delete"></i></a></td>' +
                  '</tr>';

               $("#edit-training-modal #designation-table").append(tblrow);
               autoRowNumber();
            },
            error: function(response) {
               alert('Error fetching!');
            }
         });

   }
</script>
 -->

@endsection