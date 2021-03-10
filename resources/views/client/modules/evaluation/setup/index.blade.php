@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Evaluations</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      <li><a href="/evaluation/objectives">Overall Quality Objective(s)</a></li>
      <li class="active"><a href="/evaluation/department">KPI per Department</a></li>
      {{-- <li><a href="/evaluation/employee_inputs">Employee Data Input</a></li> --}}
      <li><a href="/evaluation/kpi">KPI List</a></li>
      <li><a href="/evaluation/appraisal">Performance Appraisal</a></li>
      <li><a href="/evaluation/schedules">Schedule(s)</a></li>
      <li><a href="/evaluation/kpi_result">KPI Result</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
           <div class="col-sm-12 col-md-8 col-md-offset-2">
            <div class="inner-box featured">
               <h2 class="title-2">KPI per Department</h2>
               <div class="row">
                  <div class="col-sm-12">
                     <table class="table" id="designation-kpi-tbl">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Department</th>
                              <th>Status</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                           @forelse($dept_list as $row)
                           <tr>
                              <td>{{ $row['department_id'] }}</td>
                              <td>{{ $row['department'] }}</td>
                              <td>{{ $row['kpi_count'] > 0 ? $row['kpi_count'] . ' KPI(s)' : 'No KPI(s)' }}</td>
                              <td>
                                 <a href="/evaluation/setup/{{ $row['department_id'] }}">
                                    <i class="fa fa-search icon-view"></i>
                                 </a>
                              </td>
                           </tr>
                           @empty
                           <tr>
                              <td colspan="5">No record(s) found.</td>
                           </tr>
                           @endforelse
                        </tbody>
                     </table>

                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
   </div>
</div>
<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>
@endsection

@section('script')
<script>
   $(document).ready(function(){
$('#designation-kpi-tbl').DataTable({
      "bLengthChange": false,
      "ordering": false,
      "dom": '<"top"f>rt<"bottom"ip><"clear">'
   });
      
   });
</script>
@endsection