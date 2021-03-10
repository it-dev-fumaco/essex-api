<table class="table">
   <col width="3%">
   <col width="20%">
   <col width="15%">
   <col width="7%">
   <thead>
      <tr>
         <th>ID</th>
         <th>Question</th>
         <th>Correct Answer</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($truesfalses as $truefalse)
      <tr>
         <td>{{ $truefalse->question_id }}</td>
         <td>{{ $truefalse->questions }}</td>
         <td>{{ $truefalse->correct_answer }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editTrueFalse{{$truefalse->question_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteTrueFalse{{$truefalse->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.exam_truefalse_edit')
      @include('exam.modal.exam_truefalse_delete')
      @include('exam.modal.exam_truefalse_add')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

Total True or False Questions: {{count($truesfalses)}}

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>


