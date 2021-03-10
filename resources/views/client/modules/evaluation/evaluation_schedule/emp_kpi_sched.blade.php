{{-- <div class="row" style="padding-top: 0;">
   @forelse($kpi_schedules as $row)
   @if(count($row['kpi_list']) > 0)
   <div class="col-md-12">
      <div class="inner-box featured" style="padding: 2px 10px 2px 10px;">
         <h2 class="title-2" style="font-size: 12pt;">{{ $row['period'] }}</h2>
         <div class="row" style="padding-top: 0; padding-bottom: 0;">
            <div class="col-md-8">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>KPI List</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($row['kpi_list'] as $kpi)
                  <tr>
                     <td>{{ $kpi->kpi_description }}</td>
                  </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
            <div class="col-md-4">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th style="width: 5px;">No.</th>
                        <th>Schedule</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($row['schedules'] as $i => $sched)
                  <tr>
                     <td>{{ $i + 1 }}</td>
                     <td>{{ $sched['sched_date'] }}</td>
                  </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   @endif
   @empty
   <h3 style="text-align: center;">No records found.</h3>
   @endforelse
</div>
 --}}