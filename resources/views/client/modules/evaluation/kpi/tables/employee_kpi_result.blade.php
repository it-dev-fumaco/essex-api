<table class="table">
   <thead>
      <tr>
         <th>No.</th>
         <th>KPI</th>
         <th>Result</th>
         {{-- <th>Actions</th> --}}
      </tr>
   </thead>
   <tbody>
      @forelse($kpi_result as $i => $row)
      <tr>
         <td>{{ $i + 1 }}</td>
         <td>{{ $row->kpi_description }}</td>
         <td>{{ $row->kpi_answer }}</td>
         {{-- <td>
            <a href="#"><i class="fa fa-search"></i></a>
         </td> --}}
      </tr>
      @empty   
      <tr>
         <td colspan="3" style="text-align: center;">No record(s) found.</td>
      </tr>
      @endforelse
   </tbody>
</table>