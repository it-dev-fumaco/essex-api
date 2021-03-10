<table class="table">
  <thead>
    <tr>  
      <th style="text-align: center; width: 10%;">No.</th>   
      <th style="text-align: center; width: 45%;">Question</th>   
      <th style="text-align: center; width: 35%;">Correct Answer</th>  
      <th style="text-align: center; width: 10%;">Actions</th>  
    </tr>
  </thead>
  <tbody>
     @forelse($questions as $index => $q)
    <tr>
      <td style="text-align: center; width: 10%;">{{ $index + 1 }}</td>
      <td style="text-align: center; width: 45%;">{{ $q->questions }}</td>
      <td style="text-align: center; width: 35%;">{{ $q->correct_answer }}</td>
      <td style="text-align: center; width: 10%;">
        <a href="#" class="hover-icon" data-id="{{ $q->question_id }}" data-exam-type="True or False" id="edit-question-btn"><i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i></a>
        <a href="#" class="hover-icon" data-id="{{ $q->question_id }}" data-exam-type="True or False" data-question="{{ $q->questions }}" id="delete-question-btn"><i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i></a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4">No Question(s) Found.</td>
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