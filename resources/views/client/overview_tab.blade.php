<div class="col-sm-7">
   <h3 class="title-2">My Leave Balances</h3>
   @forelse($leave_types as $leave_type)
   <div class="col-md-4">
      <div class="progress1">
         <div class="barOverflow1">
            <div class="bar1"></div>
         </div>
         @php
         $bar_val = ($leave_type->remaining > 0) ? 100*($leave_type->remaining / $leave_type->total) : 0;
         @endphp
         <span class="percentage" hidden>{{$bar_val}}</span>
         <span style="font-size: 18pt;">{{ $leave_type->remaining }}</span>
         <span style="display: block; font-size: 8pt; color: #999999;">remaining</span>
         <span><b>{{ $leave_type->leave_type }}</b></span>
      </div>
   </div>
   @empty
   <div class="col-md-4">
      No records found.
   </div>
   @endforelse
</div>

<div class="col-sm-5">
   <h3 class="title-2">Leaves</h3>
   <br>
   <div class="col-md-4 text-center">
      <a href="#" id="onLeaveToday">
         <span class="text-center" style="font-size: 33pt; display: block; padding: 10px;">{{ $on_leave_today }}</span>
         <span class="text-center" style="font-size: 9pt; display: block;">On leave today</span>
      </a>
   </div>
   <div class="col-md-4">
      <a href="/forApproval">
         <span class="text-center" style="font-size: 33pt; display: block; padding: 10px;">{{ $awaiting_approval }}</span>
         <span class="text-center" style="font-size: 9pt; display: block;">Awaiting for approval</span>
      </a>
   </div>
   <div class="col-md-4">
      <a href="#" id="pendingRequests">
         <span class="text-center" style="font-size: 33pt; display: block; padding: 10px;">{{ $pending_requests }}</span>
         <span class="text-center" style="font-size: 9pt; display: block;">Pending Requests</span>
      </a>
      <br><br>
   </div>
</div>

<div class="col-sm-7">
   <table class="table">
      <thead>
         <tr>
            <th>Out of the office today</th>
            <th></th>
         </tr>
      </thead>
      <tbody class="table-body">
         @forelse($out_of_office_today as $out_of_office)
         <tr>
            <td style="width: 60%;">
               <img src="{{ asset('storage/img/user.png') }}" width="55" height="45" style="float: left; padding-right: 10px;">
               <span class="approver-name">{{ $out_of_office->employee_name }}</span><br>
               <cite>{{ $out_of_office->designation }}</cite>
            </td>
            <td style="width: 40%;">
               <i class="icon-clock"></i> {{ $out_of_office->time_from }} - {{ $out_of_office->time_to }}
            </td>
         </tr>
         @empty
         <tr>
            <td colspan="2">No records found.</td>
         </tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="col-sm-5">
   <table class="table">
      <thead>
         <tr>
            <th>My Leave Approver(s)</th>
         </tr>
      </thead>
      <tbody class="table-body">
         @forelse($approvers as $approver)
         <tr>
            @if($approver->employee_id != Auth::user()->user_id)
            <td>
               <img src="{{ asset('storage/img/user.png') }}" width="55" height="45" style="float: left; padding-right: 10px;">
               <span class="approver-name">{{ $approver->employee_name }}</span><br>
               <cite>{{ $approver->designation }}</cite>
            </td>
            @endif
         </tr>
         @empty
         <tr>
            <td>No records found.</td>
         </tr>
         @endforelse
      </tbody>
   </table>
</div>