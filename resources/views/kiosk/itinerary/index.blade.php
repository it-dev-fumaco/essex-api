@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
<div class="card mt-3" style="height: 80vh;">
   <div class="card-header h3 text-center">
    <span class="align-middle">Itinerary</span>
        
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
  <div class="card-body text-center">
    <h5 class="card-title mt-5">Select Transaction</h5>
    <a href="/kiosk/itinerary/form" class="btn btn-primary btn-lg"><i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>Itinerary Request</a>
    <a href="/kiosk/itinerary/history" class="btn btn-primary btn-lg"><i class="fa fa-eye mr-1" aria-hidden="true"></i>View Itinerary History</a>
  </div>
</div>
</div>
@endsection