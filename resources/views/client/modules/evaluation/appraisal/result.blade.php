@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -40px; float: left;"></i>
   </a>
   <h2 class="section-title center" style="padding: 0;">Performance Appraisal Sheet</h2>
   <div class="center">
      <span style="display: block; font-size: 11pt;">Evaluation Period: <b>{{ date('F Y', strtotime($appraisal_details['evaluation_period_from'])) }} - {{ date('F Y', strtotime($appraisal_details['evaluation_period_to'])) }}</b></span>
      <span style="display: block; font-size: 11pt;">Purpose: <b>{{ $appraisal_details['purpose'] }}</b></span>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">Employee Detail(s)</h2>
         <div class="row">
            <div class="col-md-12">
               <table style="width: 100%;">
                  <tr>
                     <td style="width: 10%;">Name:</td>
                     <td style="width: 28%;"><b>{{ $employee_details->employee_name }}</b></td>
                     <td style="width: 15%;">Employment Status:</td>
                     <td style="width: 19%;"><b>{{ $employee_details->employment_status }}</b></td>
                     <td style="width: 10%;">Date Joined:</td>
                     <td style="width: 18%;"><b>{{ $employee_details->date_joined }}</b></td>
                  </tr>
                  <tr>
                     <td>Designation:</td>
                     <td><b>{{ $employee_details->designation }}</b></td>
                     <td>Department:</td>
                     <td><b>{{ $employee_details->department }}</b></td>
                     <td>Shift Group:</td>
                     <td><b>{{ $employee_details->shift_group_name }}</b></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="padding: 6px 35px 6px 15px !important;">
                        Employee Statistics
                     </a>
                  </h4>
               </div>
               <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body" style="background-color: #fff; padding: 10px; margin: 0;">
                     <div class="row" style="padding: 0; margin: 0">
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Lates</span>
                           <span class="span-value">{{ $stats['total_lates'] }} min(s)</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Working Rate</span>
                           <span class="span-value">{{ number_format($stats['working_rate'], 2) }}%</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Absence Rate</span>
                           <span class="span-value">{{ number_format($stats['absence_rate'], 2) }}%</span>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                           <span class="span-title">Unfiled Absence(s)</span>
                           <span class="span-value">{{ $stats['unfiled_absences'] }}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-group" id="accordion">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="padding: 6px 35px 6px 15px !important;">
                        KPI Quantitative Result
                     </a>
                  </h4>
               </div>
               <div id="collapseTwo" class="panel-collapse in">
                  <div class="panel-body" style="background-color: #fff;">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th style="width: 5%;">No.</th>
                                 <th style="width: 80%;">Data Input List</th>
                                 <th style="width: 15%;">Total</th>
                              </tr>
                           </thead>
                           <tbody>
                           @forelse ($kpi_result_summary as $row)
                              <tr>
                                 <td colspan="3" style="background-color: #F7F7F7; font-weight: bold;">{{ $row['kpi_description'] }}</td>
                              </tr>
                              @forelse ($row['metrics_summary'] as $d => $row)
                              <tr>
                                 <td style="text-align: right;"><i class="fa fa-angle-double-right"></i></td>
                                 <td>{{ $row->metric_description }}</td>
                                 <td>{{ $row->total }}</td>
                              </tr>
                              @empty
                              <tr>
                                 <td colspan="3">No Data Input(s) found.</td>
                              </tr>
                              @endforelse
                              @empty
                              <tr>
                                 <td colspan="3">No record(s) found.</td>
                              </tr>
                           @endforelse
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <h3 class="kpi-qual-text">KPI Qualitative</h3>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered" id="appraisal-table">
                  <thead>
                     <tr>
                        <th style="width: 5%; text-align: center;">No.</th>
                        <th style="width: 45%; text-align: center;">Evaluation Criteria/Category/KPI</th>
                        <th style="width: 20%; text-align: center;">Rating</th>
                        <th style="width: 30%; text-align: center;">Comment(s)</th>
                     </tr>
                  </thead>
                  <tbody class="table-body">
                     @foreach($qualitative_kpi_set as $i => $row)
                     <tr>
                        <td class="center">{{ $i + 1 }}</td>
                        <td>{{ $row->kpi_description }}</td>
                        <td class="center">{{ $row->rating }}</td>
                        <td class="center">{{ $row->comment }}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-8">
               <div class="form-group">
                  <label>Strength(s)/Good Point(s)/Accomplishment(s)</label>
                  <p>{{ $appraisal_result->good_points }}</p>
               </div>
               <div class="form-group">
                  <label>Improvement Areas</label>
                  <p>{{ $appraisal_result->improvement_areas }}</p>
               </div>
               <div class="form-group">
                  <label>Trainings Recommended/Other Remarks</label>
                  <p>{{ $appraisal_result->remarks }}</p>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Overall Rating</label>
                  <p>{{ $appraisal_result->overall_ratings }}</p>
               </div>
               <div class="form-group">
                  <table align="center" style="border:1px solid; width: 85%;">
                     <tr>
                        <td colspan="2" style="padding: 10px 0 0 15px;"><label>Rating</label></td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">< 50</td>
                        <td style="padding-left: 30px; width: 60%;">Below Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">50 - 60</td>
                        <td style="padding-left: 30px; width: 60%;">Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; width: 33%;">61 - 69</td>
                        <td style="padding-left: 30px; width: 60%;">Above Average</td>
                     </tr>
                     <tr>
                        <td style="padding-left: 30px; padding-bottom: 10px; width: 33%;">70 - 100</td>
                        <td style="padding-left: 30px; padding-bottom: 10px; width: 60%;">Excellent</td>
                     </tr>
                  </table>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-4" style="text-align: right;"><label>Evaluated by:</label></div>
                     <div class="col-md-8">
                        <span style="display: block; font-weight: bold;">{{ $ratee->employee_name }}</span>
                        <span style="display: block;">{{ $ratee->designation }}</span>
                        <span style="display: block;">{{ $appraisal_result->evaluation_date }}</span>
                     </div>
                  </div>
               </div>
            </div>
            {{-- <div class="col-md-3">
               <div class="form-group">
                  <label>Action/Recommendation</label>
                  <select name="recommendation">
                     <option value="">-- Action --</option>
                     <option value="Best suited to his/her position" {{ $appraisal_result->recommendations == 'Best suited to his/her position' ? 'selected' : '' }}>Best suited to his/her position</option>
                     <option value="Needs further training" {{ $appraisal_result->recommendations == 'Needs further training' ? 'selected' : '' }}>Needs further training</option>
                     <option value="Not suited for the job" {{ $appraisal_result->recommendations == 'Not suited for the job' ? 'selected' : '' }}>Not suited for the job</option>
                     <option value="For Promotion" {{ $appraisal_result->recommendations == 'For Promotion' ? 'selected' : '' }}>For Promotion</option>
                     <option value="For Probationary" {{ $appraisal_result->recommendations == 'For Probationary' ? 'selected' : '' }}>For Probationary</option>
                     <option value="For Regularization" {{ $appraisal_result->recommendations == 'For Regularization' ? 'selected' : '' }}>For Regularization</option>
                  </select>
               </div>
            </div> --}}
       {{--      <div class="col-md-5">
               <div class="form-group">
                  <label>Trainings Recommended/Other Remarks</label>
                  <p>{{ $appraisal_result->remarks }}</p>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>
</form>

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
   .span-title{
      display: block;
      font-size: 13pt;
      text-align: center;
   }
   .span-value{
      display: block;
      font-size: 14pt;
      padding: 4%;
   }
   .rating-list span{
      display: block;
   }
   .rating-rdbtn{
      font-size: 9pt;
   }
   #accordion .panel-title{
      text-transform: uppercase;
      letter-spacing: 1px;
   }
   .kpi-qual-text{
      /*449d44*/
      background-color: #5cb85c;
      padding: 4px 35px 4px 15px;
      font-size: 16px;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      color: #ffffff;
      text-transform: uppercase;
      letter-spacing: 1px;
   }

   #appraisal-table td{
      vertical-align: middle;
   }
   #appraisal-table .fa-trash{
      color: #A93226;
      font-size: 13pt;
   }
</style>

@endsection

@section('script')
<script>
   $(document).ready(function(){
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
   });
</script>
@endsection