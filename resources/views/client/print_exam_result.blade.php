<style type="text/css">
   table{
      border-collapse: collapse;
      width: 800px;
   }

   *{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }
</style>
<h2 style="text-align: center;">Exam Result Summary</h2>
<table border="0" align="center">
   <tr>
      <td style="width: 15%; padding: 5px 0;">Examinee:</td>
      <td style="width: 35%;"><b>{{ $examres->employee_name }}</b></td>
      <td style="width: 15%;">Date Taken:</td>
      <td style="width: 35%;"><b>{{ date('l, F d, Y',strtotime($examres->date_taken)) }}</b></td>
   </tr>
   <tr>
      <td style="width: 15%; padding: 5px 0;">Exam Title:</td>
      <td style="width: 35%;"><b>{{ $examres->exam_title }}</b></td>
      <td style="width: 15%;">Start Time:</td>
      <td style="width: 35%;"><b>{{ date('h:i:s A',strtotime($examres->start_time)) }}</b></td>
   </tr>
   <tr>
      <td style="width: 15%; padding: 5px 0;">Duration:</td>
      <td style="width: 35%;"><b>{{ $examres->duration_in_minutes }} minute(s)</b></td>
      <td style="width: 15%;">End Time:</td>
      <td style="width: 35%;"><b>{{ date('h:i:s A',strtotime($examres->end_time)) }}</b></td>
   </tr>
</table>

         
<br>
<table border="0" align="center">
   <thead>
      <tr style="border-top: 1px solid; border-bottom: 1px solid;">
         <th style="width: 40%; padding: 5px 0;">Exam Type</th>
         <th style="text-align: center; width: 20%;">Total no. of items</th>
         <th style="text-align: center; width: 20%;">Total Score</th>
         <th style="text-align: center; width: 20%;">Average Score</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @if($items_multiple_choice > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Multiple Choice</td>
         <td style="text-align: center;">{{ $items_multiple_choice }}</td>
         <td style="text-align: center;">{{ $count_multiple_choice }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_multiple_choice / $items_multiple_choice), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_true_or_false > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">True or False</td>
         <td style="text-align: center;">{{ $items_true_or_false }}</td>
         <td style="text-align: center;">{{ $count_true_or_false }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_true_or_false / $items_true_or_false), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_essay > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Essay</td>
         <td style="text-align: center;">{{ $items_essay }}</td>
         <td style="text-align: center;">{{ $count_essay }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_essay / $items_essay), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_numerical_exam > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Numerical Exam</td>
         <td style="text-align: center;">{{ $items_numerical_exam }}</td>
         <td style="text-align: center;">{{ $count_numerical_exam }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_numerical_exam / $items_numerical_exam), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_identification > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Identification</td>
         <td style="text-align: center;">{{ $items_identification }}</td>
         <td style="text-align: center;">{{ $count_identification }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_identification / $items_identification), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_abstract > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Abstract Reasoning</td>
         <td style="text-align: center;">{{ $items_abstract }}</td>
         <td style="text-align: center;">{{ $count_abstract }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_abstract / $items_abstract), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_dexterity1 > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Dexterity and Accuracy Measures 1</td>
         <td style="text-align: center;">{{ $items_dexterity1 }}</td>
         <td style="text-align: center;">{{ $count_dexterity1 }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_dexterity1 / $items_dexterity1), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_dexterity2 > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Dexterity and Accuracy Measures 2</td>
         <td style="text-align: center;">{{ $items_dexterity2 }}</td>
         <td style="text-align: center;">{{ $count_dexterity2 }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_dexterity2 / $items_dexterity2), 2) }} %
         </td>
      </tr>
      @endif
      @if($items_dexterity3 > 0)
      <tr>
         <td style="width: 40%; padding: 5px 0;">Dexterity and Accuracy Measures 3</td>
         <td style="text-align: center;">{{ $items_dexterity3 }}</td>
         <td style="text-align: center;">{{ $count_dexterity3 }}</td>
         <td style="text-align: center;">
            {{ number_format(100*($count_dexterity3 / $items_dexterity3), 2) }} %
         </td>
      </tr>
      @endif
      <tr style="border-top: 1px solid; border-bottom: 1px solid;">
         <td style="text-align: right; padding: 5px 0;"><b>TOTALS</b></td>
         <td style="text-align: center;"><b>{{ $totalItems }}</b></td>
         <td style="text-align: center;"><b>{{ $totalScore }}</b></td>
         <td>&nbsp;</td>
      </tr>
   </tbody>
</table>

<table border="0" align="center">
   <tr>
      <td style="padding: 5px 0 5px 130px; width: 50%;">Passing Mark = <b>{{ $examres->passing_mark }}</b></td>
      <td style="padding-left: 130px; width: 50%;">Average Score = <b>{{ $average }} %</b></td>
      
   </tr>
   <tr>
      <td style="padding: 5px 0;">&nbsp;</td>
      <td style="padding-left: 130px;">
         Remarks = <b>{!! $average >= $examres->passing_mark ? 'Pass' : 'Failed' !!}</b></td>
   </tr>
</table>

<script type="text/javascript">
   window.print();
   window.close();
</script>