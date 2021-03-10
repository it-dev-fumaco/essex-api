@extends('client.app')
@section('content')

<div class="col-md-12" style="margin-top: -20px;">
   <h2 class="section-title center">Background Investigation Form</h2>
    <a href="/background_check/view_exam_panel/{{ $applicant->id }}">
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
                           <label>Name of person interviewed:</label>
                           <input class="form-control" type="text" name="examinee_name" id="name_interview" value="{{$applicant->employee_name}}" 
                           style="font-size: 12pt;padding: 15px;">
                           </div>
                           <br>
                           <div style="padding-left: 50px;">
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





<style>
.panel-box {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-box-default {
    border-color: #ddd;
}
.panel-box-default>.panel-box-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-box-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.panel-box-body {
    padding: 15px;
}

.panel-box-list li{
   padding: 5px 5px;
   border-bottom: 1px solid #F5F5F5;
}

.panel-box-list li:last-child{
   border-bottom: 0px;
}


.multi_step_form {
  display: block;
  overflow: hidden;
  /*border: 1px solid grey;*/
  /*box-shadow: 2px 1px 1px grey;*/
}
.multi_step_form #msform {
  text-align: center;
  position: relative;
  padding-top: 50px;
  min-height: 820px;
  /*max-width: 810px;*/
  margin: 0 auto;
  background: #ffffff;
  z-index: 1;
}
.multi_step_form #msform .tittle {
  text-align: center;
  padding-bottom: 55px;
}
.multi_step_form #msform .tittle h2 {
  font: 500 24px/35px "Roboto", sans-serif;
  color: #3f4553;
  padding-bottom: 5px;
}
.multi_step_form #msform .tittle p {
  font: 400 16px/28px "Roboto", sans-serif;
  color: #5f6771;
}
.multi_step_form #msform fieldset {
  border: 0;
  padding: 20px 105px 0;
  position: relative;
  width: 100%;
  left: 0;
  right: 0;
}
.multi_step_form #msform fieldset:not(:first-of-type) {
  display: none;
}
.multi_step_form #msform fieldset h3 {
  font: 500 18px/35px "Roboto", sans-serif;
  color: #3f4553;
}
.multi_step_form #msform fieldset h6 {
  font: 400 15px/28px "Roboto", sans-serif;
  color: #5f6771;
  padding-bottom: 30px;
}

.multi_step_form #msform fieldset .form-group {
  padding: 0 10px;
}
.multi_step_form #msform #progressbar {
  margin-bottom: 30px;
  overflow: hidden;
}
.multi_step_form #msform #progressbar li {
  list-style-type: none;
  color: #99a2a8;
  font-size: 9px;
  width: calc(100%/4);
  float: left;
  position: relative;
  font: 500 13px/1 "Roboto", sans-serif;
}
.multi_step_form #msform #progressbar li:nth-child(2):before {
  content: "\f095";
}
.multi_step_form #msform #progressbar li:nth-child(3):before {
  content: "\f095";
}
.multi_step_form #msform #progressbar li:nth-child(4):before {
  content: "\f095";
}
.multi_step_form #msform #progressbar li:before {
  content: "\f095";
  font: normal normal normal 30px/50px Ionicons;
  width: 50px;
  height: 50px;
  line-height: 50px;
  display: block;
  background: #eaf0f4;
  border-radius: 50%;
  margin: 0 auto 10px auto;
}
.multi_step_form #msform #progressbar li:after {
  content: '';
  width: 100%;
  height: 10px;
  background: #eaf0f4;
  position: absolute;
  left: -50%;
  top: 21px;
  z-index: -1;
}
.multi_step_form #msform #progressbar li:last-child:after {
  width: 150%;
}
.multi_step_form #msform #progressbar li.active {
  color: #5cb85c;
}
.multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
  background: #5cb85c;
  color: white;
}
.multi_step_form #msform .action-button {
  background: #5cb85c;
  color: white;
  border: 0 none;
  border-radius: 5px;
  cursor: pointer;
  min-width: 130px;
  font: 700 14px/40px "Roboto", sans-serif;
  border: 1px solid #5cb85c;
  margin: 0 5px;
  text-transform: uppercase;
  display: inline-block;
}
.multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
  background: #405867;
  border-color: #405867;
}
.multi_step_form #msform .previous_button {
  background: transparent;
  color: #99a2a8;
  border-color: #99a2a8;
}
.multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
  background: #405867;
  border-color: #405867;
  color: #fff;
}

#add-questions-tab .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}

#online-exam-tab .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>
@endsection

@section('script')

<script src="{{ asset('css/js/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script>
  Inputmask.extendAliases({
  pesos: {
            prefix: "₱ ",
            groupSeparator: ".",
            alias: "numeric",
            placeholder: "0",
            autoGroup: !0,
            digits: 2,
            digitsOptional: !1,
            clearMaskOnLostFocus: !1
        }
});

$(document).ready(function(){
  
  $("#currency1").inputmask({ alias : "currency", prefix: '' });
  $(".currency2").inputmask({ alias : "currency", prefix: '₱ ' });
  $("#currency3").inputmask({ alias : "pesos" });

  $('#cash-advance-frm').hide();
  $('#vehicle-loan-frm').hide();

  $('#cutoff-period-start').hide();
  $('#full-payment-date').hide();

  $('#loan_type').on('change', function(e){
    e.preventDefault();
    
    var type = $(this).val();
    if (type == 'cash_advance') {
      $('#cash-advance-frm').show();
      $('#vehicle-loan-frm').hide();
    }else if(type == 'vehicle_loan'){
      $('#vehicle-loan-frm').show();
      $('#cash-advance-frm').hide();
    }else{
      $('#cash-advance-frm').hide();
      $('#vehicle-loan-frm').hide();
    }
  });

  $('#repayment-method-select').on('change', function(e){
    e.preventDefault();
    
    var method = $(this).val();
    if (method == 'full_payment') {
      $('#full-payment-date').attr("name", "payment_on");
      $('#cutoff-period-start').removeAttr("name");
      $('#cutoff-period-start').hide();
      $('#full-payment-date').show();
      $('#payment-on-txt').text("Full Payment on");
    }else if(method == 'per_cutoff'){
      $('#cutoff-period-start').attr("name", "payment_on");
      $('#full-payment-date').removeAttr("name");
      $('#cutoff-period-start').show();
      $('#full-payment-date').hide();
      $('#payment-on-txt').text("Starting On");
    }else{
      $('#cutoff-period-start').removeAttr("name");
      $('#full-payment-date').removeAttr("name");
      $('#cutoff-period-start').hide();
      $('#full-payment-date').hide();
      $('#payment-on-txt').text("");
    }
  });

  // $('#cash-advance-frm').on('submit', function(e){
  //   e.preventDefault();
  //   $(".req").prop('required',true);
  //   var method = $(this).val();
  //   if (method == 'full_payment') {
  //     $('#full-payment-date').attr("name", "payment_on");
  //     $('#cutoff-period-start').removeAttr("name");
  //     $('#cutoff-period-start').hide();
  //     $('#full-payment-date').show();
  //     $('#payment-on-txt').text("Full Payment on");
  //   }else if(method == 'per_cutoff'){
  //     $('#cutoff-period-start').attr("name", "payment_on");
  //     $('#full-payment-date').removeAttr("name");
  //     $('#cutoff-period-start').show();
  //     $('#full-payment-date').hide();
  //     $('#payment-on-txt').text("Starting On");
  //   }else{
  //     $('#cutoff-period-start').removeAttr("name");
  //     $('#full-payment-date').removeAttr("name");
  //     $('#cutoff-period-start').hide();
  //     $('#full-payment-date').hide();
  //     $('#payment-on-txt').text("");
  //   }
  // });
  
});
</script>
@endsection



