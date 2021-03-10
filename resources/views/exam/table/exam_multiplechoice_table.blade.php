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
      @forelse($multiplechoices as $multiplechoice)
      <tr>
         <td>{{ $multiplechoice->question_id }}</td>
         <td>{!! $multiplechoice->questions !!}</td>
         <td>{!! $multiplechoice->option1 !!}</td>
         <td>{!! $multiplechoice->option2 !!}</td>
         <td>{!! $multiplechoice->option3 !!}</td>
         <td>{!! $multiplechoice->option4 !!}</td>
         <td>{!! $multiplechoice->correct_answer !!}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editMultipleChoice{{$multiplechoice->question_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteMultipleChoice{{$multiplechoice->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.exam_multiplechoice_edit')
      @include('exam.modal.exam_multiplechoice_delete')
      @empty
      <tr>
         <td colspan="10">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

Total Multiple Choice Items: {{count($multiplechoices)}}

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>