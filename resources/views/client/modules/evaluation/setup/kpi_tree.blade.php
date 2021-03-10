<table class="table table-hover" id="kpi-tree-table">
   @forelse($tree as $i => $kpi)
   <tr style="background-color: #A9DFBF;">
      <td>{{ $i + 1 }}. KPI: <b>{{ $kpi['kpi_description'] }}</b></td>
      <td>{{-- Target: <b>0 %</b> --}}</td>
      <td style="width: 12%; text-align: right; font-size: 15pt;">
         <a href="#" data-id="{{ $kpi['kpi_id'] }}" data-desc="{{ $kpi['kpi_description'] }}" class="hover-icon add-metrics-btn">
            <i class="fa fa-plus" style="color: #2471A3;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['kpi_id'] }}" class="hover-icon edit-kpi-btn">
            <i class="fa fa-pencil" style="color: #1E8449;"></i>
         </a>
         <a href="#" data-id="{{ $kpi['kpi_id'] }}" data-desc="{{ $kpi['kpi_description'] }}" class="hover-icon delete-kpi-btn">
            <i class="fa fa-trash" style="color: #A93226;"></i>
         </a>
      </td>
   </tr>
   @if(count($kpi['metric_list']) > 0)
   @foreach($kpi['metric_list'] as $metric)
   <tr>
      <td style="padding-left: 50px;">
         <i class="fa fa-angle-double-right"></i> Metric: <b>{{ $metric['metric_description'] }}</b>
      </td>
      <td>{{-- Target: <b>{{ $metric['target'] }}</b> --}}</td>
      <td style="width: 12%; text-align: right; font-size: 15pt;">
         <a href="#" data-id="{{ $metric['metric_id'] }}" data-desc="{{ $metric['metric_description'] }}" class="hover-icon add-data-inputs-btn">
            <i class="fa fa-plus" style="color: #2471A3;"></i>
         </a>
         <a href="#" data-id="{{ $metric['metric_id'] }}" data-desc="{{ $metric['metric_description'] }}" data-name="{{ $metric['metric_name'] }}" class="hover-icon edit-metric-btn">
            <i class="fa fa-pencil" style="color: #1E8449;"></i>
         </a>
         <a href="#" data-id="{{ $metric['metric_id'] }}" data-desc="{{ $metric['metric_description'] }}" class="hover-icon delete-metric-btn">
            <i class="fa fa-trash" style="color: #A93226;"></i>
         </a>
      </td>
   </tr>
   @if(count($metric['input_list']) > 0)
   @foreach($metric['input_list'] as $input)
   <tr>
      <td style="padding-left: 100px;">
         <i class="fa fa-angle-double-right"></i> Data Input: <b>{{ $input['data_input'] }}</b>
      </td>
      <td>{{-- Target: <b>{{ $input['target'] }}</b> --}}</td>
      <td style="width: 12%; text-align: right; font-size: 15pt;">
         <a href="#" data-id="{{ $input['input_id'] }}" data-desc="{{ $input['data_input'] }}" class="hover-icon edit-data-input-btn">
            <i class="fa fa-pencil" style="color: #1E8449;"></i>
         </a>
         <a href="#" data-id="{{ $input['input_id'] }}" data-desc="{{ $input['data_input'] }}" class="hover-icon delete-data-input-btn">
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
      <td style="text-align: center;">No KPI(s) found.</td>
   </tr>
   @endforelse
   <tfoot>
      <tr>
         <td style="text-align: center; font-weight: bold;" colspan="3">-- END --</td>
      </tr>
   </tfoot>
</table>