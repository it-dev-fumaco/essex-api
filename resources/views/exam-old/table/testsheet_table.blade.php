<table class="table">
   <thead>
      <tr>
         <th>Exam ID</th>
         <th>Exam Group</th>
         <th>Department</th>
         <th>Exam Title</th>
         <th>Duration In Minutes</th>
         <th>Passing Mark</th>
         <th>Status</th>
         <th>Remarks</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($exams as $exam)
      <tr>
         <td>{{ $exam->exam_id }}</td>
         <td>{{ $exam->exam_group_description }}</td>
         <td>{{ $exam->department }}</td>
         <td>{{ $exam->exam_title }}</td>
         <td>{{ $exam->duration_in_minutes }}</td>
         <td>{{ $exam->passing_mark }}</td>
         <td>{{ $exam->status }}</td>
         <td>{{ $exam->remarks }}</td>
         <td>{{ $exam->actions }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#viewTestSheet{{$exam->exam_id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>{{-- |
            <a href="#" data-toggle="modal" data-target="#editExam{{$exam->exam_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteExam{{$exam->exam_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>--}}
         </td>
      </tr>
      @include('exam.modal.testsheet_view')
      {{--@include('exam.modal.exam_add')
      @include('exam.modal.exam_edit')
      @include('exam.modal.exam_delete')--}}
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>