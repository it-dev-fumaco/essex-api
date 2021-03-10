<table class="table table-hover" id="eval-table">
   @forelse($result as $i => $kpi)
   <tr style="background-color: #A9DFBF;">
      <td>{{ $i + 1 }}. KPI: <b>{{ $kpi['text'] }}</b></td>
      <td>Target: <b>{{ $kpi['target'] }} %</b></td>
      <td style="width: 12%; text-align: right; font-size: 15pt;">
         <a href="#" data-id="{{ $kpi['id'] }}" data-desc="{{ $kpi['text'] }}" class="hover-icon add-metrics-btn">
            <i class="fa fa-plus" style="color: #2471A3;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['id'] }}" class="hover-icon edit-kpi-btn">
            <i class="fa fa-pencil" style="color: #1E8449;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['id'] }}" class="hover-icon delete-kpi-btn">
            <i class="fa fa-trash" style="color: #A93226;"></i>
         </a>
      </td>
   </tr>
   @if(count($kpi['nodes']) > 0)
         @foreach($kpi['nodes'] as $metric)
         <tr>
            <td style="padding-left: 50px;">
               <i class="fa fa-angle-double-right"></i> Metric: <b>{{ $metric['text'] }}</b>
            </td>
            <td>{{-- Target: <b>{{ $metric['target'] }}</b> --}}</td>
            <td style="width: 12%; text-align: right; font-size: 15pt;">
               <a href="#" data-id="{{ $metric['id'] }}" class="hover-icon edit-metric-btn">
                  <i class="fa fa-pencil" style="color: #1E8449;"></i>
               </a>
               <a href="#" data-id="{{ $metric['id'] }}" class="hover-icon delete-metric-btn">
                  <i class="fa fa-trash" style="color: #A93226;"></i>
               </a>
            </td>
         </tr>
         @endforeach
   @endif
   @empty
   <tr>
      <td style="text-align: center;">No Objective(s) found.</td>
   </tr>
   @endforelse
   <tfoot>
      <tr>
         <td style="text-align: center; font-weight: bold;" colspan="3">-- END --</td>
      </tr>
   </tfoot>
</table>
{{-- 
<table class="table table-hover" id="eval-table">
   @forelse($result as $i => $kpi)
   <tr style="background-color: #A9DFBF;">
      <td>{{ $i + 1 }}. KPI: <b>{{ $kpi['text'] }}</b></td>
      <td>Target: <b>{{ $kpi['target'] }} %</b></td>
      <td style="width: 12%; text-align: right; font-size: 15pt;">
         <a href="#" data-id="{{ $kpi['id'] }}" data-desc="{{ $kpi['text'] }}" class="hover-icon add-metrics-btn">
            <i class="fa fa-plus" style="color: #2471A3;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['id'] }}" class="hover-icon edit-kpi-btn">
            <i class="fa fa-pencil" style="color: #1E8449;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['id'] }}" class="hover-icon delete-kpi-btn">
            <i class="fa fa-trash" style="color: #A93226;"></i>
         </a>
      </td>
   </tr>
   @if(count($kpi['nodes']) > 0)
      @foreach($kpi['nodes'] as $des)
      <tr>
         <td style="padding-left: 30px;" colspan="3">Designation: <b>{{ $des['text'] }}</b></td>
      </tr>
      @if(count($des['nodes']) > 0)
         @foreach($des['nodes'] as $metric)
         <tr>
            <td style="padding-left: 50px;">
               <i class="fa fa-angle-double-right"></i> Metric: <b>{{ $metric['text'] }}</b>
            </td>
            <td>Target: <b>{{ $metric['target'] }}</b></td>
            <td style="width: 12%; text-align: right; font-size: 15pt;">
               <a href="#" data-id="{{ $metric['id'] }}" class="hover-icon edit-metric-btn">
                  <i class="fa fa-pencil" style="color: #1E8449;"></i>
               </a>
               <a href="#" data-id="{{ $metric['id'] }}" class="hover-icon delete-metric-btn">
                  <i class="fa fa-trash" style="color: #A93226;"></i>
               </a>
            </td>
         </tr>
         @endforeach
      @endif
      @endforeach
   @endif
   @empty
   <tr>
      <td style="text-align: center;">No Objective(s) found.</td>
   </tr>
   @endforelse
   <tfoot>
      <tr>
         <td style="text-align: center; font-weight: bold;" colspan="3">-- END --</td>
      </tr>
   </tfoot>
</table> --}}