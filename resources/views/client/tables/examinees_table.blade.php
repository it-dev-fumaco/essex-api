<table class="table">
  <thead>
    <tr>
      <th style="text-align: center; width: 10%;">No.</th>  
      <th style="text-align: center; width: 25%;">Examinee</th>  
      <th style="text-align: center; width: 15%;">Exam Date</th>
      <th style="text-align: center; width: 15%;">Validity Date</th>  
      <th style="text-align: center; width: 10%;">Actions</th>  
    </tr>
  </thead>
  <tbody>
    @forelse($examinees as $index => $examinee)
    <tr>
      <td>{{ $index + 1 }}</td>
      <td>{{ $examinee->employee_name }}</td>
      <td>{{ $examinee->date_of_exam }}</td>
      <td>{{ $examinee->validity_date }}</td>
      <td>
        <a href="#" class="hover-icon"><i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i></a>
        <a href="#" class="hover-icon"><i class="fa fa-trash" style="font-size: 15pt; color: #C0392B;"></i></a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4">No Question(s) Found.</td>
    </tr>
    @endforelse
  </tbody>
</table>
