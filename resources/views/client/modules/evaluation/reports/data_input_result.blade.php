@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">KPI Data Input Result</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -65px; float: left;"></i>
   </a>
</div>

<div class="row"{{--  style="width: 1650px; margin-left: -260px;" --}}>
   <div class="col-md-12">
      <div class="inner-box featured">
         {{-- <h2 class="title-2">Department Here</h2> --}}
         <div class="row">
            <div class="col-sm-12">
               <div class="row" id="filters" style="margin-top: -30px;">
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                     <label>Department:</label>
                     <select class="department filter">
                        <option value="0">-- Select Department --</option>
                        @foreach($department_list as $row)
                        <option value="{{ $row->department_id }}">{{ $row->department }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-2">
                     <label>Evaluation Period:</label>
                     <select class="evaluation-period filter">
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-Annual">Semi-Annual</option>
                        <option value="Annual">Annual</option>
                     </select>
                  </div>
                  <div class="col-md-2">
                     <label>Month:</label>
                     <select class="month filter">
                        <option value="01" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
                        <option value="02" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
                        <option value="03" {{ date('m') == 3 ? 'selected' : '' }}>March</option>
                        <option value="04" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
                        <option value="05" {{ date('m') == 5 ? 'selected' : '' }}>May</option>
                        <option value="06" {{ date('m') == 6 ? 'selected' : '' }}>June</option>
                        <option value="07" {{ date('m') == 7 ? 'selected' : '' }}>July</option>
                        <option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                        <option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                        <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                        <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                        <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
                     </select>
                  </div>
                  <div class="col-md-2">
                     <label>Year:</label>
                     <select class="year filter">
                        @foreach($year_list as $row)
                        <option value="{{ $row->year }}" {{ date('Y') == $row->year ? 'selected' : '' }}>{{ $row->year }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div id="data-input-result-table"></div>
               </div>
               
               {{-- @foreach($kpi_result as $kpi)
               <h2 class="title-2" style="border: none;">KPI: {{ $kpi['kpi_description'] }}</h2>
               <table class="table table-bordered result-table">
                  <tr> 
                     <td rowspan="2" style="width: 200px; vertical-align: middle;"><b>Employee Name</b></td>
                     @foreach($kpi['kpi_metrics'] as $metric)
                     <td colspan="{{ count($metric['data_inputs']) }}" style="vertical-align: middle;">
                        <b>{{ $metric['metric_description'] }}</b>
                     </td>
                     @endforeach
                  </tr>
                  <tr>
                  @foreach($kpi['kpi_metrics'] as $metric)
                     @foreach($metric['data_inputs'] as $input)
                     <td style="font-size: 10pt;vertical-align: middle;">{{ $input }}</td>
                     @endforeach
                     @endforeach
                  </tr>
                  @foreach($kpi['employee_result'] as $emp)
                  <tr>
                     <td>{{ $emp['employee_name'] }}</td>
                     @foreach($emp['metric_result'] as $emp_metric)
                     @forelse($emp_metric['data_input_result'] as $result)
                     <td>{{ $result['total'] }}</td>
                     @empty
                     <td>0</td>
                     @endforelse
                     @endforeach
                  </tr>
                  @endforeach
               </table>
               @endforeach --}}
            </div>
         </div>
      </div>
   </div>
</div>

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
}
.result-table{
   /*white-space: nowrap;*/
}
table td{
   vertical-align: middle !important;
   text-align: center;
}

select{
   width: 100%;
}
</style>
@endsection

@section('script')

<script>
   $(document).ready(function(){


      loadKpiResultPerDept();
      $('#filters .filter').on('change', function(){
         loadKpiResultPerDept();
         
      });

      function loadKpiResultPerDept(){
         var department = $('#filters .department').val();
         var month = $('#filters .month').val();
         var year = $('#filters .year').val();
         var period = $('#filters .evaluation-period').val();

         var data = {
            month: month,
            year: year,
            period: period,
         }

         $.ajax({
            url: "/departmentKpiResult/"+department,
            data: data,
            success: function(data){
               $('#data-input-result-table').html(data);
            }
         });
      }
});
</script>

@endsection