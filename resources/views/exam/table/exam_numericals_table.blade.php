<table class="table table-striped">
   <col width="3%">
   <col width="15%">
   <col width="5%">
   <col width="5%">
   <col width="5%">
   <col width="5%">
   <col width="5%">
   <col width="7%">
   <thead>
      <tr>
         <th>ID</th>
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
      @forelse($numericals as $numerical)
      <tr>
         <td>{{ $numerical->question_id }}</td>
         <td>{{ $numerical->questions }}</td>
         <td>{{ $numerical->option1 }}</td>
         <td>{{ $numerical->option2 }}</td>
         <td>{{ $numerical->option3 }}</td>
         <td>{{ $numerical->option4 }}</td>
         <td>{{ $numerical->correct_answer }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editNumerical{{$numerical->question_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteNumerical{{$numerical->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.exam_numerical_edit')
      @include('exam.modal.exam_numerical_delete')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

Total Numerical Exam Items: {{count($numericals)}}

{{--@include('exam.modal.exam_multiplechoice_add')--}}
<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>