<table class="table">
   <col width="3%">
   <col width="12%">
   <col width="20%">
   <thead>
      <tr>
         <th>ID</th>
         <th>Examinee</th>
         <th>Exam Title</th>
         <th>Exam Code</th>
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
         <td>{{ $appexaminee->user_id }}</td>
         <td>{{ $appexaminee->employee_name }}</td>
         <td>{{ $appexaminee->exam_title }}</td>
         <td>{{ $appexaminee->exam_code }}</td>
         <td>@if($appexaminee->start_time){{ date('h:i A',strtotime($appexaminee->start_time)) }}@endif</td>
         <td>@if($appexaminee->end_time){{ date('h:i A',strtotime($appexaminee->end_time)) }}@endif</td>
         <td>{{ $appexaminee->duration }} minutes</td>
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