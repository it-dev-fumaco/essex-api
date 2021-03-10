<table class="table">
   <col style="width:10%">
   <col style="width:15%">
   <col style="width:50%">
   <col style="width:10%">
   <thead>
      <tr>
         <th>Exam Type ID</th>
         <th>Exam Type</th>
         <th>Instruction</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($examtypes as $examtype)
      <tr>
         <td>{{ $examtype->exam_type_id }}</td>
         <td>{{ $examtype->exam_type }}</td>
         <td>@php echo $examtype->instruction; @endphp</td>
         <td>
            <a href="#" data-toggle="modal" data-target="#editExamType{{$examtype->exam_type_id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> |
            <a href="#" data-toggle="modal" data-target="#deleteExamType{{$examtype->exam_type_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.examtype_edit')
      @include('exam.modal.examtype_delete')
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

@include('exam.modal.examtype_add')

<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>