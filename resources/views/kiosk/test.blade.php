{{-- <div id="time-range">
    <p>Time Range: <span class="slider-time">9:00 AM</span> - <span class="slider-time2">5:00 PM</span>

    </p>
    <div class="sliders_step1">
        <div id="slider-range"></div>
    </div>
</div>

<style type="text/css">
	#time-range p {
    font-family:"Arial", sans-serif;
    font-size:14px;
    color:#333;
}
.ui-slider-horizontal {
    height: 8px;
    background: #D7D7D7;
    border: 1px solid #BABABA;
    box-shadow: 0 1px 0 #FFF, 0 1px 0 #CFCFCF inset;
    clear: both;
    margin: 8px 0;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    -ms-border-radius: 6px;
    -o-border-radius: 6px;
    border-radius: 6px;
}
.ui-slider {
    position: relative;
    text-align: left;
}
.ui-slider-horizontal .ui-slider-range {
    top: -1px;
    height: 100%;
}
.ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    height: 8px;
    font-size: .7em;
    display: block;
    border: 1px solid #5BA8E1;
    box-shadow: 0 1px 0 #AAD6F6 inset;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -khtml-border-radius: 6px;
    border-radius: 6px;
    background: #81B8F3;
    background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
    background-size: 100%;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #A0D4F5), color-stop(100%, #81B8F3));
    background-image: -webkit-linear-gradient(top, #A0D4F5, #81B8F3);
    background-image: -moz-linear-gradient(top, #A0D4F5, #81B8F3);
    background-image: -o-linear-gradient(top, #A0D4F5, #81B8F3);
    background-image: linear-gradient(top, #A0D4F5, #81B8F3);
}
.ui-slider .ui-slider-handle {
    border-radius: 50%;
    background: #F9FBFA;
    background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
    background-size: 100%;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #C7CED6), color-stop(100%, #F9FBFA));
    background-image: -webkit-linear-gradient(top, #C7CED6, #F9FBFA);
    background-image: -moz-linear-gradient(top, #C7CED6, #F9FBFA);
    background-image: -o-linear-gradient(top, #C7CED6, #F9FBFA);
    background-image: linear-gradient(top, #C7CED6, #F9FBFA);
    width: 22px;
    height: 22px;
    -webkit-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
    -moz-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
    box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
    -webkit-transition: box-shadow .3s;
    -moz-transition: box-shadow .3s;
    -o-transition: box-shadow .3s;
    transition: box-shadow .3s;
}
.ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 22px;
    height: 22px;
    cursor: default;
    border: none;
    cursor: pointer;
}
.ui-slider .ui-slider-handle:after {
    content:"";
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    top: 50%;
    margin-top: -4px;
    left: 50%;
    margin-left: -4px;
    background: #30A2D2;
    -webkit-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
    -moz-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 white;
    box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
}
.ui-slider-horizontal .ui-slider-handle {
    top: -.5em;
    margin-left: -.6em;
}
.ui-slider a:focus {
    outline:none;
}

#slider-range {
  width: 90%;
  margin: 0 auto;
}
#time-range {
  width: 400px;
}
</style>

 <script type="text/javascript" src="{{ asset('kiosk/js/jquery-3.4.1.min.js') }}"></script>
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
	$("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 30,
    values: [540, 1020],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

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
</script> --}}
{{-- 

<input type="hidden" id="demo-3_1"/>
<input type="hidden" id="demo-3_2"/>
<link rel="stylesheet" type="text/css" href="{{ asset('kiosk/lightpick/css/lightpick.css') }}">
...
<script type="text/javascript" src="{{ asset('kiosk/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('kiosk/lightpick/moment.min.js') }}"></script>
<script src="{{ asset('kiosk/lightpick/lightpick.js') }}"></script>
<script src="{{ asset('css/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{asset('kiosk/js/jquery.ui.touch-punch.min.js') }}"></script>
<script>
    var picker = new Lightpick({
    field: document.getElementById('demo-3_1'),
    secondField: document.getElementById('demo-3_2'),
    singleDate: false,
    inline: true,
    format: 'YYYY-MM-DD',
    numberOfColumns: 2,
    numberOfMonths: 2,
    hoveringTooltip: false,
    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        // document.getElementById('result-3').innerHTML = str;
    }
});
</script> 


<fieldset>
	<legend>Is this toggle switch awesome?</legend>
	<div class="toggle">
		<input type="radio" name="sizeBy" value="weight" id="sizeWeight" checked="checked" />
		<label for="sizeWeight">It's pretty, pretty, pretty, pretty good</label>
		<input type="radio" name="sizeBy" value="dimensions" id="sizeDimensions" />
		<label for="sizeDimensions">100% yes</label>
	</div>
	<p class="status">Toggle is <span>auto width</span><span>full width</span>.</p>
</fieldset>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600");
/* VARS */
/* MIXINS */
/* STYLE THE HTML ELEMENTS (INCLUDES RESETS FOR THE DEFAULT FIELDSET AND LEGEND STYLES) */
body, html {
  margin: 0;
  padding: 1rem;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  font-size: 16px;
  font-family: "Open Sans", "Helvetica", sans-serif;
  -webkit-font-smoothing: antialiased;
  background-color: #EEE;
}

fieldset {
  margin: 0;
  padding: 2rem;
  box-sizing: border-box;
  display: block;
  border: none;
  border: solid 1px #CCC;
  min-width: 0;
  background-color: #FFF;
}
fieldset legend {
  margin: 0 0 1.5rem;
  padding: 0;
  width: 100%;
  float: left;
  display: table;
  font-size: 1.5rem;
  line-height: 140%;
  font-weight: 600;
  color: #333;
}
fieldset legend + * {
  clear: both;
}

body:not(:-moz-handler-blocked) fieldset {
  display: table-cell;
}

/* TOGGLE STYLING */
.toggle {
  margin: 0 0 1.5rem;
  box-sizing: border-box;
  font-size: 0;
  display: flex;
  flex-flow: row nowrap;
  justify-content: flex-start;
  align-items: stretch;
}
.toggle input {
  width: 0;
  height: 0;
  position: absolute;
  left: -9999px;
}
.toggle input + label {
  margin: 0;
  padding: .75rem 2rem;
  box-sizing: border-box;
  position: relative;
  display: inline-block;
  border: solid 1px #DDD;
  background-color: #FFF;
  font-size: 1rem;
  line-height: 140%;
  font-weight: 600;
  text-align: center;
  box-shadow: 0 0 0 rgba(255, 255, 255, 0);
  transition: border-color .15s ease-out,  color .25s ease-out,  background-color .15s ease-out, box-shadow .15s ease-out;
  /* ADD THESE PROPERTIES TO SWITCH FROM AUTO WIDTH TO FULL WIDTH */
  /*flex: 0 0 50%; display: flex; justify-content: center; align-items: center;*/
  /* ----- */
}
.toggle input + label:first-of-type {
  border-radius: 6px 0 0 6px;
  border-right: none;
}
.toggle input + label:last-of-type {
  border-radius: 0 6px 6px 0;
  border-left: none;
}
.toggle input:hover + label {
  border-color: #213140;
}
.toggle input:checked + label {
  background-color: #4B9DEA;
  color: #FFF;
  box-shadow: 0 0 10px rgba(102, 179, 251, 0.5);
  border-color: #4B9DEA;
  z-index: 1;
}
.toggle input:focus + label {
  outline: dotted 1px #CCC;
  outline-offset: .45rem;
}
@media (max-width: 800px) {
  .toggle input + label {
    padding: .75rem .25rem;
    flex: 0 0 50%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}

/* STYLING FOR THE STATUS HELPER TEXT FOR THE DEMO */
.status {
  margin: 0;
  font-size: 1rem;
  font-weight: 400;
}
.status span {
  font-weight: 600;
  color: #B6985A;
}
.status span:first-of-type {
  display: inline;
}
.status span:last-of-type {
  display: none;
}
@media (max-width: 800px) {
  .status span:first-of-type {
    display: none;
  }
  .status span:last-of-type {
    display: inline;
  }
}

</style> --}}

{{--  --}}

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <title>Essex Kiosk</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('kiosk/css/all.css') }}">
   <link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}" type="text/css">
   <!-- Bootstrap core CSS -->
   <link href="{{ asset('kiosk/css/bootstrap.min.css') }}" rel="stylesheet">
   <!-- Material Design Bootstrap -->
   <link href="{{ asset('kiosk/css/mdb.min.css') }}" rel="stylesheet">
   <!-- Your custom styles (optional) -->
   <link href="{{ asset('kiosk/css/style.css') }}" rel="stylesheet">
</head>

<body class="inactive-screensaver"> 


   <div class="arrow"></div>

   <!-- Start your project here-->
   <main>
      <div class="container">
         <div class="row mt-5">
            <div class="col-md-12 text-center mt-5">
               <div class="clock text-white">
                  <div id="Date" class="h2-responsive"></div>
                  <ul>
                     <li id="hours">00</li>
                     <li id="point">:</li>
                     <li id="min">00</li>
                     <li id="point">:</li>
                     <li id="sec">00</li>
                  </ul>
               </div>
               <h1 class="display-2 text-white mt-5">ESSEX KIOSK DEMO</h1>
               @if(session("message"))
               <div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <center>{!! session("message") !!}</center>
               </div>
               @endif
               
               <h3 class="text-white mt-5 tap_here">Tap your card to login</h3>
               <form class="form" method="post" action="/kiosk/loguser">
                  @csrf
                  <input type="password" class="id-key" style="opacity: 0;" name="id_key" required>
                  <button type="submit" id="login-button" style="opacity: 0;">Login</button>
               </form>
            </div>
         </div>
      </div>

      <ul class="bubbles">
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
      </ul>
      <div class="text-center">
	      <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm" id="modalLoginBtn">Login using Access ID</a>
	   </div>
   </main>
   

   <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header text-center">
               <h4 class="modal-title w-100 font-weight-bold">Log in using Access ID</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" action="/kiosk/loguser">
               @csrf
            <div class="modal-body mx-3">
               <div class="md-form mb-5">
                  <input type="hidden" name="using_access_id" value="1">
                  <i class="fa fa-user prefix grey-text"></i>
                  <input type="text" name="access_id" id="access-id" class="form-control validate" required>
                  <label for="access-id">Your Access ID</label>
               </div>
               <div class="md-form mb-4">
                  <i class="fa fa-lock prefix grey-text"></i>
                  <input type="password" name="password" id="password" class="form-control validate" required>
                  <label for="password">Your password</label>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button type="submit" class="btn btn-default">Login</button>
            </div>
            </form>
         </div>
      </div>
   </div>
   <!-- /Start your project here-->
<div id="slideshow">
   <div class="crossfade">
      <figure></figure>
      <figure></figure>
      <figure></figure>
      <figure></figure>
      <figure></figure>
    </div>
</div>



     <style type="text/css">

     	#slideshow{
     		display: none;
     	}
    * {
  padding: 0;
  margin: 0;
}

.active-screensaver{
	background-color: #BFC9CA;
	overflow: hidden;
}

.inactive-screensaver{
	background: #50a3a2;
     background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%) no-repeat center center fixed;
      -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
}


.crossfade > figure {
  animation: imageAnimation 30s linear infinite 0s;
  backface-visibility: hidden;
  background-size: cover;
  background-position: center center;
  color: transparent;
  height: 100%;
  left: 0px;
  opacity: 0;
  position: absolute;
  top: 0px;
  width: 100%;
  z-index: 6;
}

.crossfade > figure:nth-child(1) {
  background-image: url('{{ asset('storage/img/slider/achievement.jpg') }}');
}
.crossfade > figure:nth-child(2) {
  animation-delay: 6s;
  background-image: url('{{ asset('storage/img/slider/teamwork.jpg') }}');
}
.crossfade > figure:nth-child(3) {
  animation-delay: 12s;
  background-image: url('{{ asset('storage/img/slider/businessman.jpg') }}');
}
.crossfade > figure:nth-child(4) {
  animation-delay: 18s;
  background-image: url('{{ asset('storage/img/slider/teamwork.jpg') }}');
}
.crossfade > figure:nth-child(5) {
  animation-delay: 24s;
  background-image: url('{{ asset('storage/img/slider/achievement.jpg') }}');
}

@keyframes imageAnimation {
  0% {
    animation-timing-function: ease-in;
    opacity: 0;
  }
  8% {
    animation-timing-function: ease-out;
    opacity: 1;
  }
  17% {
    opacity: 1
  }
  25% {
    opacity: 0
  }
  100% {
    opacity: 0
  }
}

  </style>

   

   <!-- SCRIPTS -->
   <!-- JQuery -->
   <script type="text/javascript" src="{{ asset('kiosk/js/jquery-3.4.1.min.js') }}"></script>
   <!-- Bootstrap tooltips -->
   <script type="text/javascript" src="{{ asset('kiosk/js/popper.min.js') }}"></script>
   <!-- Bootstrap core JavaScript -->
   <script type="text/javascript" src="{{ asset('kiosk/js/bootstrap.min.js') }}"></script>
   <!-- MDB core JavaScript -->
   <script type="text/javascript" src="{{ asset('kiosk/js/mdb.min.js') }}"></script>
   <script type="text/javascript" src="{{asset('kiosk/js/jquery.ui.touch-punch.min.js') }}"></script>

   <script>
    $(document).ready(function() {
      var mousetimeout;
      var screensaver_active = false;
      var idletime = 5;

      function show_screensaver(){
      	$('main').fadeOut();
      	$('.arrow').fadeOut();
        $('#slideshow').fadeIn();
        $('body').removeClass('inactive-screensaver').addClass('active-screensaver');
         screensaver_active = true;
      }

      function stop_screensaver(){
      	$('main').fadeIn();
      	$('.arrow').fadeIn();
         $('#slideshow').fadeOut();
         $('body').removeClass('active-screensaver').addClass('inactive-screensaver');
         screensaver_active = false;
      }

      $(document).click(function(){
         clearTimeout(mousetimeout);
  
         if (screensaver_active) {
            stop_screensaver();
         }

         mousetimeout = setTimeout(function(){
            show_screensaver();
         }, 500 * idletime); // 5 secs     
      });

      $(document).mousemove(function(){
         clearTimeout(mousetimeout); 

         mousetimeout = setTimeout(function(){
            show_screensaver();
         }, 1000 * idletime); // 5 secs      
      });
   });


      $(document).ready(function() {
         $('main').click(function(){
            console.log('c');
            $('.form .id-key').focus();
         });

         $("input").focus();
        
      // Create two variables with names of months and days of the week in the array
      var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
      var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

      // Create an object newDate()
      var newDate = new Date();
      // Retrieve the current date from the Date object
      newDate.setDate(newDate.getDate());
      // At the output of the day, date, month and year    
      $('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

      setInterval( function() {
          // Create an object newDate () and extract the second of the current time
          var seconds = new Date().getSeconds();
          // Add a leading zero to the value of seconds
          $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
          },1000);
          
      setInterval( function() {
          // Create an object newDate () and extract the minutes of the current time
          var minutes = new Date().getMinutes();
          // Add a leading zero to the minutes
          $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
          },1000);
          
      setInterval( function() {
          // Create an object newDate () and extract the clock from the current time
          var hours = new Date().getHours();
          // Add a leading zero to the value of hours
          $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
          }, 1000);
          
      }); 
   </script>
</body>

<style type="text/css">
   #modalLoginBtn{
      position: absolute;
      bottom: 5%;
      right: 5%;
   }

   :not(input):not(textarea) {
      user-select: none; /* supported by Chrome and Opera */
      -webkit-user-select: none; /* Safari */
      -khtml-user-select: none; /* Konqueror HTML */
      -moz-user-select: none; /* Firefox */
      -ms-user-select: none; /* Internet Explorer/Edge */
   }

   .arrow,
   .arrow:before {
      position: absolute;
      left: 50%;
   }

   .arrow {
      width: 80px;
      height: 80px;
      top: 75%;
      bottom: 0;
      margin: -20px 0 0 -20px;
      -webkit-transform: rotate(45deg);
      border-left: none;
      border-top: none;
      border-right: 8px #fff solid;
      border-bottom: 8px #fff solid;
      z-index: 3;
   }

   .arrow:before {
      content: "";
      width: 40px;
      height: 40px;
      top: 50%;
      margin: -10px 0 0 -10px;
      border-left: none;
      border-top: none;
      border-right: 8px #fff solid;
      border-bottom: 8px #fff solid;
      animation-duration: 1.5s;
      animation-iteration-count: infinite;
      animation-name: arrow;
   }

   @keyframes arrow {
      0% {
         opacity: 1;
      }
      100% {
         opacity: 0;
         transform: translate(-10px, -10px);
      }
   }

 /*  body{
      background: #50a3a2;
      background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%) no-repeat center center fixed;
      -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
   }
*/

   form input {
     -webkit-appearance: none;
        -moz-appearance: none;
             appearance: none;
     outline: 0;
     border: 1px solid rgba(255, 255, 255, 0.4);
     background-color: rgba(255, 255, 255, 0.2);
     width: 300px;
     border-radius: 3px;
     padding: 10px 15px;
     margin: 0 auto 10px auto;
     display: block;
     text-align: center;
     font-size: 18px;
     color: white;
     transition-duration: 0.25s;
     font-weight: 300;
   }
   form input:hover {
     background-color: rgba(255, 255, 255, 0.4);
   }
   form input:focus {
     background-color: white;
     width: 300px;
     color: #53e3a6;
   }
   form button {
     -webkit-appearance: none;
        -moz-appearance: none;
             appearance: none;
     outline: 0;
     background-color: white;
     border: 0;
     padding: 10px 15px;
     color: #53e3a6;
     border-radius: 3px;
     width: 300px;
     cursor: pointer;
     font-size: 18px;
     transition-duration: 0.25s;
   }
   form button:hover {
     background-color: #f5f7f9;
   }

   ul {
     /*width:800px;*/
     margin:0 auto;
     padding:0px;
     list-style:none;
     text-align:center;
   }

   ul li {
     display:inline;
     font-size:5em;
     text-align:center;
     font-family:Arial, Helvetica, sans-serif;
   }


   .bubbles {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     z-index: -1;
     transform: translateZ(0);
     overflow: hidden;
   }

   .bubbles li {
     position: absolute;
     list-style: none;
     background-color: rgba(255,255,255,0.15);
     bottom: -100px;
     animation: square 15s infinite;
     transition-timing-function: linear;
   }

   .bubbles li:nth-child(1) {
     width: 40px;
     height: 40px;
     left: 20%;
   }

   .bubbles li:nth-child(2) {
     width: 60px;
     height: 60px;
     left: 40%;
     animation-delay: 2s;
     animation-duration: 17s;
   }

   .bubbles li:nth-child(3) {
     width: 10px;
     height: 10px;
     left: 60%;
     animation-delay: 4s;
     animation-duration: 13s;
   }

   .bubbles li:nth-child(4) {
     width: 80px;
     height: 80px;
     left: 80%;
     animation-delay: 1s;
     animation-duration: 22s;
   }

   .bubbles li:nth-child(5) {
     width: 50px;
     height: 50px;
     left: 50%;
     animation-delay: 7s;
     animation-duration: 12s;
   }

   .bubbles li:nth-child(6) {
     width: 40px;
     height: 40px;
     left: 20%;
   }

   .bubbles li:nth-child(7) {
     width: 60px;
     height: 60px;
     left: 40%;
     animation-delay: 2s;
     animation-duration: 17s;
   }

   .bubbles li:nth-child(8) {
     width: 10px;
     height: 10px;
     left: 60%;
     animation-delay: 4s;
     animation-duration: 13s;
   }

   .bubbles li:nth-child(9) {
     width: 80px;
     height: 80px;
     left: 80%;
     animation-delay: 1s;
     animation-duration: 22s;
   }

   .bubbles li:nth-child(10) {
     width: 50px;
     height: 50px;
     left: 50%;
     animation-delay: 7s;
     animation-duration: 12s;
   }

   .tap_here {
     animation: bounce 1s linear infinite;
   }

   @keyframes square {
     0%{
       transform: translateY(0);
       -webkit-transform: translateY(0);
     }
     100%{
       transform: translateY(-1080px) rotate(630deg);
       -webkit-transform: translateY(-1080px) rotate(630deg);
     }
   }

   @keyframes bounce {
     10% {
       transform: translateY(-10px);
       -webkit-transform: translateY(-10px)
     }
     70% {
       transform: translateY(0);
       -webkit-transform: translateY(0)
     }
   }
</style>

</html>