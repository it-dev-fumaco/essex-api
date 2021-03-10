
<table class="table">
   <thead>
      <tr>  
         <th>Access ID</th>   
         <th>Name</th>    
         <th>Designation</th>
         <th>Department</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      @forelse($employee_profiles as $profile)
      <tr>
         <td>{{$profile->user_id}}</td>
         <td>{{$profile->employee_name}}</td>
         <td>{{$profile->designation}}</td>
         <td>{{$profile->department}}</td>
         <td>
            <a href="{{route('client.view_employee_profile',$profile->user_id)}}" title="View Employee {{$profile->employee_name}}'s Profile"><i class="fa fa-search" style="font-size: 18pt; color: #27AE60;"></i></a>
         </td>
      </tr>
      @empty
      <tr>
        <td colspan="5">No records founds.</td>
      </tr>
      @endforelse
   </tbody>
</table>

<center>
  <div id="profile_pagination">
    {!! $employee_profiles->links() !!}
  </div>
</center>
