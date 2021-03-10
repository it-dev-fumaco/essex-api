<table class="table"  id="examineesTable">
   <col width="3%">
   <col width="12%">
   <col width="20%">
   <thead>
      <tr>
         <th>ID</th>
         <th>Examinee</th>
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
      @forelse($examinees as $examinee)
      <tr>
         <td>{{ $examinee->user_id }}</td>
         <td>{{ $examinee->employee_name }}</td>
         <td>{{ $examinee->exam_title }}</td>
         <td>{{ date('F d, Y', strtotime($examinee->date_of_exam)) }}</td>
         <td>@if($examinee->start_time){{date('h:i A',strtotime($examinee->start_time))}}@endif</td>
         <td>@if($examinee->end_time){{date('h:i A',strtotime($examinee->end_time))}}@endif</td>
         <td>{{ $examinee->duration }} minutes</td>
         <td>{{ date('F d, Y', strtotime($examinee->validity_date)) }}</td>
         <td>{{--
            <a href="{{route('admin.examinee_testsheet',$examinee->examinee_id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a> |--}}
            <a href="#" data-toggle="modal" data-target="#editExaminee{{$examinee->examinee_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteExaminee{{$examinee->examinee_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.examinee_delete')
      @include('exam.modal.examinee_edit')

      @empty
      <tr>
         <td colspan="8">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

@include('exam.modal.examinee_add')