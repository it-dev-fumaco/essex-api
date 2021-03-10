<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="EstateX">
<title>ESSEX v3.0</title>
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
          <div class="col-md-5 col-sm-6">
            <div class="account-setting">
              <a href="{{ url('/admin/logout') }}">
                <i class="icon-logout"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="top-bar-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-6">
            <div class="header-logo">
              <a href="index.html">
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
                    <h4>{{ Auth::user()->name }}</h4>
                  </span>
                  <span style="display: block;">IT Specialist | Information Technology</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
{{--@include('exam.modal.exam_add')--}}
<div class="main-container section">
	<div class="container">
    <div class="col-md-12">
                     <a href="/admin"><h2 class="section-title center">Essex 3 Admin Panel</h2></a>
                  </div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
        <div class="inner-box featured">
          <h2 class="title-2">Examination Sheet List</h2>
          <h2 class="title-2" id="timer" name="timer"></h2>
          <h2 class="title-2" id="dur" name="dur"></h2>
          <h2 class="title-2" id="spent" name="spent"></h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addExam"><i class="fa fa-plus"></i> Add Exam</a><br><br></div>
          @if(session("message"))
            <div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <center>{{ session("message") }}</center>
            </div>
          @endif
          <div id="employee_list">
             @include('exam.table.testsheet_table')
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
<p>&copy; All rights reserved 2017 - Designed & Developed by <a href="http://uideck.com">UIdeck</a></p>
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
<script src="{{ asset('css/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('css/js/jQuery-plugin-progressbar.js') }}"></script>
<script src="{{ asset('css/js/calendar.js') }}"></script>

<script>
// // Set the date we're counting down to
// var countDownDate = new Date("Dec 12, 2018 14:46:25").getTime();

// // Update the count down every 1 second
// var x = setInterval(function() {

//   // Get todays date and time
//   var now = new Date().getTime();
    
//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;
    
//   // Time calculations for days, hours, minutes and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
//   // Output the result in an element with id="demo"
//   document.getElementById("timer").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
    
//   // If the count down is over, write some text 
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("timer").innerHTML = "EXPIRED";
//   }
// }, 1000);
  
  // var minuteLimit = 1;
  //   var sec = 0;
  //   var min = 0;
  //   var minDur = 1;
  //   var secDur = 60;
  // var time = setInterval(function(){
  //   if(sec < 59){
  //     if(sec == 0){
  //       if(minDur >= 1){
  //         minDur--;        
  //       }
  //     }
  //     sec++;
  //     secDur = 60 - sec;
  //   }
  //   else{
  //     min++;
  //     sec = 0;
  //     secDur = 60;
  //     if(minDur >= 1){
  //       minDur--;        
  //     }
  //   }
  //   var secDisp, minDisp, minDurDisp, secDurDisp;
  //   if(sec < 10){
  //     secDisp = '0' + sec;
  //   }
  //   else{
  //     secDisp = sec;
  //   }
  //   if(min < 10){
  //     minDisp = '0' + min;
  //   }
  //   else{
  //     minDisp = min;
  //   }
  //   if(minDur < 10){
  //     minDurDisp = '0' + minDur;
  //   }
  //   else{
  //     minDurDisp = minDur;
  //   }
  //   if(secDur < 10){
  //     secDurDisp = '0' + secDur;
  //   }
  //   else{
  //     secDurDisp = secDur;
  //   }
  //   document.getElementById('dur').innerHTML = "Duration: " + minDurDisp + ':' + secDurDisp;
  //   document.getElementById('spent').innerHTML = "Time Spent: " + minDisp + ':' + secDisp;
  //   if (minDur < 0) {
  //     clearInterval(time);
  //   }
  // },1000);

  
  // window.onbeforeunload = function() {
  //       return "Dude, are you sure you want to leave? Think of the kittens!";
  // }

    var rem_secs = max = 2 * 60;
    var rem_mins = rem_secs / 60;
    var minR = 0;
    var secR = 60;
    var minL = secL = 0;
    var timer = setInterval(function(){ 
      rem_secs--;
      rem_mins = rem_secs / 60;
      minR = parseInt(rem_mins);
      secR > 0 ? secR-- : secR = 59;

      var remSecDisp,remMinDisp;

      secR < 10 ? remSecDisp = '0' + secR : remSecDisp = secR;
      minR < 10 ? remMinDisp = '0' + minR : remMinDisp = minR;

      document.getElementById('dur').innerHTML = "Remaining Time: " + remMinDisp + ':' + remSecDisp;
      document.getElementById('viewDur').innerHTML = "Duration: " + remMinDisp + ':' + remSecDisp;

      secL++;
      if(secL == 60){
        minL++;
        secL = 0;
      }

      var lapSecDisp,lapMinDisp;

      secL < 10 ? lapSecDisp = '0' + secL : lapSecDisp = secL;
      minL < 10 ? lapMinDisp = '0' + minL : lapMinDisp = minL;

      document.getElementById('spent').innerHTML = "Lapsed Time: " + lapMinDisp + ':' + lapSecDisp;
      document.getElementById('viewSpent').innerHTML = "Time Spent: " + lapMinDisp + ':' + lapSecDisp;


      if(rem_secs == 0){
        clearInterval(timer);
      }
    },1000);
  

  // function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

  // $(document).ready(function(){
  //      $(document).on("keydown", disableF5);
  // });

  // function preventBack(){window.history.forward();}
  // setTimeout("preventBack()", 0);
  // window.onunload=function(){null};

</script>

</body>
</html>
