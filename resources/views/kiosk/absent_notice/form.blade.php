@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('kiosk/lightpick/css/lightpick.css') }}">
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 97%;">
	  	<div class="card-header h3 text-center">
	  		<span class="align-middle">Absent Notice Form</span>
	  		<div class="pull-left">
	  			<a href="#" onclick="cancel_button()">
          		<img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
          	</a>
	  		</div>
	  		<div class="pull-right">
	  			<a href="#" onclick="refresh()" id="refresh">
        			<img src="{{ asset('storage/refresh.png') }}"  width="40" height="40"/>
        		</a>
        		<a href="#" data-toggle="modal" data-target="#confirmHome">
        			<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
        		</a>
	  		</div>
	  	</div>
	  	<div class="card-body">
	    	<p class="card-text">Please fill in the necessary fields.</p>
	    	<form id="add-notice-form" method="POST" action="/kiosk/notice/form/insert">
	    		@csrf
	    		<input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
	    		<input type="hidden" name="department" value="{{ Auth::user()->department_id }}">
			  	<div class="row" id="select-date-row">
			    	<div class="col-md-3">
			    		<div class="form-group">
				    		<label for="from-date" class="grey-text font-weight-light">From Date</label>
				    		<div class="input-group">
				    			<input type="text" aria-label="From Date" class="form-control w-50 datetime-select absentTodayFilter" id="filterDateStart" name="date_from" placeholder="Select Date" onchange="sumofday()" readonly>
				  				<input type="text" aria-label="From Time" id="starttime" class="form-control w-25 datetime-select" name="time_from" onchange="SumHours();" placeholder="Select Time" readonly>
							</div>
						</div>
			    	</div>
			    	<div class="col-md-3">
			    		<div class="form-group">
				    		<label for="to-date" class="grey-text font-weight-light">To Date</label>
				    		<div class="input-group">
				    			<input type="text" aria-label="To Date" class="form-control w-50 datetime-select absentTodayFilter" name="date_to" onchange="sumofday()" readonly id="filterDateEnd" placeholder="Select Date">
				  				<input type="text" aria-label="To Time" id="endtime" class="form-control w-25 datetime-select" name="time_to" onchange="SumHours();" placeholder="Select Time" readonly>
							</div>
						</div>
			    	</div>
            <div class="col-md-3">
              <div class="form-group" id="leaveform">
                <label class="grey-text font-weight-light">Type of Absence</label>
                @foreach($leave_types as $leave_type)
                <div class="custom-control custom-radio mt-3 ml-2" id="emp_L{{ $leave_type->leave_type_id }}">
                  <input type="radio" class="custom-control-input" id="{{ $leave_type->leave_type_id }}" name="absence_type" value="{{ $leave_type->leave_type_id }}">
                  <label class="custom-control-label" for="{{ $leave_type->leave_type_id }}">{{ $leave_type->leave_type }}</label>
                </div>
                @endforeach
                @foreach($absence_types as $absence_type)
                <div class="custom-control custom-radio mt-3 ml-2" id="reg_L{{ $absence_type->leave_type_id }}">
                  <input type="radio" class="custom-control-input" id="{{ $absence_type->leave_type_id }}" name="absence_type" value="{{ $absence_type->leave_type_id }}">
                  <label class="custom-control-label" for="{{ $absence_type->leave_type_id }}">{{ $absence_type->leave_type }}</label>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="grey-text font-weight-light pt-3">Leave Balances</label>
                <span style="display: block; font-size: 8pt; color: #999999;">Remaining</span>
                @forelse($leave_types as $leave_type)
                <div class="col-md-12">
                  <span class="remain_L{{ $leave_type->leave_type_id }}">{{ $leave_type->leave_type }} - {{ $leave_type->remaining }}</span>
                  <input type="hidden" id="remain_L{{ $leave_type->leave_type_id }}" class="remain_L{{ $leave_type->leave_type_id }}" value="{{ $leave_type->remaining }}">
                </div>
                @empty
                <div>
                  No records found.
                </div>
              @endforelse
            </div>
          </div>
			    </div>
			    <div class="row">
			    	<div class="col-md-6">
			    		<div class="row">
			    			<div class="col-md-8">
					    		<div class="form-group">
						    		<label for="reported-through" class="grey-text font-weight-light">Report made through</label>
						      	<select class="browser-default custom-select" name="reported_through" id="reported-through">
									  	<option value = "">--</option>
									  	<option value="Unreported">Unreported</option>
									  	<option value="Cellphone">Cellphone</option>
									  	<option value="Landline">Landline</option>
									  	<option value="Verbal">Verbal</option>
									</select>
						    	</div>
						   </div>
						   <div class="col-md-4">
					    		<div class="form-group">
						    		<label for="time-reported" class="grey-text font-weight-light">Time</label>
						    		<select class="browser-default custom-select" name="time_reported" id="time_reported">
						    			<option value=""></option>
						    			<option value="04:00am">4:00 AM</option>
						    			<option value="05:00am">5:00 AM</option>
						    			<option value="06:00am">6:00 AM</option>
						    			<option value="07:00am">7:00 AM</option>
						    			<option value="08:00am">8:00 AM</option>
						    			<option value="09:00am">9:00 AM</option>
						    			<option value="10:00am">10:00 AM</option>
						    			<option value="11:00am">11:00 AM</option>
						    			<option value="12:00nn">12:00 NN</option>
						    			<option value="">------</option>
						    			<option value="01:00pm">1:00 PM</option>
						    			<option value="02:00pm">2:00 PM</option>
						    			<option value="03:00pm">3:00 PM</option>
						    			<option value="04:00pm">4:00 PM</option>
						    			<option value="05:00pm">5:00 PM</option>
						    			<option value="06:00pm">6:00 PM</option>
						    			<option value="07:00pm">7:00 PM</option>
						    			<option value="08:00pm">8:00 PM</option>
						    			<option value="09:00pm">9:00 PM</option>
						    			<option value="10:00pm">10:00 PM</option>
						    		</select>
						    	</div>
						   </div>
						   <div class="col-md-12">
						    	<div class="form-group">
							    	<label for="received-by" class="grey-text font-weight-light">Received by</label>
				      			<input type="text" class="form-control" name="received_by" id="received_by" autocomplete="off" class="form-control mdb-autocomplete"  virtual-keyboard>
                    
				      			<div id="employee_list"></div>
				      		</div>
				      	</div>

						   <div class="col-md-12">
						    	<div class="form-group">
							    	<label for="reason" class="grey-text font-weight-light">Reason</label>
				    				<textarea class="form-control" id="reason" name="reason"></textarea>
				    			</div>
						   </div>
						</div>
			    	</div>

			    	
				</div>
				<div class="row">
			    	<div class="col-md-12">
			    		<div class="text-center">
			    			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSubmission">
			    				<i class="fa fa-paper-plane-o mr-2"></i>SUBMIT
			    			</button>
			        	</div>
			    	</div>
			    </div>
			</form>
	  	</div>
	</div>
</div>

@include('kiosk.absent_notice.select_date_modal')

<!-- Modal confirmSubmission -->
<div class="modal fade" id="confirmSubmission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Confirm Submission</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      	<div class="modal-body">
        		<h5>Submit absent notice slip for approval?</h5>
      	</div>
      	<div class="modal-footer">
        		<button type="button" onclick="submitme()" class="btn btn-primary">Yes</button>
        		<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      	</div>
    	</div>
  	</div>
</div>
<!-- Modal confirmSubmission -->

<!-- Modal confirmBack -->
<div class="modal fade" id="confirmBack" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      	<div class="modal-body">
        		<h5>Cancel absent notice slip?</h5>
      	</div>
      	<div class="modal-footer">
        		<a href="/kiosk/notice" class="btn btn-primary redirect">Yes</a>
        		<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      	</div>
    	</div>
  	</div>
</div>
<!-- Modal confirmBack -->

<!-- Modal confirmHome -->
<div class="modal fade" id="confirmHome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      	<div class="modal-body">
        		<h5>Proceed to Homepage?</h5>
      	</div>
      	<div class="modal-footer">
        		<a href="/kiosk/home" class="btn btn-primary redirect">Yes</a>
        		<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      	</div>
    	</div>
  	</div>
</div>
<!-- Modal confirmHome -->

<!-- Modal Restrictwordmodal -->
<div class="modal fade" id="Restrictwordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      	<div class="modal-body">
        		<h5>Words you entered cannot be accepted!</h5>
      	</div>
      	<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      	</div>
    	</div>
  	</div>
</div>
<!-- Modal Restrictwordmodal -->

<!-- Modal alertmodal -->
<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      	<div class="modal-body">
        		<h5>Please fill in the necessary fields!</h5>
      	</div>
      	<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      	</div>
    	</div>
  	</div>
</div>

<div class="spinner" id="spinner">
  <div class="spinner-circle spinner-circle-outer"></div>
  <div class="spinner-circle-off spinner-circle-inner"></div>
  <div class="spinner-circle spinner-circle-single-1"></div>
  <div class="spinner-circle spinner-circle-single-2"></div>
  <div class="text">Please Wait..</div>
</div>
<style type="text/css">

.spinner {
    position: fixed;
    z-index: 999;
    height: 6em;
    width: 6em;
    overflow: visible;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;

}
.spinner .text {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  margin-top: 2.6em;
  text-align: center;
  font-size: 100%;
  color: hsla(0, 0%, 0%, 0.9);
  font-weight:bold;
   text-shadow: 1px 1px #D3D3D3;
}
.spinner .spinner-circle {
  position: absolute;
  background-color: transparent;
  border-radius: 100%;
  border-style: solid;
  border-color: #ffffff transparent;
}
.spinner .spinner-circle.spinner-circle-outer {
  width: 130px;
  height: 130px;
  border-width: 25.8px;
  top: -6.400000000000002px;
  left: -6.400000000000002px;
  -ms-filter: alpha(opacity=50);
  filter: alpha(opacity=50);
  -webkit-animation: spinner-rotate-outer 2s 0s ease-in-out infinite;
  animation: spinner-rotate-outer 2s 0s ease-in-out infinite;
}
.spinner .spinner-circle.spinner-circle-inner {
  width: 110px;
  height: 110px;
  border-width: 6.4px;
  top: 12.799999999999999px;
  left: 12.799999999999999px;
  opacity: 0.0;
  -ms-filter: alpha(opacity=70);
  filter: alpha(opacity=70);
  -webkit-animation: spinner-rotate-inner 3s 0s linear infinite;
  animation: spinner-rotate-inner 3s 0s linear infinite;
}
.spinner .spinner-circle.spinner-circle-single-1 {
  width: 110px;
  height: 110px;
  border-width: 11.6px;
  top: 3.200000000000001px;
  left: 3.200000000000001px;

  -ms-filter: alpha(opacity=30);
  filter: alpha(opacity=30);
  -webkit-animation: spinner-rotate-single-1 5s 0s ease-in-out infinite;
  animation: spinner-rotate-single-1 5s 0s ease-in-out infinite;
  border-color:  #4285F4 transparent #4285F4 transparent;

}
.spinner .spinner-circle.spinner-circle-single-2 {
  width: 0;
  height: 0;
  border-width: 25.6px;
  top: 6.399999999999999px;
  left: 6.399999999999999px;
  opacity: 0.0;
  -ms-filter: alpha(opacity=30);
  filter: alpha(opacity=30);
  -webkit-animation: spinner-rotate-single-2 7s 0s ease-in-out infinite;
  animation: spinner-rotate-single-2 7s 0s ease-in-out infinite;
  border-color: #0d47a1 transparent transparent transparent;
  box-shadow: 0 -12px 4px #0d47a1;
}
@-webkit-keyframes spinner-rotate-outer {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
  }
  100% {
    -webkit-transform: rotateZ(360deg);
    transform: rotateZ(360deg);
  }
}
@keyframes spinner-rotate-outer {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
  }
  100% {
    -webkit-transform: rotateZ(360deg);
    transform: rotateZ(360deg);
  }
}
@-webkit-keyframes spinner-rotate-inner {
  0% {
    -webkit-transform: rotateZ(30deg);
    transform: rotateZ(30deg);
  }
  100% {
    -webkit-transform: rotateZ(390deg);
    transform: rotateZ(390deg);
  }
}
@keyframes spinner-rotate-inner {
  0% {
    -webkit-transform: rotateZ(30deg);
    transform: rotateZ(30deg);
  }
  100% {
    -webkit-transform: rotateZ(390deg);
    transform: rotateZ(390deg);
  }
}
@-webkit-keyframes spinner-rotate-single-1 {
  0% {
    -webkit-transform: rotateZ(56deg);
    transform: rotateZ(56deg);
  }
  20% {
    -webkit-transform: rotateZ(-132deg);
    transform: rotateZ(-132deg);
  }
  40% {
    -webkit-transform: rotateZ(-250deg);
    transform: rotateZ(-250deg);
  }
  60% {
    -webkit-transform: rotateZ(40deg);
    transform: rotateZ(40deg);
  }
  70% {
    -webkit-transform: rotateZ(-80deg);
    transform: rotateZ(-80deg);
  }
  100% {
    -webkit-transform: rotateZ(56deg);
    transform: rotateZ(56deg);
  }
}
@keyframes spinner-rotate-single-1 {
  0% {
    -webkit-transform: rotateZ(56deg);
    transform: rotateZ(56deg);
  }
  20% {
    -webkit-transform: rotateZ(-132deg);
    transform: rotateZ(-132deg);
  }
  40% {
    -webkit-transform: rotateZ(-250deg);
    transform: rotateZ(-250deg);
  }
  60% {
    -webkit-transform: rotateZ(40deg);
    transform: rotateZ(40deg);
  }
  70% {
    -webkit-transform: rotateZ(-80deg);
    transform: rotateZ(-80deg);
  }
  100% {
    -webkit-transform: rotateZ(56deg);
    transform: rotateZ(56deg);
  }
}
@-webkit-keyframes spinner-rotate-single-2 {
  0% {
    -webkit-transform: rotateZ(-24deg);
    transform: rotateZ(-24deg);
  }
  10% {
    -webkit-transform: rotateZ(142deg);
    transform: rotateZ(142deg);
  }
  20% {
    -webkit-transform: rotateZ(-87deg);
    transform: rotateZ(-87deg);
  }
  30% {
    -webkit-transform: rotateZ(-345deg);
    transform: rotateZ(-345deg);
  }
  40% {
    -webkit-transform: rotateZ(86deg);
    transform: rotateZ(86deg);
  }
  50% {
    -webkit-transform: rotateZ(175deg);
    transform: rotateZ(175deg);
  }
  60% {
    -webkit-transform: rotateZ(-245deg);
    transform: rotateZ(-245deg);
  }
  70% {
    -webkit-transform: rotateZ(4deg);
    transform: rotateZ(4deg);
  }
  80% {
    -webkit-transform: rotateZ(-132deg);
    transform: rotateZ(-132deg);
  }
  90% {
    -webkit-transform: rotateZ(345deg);
    transform: rotateZ(345deg);
  }
  100% {
    -webkit-transform: rotateZ(-24deg);
    transform: rotateZ(-24deg);
  }
}
@keyframes spinner-rotate-single-2 {
  0% {
    -webkit-transform: rotateZ(-24deg);
    transform: rotateZ(-24deg);
  }
  10% {
    -webkit-transform: rotateZ(142deg);
    transform: rotateZ(142deg);
  }
  20% {
    -webkit-transform: rotateZ(-87deg);
    transform: rotateZ(-87deg);
  }
  30% {
    -webkit-transform: rotateZ(-345deg);
    transform: rotateZ(-345deg);
  }
  40% {
    -webkit-transform: rotateZ(86deg);
    transform: rotateZ(86deg);
  }
  50% {
    -webkit-transform: rotateZ(175deg);
    transform: rotateZ(175deg);
  }
  60% {
    -webkit-transform: rotateZ(-245deg);
    transform: rotateZ(-245deg);
  }
  70% {
    -webkit-transform: rotateZ(4deg);
    transform: rotateZ(4deg);
  }
  80% {
    -webkit-transform: rotateZ(-132deg);
    transform: rotateZ(-132deg);
  }
  90% {
    -webkit-transform: rotateZ(345deg);
    transform: rotateZ(345deg);
  }
  100% {
    -webkit-transform: rotateZ(-24deg);
    transform: rotateZ(-24deg);
  }
}


  /* Transparent Overlay */
  .spinner:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,.3);
  }

</style>
<!-- <style type="text/css">
  body{
    overflow-y: hidden;
  }
</style>
 -->


<!-- Modal alertmodal -->
<!--   <div id="balloon"></div> -->
<!-- <style type="text/css">
  #button-hint {
      position: fixed;
      background: #090;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: 0.65;
    }

    #balloon {
      position: fixed;
      background: #FFF;
      width: 200px;
      height: 200px;
      bottom: -30px;
      right: -20px;
      border-radius: 100px;
      transition: 0.7s ease;
    }

    #balloon.shrink {
      width: 100px;
      height: 100px;

    }


</style> -->

@endsection

@section('script')
<script src="{{ asset('kiosk/lightpick/moment.min.js') }}"></script>
<script src="{{ asset('kiosk/lightpick/lightpick.js') }}"></script>
<script src="{{ asset('css/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{asset('kiosk/js/jquery.ui.touch-punch.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  // $('#leaveform').hide();
  $("#reg_L7").hide();
  $("#reg_L8").hide();
  $("#reg_L9").hide();
  $("#reg_L10").hide();

  $("#emp_L1").hide();
  $("#emp_L2").hide();
  $('#spinner').hide();
	var picker = new Lightpick({
    field: document.getElementById('date-from'),
    secondField: document.getElementById('date-to'),
    singleDate: false,
    inline: true,
    format: 'YYYY-MM-DD',
    numberOfColumns: 2,
    numberOfMonths: 2,
    hoveringTooltip: false,
    dropdowns: false,
    onSelect: function(start, end){
        var str = 'From ';
        str += start ? start.format('MMMM DD, YYYY') + ' to ' : '';
        str += end ? end.format('MMMM DD, YYYY') : '...';
        $('#selected-dates').text(str);

        var from_time = $('.slider-time').text();
        var to_time = $('.slider-time2').text();

        SumHours();
        sumofday();
              
              // if (!!from_time) {
              //     employeeshift();
              //     sliderfunction();
              //     console.log('custom_fuction_run_forTime');
              //     SumHours();
              //     sumofday();
              //   }else{

              //   }
        console.log(from_time);
        if (from_time == '' || to_time == '') {

          sliderfunction();
          console.log('custom_fuction_run');
                      
          employeeshift();
                       
          }

        }
	});

	$('#select-date-row .datetime-select').click(function(){
		var start = $('#filterDateStart').val();
		var end = $('#filterDateEnd').val();
    if (start || end) {
                  
           picker.setDateRange(start, end);
            var time_in = $('#starttime').val();
            var time_out = $('#endtime').val();
            $('.slider-time').text(time_in);
            $('.slider-time2').text(time_out);
            sliderfunction();
               
              }
		
		$('#selectDateModal').modal('show');
    // sumofday();
    // SumHours();
    // employeeshift();
    // sliderfunction();
	});

	$('#set-dates').click(function(){
		$('#starttime').val($('.slider-time').text());
	   $('#endtime').val($('.slider-time2').text());
	   $('#filterDateStart').val($('#date-from').val());
	   $('#filterDateEnd').val($('#date-to').val());
     sumofday();
     SumHours();
     // sliderfunction();


	});
    var smon = $('#starttime').val();
    var fmon = $('#endtime').val();
    var convertedFromslider = (convertTime12to24forslider(smon) * 60);
    var convertedToslider = (convertTime12to24forslider(fmon) * 60);

	$("#slider-range").slider({
		range: true,
    	min: 360,
    	max: 1260,
    	step: 30,
    	values: [convertedFromslider, convertedToslider],
    	slide: function (e, ui) {
        	var hours1 = Math.floor(ui.values[0] / 60);
        	var minutes1 = ui.values[0] - (hours1 * 60);
          // console.log(convertedToslider);
        	if (hours1.length == 1) hours1 = '0' + hours1;
        	if (minutes1.length == 1) minutes1 = '0' + minutes1;
        	if (minutes1 == 0) minutes1 = '00';
        	if (hours1 >= 12) {
            if (hours1 == 12) {
               hours1 = hours1;
               minutes1 = minutes1 + " PM";
            } else {
               hours1 = hours1 - 12;
               minutes1 = minutes1 + " PM";
            }
        	} else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        	}
        	if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        	}

        	$('.slider-time').html(hours1 + ':' + minutes1);

        	var hours2 = Math.floor(ui.values[1] / 60);
        	var minutes2 = ui.values[1] - (hours2 * 60);

        	if (hours2.length == 1) hours2 = '0' + hours2;
        	if (minutes2.length == 1) minutes2 = '0' + minutes2;
        	if (minutes2 == 0) minutes2 = '00';
        	if (hours2 >= 12) {
            if (hours2 == 12) {
               hours2 = hours2;
               minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
               hours2 = 11;
               minutes2 = "59 PM";
            } else {
               hours2 = hours2 - 12;
               minutes2 = minutes2 + " PM";
            }
        	} else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        	}

        	$('.slider-time2').html(hours2 + ':' + minutes2);
    	}
	});

	var forbiddenWords = ['Personal Matter'];
	$(function () {
	  	$('#reason').on('keyup', function(e) {
	    	forbiddenWords.forEach(function(val, index) {
	      	if (e.target.value.toUpperCase().indexOf(val.toUpperCase()) >= 0) {
	      		$('#Restrictwordmodal').modal('show');
	      	}
	    	});
	  	});
	});

	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#received_by').on('keyup',function(){ 
		var query = $(this).val();
		if(query != ''){
         var _token = $('input[name="_token"]').val();
         $.ajax({
          	url:"/kiosk/notice_employee/fetch",
          	method:"POST",
          	data:{query:query, _token:_token},
          	success:function(data){
           		$('#employee_list').fadeIn();  
           		$('#employee_list').html(data);
          	}
         });
      }
   });

   $(document).on('click', 'li', function(){
   	$('#received_by').val($(this).text());
   	$('#employee_list').fadeOut();  
   });
});
</script>
 <!--  <script type="text/javascript">
    $(function () {
      "use strict";

      var $balloon = $("#balloon"),
        $infoTxt = $("#info-txt");

      setTimeout(function () {
        $balloon.addClass("shrink");
      }, 500);

      $infoTxt.delay(1000).fadeIn();

      // $(this).click(function () {
      //   $("#button-hint").fadeOut();
      //   $balloon.fadeOut();
      //   $infoTxt.fadeOut();
      // });

      jqKeyboard.init();
    });
  </script> -->

<script type="text/javascript">
	$(document).on('change', '#reported-through', function(e){
		var type = $('#reported-through').val();
		if ( type == 'Unreported'){
      	$("#received_by").attr("disabled", true);
      	$("#time_reported").attr("disabled", true);
      }else{
       	$("#time_reported").attr('disabled', false);
      	$("#received_by").attr('disabled', false);
      }
	});

	// $(document).on('change', '#filterDateStart', function(e){
	// 	var type = $('#filterDateStart').val();
	// 	data = {
	// 		type : type
	// 	}
	// 	$.ajax({
	//       url: '/kiosk/notice/getusershift',
	//       type: 'get',
	//       data: data,
	//       success: function(data){
	//       	$('#starttime').val(data.shift_in);
	//      		$('#endtime').val(data.shift_out);
	//       	SumHours();
	//       }
	// 	});
	// });
</script>
<script type="text/javascript">
	function sumofday() {
		var start= new Date($("#filterDateStart").val());
		var end= new Date($("#filterDateEnd").val());
   	// var computation = ((end- start) / (1000 * 60 * 60 * 24))+ 1;
   	// var totaldays = Math.round(computation)
    var totaldays = workingDaysBetweenDates(new Date(start), new Date(end));
    console.log(totaldays);

   	var remain_sick = $('#remain_L2').val();
		var remain_vaca = $('#remain_L1').val();

		if(remain_sick > 0){
			if(totaldays > remain_vaca){
		 		$("#emp_L1").hide();
		 		$(".remain_L1").hide();
			}else{
				$("#emp_L1").show();
		 		$(".remain_L1").show();
			}
		}

		if(remain_vaca > 0){
			if(totaldays > remain_sick){
		 		$("#emp_L2").hide();
		 		$(".remain_L2").hide();
			}else{
				$("#emp_L2").show();
		 		$(".remain_L2").show();
			}
		}
	}
function workingDaysBetweenDates(startDate, endDate) {
  
    // Validate input
    if (endDate < startDate)
        return 0;
    
    // Calculate days between dates
    var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    var diff = endDate - startDate;  // Milliseconds between datetime objects    
    var days = Math.ceil(diff / millisecondsPerDay);
    
    // Subtract two weekend days for every week in between
    var weeks = Math.floor(days / 7);
    days = days - (weeks * 1);

    // Handle special cases
    var startDay = startDate.getDay();
    var endDay = endDate.getDay();
    
    // Remove weekend not previously removed.   
    if (startDay - endDay > 1)         
        days = days - 1;      
    
    // Remove start day if span starts on Sunday but ends before Saturday
    if (startDay == 0 && endDay != 6) {
        days = days - 1;  
    }
            

    
    return days;
}
  
</script>
<script type="text/javascript">
	const convertTime12to24 = (time12h) => {
  	const [time, modifier] = time12h.split(' ');

	  let [hours, minutes] = time.split(':');

	  if (hours === '12') {
	    hours = '00';
	  }

	  if (modifier === 'PM') {
	    hours = parseInt(hours, 10) + 12;
	  }

	  return `${hours}:${minutes}`;
	}
  const convertTime12to24forslider = (time12h) => {
    const [time, modifier] = time12h.split(' ');

    let [hours, minutes] = time.split(':');

    if (hours === '12') {
      hours = '00';
    }

    if (modifier === 'PM') {
      hours = parseInt(hours, 10) + 12;
    }

    return `${hours}`;
  }

	function SumHours() {
	  var smon = $('#starttime').val();
	  var fmon = $('#endtime').val();
	  var convertedFrom = (convertTime12to24(smon));
	  var convertedTo = (convertTime12to24(fmon));
	  // console.log(convertedFrom);
	  // console.log(convertedTo);
	  var remain_sick = $('#remain_L2').val();
	  var remain_vaca = $('#remain_L1').val();
	  var diff = 0 ;

	  var start= new Date($("#filterDateStart").val());
    var end= new Date($("#filterDateEnd").val());
   	var totaldays = workingDaysBetweenDates(new Date(start), new Date(end));

   	var remain_sick = $('#remain_L2').val();
	  var remain_vaca = $('#remain_L1').val();

	  if (smon && fmon) {
	    smon = ConvertToSeconds(convertedFrom);
	    fmon = ConvertToSeconds(convertedTo);
	    diff = Math.abs( fmon - smon ) ;
	    // console.log(secondsTohhmmss(diff));
	    if (secondsTohhmmss(diff) <= 3) {
	    	$("#reg_L8").hide();
	    	$("#reg_L9").show();
	    	$("#reg_L10").show();
	    	$("#reg_L7").hide();

	    	$("#emp_L1").hide();
	 		$(".remain_L1").show();
	 		$("#emp_L2").hide();
	 		$(".remain_L2").show();
	   	}else if(secondsTohhmmss(diff) <=4){
	    	$("#reg_L7").hide();
	    	$("#reg_L8").show();
	    	$("#reg_L9").hide();
	    	$("#reg_L10").hide();

	 		$("#emp_L1").hide();
	 		$(".remain_L1").show();
	 		$("#emp_L2").hide();
	 		$(".remain_L2").show();
	 	}else if(secondsTohhmmss(diff) <=8){
	    	$("#reg_L7").hide();
	    	$("#reg_L8").show();
	    	$("#reg_L9").hide();
	    	$("#reg_L10").hide();

	 		$("#emp_L1").hide();
	 		$(".remain_L1").show();
	 		$("#emp_L2").hide();
	 		$(".remain_L2").show();

	    }else if(secondsTohhmmss(diff) >= 9){
	    	$("#reg_L7").show();
	    	$("#reg_L8").hide();
	    	$("#reg_L9").hide();
	    	$("#reg_L10").hide();
	  //   	if(remain_vaca > 0){
	 	// 	$("#emp_L1").show();
	 	// 		$(".remain_L1").show();
			// }
			// if(remain_sick > 0){
	 	// 		$("#emp_L2").show();
	 	// 		$(".remain_L2").show();
	 	
			// }
			if(remain_vaca > 0){
				if(totaldays > remain_vaca){
			 		$("#emp_L1").hide();
			 		$(".remain_L1").hide();
			 		// console.log('hideme vaca');
				}else{
					$("#emp_L1").show();
			 		$(".remain_L1").show();
			 			// console.log('showme vaca');
				}
			}
			if(remain_sick > 0){
				if(totaldays > remain_sick){
			 		$("#emp_L2").hide();
			 		$(".remain_L2").hide();
			 			console.log('hideme sick');
				}else{
					$("#emp_L2").show();
			 		$(".remain_L2").show();
			 		console.log('showme sick');
				}
			}

	    }

	  }
 // 'time difference is : ' + secondsTohhmmss(diff) 
	 function ConvertToSeconds(time) {
	    var splitTime = time.split(":");
	    return splitTime[0] * 3600 + splitTime[1] * 60;
	  }

	 function secondsTohhmmss(secs) {
	    var hours = parseInt(secs / 3600);
	    var seconds = parseInt(secs % 3600);
	    var minutes = parseInt(seconds / 60) ;
	    return hours;
	  }


}
</script>
<script type="text/javascript">
	function submitme(){
		var starttime = document.forms["add-notice-form"]["starttime"].value;
		var endtime = document.forms["add-notice-form"]["endtime"].value;
		var fromdate = document.forms["add-notice-form"]["filterDateStart"].value;
		var todate = document.forms["add-notice-form"]["filterDateEnd"].value;
		var reported_through = document.forms["add-notice-form"]["reported-through"].value;
		var reason = document.forms["add-notice-form"]["reason"].value;

    	var textValue = document.getElementById('reason').value;

		var word = 'Personal Matter';
		var forbiddenWords = ['PERSONAL MATTER'];


			// var flag = true;
   //      $(':radio').each(function () {
        	
   //          name = $(this).attr('name');
   //          if (flag && !$(':radio[name="' + name + '"]:checked').length) {

               
   //              console.log('radio unchecked');
   //          }
   //          return false;
        
   //      });
        if($('[name=absence_type]:checked').length){
		 
		}else{
		    
		  $('#alertmodal').modal('show');
                $('#confirmSubmission').modal('hide');
                
                return false; 


		}
       

		if (textValue.toUpperCase().indexOf(forbiddenWords) >= 0) {
			 	 $('#Restrictwordmodal').modal('show');
			 	 $('#confirmSubmission').modal('hide');
			 	 return false;	
		}

  		if (starttime == "") {
    		$('#alertmodal').modal('show');
    		$('#confirmSubmission').modal('hide');
    		return false;
  		}
  		if (endtime == "") {
    		$('#alertmodal').modal('show');
    		$('#confirmSubmission').modal('hide');
    		return false;
  		}
  		if (fromdate == "") {
    		$('#alertmodal').modal('show');
    		$('#confirmSubmission').modal('hide');
    		return false;
  		}
      if (todate == "") {
        $('#alertmodal').modal('show');
        $('#confirmSubmission').modal('hide');
        return false;
      }
  		if (reported_through == "") {
    		$('#alertmodal').modal('show');
    		$('#confirmSubmission').modal('hide');
    		return false;
  		}
  		if (reason == "") {
  			$('#alertmodal').modal('show');
    		$('#confirmSubmission').modal('hide');

    		return false;

  		}
      $('#spinner').show();
		 document.getElementById('add-notice-form').submit();
	}
</script>
<script type="text/javascript">
	function refresh(){
		document.getElementById("add-notice-form").reset();
		$("#time_reported").attr('disabled', false);
      	$("#received_by").attr('disabled', false);
	    $("#reg_L7").show();
		$("#reg_L8").show();
		$("#reg_L9").show();
		$("#reg_L10").show();

		var remain_sick = $('#remain_L2').val();
		var remain_vaca = $('#remain_L1').val();

    if(remain_vaca > 0){
      $("#emp_L1").show();
	 		$(".remain_L1").show();
		}
		if(remain_sick > 0){
	 		$("#emp_L2").show();
	 		$(".remain_L2").show();
		}
    $("#employee_list").hide();
    $("#reg_L7").hide();
    $("#reg_L8").hide();
    $("#reg_L9").hide();
    $("#reg_L10").hide();

    $("#emp_L1").hide();
    $("#emp_L2").hide();
    $('#spinner').hide();
	}
	function cancel_button(){
    $('#confirmBack').modal('show');
  }
</script>
<script type="text/javascript">

	function employeeshift(){
		
	var type = $('#filterDateStart').val();
	data = {
			type : type
		}
	$.ajax({
      url: '/kiosk/notice/getusershift',
      type: 'get',
      data: data,
      success: function(data){
       
        $('#starttime').val(data.shift_in);
     	$('#endtime').val(data.shift_out);
      $('.slider-time').text(data.shift_in);
      $('.slider-time2').text(data.shift_out);
      sliderfunction();
      	// SumHours();
   		}
   	});

}
function sliderfunction(){
      var smon = $('#starttime').val();
    var fmon = $('#endtime').val();
    var convertedFromslider = (convertTime12to24forslider(smon) * 60);
    var convertedToslider = (convertTime12to24forslider(fmon) * 60);
  $("#slider-range").slider({
    range: true,
      min: 360,
      max: 1260,
      step: 30,
      values: [convertedFromslider, convertedToslider],
      slide: function (e, ui) {
          var hours1 = Math.floor(ui.values[0] / 60);
          var minutes1 = ui.values[0] - (hours1 * 60);
          // console.log(convertedToslider);
          if (hours1.length == 1) hours1 = '0' + hours1;
          if (minutes1.length == 1) minutes1 = '0' + minutes1;
          if (minutes1 == 0) minutes1 = '00';
          if (hours1 >= 12) {
            if (hours1 == 12) {
               hours1 = hours1;
               minutes1 = minutes1 + " PM";
            } else {
               hours1 = hours1 - 12;
               minutes1 = minutes1 + " PM";
            }
          } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
          }
          if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
          }

          $('.slider-time').html(hours1 + ':' + minutes1);

          var hours2 = Math.floor(ui.values[1] / 60);
          var minutes2 = ui.values[1] - (hours2 * 60);

          if (hours2.length == 1) hours2 = '0' + hours2;
          if (minutes2.length == 1) minutes2 = '0' + minutes2;
          if (minutes2 == 0) minutes2 = '00';
          if (hours2 >= 12) {
            if (hours2 == 12) {
               hours2 = hours2;
               minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
               hours2 = 11;
               minutes2 = "59 PM";
            } else {
               hours2 = hours2 - 12;
               minutes2 = minutes2 + " PM";
            }
          } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
          }

          $('.slider-time2').html(hours2 + ':' + minutes2);
      }
  });
}
</script>



@endsection