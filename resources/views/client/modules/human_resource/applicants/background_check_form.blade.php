@extends('client.app')
@section('content')

<div class="col-md-12" style="margin-top: -20px;">
   <h2 class="section-title center">Background Investigation Form</h2>
    <a href="/client/applicant/profile/{{ $applicant->id }}">
          <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 0; margin-top: -5%; float: left;"></i>
    </a>
</div>
   <div class="tab-content">
      <div class="tab-pane in active" id="tab-applicants-list">
         <div class="row">
            <div class="inner-box featured">
               <div class="row">
                  <div class="col-md-12">
                     <table style="width: 100%; font-size: 12pt;" border="0">
                      <tr>
                        <td style="padding-left: 30px; width: 18%;">Name of Applicant:</td>
                        <td style="padding: 1px 10px; width: 44%;">{{ $applicant->employee_name }}</td>
                        <td style="padding-left: 40px; width: 10%;">Date:</td>
                        <td style="padding: 1px 10px; width: 20%;">{{ date('d-F-Y') }}</td>
                      </tr>
                      <tr>
                        <td style="padding-left: 30px; width: 30%;">Possition Applied for (1st choice):</td>
                        <td style="padding: 1px 10px; width: 44%;">{{ $applicant->position_applied_for1 }}</td>
                      </tr>
                      <tr>
                        <td style="padding-left: 30px; width: 30%;">Possition Applied for (2nd choice):</td>
                        <td style="padding: 1px 10px; width: 20%;">{{ $applicant->position_applied_for2 }}</td>
                      </tr>
                      </table>
                      <form method="POST" action="/saveexam" style="margin-top: 50px;">
                         @csrf
                      <table style="width: 100%;margin-top: 50px;" border="0">
                              @foreach($question as $i => $question)
                              <tr>
                                <td style="width: 3%;padding-left: 50px">{{ $i + 1 }}. </td>
                                <td style="width: 97%;">{!! $question->question !!}</td>
                                <input type="hidden" name="question_id[]" value="{{$question->question_id}}">
                              </tr>
                              <tr>
                                 <td style="width: 50%;padding-left: 50px;" colspan="2">
                                  <input class="form-control" type="text" name="answer[]" 
                                   placeholder="Enter your answer here..." style="font-size: 12pt;" required>
                                 </td>
                              </tr>
                              @endforeach
                           </table>
                           <br>
                            <div style="padding-left: 50px;">
                           <label>Remarks:</label><br>
                           <textarea id="remarks" name="remarks" style="font-size: 12pt;padding: 15px; width: 70%;height: 30%;resize: none;"></textarea>
                           </div>
                           <div style="padding-left: 50px;" hidden>
                           <label>Name of person interviewed:</label>
                           <input class="form-control" type="text" name="examinee_name" id="name_interview" value="{{$applicant->employee_name}}" 
                           style="font-size: 12pt;padding: 15px;">
                           </div>
                           <br>
                           <div style="padding-left: 50px;" hidden>
                            <label>Conducted by:</label>
                            <input class="form-control" type="text" name="name_interview" value="{{ Auth::user()->employee_name }}" style="font-size: 12pt;padding: 15px;">
                           </div>
                            <input type="hidden" name="evaluator_id" value="{{ Auth::user()->user_id }}">
                            <input type="hidden" name="conducted_by" value="{{ Auth::user()->employee_name }}">
                            <input type="hidden" name="nperson_interviewd" value="{{ $applicant->employee_name }}">
                            <input type="hidden" name="examinee_id" value="{{ $applicant->id }}">
                            <br>
                            <br>
                              <div class="col-md-12">
                             <center><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button></center>
                              </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection

@section('script')

@endsection



