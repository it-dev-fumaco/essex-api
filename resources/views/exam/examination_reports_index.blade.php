@extends('admin.app')
@section('content')
    <div class="row">
      <div class="col-md-12 col-sm-12" style="height: 28em">
        <div class="inner-box featured">
          <h2 class="title-2">Examination Report</h2>
          
          <div id="employee_list">
            @include('exam.table.examination_report_table')
          </div>
        </div>
      </div>
    </div>

@endsection