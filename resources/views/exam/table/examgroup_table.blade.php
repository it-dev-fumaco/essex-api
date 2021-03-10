<table class="table">
   <thead>
      <tr>
         <th>Exam Group ID</th>
         <th>Exam Group Description</th>
         <th>Remarks</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($examgroups as $examgroup)
      <tr>
         <td>{{ $examgroup->exam_group_id }}</td>
         <td>{{ $examgroup->exam_group_description }}</td>
         <td>{{ $examgroup->remarks }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editExamGroup{{$examgroup->exam_group_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteExamGroup{{$examgroup->exam_group_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.examgroup_add')
      @include('exam.modal.examgroup_edit')
      @include('exam.modal.examgroup_delete')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>