<table class="table">
   <thead>
      <tr>  
         <th style="text-align: center;">No.</th>  
         <th style="text-align: center;">Title</th>    
         <th style="text-align: center;">Description</th>  
         <th style="text-align: center;">Training Date</th>   
         <th style="text-align: center;">Department</th>  
         <th style="text-align: center;">Status</th>  
      </tr>
   </thead>
   <tbody>
      @forelse($training as $row)
      <tr>
         <td style="text-align: center;">{{ $row->training_id }}</td>
         <td style="text-align: center;">{{ $row->training_title }}</td>
         <td style="text-align: center;">{{ $row->training_desc }}</td>

         <td style="text-align: center;">{{ $row->training_date }}</td>
         <td style="text-align: center;">{{ $row->department_name }}</td>
         <td style="text-align: center;">{{ $row->status }}</td>

      </tr>
      @empty
      <tr>
         <td colspan="8">No Records Found.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<style type="text/css">
.colorbackground{
  background-color: #ec7063;
}
</style>
