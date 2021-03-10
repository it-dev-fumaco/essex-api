@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
@include('client.modules.human_resource.applicant_exams.modals.add_exam')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/hr/analytics">Analytics</a></li> --}}
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      {{-- <li><a href="/module/hr/background_check">Background Investigation Form</a></li> --}}
      <li class="active"><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li><a href="/module/hr/exam_results">Exam Result(s)</a></li>
      <li><a href="/module/hr/department_head_list">Department Head(s)</a></li>
      <li><a href="/module/hr/designation">Designation(s)</a></li>
      <li><a href="/module/hr/training">Training(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
<div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Applicant Exam(s)</h2>
               <div class="row">
                  <div class="col-md-12">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{{ session("message") }}</center>
                     </div>
                     @endif           
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addExam" style="float: left; z-index: 1;">
                        <i class="fa fa-plus"></i> Exam
                     </a>
                     <table class="table" id="example">
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Exam Title</th>
                              <th>Exam Group</th>
                              <th>Department</th>
                              <th>Duration</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                           @foreach($exams as $index => $exam)
                           <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $exam->exam_title }}</td>
                              <td>{{ $exam->exam_group_description }}</td>
                              <td>
                               @if($exam->department_id == -1)
                                 All Departments
                                 @elseif($exam->department_id == 0)
                                 Applicants
                                 @else
                                 {{ $exam->department }}
                                 @endif</td>
                              <td>{{ $exam->duration_in_minutes }} minutes</td>
                              <td>{{ $exam->status }}</td>
                              <td>
                                 <a href="/client/hr/applicant_exams/{{ $exam->exam_id }}" class="hover-icon">
                                    <i class="fa fa-search" style="font-size: 15pt; color: #2980B9;"></i>
                                 </a>
                                 <a href="#" class="hover-icon" data-toggle="modal" data-target="#editExam{{$exam->exam_id}}">
                                    <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i>
                                 </a>
                                 <a href="#" class="hover-icon" data-toggle="modal" data-target="#deleteExam{{$exam->exam_id}}">
                                    <i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i>
                                 </a>
                              </td>
                              @include('client.modules.human_resource.applicant_exams.modals.edit_exam')
                              @include('client.modules.human_resource.applicant_exams.modals.delete_exam')
                           </tr>
                           @endforeach
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
      
   });
</script>

@endsection