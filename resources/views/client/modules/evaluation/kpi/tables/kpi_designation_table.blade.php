<table class="table" id="kpi-designation-table">
   <thead>
      <tr>
         <th>No.</th>
         <th>Objective</th>
         <th>KPI</th>
         <th>Target %</th>
         {{-- <th>Actions</th> --}}
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($kpi as $i => $row)
      <tr>
         <td>{{ $row->kpi_id }}</td>
         <td>{{ $row->obj_description }}</td>
         <td>{{ $row->kpi_description }}</td>
         <td>{{ $row->target }} %</td>
         {{-- <td>
            <a href="#" data-id="{{ $row->kpi_id }}" data-dept="{{ $row->department_id }}" class="add-metrics-btn">
               <i class="fa fa-search"></i>
            </a> |
            <a href="#" data-id="{{ $row->kpi_id }}" data-dept="{{ $row->department_id }}" class="edit-kpi-designation-btn">
               <i class="fa fa-pencil"></i>
            </a> |
            <a href="#" data-id="{{ $row->kpi_id }}" class="delete-kpi-designation-btn">
               <i class="fa fa-trash"></i>
            </a>
         </td> --}}
      </tr>
      @empty
      <tr>
         <td colspan="4">No record(s) found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<div id="kpi-designation-pagination">
   <center>{{ $kpi->links() }}</center>
</div>