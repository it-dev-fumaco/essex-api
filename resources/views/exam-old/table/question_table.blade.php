<table class="table table-striped">
   <thead>
      <tr>
         <th>Question ID</th>
         <th>Exam</th>
         <th>Exam Type</th>
         <th>Question</th>
         <th>Option 1</th>
         <th>Option 2</th>
         <th>Option 3</th>
         <th>Option 4</th>
         <th>Correct Answer</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($questions as $question)
      <tr>
         <td>{{ $question->question_id }}</td>
         <td>{{ $question->exam_title }}</td>
         <td>{{ $question->exam_type }}</td>
         <td>@php echo $question->questions; @endphp</td>
         <td>{{ $question->option1 }}</td>
         <td>{{ $question->option2 }}</td>
         <td>{{ $question->option3 }}</td>
         <td>{{ $question->option4 }}</td>
         <td>{{ $question->correct_answer }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editQuestion{{$question->question_id}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit Question ID {{$question->question_id}}"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteQuestion{{$question->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.question_add')
      @include('exam.modal.question_edit')
      @include('exam.modal.question_delete')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>