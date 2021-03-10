@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
@include('client.modules.human_resource.background_investigation.modals.crud_add_questions')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/hr/analytics">Analytics</a></li> --}}
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      <li class="active"><a href="/module/hr/background_check">Background Investigation Form</a></li>
      <li><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li><a href="/module/hr/exam_results">Exam Result(s)</a></li>
      <li><a href="/module/hr/department_head_list">Department Head(s)</a></li>
      <li><a href="/module/hr/designation">Designation List</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
<div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Background Investigation Question(s)</h2>
               <div class="row">
                  <div class="col-md-12">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{!! session("message") !!}</center>
                     </div>
                     @endif
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addquestion" style="float: left; z-index: 1;">
                        <i class="fa fa-plus"></i> Question
                     </a>
                     <table class="table" id="example">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Question</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                           @foreach($question as $questions)
                           <tr>
                           <td>{{ $questions->question_id }}</td>
                           <td>{{ $questions->question }}</td>
                           <td>
                              <a href="#" data-toggle="modal" data-target="#edit-questions-{{ $questions->question_id }}">
                                 <i class="fa fa-pencil"></i>
                              </a> |
                              <a href="#" data-toggle="modal" data-target="#delete-questions-{{ $questions->question_id }}">
                                 <i class="fa fa-trash"></i> 
                              </a>
                           </td>
                           @include('client.modules.human_resource.background_investigation.modals.crud_edit_questions')
                           @include('client.modules.human_resource.background_investigation.modals.crud_delete_questions')
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>      </div>
   </div>
</div>

@endsection

@section('script')
<script>

   $(document).ready(function(){
$('#example').DataTable({
      "bLengthChange": false,
      "ordering": false,
      "dom": '<"top"f>rt<"bottom"ip><"clear">'
   });
      
   });
</script>

@endsection

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>