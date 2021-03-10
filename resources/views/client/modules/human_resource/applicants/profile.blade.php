@extends('client.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.bootstrap.min.css') }}">
<div class="row" style="margin-top: -5%; padding-bottom: 1px;">
  <div class="col-md-12">
    <h2 class="section-title center">Applicant Profile</h2>
    <a href="/module/hr/applicants">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 0; margin-top: -5%; float: left;"></i>
    </a>
  </div>
  <div class="col-md-8" style="padding: 2% 1% 1% 1%;">
    <div style="float: left; padding: 0.5% 0.5% 0.5% 3%;">
      <img src="{{ asset('storage/img/user.png') }}" width="80" height="80">
    </div>
    <div style="float: left; padding: 1% 0;">
      <span style="font-size: 18pt; display: block;">{{ $applicant->employee_name }}</span>
      <span style="font-size: 10pt; padding-top: 1%; display: block;">Applicant ID: <b>{{ $applicant->id }}</b></span>
      <span style="font-size: 10pt; padding-top: 1%; display: block;">
        Status: <b>{{ $applicant->applicant_status }}</b> <a href="#" data-toggle="modal" data-target="#change-status-modal"><i class="fa fa-gear"></i></a>
      </span>
      
      <span id="employee-id" hidden></span>
      <span id="user-id" hidden></span>
      <span id="today" hidden>{{ date('Y-m-d') }}</span>
    </div>
  </div>
  <div class="col-md-4" style="padding: 2% 1% 1% 1%;">
    <div style="float: left; padding: 1% 0; font-size: 10pt;">
      <span style="padding: 3% 0 0 0; display: block;">
        Position Applied for (1st choice): <b>{{ $applicant->pos1 }}</b>
      </span>
      <span style="display: block;">
        Position Applied for (2nd choice): <b>{{ $applicant->pos2 }}</b>
      </span>
      <div style="font-size: 13pt; padding-top: 5px;">
      <span><a href="#" data-toggle="modal" data-target="#add-employee-modal"><i class="fa fa-thumbs-up"></i> Hired</a></span> |
      <span style="display: inline-block;">
        <form action="/updateApplicantStatus/{{ $applicant->id }}" method="POST">
        @csrf
        <input type="hidden" name="applicant_status" value="Not Qualified">
        <a href="#"><button type="submit"><i class="fa fa-user-times"></i> Not Qualified</button></a>
        </form>
      </span> |
      <span style="display: inline-block;">
        <form action="/updateApplicantStatus/{{ $applicant->id }}" method="POST">
        @csrf
        <input type="hidden" name="applicant_status" value="Declined">
        <a href="#"><button type="submit"><i class="fa fa-ban"></i> Declined</button></a>
        </form>
      </span>
      </div>
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
          <li class="active"><a href="#tab-personal-details" data-toggle="tab">Personal Details</a></li>
          <li><a href="#tab-backgroundinv" data-toggle="tab">Background Investigation Details</a></li>
          <li><a href="#tab-exam-details" data-toggle="tab">Exam Details</a></li>
        </ul>
        <div class="tab-content">

          <div class="tab-pane in active" id="tab-personal-details">
            <div class="row">
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
                    <tr>
                      <td class="line-height" style="padding-left: 50px; width: 30%;">Gender:</td>
                      <td class="line-height" style="padding: 1px 10px; width: 25%;">{{ $applicant->gender}}</td>
                      
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-backgroundinv">
            <div class="row">
              <div class="col-md-12" style="overflow-x:auto;">
                <table style="font-size: 12pt;">
                  @if($message=='exists')
                  @foreach($question_answer as $i => $question)
                    <tr>
                      <td style="width: 3%;padding-left: 50px;"><div> {{ $i + 1 }}.</div></td>
                      <td style="width: 97%;padding: 2px 0 5px 0;">{!! $question->question !!}</td>
                    </tr>
                    <tr>
                      <td style="padding-left: 10%;" colspan="2">Answer: <b>{{ $question->answer }}</b>
                      </td>
                    </tr>
                    @endforeach
                    <tr>
                    <td style="padding-left: 5%;"><label>REMARKS:</label></td>
                    
                        <td style="padding-left: 8%;"><textarea style="border: 1px solid #d7dbdd; width: 650px;height: 150px;margin-top: 50px;resize: none;" readonly>{{ $remarks->remarks }}</textarea></td>
                     
                    </tr>
                  @else 
                  <tr>
                    <td style="text-align: center;">--- NO RECORDS FOUND --- <br><a href="/client/applicant/backgound_check/{{ $applicant->id }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a></td>
                  </tr>
                  @endif
                  </table>

              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-exam-details">
            <div class="row">
              <div class="col-sm-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Exam Title</th>
                        <th style="text-align: center;">Exam Code</th>
                        <th style="text-align: center;">Date of Exam</th>
                        <th style="text-align: center;">Start - End</th>
                        <th style="text-align: center;">Time Spent</th>
                        <th style="text-align: center;">Valid Until</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($exams as $row)
                      <tr>
                        <span hidden>{{ $from = \Carbon\Carbon::createFromFormat('H:i', date('h:i',strtotime($row->start_time))) }}</span>
                        <span hidden>{{ $to = \Carbon\Carbon::createFromFormat('H:i', date('h:i',strtotime($row->end_time))) }}</span>
                        <td style="text-align: center;">{{ $row->exam_id }}</td>
                        <td>{{ $row->exam_title }}</td>
                        <td style="text-align: center;">{{ $row->exam_code }}</td>
                        <td style="text-align: center;">{{ $row->date_of_exam }}</td>
                        <td style="text-align: center;">{{ date('h:i A',strtotime($row->start_time)) }} - {{ date('h:i A',strtotime($row->end_time)) }}</td>
                        <td style="text-align: center;">{{ $row->start_time ? $diff_in_hours = $to->diffInMinutes($from) . ' min(s)' : '–' }}</td>
                        <td style="text-align: center;">{{ date('m-d-Y') <= date('m-d-Y',strtotime($row->validity_date)) ? $row->validity_date : $row->start_time ? $row->validity_date : 'Validity Expired' }}</td>
                        <td style="text-align: center;">
                          <a href="/printExamResult/{{ $row->examinee_id}}/{{ $row->exam_id}}" target="_blank">
                            <i class="fa fa-print" style="font-size: 30px;"></i>
                          </a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="7">No records found.</td>
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

<!-- The Modal -->
<div class="modal fade" id="change-status-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
              <form action="/updateApplicantStatus/{{ $applicant->id }}" method="POST">
               @csrf
               <div class="col-sm-12 col-md-8 col-md-offset-2">
                  <select class="form-control" name="applicant_status">
                    <option value="Submitted" {{ $applicant->applicant_status == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="Hired" {{ $applicant->applicant_status == 'Hired' ? 'selected' : '' }}>Hired</option>
                    <option value="Not Qualified" {{ $applicant->applicant_status == 'Not Qualified' ? 'selected' : '' }}>Not Qualified</option>
                    <option value="Declined" {{ $applicant->applicant_status == 'Declined' ? 'selected' : '' }}>Declined</option>
                  </select>
               </div>               
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>

@include('client.modules.human_resource.applicants.modals.register_as_employee')

<style type="text/css">
  input, select{
   height: 35px;
   width: 100%;
}
textarea{
   width: 100%;
}

.user-image {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
}

.imgPreview {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
}

.upload-btn{
   padding: 6px 12px;
}

.fileUpload {
   position: relative;
   overflow: hidden;
   font-size: 9pt;
}

.fileUpload input.upload {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   padding: 0;
   cursor: pointer;
   opacity: 0;
   filter: alpha(opacity=0);
}
</style>


@endsection
@section('script')
<script src="{{ asset('css/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('css/js/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $("#add-employee-modal .upload").change(function () {
         if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#add-employee-modal .imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
         }
      });

    $(document).on('change', '#add-employee-modal .designation', function(e){
         var designation = $('#add-employee-modal .designation option:selected').text();
         $('#add-employee-modal .designation_name').val(designation);
      });
  });
</script>
@endsection