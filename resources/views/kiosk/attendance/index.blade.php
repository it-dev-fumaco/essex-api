@extends('kiosk.app')
@section('content')
<div class="col-md-12 slideInLeft">
   <div class="card mt-3" style="height: 80vh;">
      <div class="card-header h3 text-center">
        <span class="align-middle">Attendance</span>
         <div class="pull-left">
             <a href="/kiosk/home">
                 <img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
             </a>
         </div>
         <div class="pull-right">
            <a href="/kiosk/home">
               <img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
            </a>
         </div>
      </div>

       @if(session("message"))
        <div class='alert alert-success alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <center>{!! session("message") !!}</center>
       </div>
        @endif

    <div class="card-body text-center">
      <h5 class="card-title mt-5">Select Transaction</h5>
      <a href="/kiosk/attendance/view" class="btn btn-primary btn-lg redirect">
      	<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>Attendance Logs
      </a>
      <a href="/kiosk/attendance/summary" class="btn btn-primary btn-lg redirect" onclick="spinner_show()">
      	<i class="fa fa-eye mr-1" aria-hidden="true"></i>View Attendance Summary
      </a>

      
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
<script>
  $(document).ready(function(){
    console.log('ready');
     $('#spinner').hide();


    

  });
  function spinner_show(date){
      $('#spinner').show();
    }
</script>
@endsection

