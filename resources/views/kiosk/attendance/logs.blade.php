@extends('kiosk.app')
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 95%;">
		<div class="card-header h3 text-center">
			<span class="align-middle">Attendance Logs</span>
		<div class="pull-left">
        	<a href="/kiosk/attendance">
          		<img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
        	</a>
      </div>
		<div class="pull-right">
        	<a href="/kiosk/home">
          		<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
        	</a>
      </div>
  	</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<div class="form-row mb-4">
        				<div class="col">
            				<label for="month-select" class="col-form-label">Month</label>
            				<select class="browser-default custom-select" id="month_select">
  									   <option value="0" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
                                       <option value="1" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
                                       <option value="2" {{ date('m') == 3 ? 'selected' : '' }}>March</option>
                                       <option value="3" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
                                       <option value="4" {{ date('m') == 5 ? 'selected' : '' }}>May</option>
                                       <option value="5" {{ date('m') == 6 ? 'selected' : '' }}>June</option>
                                       <option value="6" {{ date('m') == 7 ? 'selected' : '' }}>July</option>
                                       <option value="7" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
                                       <option value="8" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                                       <option value="9" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
                                       <option value="10" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                                       <option value="11" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
							</select>
        				</div>
        				<div class="col">
            				<label for="year-select" class="col-form-label">Year</label>
            				<select class="browser-default custom-select" id="year_select">
  									   <option value="2017" {{ date('y') == 17 ? 'selected' : '' }}>2017</option>
                                       <option value="2018" {{ date('y') == 18 ? 'selected' : '' }}>2018</option>
                                       <option value="2019" {{ date('y') == 19 ? 'selected' : '' }}>2019</option>
                                       <option value="2020" {{ date('y') == 20 ? 'selected' : '' }}>2020</option>
                                       <option value="2021" {{ date('y') == 21 ? 'selected' : '' }}>2021</option>
                                       <option value="2022" {{ date('y') == 22 ? 'selected' : '' }}>2022</option>
                                       <option value="2023" {{ date('y') == 23 ? 'selected' : '' }}>2023</option>
                                       <option value="2024" {{ date('y') == 24 ? 'selected' : '' }}>2024</option>
                                       <option value="2025" {{ date('y') == 25 ? 'selected' : '' }}>2025</option>
                                       <option value="2026" {{ date('y') == 26 ? 'selected' : '' }}>2026</option>
                                       <option value="2027" {{ date('y') == 27 ? 'selected' : '' }}>2027</option>
                                       <option value="2028" {{ date('y') ==  28 ? 'selected' : '' }}>2028</option>
							</select>
				        </div>
				    </div>
				</div>
				<div class="col-md-8 text-right mb-2 mt-3">
					<a href="#!" class="btn btn-primary" id="refreshAttendance">
						<i class="fa fa-refresh fa-lg" aria-hidden="true"></i>
					</a>
					<a href="/kiosk/attendance/summary" class="btn btn-primary redirect" onclick="spinnerfuction()">
						<i class="fa fa-eye mr-1" aria-hidden="true"></i>View Summary
					</a>
				</div>
				<div class="col-md-12">
					<div class="table-responsive" id="my-attendance"></div>
				</div>
				
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

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('css/js/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/bootstrap-datepicker.css') }}" />
<script>
	$(document).ready(function(){
		console.log('ready');
		 $('#spinner').hide();
		$.ajaxSetup({
	  		headers: {
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		loadAttendance();

		$('#datepicker .filters').datepicker({
	        'format': 'yyyy-mm-dd',
	        'autoclose': true
	    });

		$('.filters').change(function(){
         	loadAttendance();
      	});

		$(document).on('change', '#month_select', function(event){
		loadAttendance();
		// loadBiometricAdjustments();
		// loadShiftSchedules();
		// loadShifts();
		});
		$(document).on('change', '#year_select', function(event){
		loadAttendance();
		// loadBiometricAdjustments();
		// loadShiftSchedules();
		// loadShifts();
		});

		function loadAttendance(page){
			var  month = $('#month_select').val();
   			var integermonth = parseInt(month, 10) + 1;
   			var month2 = month + 1;
   			var year = $('#year_select').val();
			var firstDay = new Date(year, month, 1);
			var lastDay = new Date(year, integermonth, 0);

			var start = convertdateformat(firstDay);
			var end = convertdateformat(lastDay);
			var user_id = '{{ Auth::user()->user_id }}';
			// var start = $('#from-date').val();
			// var end = $('#to-date').val();
			data = {
				start : start,
				end : end,
			}


			$.ajax({
				url: "/kiosk/attendance_logs/"+ user_id +"?page="+page,
				data: data,
				beforeSend: function(){
					 $('#spinner').show();
				},
				success: function(data){
					$('#my-attendance').html(data);
					 $('#spinner').hide();
				}
			});
		}

		function convertdateformat(date){
			year = date.getFullYear();
			month = date.getMonth()+1;
			dt = date.getDate();

			if (dt < 10) {
			  dt = '0' + dt;
			}
			if (month < 10) {
			  month = '0' + month;
			}

			return year+'-' + month + '-'+dt;
		}

		$(document).on('click', '#attendance_pagination a', function(event){
			event.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			loadAttendance(page);
		});

		$('#refreshAttendance').on('click', function(e){
			e.preventDefault();
			var employee = '{{ Auth::user()->user_id }}';
	      	$.ajax({
				type: 'POST',
				url: '/attendance/update/' + employee,
				beforeSend: function(){
					$("#refreshAttendance").text("Updating...");
					 $('#spinner').show();
				},
				success: function(response){
					loadAttendance();
				},
				complete: function(){
					$("#refreshAttendance").html("<i class=\"fa fa-refresh fa-lg\"></i>");
					 $('#spinner').hide();
				}
			});
		});
	});
</script>
<script type="text/javascript">
  function spinnerfuction(){
    $('#spinner').show();
  }

</script>


@endsection


