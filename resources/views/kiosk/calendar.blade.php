@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12">
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-4">
        <a href="/kiosk/home" class="btn btn-primary redirect"><i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Back</a>
      </div>
      <div class="col-md-4">
        <h2 class="mt-3 text-center">Leave Calendar</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body text-center">
        <div id="calendar"></div>
      </div></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.css') }}" />
<script src="{{ asset('css/calendar/moment.min.js') }}"></script>
<script src="{{ asset('css/calendar/fullcalendar.min.js') }}"></script>
<script>
   $(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
         header:{
            left:'prevYear nextYear',
            center:'title',
            right:'today prev,next'
         },
         eventSources: [
            '/holidays',
            '/bday',
            '/calendar/fetch'
         ],

         selectable:true,
         selectHelper:true,
      });
   });        
</script>
@endsection