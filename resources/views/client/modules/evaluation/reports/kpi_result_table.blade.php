<table class="table table-hover" id="report-tbl">
   <col style="width: 2%;">
   <col style="width: 3%;">
   <col style="width: 70%;">
   <col style="width: 20%;">
   <col style="width: 5%;">
   <tbody class="table-body">
      @foreach($result as $a => $lvl0)
      <tr class="kpi-name">
         <td colspan="5">{{ $a + 1}}. {{ $lvl0['kpi_description'] }}</td>
      </tr>
      @foreach($lvl0['metrics'] as $lvl2)
      <tr>
         <td></td>
         <td colspan="2"><i class="fa fa-angle-double-right"></i> {{ $lvl2['metric_description'] }}</td>
         <td style="text-align: center;">Total: <b>{{ $lvl2['metric_result'] }}</b></td>
         <td></td>
      </tr>
      @foreach($lvl2['data_input_list'] as $lvl3)
      <tr>
         <td></td>
         <td></td>
         <td><i class="fa fa-angle-right"></i> {{ $lvl3['data_input'] }}</td>
         <td style="text-align: center;"> {{ $lvl3['result'] }}</td>
         <td style="text-align: center;">
            @if($lvl3['input_result_id'])
            <a href="#" data-id="{{ $lvl3['input_result_id'] }}" data-input="{{ $lvl3['data_input'] }}" data-result="{{ $lvl3['result'] }}" class="hover-icon edit-result">
               <i class="fa fa-pencil" style="color: #1E8449;"></i>
            </a>
            @endif
         </td>
      </tr>
      @endforeach
      @endforeach
      @endforeach
   </tbody>
   <tfoot>
      <tr>
         <td colspan="5" style="text-align: center;"><b>-- END --</b></td>
      </tr>
   </tfoot>
</table>