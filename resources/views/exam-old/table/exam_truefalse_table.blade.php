<table class="table">
   <thead>
      <tr>
         <th>Question ID</th>
         <th>Exam</th>
         <th>Exam Type</th>
         <th>Question</th>
         <th>Correct Answer</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($truesfalses as $truefalse)
      <tr>
         <td>{{ $truefalse->question_id }}</td>
         <td>{{ $truefalse->exam_title }}</td>
         <td>{{ $truefalse->exam_type }}</td>
         <td>{{ $truefalse->questions }}</td>
         <td>{{ $truefalse->correct_answer }}</td>
         <td><!-- 
            <a href="#" data-toggle="modal" data-target="#editTrueFalse{{$truefalse->question_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteTrueFalse{{$truefalse->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> -->
         </td>
      </tr>
      @include('exam.modal.exam_truefalse_add')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

Total Items: {{count($truesfalses)}}

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>