
 <table class="table">
  <thead>
    <tr>  
      <th style="text-align: center; width: 4%;">No.</th> 
      <th style="text-align: center; width: 20%;">Question</th>   
      <th style="text-align: center; width: 13%;">Option 1</th>  
      <th style="text-align: center; width: 13%;">Option 2</th>
      <th style="text-align: center; width: 13%;">Option 3</th>  
      <th style="text-align: center; width: 13%;">Option 4</th> 
      <th style="text-align: center; width: 16%;">Correct Answer</th>  
      <th style="text-align: center; width: 8%;">Actions</th>  
    </tr>
  </thead>
  <tbody>
    @forelse($questions as $index => $q)
    <tr>
      <td style="text-align: center;"{{ $index + 1 }}</td>
      <td>{{ $q->questions }}</td>
      <td style="text-align: center;"{{ $q->option1 }}</td>
      <td style="text-align: center;"{{ $q->option2 }}</td>
      <td style="text-align: center;"{{ $q->option3 }}</td>
      <td style="text-align: center;"{{ $q->option4 }}</td>
      <td style="text-align: center;"{{ $q->correct_answer }}</td>
      <td style="text-align: center;">
        <a href="#" class="hover-icon" data-id="{{ $q->question_id }}" data-exam-type="Multiple Choice" id="edit-question-btn"><i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i></a>
        <a href="#" class="hover-icon" data-id="{{ $q->question_id }}" data-exam-type="Multiple Choice" data-question="{{ $q->questions }}" id="delete-question-btn"><i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i></a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="8">No Question(s) Found.</td>
    </tr>
    @endforelse
  </tbody>
</table>
{{-- 
<center>
  <div id="attendance_pagination">
  </div>
</center>

 --}}