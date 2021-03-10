@extends('kiosk.app')
@section('metawebapp')
	<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3">
		<div class="card-header h3 text-center">
			<span class="align-middle">Itinerary History</span>
			<div class="pull-left">
				<a href="/kiosk/itinerary">
					<img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
				</a>
			</div>
			<div class="pull-right">
				<a href="#" id="reload">
					<img src="{{ asset('storage/refresh.png') }}"  width="40" height="40"/>
				</a>
				<a href="/kiosk/home">
					<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
				</a>
			</div>
		</div>
		<div class="card-body h-100">
			<div class="row">
				<div class="col-md-4">
					<div class="form-row mb-4" id="filters">
						<div class="col">
							<label for="month-select" class="col-form-label">Month</label>
							<select class="browser-default custom-select" id="month-select">
								<option value="01" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
								<option value="02" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
								<option value="03" {{ date('m') == 3 ? 'selected' : '' }}>March</option>
								<option value="04" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
								<option value="05" {{ date('m') == 5 ? 'selected' : '' }}>May</option>
								<option value="06" {{ date('m') == 6 ? 'selected' : '' }}>June</option>
								<option value="07" {{ date('m') == 7 ? 'selected' : '' }}>July</option>
								<option value="08" {{ date('m') == 8 ? 'selected' : '' }}>August</option>
								<option value="09" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
								<option value="10" {{ date('m') == 10 ? 'selected' : '' }}>October</option>
								<option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
								<option value="12" {{ date('m') == 12 ? 'selected' : '' }}>December</option>
							</select>
						</div>
						<div class="col">
							<label for="year-select" class="col-form-label">Year</label>
							<select class="browser-default custom-select" id="year-select">
								<option value="2019" {{ date('y') == 19 ? 'selected' : '' }}>2019</option>
								<option value="2020" {{ date('y') == 20 ? 'selected' : '' }}>2020</option>
								<option value="2021" {{ date('y') == 21 ? 'selected' : '' }}>2021</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="table-responsive" id="itinerary_history_table"></div>
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
<script type="text/javascript">
	$(document).ready(function(){
		loaditineraryhistory();
		$('#spinner').hide();
		$('#filters .custom-select').change(function(){
			loaditineraryhistory();
		});

		$('#reload').click(function(){
			loaditineraryhistory();
		});

		function loaditineraryhistory(){
			var month = $('#month-select').val();
			var year = $('#year-select').val();
			data = {
				month : month,
				year : year
			}

			$.ajax({
				url: "/kiosk/notice/get_Itinerary_table",
				type: 'GET',
				data: data,
				beforeSend: function(){
					 $('#spinner').show();
				},
				success: function(data){
					$('#itinerary_history_table').html(data);
					$('#spinner').hide();
				}
			});
		}
	});
</script>
@endsection