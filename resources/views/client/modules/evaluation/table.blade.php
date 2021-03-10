<table border="1">
	<tr>
		<th>No.</th>
      	<th>Data Input list</th>
      	<th>Result</th>
   	</tr>
    @foreach ($data_input_result as $kpi => $input)
        <tr>
        	<td colspan="3" style="background-color: #F7F7F7; font-weight: bold;">{{ $kpi }}</td>
        </tr>
        @foreach ($input as $d => $row)
        <tr>
        	<td>{{ $d + 1 }}</td>
        	<td>{{ $row->metric_description }}</td>
        	<td>{{ $row->answer }}</td>
        </tr>
        @endforeach
    @endforeach
</table>