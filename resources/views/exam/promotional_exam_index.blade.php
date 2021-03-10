@extends('admin.app')
@section('content')
		<div class="row">
			<div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <h2 class="title-2">Promotional Exam List</h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPromotionalExam"><i class="fa fa-plus"></i> Add Promotional Exam</a><br><br></div>
          @if(session("message"))
            <div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <center>{{ session("message") }}</center>
            </div>
          @endif
          <div id="employee_list">
             @include('exam.table.promotional_exam_table')
          </div>
        </div>
			</div>
		</div>
	</div>
</div>
@include('exam.modal.promotional_exam_add')
@endsection
