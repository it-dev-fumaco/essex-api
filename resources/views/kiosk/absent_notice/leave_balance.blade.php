@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-3 mb-2 slideInLeft">
   <a href="/kiosk/notice" class="btn btn-primary redirect"><i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Back</a>
   {{-- <a href="/kiosk/home" class="btn btn-primary"><i class="fa fa-home mr-1" aria-hidden="true"></i>Home</a> --}}
</div>
<div class="col-md-6 mb-2 mt-3 slideInLeft">
   <h3 class="text-center font-weight-bold">Leave Balances</h3>
</div>
<div class="col-md-11 mt-3 slideInLeft">
   <div class="row justify-content-center">
      <div class="col-md-1"></div>
      <div class="col-md-2 flipInY">
         <!-- Card -->
         <div class="card">
            <!-- Card image -->
            <div class="view overlay text-center text-white blue-gradient">
               <img src="{{ asset('storage/kiosk/vacation.png') }}" class="rounded mx-auto d-block w-25 mt-3" width="60">
               <h6 class="mb-3 mt-2">Vacation Leave</h6>
            </div>
            <!-- Card content -->
            <div class="card-body text-center">
               <!-- Title -->
               <h3 class="card-title">@forelse($vacation as $leave_type)
                  {{ $leave_type->remaining }}/<small class="grey-text">5</small></h3>
                   @empty
                      0/<small class="grey-text">0</small></h3>
              @endforelse
               <!-- Text -->
               <h6>Currently Available</h6>
            </div>
         </div>
         <!-- Card -->
      </div>
      <div class="col-md-2 flipInY">
         <!-- Card -->
         <div class="card">
            <!-- Card image -->
            <div class="view overlay text-center text-white purple-gradient">
               <img src="{{ asset('storage/kiosk/sick.png') }}" class="rounded mx-auto d-block w-25 mt-3" width="60">
               <h6 class="mb-3 mt-2">Sick Leave</h6>
            </div>
            <!-- Card content -->
            <div class="card-body text-center">
               <!-- Title -->
               <h3 class="card-title">@forelse($sick as $leave_type)
                  {{ $leave_type->remaining }}/<small class="grey-text">5</small></h3>
                   @empty
                      0/<small class="grey-text">0</small></h3>
              @endforelse
               <!-- Text -->
               <h6>Currently Available</h6>
            </div>
         </div>
         <!-- Card -->
      </div>
      @if($gender == 'Female')
      <div class="col-md-2 flipInY">
         <!-- Card -->
         <div class="card">
            <!-- Card image -->
            <div class="view overlay text-center text-white aqua-gradient">
               <img src="{{ asset('storage/kiosk/maternity.png') }}" class="rounded mx-auto d-block w-25 mt-3" width="60">
               <h6 class="mb-3 mt-2">Maternity Leave</h6>
            </div>
            <!-- Card content -->
            <div class="card-body text-center">
               <!-- Title -->
               <h3 class="card-title">0/<small class="grey-text">0</small></h3>
               <!-- Text -->
               <h6>Currently Available</h6>
            </div>
         </div>
         <!-- Card -->

      </div> 
      @elseif($gender == 'Male')
      <div class="col-md-2 flipInY">
         <!-- Card -->
         <div class="card">
            <!-- Card image -->
            <div class="view overlay text-center text-white peach-gradient">
               <img src="{{ asset('storage/kiosk/paternity.png') }}" class="rounded mx-auto d-block w-25 mt-3" width="60">
               <h6 class="mb-3 mt-2">Paternity Leave</h6>
            </div>
            <!-- Card content -->
            <div class="card-body text-center">
               <!-- Title -->
               <h3 class="card-title">0/<small class="grey-text">0</small></h3>
               <!-- Text -->
               <h6>Currently Available</h6>
            </div>
         </div>
         <!-- Card -->
      </div>
      @endif
      <div class="col-md-2 flipInY">
         <!-- Card -->
         <div class="card">
            <!-- Card image -->
            <div class="view overlay text-center text-white aqua-gradient">
               <img src="{{ asset('storage/kiosk/solo_parent.png') }}" class="rounded mx-auto d-block w-25 mt-3" width="60">
               <h6 class="mb-3 mt-2">Solo Parent Leave</h6>
            </div>
            <!-- Card content -->
            <div class="card-body text-center">
               <!-- Title -->
               <h3 class="card-title">0/<small class="grey-text">0</small></h3>
               <!-- Text -->
               <h6>Currently Available</h6>
            </div>
         </div>
         <!-- Card -->
      </div>
   </div>
</div>



<style type="text/css">
    .flipInY {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInY;
  animation-name: flipInY;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  animation-delay: 0.4s;
  }
  @-webkit-keyframes flipInY {
  0% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
  transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
  -webkit-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  opacity: 0;
  }
  40% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
  transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
  -webkit-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  }
  60% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
  transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
  opacity: 1;
  }
  80% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }
  100% {
  -webkit-transform: perspective(400px);
  transform: perspective(400px);
  }
  }
  @keyframes flipInY {
  0% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
  transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
  -webkit-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  opacity: 0;
  }
  40% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
  transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
  -webkit-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  }
  60% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
  transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
  opacity: 1;
  }
  80% {
  -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }
  100% {
  -webkit-transform: perspective(400px);
  transform: perspective(400px);
  }
  }
</style>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection