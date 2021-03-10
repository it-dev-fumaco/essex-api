@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/hr/analytics">Analytics</a></li> --}}
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      {{-- <li><a href="/module/hr/background_check">Background Investigation Form</a></li> --}}
      <li><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li class="active"><a href="/module/hr/exam_results">Exam Result(s)</a></li>
      <li><a href="/module/hr/department_head_list">Department Head(s)</a></li>
      <li><a href="/module/hr/designation">Designation(s)</a></li>
      <li><a href="/module/hr/training">Training(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-md-12">
               <div class="inner-box featured">
                  <h2 class="title-2">Examination Report</h2>
                  <table id="example" class="table">
                     <thead>
                        <tr>
                           <th>Examinee</th>
                           <th>Exam Title</th>
                           <th>Exam Group</th>
                           <th>Date Taken</th>
                           <th>No. of Items</th>
                           <th>Score</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($exam_results as $examresult)
                        <tr>
                           <td>{{ $examresult->employee_name }}</td>
                           <td>{{ $examresult->exam_title }}</td>
                           <td>{{ $examresult->exam_group_description }}</td>
                           <td>{{ $examresult->date_taken }}</td>
                           <td>{{ $examresult->exam_items }}</td>
                           <td>{{ $examresult->examinee_score }}</td>
                           <td>
                              <a href="/client/exam_results/{{ $examresult->examinee_id }}/{{ $examresult->exam_id }}" class="hover-icon">
                                  <i class="fa fa-search" style="font-size: 15pt; color: #2980B9;"></i> View Result
                               </a>
                           </td>
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