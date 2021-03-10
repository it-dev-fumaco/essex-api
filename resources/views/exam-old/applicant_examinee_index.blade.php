@extends('admin.app')

@section('content')
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <h2 class="title-2">Applicant Examinee List</h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addApplicantExaminee"><i class="fa fa-plus"></i> Add Applicant Examinee</a><br><br></div>
          @if(session("message"))
            <div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <center>{{ session("message") }}</center>
            </div>
          @endif
          <div id="employee_list">
            @include('exam.table.applicant_examinee_table')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('exam.modal.applicant_examinee_add')
@stop


@section('script')
<script type="text/javascript">
  // $('#formAddApplicantExaminee').submit(function(event){
  //   event.preventDefault();
  //   $.ajax({
  //     type: 'POST',
  //     url: '{{route('admin.applicant_examinee_save')}}',
  //     data: $(this).serialize(),
  //     success: function(data){
  //       if(data.error){
  //         alert(data.error);
  //       }
  //     }
  //   });
  // });
</script>
@stop