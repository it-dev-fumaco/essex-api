@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center" style="padding: 0;">KPI {{ $schedule_details->period }} Schedules</h2>
   <a href="/evaluation/schedules">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -45px; float: left;"></i>
   </a>
</div>
<div class="row">
   <div class="col-md-8">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">KPI List</h2>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>KPI</th>
                        <th>Target</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($kpi_list as $i => $row)
                     <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $row->kpi_description }}</td>
                        <td>{{ $row->target }}</td>
                     </tr>
                     @empty
                     <tr>
                        <td colspan="5">No KPI(s) found.</td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-4">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">KPI Submission Schedule</h2>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Scheduled Date</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($schedules as $i => $row)
                     <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ date('F d, Y', strtotime($row['scheduled_date'])) }}</td>
                     </tr>
                     @empty
                     <tr>
                        <td colspan="5">No Schedule(s) found.</td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div style="font-size: 8pt; float: right;">
      <i>Last modified: <b>{{ $schedule_details->updated_at }} </b> -{{ $schedule_details->last_modified_by }} </i>
   </div>
</div>


<style>
   input[type='text'], input[type='number'], select{
      height: 35px;
      width: 100%;
      padding: 3px;
   }
   textarea{
      width: 100%;
      padding: 3px;
   }
</style>


@endsection

@section('script')

@endsection