@extends('admin.app')
@section('content')
		<div class="row">
			<div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <h2 class="title-2">Exam Type List</h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addExamType"><i class="fa fa-plus"></i> Add Exam Type</a><br><br></div>
          @if(session("message"))
            <div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <center>{{ session("message") }}</center>
            </div>
          @endif
          <div id="exam_type">
             @include('exam.table.examtype_table')
          </div>
        </div>
			</div>
		</div>

@include('exam.modal.examtype_add')
@endsection


@section('script')
<script type="text/javascript">
   CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
  CKEDITOR.config.resize_enabled = false;
  CKEDITOR.config.autoParagraph = false;
  CKEDITOR.config.height = 200;
  CKEDITOR.config.autoGrow_maxHeight = 200;
  $('#addExamType').on('show.bs.modal',function(){
   $('#formAddExamType').trigger('reset'); 
 });
  
  $('#formAddExamType').submit(function(event){
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: "{{route('admin.exam_type_save')}}",
      data: $(this).serialize(),
      success: function(data){
        if(data.error){
          alert(data.error);
          $('#formAddExamType').trigger('reset');
          // $("#formAddExamType #instruction").val('');
          // CKEDITOR.replace( 'instruction');
          // var er = CKEDITOR.instances.instruction.getData();
          // alert(er);
        }
      }
    });
  });
</script>
@stop