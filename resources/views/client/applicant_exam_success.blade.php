<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="author" content="EstateX">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>ESSEX v4.2</title>
<link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/line-icons/line-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/owl.carousel.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/owl.theme.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/settings.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/nivo-lightbox.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/slicknav.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/bootstrap-select.min.css') }}">
</head>

<style type="text/css">
	*{
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	}

  select{
    height: 30px;
  }

/* The container */
.radio_container {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 8px;
    cursor: pointer;
    font-size: 13px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.radio_container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 1px;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #ddd;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.radio_container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.radio_container input:checked ~ .checkmark {
    background-color: #50B200;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio_container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio_container .checkmark:after {
  top: 4px;
  left: 4px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}



  .progress1{
  position: relative;
  margin: 4px;
  float:left;
  text-align: center;
}
.barOverflow1{ /* Wraps the rotating .bar */
  position: relative;
  overflow: hidden; /* Comment this line to understand the trick */
  width: 120px; height: 60px; /* Half circle (overflow) */
  margin-bottom: -25px; /* bring the numbers up */
}
.bar1{
  position: absolute;
  top: 0; left: 0;
  width: 120px; height: 120px; /* full circle! */
  border-radius: 50%;
  box-sizing: border-box;
  border: 18px solid #eee;     /* half gray, */
  border-bottom-color: #f39c12;  /* half azure */
  border-right-color: #f39c12;
}

  .hover-image img {
  -webkit-transform: scale(1);
  transform: scale(1);
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
  cursor: pointer;
}
.hover-image:hover img {
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
cursor: pointer;
}


 .hover-icon i{
  -webkit-transform: scale(1);
  transform: scale(1);
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
  cursor: pointer;
}
.hover-icon:hover i{
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
cursor: pointer;
}


.calendar, .calendar_weekdays, .calendar_content {
    max-width: 300px;
}
.calendar {
    margin: auto;
    font-family:'Muli', sans-serif;
    font-weight: 400;
}
.calendar_content, .calendar_weekdays, .calendar_header {
    position: relative;
    overflow: hidden;
}
.calendar_weekdays div {
    display:inline-block;
    vertical-align:top;
}
.calendar_weekdays div, .calendar_content div {
    width: 14.28571%;
    overflow: hidden;
    text-align: center;
    background-color: transparent;
    color: #6f6f6f;
    font-size: 14px;
}
.calendar_content div {
    border: 1px solid transparent;
    float: left;
}
.calendar_content div:hover {
    border: 1px solid #dcdcdc;
    cursor: default;
}
.calendar_content div.blank:hover {
    cursor: default;
    border: 1px solid transparent;
}
.calendar_content div.past-date {
    color: #d5d5d5;
}
.calendar_content div.today {
    font-weight: bold;
    font-size: 14px;
    color: #87b633;
    border: 1px solid #dcdcdc;
}
.calendar_content div.selected {
    background-color: #f0f0f0;
}
.calendar_header {
    width: 100%;
    text-align: center;
}
.calendar_header h2 {
    padding: 0 10px;
    font-family:'Muli', sans-serif;
    font-weight: 300;
    font-size: 18px;
    color: #87b633;
    float:left;
    width:70%;
    margin: 0 0 10px;
}
button.switch-month {
    background-color: transparent;
    padding: 0;
    outline: none;
    border: none;
    color: #dcdcdc;
    float: left;
    width:15%;
    transition: color .2s;
}
button.switch-month:hover {
    color: #87b633;
}
</style>


<body>
  <div class="header">
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-6">
            <ul class="contact-details">
              <li>
                <a href="#">
                  <i class="icon-location-pin"></i>35 Pleasant View Drive, Bagbaguin, Caloocan City
                </a>
              </li>
            </ul>
          </div>
          {{--<div class="col-md-5 col-sm-6">
            <div class="account-setting">
              <a href="{{ url('/userLogout') }}">
                <i class="icon-logout"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>--}}
        </div>
      </div>
    </div>

    <div class="top-bar-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-6">
            <div class="header-logo">
              <a href="/">
                <img src="{{ asset('storage/img/logo5.png') }}" alt="">
              </a>
            </div>
            <div class="name-title">FUMACO Inc. <br> The Art of Science & Lighting</div>
          </div>
          <div class="col-md-7 col-sm-6">
            <div class="pull-right">
              <div class="row" style="padding: 3px;">
                <div style="float: left; margin-right: 5px;">
                  <img src="{{ asset('storage/img/user.png') }}" width="60" height="60">
                </div>
                <div style="float: right; margin-top: 8px;">
                  <span style="display: block;">
                    <h4>Applicant</h4>
                   {{--<h4>{{ Auth::user()->employee_name }}</h4> 
                  </span>
                  @if($designation)
                  <span style="display: block;">{{ $designation }} | {{ $department }}</span>
                  @endif
                  <a href="#" data-toggle="modal" data-target="#changePassword"><i class="fa fa-cog" aria-hidden="true" title="Update Password"></i> Update Password</a>
                  @include('client.modals.change_password') --}}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="main-container section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="columns-wrapper">
          <div class="col-md-12" style="margin:auto; height: 23em">
    <h3 class="h3" style="text-align: center">Thank you! Your examination has been successfully submitted!</h3>
    <table class="table">
      <tr>
        <td style="text-align: right">Examination:</td><td>{{$examinee->exam_title}}</td>
        <td style="text-align: right">Examination Date:</td><td>{{date('F, l d, Y',strtotime($examinee->date_taken))}}</td>
      </tr>
      <tr>
        <td style="text-align: right">Examinee:</td><td>{{$examinee->employee_name}}</td>
        <td style="text-align: right">Start Time:</td><td>{{date('h:i:s A',strtotime($examinee->start_time))}}</td>
      </tr>
      <tr>
        <td style="text-align: right">Time Spent:</td><td>{{$time_spent}}</td>
        <td style="text-align: right">End Time</td><td>{{date('h:i:s A',strtotime($examinee->end_time))}}</td>
      </tr>
    </table>
    <a href="/applicant" class="btn btn-success" style="margin: auto">Go to Homepage</a>
  </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="site-info text-center">
          <p>&copy; All rights reserved 2017</p>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top">
  <i class="icon-arrow-up"></i>
</a>

<div id="loader">
  <div class="sk-folding-cube">
    <div class="sk-cube1 sk-cube"></div>
    <div class="sk-cube2 sk-cube"></div>
    <div class="sk-cube4 sk-cube"></div>
    <div class="sk-cube3 sk-cube"></div>
  </div>
</div>

<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('css/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/wow.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/nivo-lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/contact-form-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.slicknav.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.bootstrap-growl.js') }}"></script>
<script src="{{ asset('css/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('css/js/jQuery-plugin-progressbar.js') }}"></script>
<script src="{{ asset('css/js/calendar.js') }}"></script>
<script type = "text/javascript" src = "{{ asset('css/js/jquery-ui.min.js') }}"></script>


<script type="text/javascript">
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
          window.history.pushState(null, "", window.location.href);
      };
  });
</script>

</body>
</html>