<table class="table table-striped" style="table-layout: fixed">
   <col width="5%">
   <col width="13%">
   <col width="25%">
   <col width="10%">
   <col width="10%">
   <col width="10%">
   <col width="10%">
   <col width="10%">
   <col width="7%">
   
   <thead>
      <tr>
         <th>Question ID</th>
         <th>Exam</th>
         {{--<th>Exam Type</th>--}}
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
         <td style="word-wrap:break-word">{{ $question->question_id }}</td>
         <td style="word-wrap:break-word">{{ $question->exam_title }}</td>
         {{--<td style="word-wrap:break-word">{{ $question->exam_type }}</td>--}}
         <td style="word-wrap:break-word"><span style="color:black">{!! $question->questions !!}</span></td>
         @if(strpos($question->option1,'<svg') !== false && strpos($question->option1,'</svg>') !== false)
            <td style="word-wrap:break-word">{!! $question->option1 !!}</td>
         @else
            <td style="word-wrap:break-word">{{ $question->option1 }}</td>
         @endif


         @if(strpos($question->option2,'<svg') !== false && strpos($question->option2,'</svg>') !== false)
            <td style="word-wrap:break-word">{!! $question->option2 !!}</td>
         @else
            <td style="word-wrap:break-word">{{ $question->option2 }}</td>
         @endif

         @if(strpos($question->option3,'<svg') !== false && strpos($question->option3,'</svg>') !== false)
            <td style="word-wrap:break-word">{!! $question->option3 !!}</td>
         @else
            <td style="word-wrap:break-word">{{ $question->option3 }}</td>
         @endif

         @if(strpos($question->option4,'<svg') !== false && strpos($question->option4,'</svg>') !== false)
            <td style="word-wrap:break-word">{!! $question->option4 !!}</td>
         @else
            <td style="word-wrap:break-word">{{ $question->option4 }}</td>
         @endif

         
         @if(strpos($question->correct_answer,'<svg') !== false && strpos($question->correct_answer,'</svg>') !== false)
            <td style="word-wrap:break-word">{!! $question->correct_answer !!}</td>
         @else
            <td style="word-wrap:break-word">{{ $question->correct_answer }}</td>
         @endif
         {{--
         <td style="word-wrap:break-word">{{ $question->option2 }}</td>
         <td style="word-wrap:break-word">{{ $question->option3 }}</td>
         <td style="word-wrap:break-word">{{ $question->option4 }}</td>
         <td style="word-wrap:break-word">{{ $question->correct_answer }}</td>
         --}}
         <td>
            <a href="#" data-toggle="modal" data-target="#editQuestion{{$question->question_id}}"><i class="fa fa-pencil" aria-hidden="true" title="Edit Question ID {{$question->question_id}}"></i> Edit</a><br>
            <a href="#" data-toggle="modal" data-target="#deleteQuestion{{$question->question_id}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
         </td>
      </tr>
      @include('exam.modal.question_edit')
      @include('exam.modal.question_delete')
      
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

@include('exam.modal.question_add')
<script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('css/css/ckeditor/editors.js') }}"></script>

