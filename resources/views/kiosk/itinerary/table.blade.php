   <table class="table table-sm table-bordered text-center">
      <col style="width: 8%;">
      <col style="width: 20%;">
      <col style="width: 20%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <thead>
         <tr>
            <th scope="col">No.</th>
            <th scope="col">Location</th>
            <th scope="col">Project</th>
            <th scope="col">Itinerary Date</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
         </tr>
      </thead>
   </table>
<div class="table-wrapper-scroll-y my-custom-scrollbar text-center">
   <table class="table table-md table-bordered">
      <col style="width: 8%;">
      <col style="width: 20%;">
      <col style="width: 20%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <col style="width: 12%;">
      <tbody>
         @forelse($itineraries as $row)
         <tr>
            <td>{{ $row->parent }}</td>
            <td>{{ $row->itinerary_location }}</td>
            <td>{{ $row->project }}</td>
            <td>{{ $row->date }}</td>
            <td>{{ $row->time }}</td>
            <td>
               @switch(strtolower($row->workflow_state))
                  @case('approved') 
                  <span class="badge badge-primary">APPROVED</span>
                  @break
                  @case('cancelled') 
                  <span class="badge badge-danger">CANCELLED</span>
                  @break
                  @case('disapproved')
                  <span class="badge badge-danger">DISAPPROVED</span>
                  @break
                  @case('deferred')
                  <span class="badge badge-danger">DISAPPROVED</span>
                  @break
                  @default
                  <span class="badge badge-warning">FOR APPROVAL</span>
               @endswitch
            </td>
            <td>
               <a href="/kiosk/itinerary/view/{{ $row->parent }}" class="btn btn-indigo btn-sm m-0">
                  <i class="fa fa-search" aria-hidden="true"></i>
               </a>
            </td>
         </tr>
         @empty
         <tr>
            <td colspan="6"><h5>No Itineraries Found.</h5></td>
         </tr>
         @endforelse
      </tbody>
   </table>
</div>
<style type="text/css">
.my-custom-scrollbar {
position: relative;
height: 380px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

/* Scrollbar styles */
::-webkit-scrollbar {
width: 0.3%;
height: 0.3%;
background-color: #F5F5F5;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
background-color: #555;
border-radius: 0.1%;
}
</style>