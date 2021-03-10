@extends('admin.app')
@section('content')
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <div class="col-md-6">
            Examinee: {{$examres->employee_name}}<br>
            Exam: {{$examres->exam_title}}<br>
            Exam Date: {{date('l, F d, Y',strtotime($examres->date_taken))}}
          </div>
          <div class="col-md-6">
            Start Time: {{date('h:i:s A',strtotime($examres->start_time))}}<br>
            End Time: {{date('h:i:s A',strtotime($examres->end_time))}}<br>
            <a href="{{route('admin.examination_report_show',[$examres->examinee_id,$examres->exam_id])}}">Go Back</a>
          </div>
          
          <div id="employee_list">
            <form name="saveUpdatedScore" method="post" action={{route('admin.exam_result_save_updated_score',[$examres->examinee_id,$examres->exam_id])}}>
              @csrf
              @include('exam.table.exam_result_update_score_table')
              <button class="btn btn-primary" type="submit">
                Update Score
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
  <script type="text/javascript">

    $('#saveUpdatedScore input[type=radio]').change(function(){
      alert('sfssfsf')
    })
  </script>
@endsection