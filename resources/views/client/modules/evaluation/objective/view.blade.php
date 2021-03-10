@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/evaluation/objectives">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -21px; float: left;"></i>
   </a>
   <h2 class="section-title center" style="padding: 0;">Overall Quality Objective</h2>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">{{ $tree_data['objective_description'] }}</h2>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered" id="inputs-table">
                  @forelse($tree_data['nodes'] as $i => $dept)
                  <tr>
                     <td colspan="4" style="font-size: 12pt; background-color: #D7DBDD;">
                        <b>{{ $i + 1 }}. {{ $dept['department_name'] }} Department</b>
                     </td>
                  </tr>
                  @foreach($dept['kpi_details'] as $kpi)
                  <tr>
                     <td style="font-size: 12pt; padding-left: 50px;">
                        <i class="fa fa-angle-double-right"></i> KPI: <b>{{ $kpi['kpi_description'] }}</b>
                     </td>
                  </tr>
                  @foreach($kpi['metrics'] as $metric)
                  <tr>
                     <td style="font-size: 12pt; padding-left: 100px;">
                        <i class="fa fa-angle-right"></i> Metric: <b>{{ $metric['metric_description'] }}</b>
                     </td>
                  </tr>
                  @endforeach
                  @endforeach
                  @empty
                  <tr>
                     <td>No Record(s) Found.</td>
                  </tr>
                  @endforelse
               </table>
               <div style="font-size: 8pt;float: right;">
                  <i>Last modified: <b>{{ $tree_data['updated_at'] }} </b> -{{ $tree_data['last_modified_by'] }} </i>
               </div> 
            </div>
         </div>
      </div>
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
   #inputs-table td{
      vertical-align: middle;
   }
   #inputs-table .fa-trash{
      color: #A93226;
      font-size: 13pt;
   }
</style>

@endsection

@section('script')
<script>
   $(document).ready(function(){
      
   });
</script>
@endsection