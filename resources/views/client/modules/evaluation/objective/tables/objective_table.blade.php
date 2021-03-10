<table class="table" id="objective-table">
   <thead>
      <tr>
         <th>ID</th>
         <th>Objective</th>
         <th>Target %</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody class="table-body">
      @forelse($objectives as $row)
      <tr>
         <td>{{ $row->obj_id }}</td>
         <td>{{ $row->obj_description }}</td>
         <td>{{ $row->target }} %</td>
         <td>
            <a href="/evaluation/objective/view/{{ $row->obj_id }}">
               <i class="fa fa-search icon-view"></i>
            </a>
            <a href="#" data-id="{{ $row->obj_id }}" class="edit-objective-btn">
               <i class="fa fa-pencil icon-edit"></i>
            </a>
            <a href="#" data-id="{{ $row->obj_id }}" class="delete-objective-btn">
               <i class="fa fa-trash icon-delete"></i>
            </a>
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="5">No record(s) found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<div id="objective-pagination">
   <center>{{ $objectives->links() }}</center>
</div>