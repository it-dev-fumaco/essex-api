@extends('admin.app')
@section('content')
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <h2 class="title-2">Examination Schedule List</h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addExaminationSchedule"><i class="fa fa-plus"></i> Add Examination Schedule</a><br><br></div>

          <div id="employee_list">
            @include('exam.table.examination_schedule_table')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('exam.modal.examination_schedule_add')
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#addExaminationSchedule #department_id').change(function(){
      var optionSelected = $("option:selected", this).val();
      $.ajax({
        type: 'GET',
        url:  '/admin/get_users/' + optionSelected,
        success: function(data){
          console.log(data.id);
          $("#addExaminationSchedule #user_id").empty();
          for(var i=0; i < data.users.length; i++){
            var o = new Option(data.users[i].employee_name, data.users[i].id);
            $(o).html(data.users[i].employee_name);
            $("#addExaminationSchedule #user_id").append(o);
          }
          $("#addExaminationSchedule #exam_id").empty();
          for(var i=0; i < data.exams.length; i++){
            var o = new Option(data.exams[i].exam_title, data.exams[i].duration_in_minutes + ',' + data.exams[i].exam_id);
            $(o).html(data.exams[i].exam_title);
            $("#addExaminationSchedule #exam_id").append(o);
          }
        }
      });
    });

    $('#addExaminationSchedule').on('show.bs.modal',function(){
      var optionSelected = $("#addExaminationSchedule #department_id option:first", this).val();
      $.ajax({
        type: 'GET',
        url:  '/admin/get_users/' + optionSelected,
        success: function(data){
          console.log(data.id);
          $("#addExaminationSchedule #user_id").empty();
          for(var i=0; i < data.users.length; i++){
            var o = new Option(data.users[i].employee_name, data.users[i].id);
            $(o).html(data.users[i].employee_name);
            $("#addExaminationSchedule #user_id").append(o);
          }
          $("#addExaminationSchedule #exam_id").empty();
          for(var i=0; i < data.exams.length; i++){
            var o = new Option(data.exams[i].exam_title, data.exams[i].duration_in_minutes + ',' + data.exams[i].exam_id);
            $(o).html(data.exams[i].exam_title);
            $("#addExaminationSchedule #exam_id").append(o);
          }
        }
      });
    });

    $('#formAddExaminationSchedule').submit(function(event){
      console.log($(this).serialize());
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: "{{route('admin.examination_schedule_save')}}",
        data: $(this).serialize(),
        success: function(data){
          console.log(data);
          if(data.error){
            console.log(data.mes);
            console.log(data.error);
            $('#errorDiv').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button> <center>" + data.error + "<br>" + JSON.stringify(data.rec) + "</center></div>");
            $('#formAddExaminationSchedule').trigger("reset");
          }
          else if(data.message){
            console.log(data.mes);
            console.log(data.message);
            location.reload();
          }
        }
      });
    });
    $('#formAddExaminationSchedule #exam_id').change(function(){
      alert($('option:selected',this).val());
    })
    $('#closeAddExaminationSchedForm').click(function(){
      $('#formAddExaminationSchedule').trigger("reset");
    });
  });
</script>
@stop