<table class="table">
   <thead>
      <tr>
         <th>Exam Date</th>
         <th>Exam Group</th>
         <th>Exam Title</th>
         <th>Examinee</th>
         <th>Total Items</th>
         <th>Total Score</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($examresults as $examresult)
      <tr>
         <td>{{ $examresult->date_taken }}</td>
         <td>{{ $examresult->exam_group_description }}</td>
         <td>{{ $examresult->exam_title }}</td>
         <td>{{ $examresult->employee_name }}</td>
         <td>{{ $examresult->exam_items }}</td>
         <td>{{ $examresult->examinee_score }}</td>
         <td>
            <a href="{{route('admin.examination_report_show',[$examresult->examinee_id,$examresult->exam_id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="4">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>


