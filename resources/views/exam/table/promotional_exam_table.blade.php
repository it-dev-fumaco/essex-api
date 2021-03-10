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
      @forelse($promexams as $promexam)
      <tr>
         <td>{{ $promexam->exam_id }}</td>
         <td>{{ $promexam->exam_group_description }}</td>
         <td>{{ $promexam->department }}</td>
         <td>{{ $promexam->exam_title }}</td>
         <td>{{ $promexam->duration_in_minutes }}</td>
         <td>{{ $promexam->passing_mark }}</td>
         <td>{{ $promexam->status }}</td>
         <td>{{ $promexam->remarks }}</td>
         <td>
            <a href="{{route('admin.exam_view',$promexam->exam_id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a> <br>
            <a href="#" data-toggle="modal" data-target="#editPromExam{{$promexam->exam_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> <br>
            <a href="#" data-toggle="modal" data-target="#deletePromExam{{$promexam->exam_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.promotional_exam_edit')
      @include('exam.modal.promotional_exam_delete')

      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>


@include('exam.modal.promotional_exam_add')