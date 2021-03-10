@extends('client.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.bootstrap.min.css') }}">
<div class="row" style="margin-top: -5%; padding-bottom: 1px;">
  <div class="col-md-12">
      <h2 class="section-title center">Applicant Profile</h2>
      <a href="/home">
          <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 0; margin-top: -5%; float: left;"></i>
      </a>
  </div>
  <div class="col-md-8" style="padding: 2% 1% 1% 1%;">
    <div style="float: left; padding: 0.5% 0.5% 0.5% 2%;">
      <img src="{{ asset('storage/img/user.png') }}" width="80" height="80">
    </div>
        <div style="float: left; padding: 1.5% 0;">
          <span style="font-size: 18pt; display: block;">{{ $applicant->employee_name }}</span>
          <span style="font-size: 10pt; padding-top: 1%; display: block;">Position Applied for (1st choice) :<b> {{ $applicant->position_applied_for1 }}</b></span>
          <span style="font-size: 10pt; padding-top: 1%; display: block;">Position Applied for (2nd choice) :<b> {{ $applicant->position_applied_for2 }}</b></span>
          <span id="employee-id" hidden></span>
          <span id="user-id" hidden></span>
          <span id="today" hidden>{{ date('Y-m-d') }}</span>
        </div>   
  </div>
  <div class="col-md-4" style="padding: 2% 1% 1% 1%;">
        <div style="float: left; padding: 1.5% 0;">
        
          <span style="display: block;">Applicant ID: <b>{{ $applicant->id }}</b></span>
       </div>   
  </div>
  @if(session("message"))
  <div class="col-md-12">
    <div class='alert alert-success alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <center>{!! session("message") !!}</center>
    </div>
  </div>
  @endif
</div>
<div class="row" style="padding-top: 0">
  <div class="col-md-12">
    <div class="inner-box featured" style="min-height: 250px;">
      <div class="tabs-section">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-employee-attendance" data-toggle="tab"> Profile</a></li>
          <li><a href="#tab-employee-notices" data-toggle="tab">Background Investigation Details</a></li>
          <li><a href="#tab-employee-gatepasses" data-toggle="tab">Exam Result</a></li>
          
        </ul>
        <div class="tab-content">
          <div class="tab-pane in active" id="tab-employee-attendance">
            <div class="row">
              <div class="col-md-12">
                
              </div>
              
              <div class="col-md-12">
                <div style="margin-top: -40px; ">
                  <br>
                     <table style="width: 100%; font-size: 12pt;" border="0">
                       <tr>
                        <td class="line-height" style="padding-left: 50px; width: 30%;">Nickname:</td>
                        <td class="line-height" style="padding: 1px 10px; width: 25%;">{{ $applicant->nick_name}}</td>
                        <td class="line-height" style="padding-left: 30px; width: 30%;">Civil Status</td>
                        <td class="line-height" style="padding: 1px 10px; width: 20%;">{{ $applicant->civil_status }}</td>
                       </tr>
                       <tr>
                         <td class="line-height" style="padding-left: 50px; width: 30%;">Address:</td>
                         <td class="line-height" style="padding: 1px 10px; width: 25%;">{{ $applicant->address}}</td>
                         <td class="line-height" style="padding-left: 30px; width: 30%;">SSS no:</td>
                         <td class="line-height" style="padding: 1px 10px; width: 20%;">{{ $applicant->sss_no }}</td>
                        </tr>
                        <tr>
                         <td class="line-height" style="padding-left: 50px; width: 30%;">Birthday:</td>
                         <td class="line-height" style="padding: 1px 10px; width: 25%;">{{ $applicant->birth_date}}</td>
                         <td class="line-height" style="padding-left: 30px; width: 30%;">TIN no:</td>
                         <td class="line-height" style="padding: 1px 10px; width: 20%;">{{ $applicant->tin_no }}</td>
                        </tr>
                         <tr>
                         <td class="line-height" style="padding-left: 50px; width: 30%;">Contact no:</td>
                         <td class="line-height" style="padding: 1px 10px; width: 25%;">{{ $applicant->contact_no}}</td>
                        </tr>
                        
              
                      </table>
                </div>
              </div>
            </div>  
          </div>
          <div class="tab-pane" id="tab-employee-notices">
            <div class="row">
              <div class="col-sm-12">
                <div style="margin-top: -40px;">
                @if($message=='exists')         
                 <table style="width: 100%;margin-top: 50px;" border="0">
                              @foreach($question_answer as $i => $question)
                              <tr>
                                <td style="width: 3%;padding-left: 50px"> {{ $i + 1 }}.</td>
                                <td style="width: 97%;">{!! $question->question !!}</td>
                                <input type="hidden" name="question_id[]" value="{{$question->question_id}}">
                              </tr>
                              <tr>
                                 <td style="width: 50%;padding-left: 50px;" colspan="2">Answer: {!! $question->answer !!}
                                 </td>
                              </tr>
                              @endforeach
                           </table>       
                @else 
                 <td><br> &nbsp; &nbsp; &nbsp; &nbsp;<b>----No Record Found------</b></td>
                 <div class="pull-left" style="padding: 5px; margin-top: -10px; float: left;">
                   <a href="/backgroundcheck/{{ $applicant->id }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                  </div>    
                @endif
                </div>
              </div>
            </div>                      
          </div>
          <div class="tab-pane" id="tab-employee-gatepasses">
            <div class="row">
              <div class="col-sm-12">
                <div style="margin-top: -40px;">
                  <h1></h1>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-employee-leaves">
            <div class="row">
              <div class="col-sm-12">
                <div style="margin-top: -40px;">
              <h1>you</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-employee-exams">
            <div class="row">
              <div class="col-sm-12">
                <div style="margin-top: -40px;">
              <h1>yy</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-employee-evaluations">
            <div class="row">
              <div class="col-sm-12">
                <div style="margin-top: -40px;">
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
  .line-height{
  line-height:30px;
  font-size: 14px;
}
  .options{list-style-type: none; padding: 0; margin: 0;}
  .option-name{font-size: 10pt;}
  .option-list{border-bottom:1px solid #ddd; padding: 8px;}
</style>

@endsection

@section('script')

<script src="{{ asset('css/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('css/js/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.timepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/jquery.timepicker.css') }}" />


@endsection