@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
<div class="card mt-3" style="height: 80vh;">
  <div class="card-header h3 text-center">
    <span class="align-middle">Information</span>
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
  <div class="card-body text-left">
    <a href="#" onclick="stepper_function()" class="btn btn-primary btn-lg redirect">
    	<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>File Absent Notice
    </a>
    <a href="/kiosk/notice/history" class="btn btn-primary btn-lg redirect">
    	<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>File Gatepass
    </a>
    <a href="/kiosk/notice/leave_balance" class="btn btn-primary btn-lg redirect">
      <i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>File Itinerary
    </a>

    
  </div>
<!-- Horizontal Steppers -->
<div class="row">
  <div class="col-md-12">

    <!-- Stepers Wrapper -->
    <ul class="stepper stepper-horizontal">

      <!-- First Step -->
      <li class="completed">
        <a href="#!">
          <span class="circle">1</span>
          <span class="label">First step</span>
        </a>
        HI
      </li>

      <!-- Second Step -->
      <li class="active">
        <a href="#!">
          <span class="circle">2</span>
          <span class="label">Second step</span>
        </a>
      </li>

      <!-- Third Step -->
      <li class="warning">
        <a href="#!">
          <span class="circle"><i class="fa fa-exclamation"></i></span>
          <span class="label">Third step</span>
        </a>
      </li>

    </ul>
    <!-- /.Stepers Wrapper -->

  </div>
</div>
<!-- /.Horizontal Steppers -->


</div>
@endsection
@section('script')
<!-- Stepper CSS -->
<link href="css/addons-pro/steppers.css" rel="stylesheet">
<!-- Stepper CSS - minified-->
<link href="css/addons-pro/steppers.min.css" rel="stylesheet">

<!-- Stepper JavaScript -->
<script type="text/javascript" src="js/addons-pro/stepper.js"></script>
<!-- Stepper JavaScript - minified -->
<script type="text/javascript" src="js/addons-pro/stepper.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
$('.stepper').mdbStepper();
})

</script>



@endsection
