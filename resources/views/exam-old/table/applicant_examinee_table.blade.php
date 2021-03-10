
<table class="table">
   <thead>
      <tr>
         <th>Examinee ID</th>
         <th>Examinee Name</th>
         <th>Exam Title</th>
         <th>Exam Date</th>
         <th>Start Time</th>
         <th>End Time</th>
         <th>Duration</th>
         <th>Validity Date</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($appexaminees as $appexaminee)
      <tr>
         <td>{{ $appexaminee->exam_id }}</td>
         <td>{{ $appexaminee->employee_name }}</td>
         <td>{{ $appexaminee->exam_title }}</td>
         <td>{{ date('F d, Y', strtotime($appexaminee->date_of_exam)) }}</td>
         <td>@if($appexaminee->start_time)date('h:i A',strtotime($appexaminee->start_time))@endif</td>
         <td>@if($appexaminee->end_time){date('h:i A',strtotime($appexaminee->end_time))@endif</td>
         <td>{{ $appexaminee->duration }}</td>
         <td>{{ date('F d, Y', strtotime($appexaminee->validity_date)) }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editApplicantExaminee{{$appexaminee->examinee_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteApplicantExaminee{{$appexaminee->examinee_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.applicant_examinee_delete')
      @include('exam.modal.applicant_examinee_edit')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

@include('exam.modal.applicant_examinee_add')