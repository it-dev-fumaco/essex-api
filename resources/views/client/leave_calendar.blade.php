@extends('client.app')
@section('content')
<div class="row">

  <div class="col-sm-12">
    <h2 class="section-title center" style="margin-top: -50px;">Leave Calendar</h2>
     @include('client.calendar.modals.addEvent')
      <div class="pull-left" style="padding: 5px; margin-top: -10px; float: left;">
      </div> 
      <br>
      @if( $designation == "Human Resources Head")
        <div class="pull-left" style="padding: 5px; margin-top: -10px; float: left;"> &nbsp;
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addquestion" style="float: left; z-index: 1;">
              <i class="fa fa-plus"></i> event
          </a>
      </div>
      @endif
      
      <div class="pull-right" style="padding: 5px; margin-top: -30px; float: right;"> &nbsp;
         <a href="#" onclick="printElem('calendar')">
              <div style="font-size: 30px"><i class="fa fa-print"></i></div>
         </a>
      </div>
      <br>
       <div class="col-md-12">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{!! session("message") !!}</center>
                     </div>
                     @endif
                  </div>
      <br>
    <div class="inner-box" id="div1" name="div1">
         <div id="calendar"></div>
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
  $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
         
         header:{
            left:'prev,next today myCustomButton',
            center:'title',
            right:'month,agendaWeek,agendaDay'
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
<script type="text/javascript">
  $('.printBtn').on('click', function (){
     window.print();
  });
</script>





<script type="text/javascript">
function printElem(div1) {
  var headerElements = document.getElementsByClassName('fc-header');//.style.display = 'none';
  for(var i = 0, length = headerElements.length; i < length; i++) {
    headerElements[i].style.display = 'none';
  }
  var toPrint = document.getElementById('div1').cloneNode(true);

  for(var i = 0, length = headerElements.length; i < length; i++) {
        headerElements[i].style.display = '';
  }

  var linkElements = document.getElementsByTagName('div1');
  var link = '';
  for(var i = 0, length = linkElements.length; i < length; i++) {
    link = link + linkElements[i].outerHTML;
  }

  var styleElements = document.getElementsByTagName('div1');
  var styles = '';
  for(var i = 0, length = styleElements.length; i < length; i++) {
    styles = styles + styleElements[i].innerHTML;
   }

 var popupWin = window.open('', '_blank',  'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
  popupWin.document.open();
  popupWin.document.write('<html><title></title>'+link
 +'<style>'+styles+'</style></head><body">')
  popupWin.document.write('<link href="{{ asset('css/calendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" />');
  popupWin.document.write('<link href="{{ asset('css/calendar/fullcalendar.print.css') }}" rel="stylesheet" type="text/css" />');

  popupWin.document.write(toPrint.innerHTML);
  popupWin.document.write('</html>');
  setTimeout(function(){
   popupWin.print();
  },1000);
  popupWin.document.close();
    return true;
}


</script>

<style type="text/css" media="print">
   @media print{@page {size: landscape}};
</style>
<style type="text/css">
  .fa fa-plus{
   width: 24px !important;
    height: 24px !important;
  }
</style>
@endsection