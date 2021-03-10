<table class="table table-striped">
   <thead>
      <tr>
         <th>Exam Type</th>
         <th>Item</th>
         <th>Score</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">

      @if($items_mc > 0)
      <tr>
         <td>Multiple Choice</td>
         <td>{{$items_mc}}</td>
         <td>{{$count_mc}}</td>
         <td>
            <a href="{{route('admin.exam_result_by_type_view',[$examres->examinee_id,$examres->exam_id,4])}}">View Answers</a>
         </td>
      </tr>
      @endif
      @if($items_es > 0)
      <tr>
         <td>Essay</td>
         <td>{{$items_es}}</td>
         <td>{{$count_es}}</td>
         <td>
            <a href="{{route('admin.exam_result_score_update',[$examres->examinee_id,$examres->exam_id,5])}}">Update Score</a>
         </td>
      </tr>
      @endif
      @if($items_ne > 0)
      <tr>
         <td>Numerical Exam</td>
         <td>{{$items_ne}}</td>
         <td>{{$count_ne}}</td>
         <td>
            <a href="{{route('admin.exam_result_by_type_view',[$examres->examinee_id,$examres->exam_id,6])}}">View Answers</a>
         </td>
      </tr>
      @endif
      @if($items_tf > 0)
      <tr>
         <td>True or False</td>
         <td>{{$items_tf}}</td>
         <td>{{$count_tf}}</td>
         <td>
            <a href="{{route('admin.exam_result_by_type_view',[$examres->examinee_id,$examres->exam_id,7])}}">View Answers</a>
         </td>
      </tr>
      @endif
      @if($items_dex > 0)
      <tr>
         <td>Dexterity and Accuracy Measures</td>
         <td>{{$items_dex}}</td>
         <td>{{$count_dex}}</td>
         <td>
            <a href="#">View Answers</a>
         </td>
      </tr>
      @endif
      @if($items_abs > 0)
      <tr>
         <td>Abstract</td>
         <td>{{$items_abs}}</td>
         <td>{{$count_abs}}</td>
         <td>
            <a href="#">View Answers</a>
         </td>
      </tr>
      @endif
      @if($items_id > 0)
      <tr>
         <td>Identification</td>
         <td>{{$items_id}}</td>
         <td>{{$count_id}}</td>
         <td>
            <a href="#">View Answers</a>
         </td>
      </tr>
      @endif
   </tbody>
</table>


