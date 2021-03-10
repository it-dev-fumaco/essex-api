
<table class="table table-striped">
   <thead>
      <tr>
         <th>Question</th>
         <th>Correct Answer</th>
         <th>Examinee Answer</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody class="table-body">

      @foreach($examans as $ans)
         <tr>
            <td>{!!$ans->questions!!}</td>
            <td style=@if($ans->correct_answer == $ans->examinee_answer) {{"color:green"}} @else {{"color:red"}} @endif>{!!$ans->correct_answer!!}</td>
            <td style=@if($ans->correct_answer == $ans->examinee_answer) {{"color:green"}} @else {{"color:red"}} @endif>{!!$ans->examinee_answer!!}</td>
            <td>
               <div class="form-group col-md-8 mc">
                   <label class="calbl">Correct Answer</label>
                   <select class="form-control" name="{{$ans->question_id}}" id="correct_answer" placeholder="Correct Answer (required)">
                     <option value="True" @if($ans->isCorrect == "True"){{ "selected" }}@endif>Correct</option>
                     <option value="False" @if($ans->isCorrect == "False"){{ "selected" }}@endif>Wrong</option>
                     <option value="Pending" @if($ans->isCorrect == "Pending"){{ "selected" }}@endif>Pending</option>
                   </select>
                </div>
            </td>
         </tr>
      @endforeach
   </tbody>
</table>


