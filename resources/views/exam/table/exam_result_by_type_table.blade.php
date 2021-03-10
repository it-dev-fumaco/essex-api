<table class="table table-striped">
   <thead>
      <tr>
         <th>Question</th>
         <th>Correct Answer</th>
         <th>Examinee Answer</th>
      </tr>
   </thead>
   <tbody class="table-body">

      @foreach($examans as $ans)
         <tr>
            <td>{{$ans->questions}}</td>
            <td style=@if($ans->correct_answer == $ans->examinee_answer) "color:green" @else "color:red" @endif>{{$ans->correct_answer}}</td>
            <td style=@if($ans->correct_answer == $ans->examinee_answer) "color:green" @else "color:red" @endif>{{$ans->examinee_answer}}</td>
         </tr>
      @endforeach
   </tbody>
</table>


