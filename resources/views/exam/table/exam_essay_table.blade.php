<table class="table">
   <col width="3%">
   <col width="40%">
   <col width="10%">
   <thead>
      <tr>
         <th>ID</th>
         <th>Question</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($essays as $essay)
      <tr>
         <td>{{ $essay->question_id }}</td>
         <td>{{ $essay->questions }}</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editEssay{{$essay->question_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteEssay{{$essay->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.exam_essay_edit')
      @include('exam.modal.exam_essay_delete')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

Total Essay: {{count($essays)}}

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>


@include('exam.modal.exam_essay_add')