@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 97%;">
		<div class="card-header h3 text-center">
			<span class="align-middle">Itinerary Details</span>
			<div class="pull-left">
				<a href="/kiosk/itinerary">
					<img src="{{ asset('storage/kiosk/back.png') }}"  width="40" height="40"/>
				</a>
			</div>
			<div class="pull-right">
				<a href="#" onclick="loadviewtable()" id="refresh">
    				<img src="{{ asset('storage/refresh.png') }}"  width="40" height="40"/>
    			</a>
				<a href="/kiosk/home">
					<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
				</a>
			</div>
		</div>
		<input type="hidden" id="itinerary_id" name="itinerary_id" value="{{ $itinerary_id }}">
		<div class="card-body" id="result_table"></div>
</div>
<div class="modal fade" id="another_trans_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true"  data-keyboard="false" data-backdrop="static">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Would you like to create another transaction?</h4>
            <span id="timers"></span>
          </div>
          <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="stoptimer_trans()"><i class="fa fa-check"></i> Yes</button>
                  <button type="button" class="btn btn-danger" onclick="logout_user_trans()"><i class="fa fa-times"></i> No</button>
            </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		loadviewtable();
		var idleInterval = setInterval(anotherTransaction, 2000);
	});
</script>
<script type="text/javascript">
	function loadviewtable(page){
		var itinerary_id = $('#itinerary_id').val();
		$.ajax({
			url: "/kiosk/itinerary/result_table/" + itinerary_id,
			success: function(data){
				$('#result_table').html(data);

			}
		});
	}
</script>
<script type="text/javascript">
var idleTime_trans = 0;	
function anotherTransaction() {
    if (idleTime_trans == 0) { // 20 minutes
        // window.location.reload();
         $('#another_trans_modal').modal('show');
         timercountdown_trans();
        idleTime_trans = idleTime_trans + 1;
    }
}
var downloadTimer_trans;
function timercountdown_trans(){
  var timeleft_trans = 8;
  downloadTimer_trans = setInterval(function(){
  document.getElementById("timers").innerHTML = timeleft_trans + " seconds remaining";

  timeleft_trans -= 1;
  if(timeleft_trans <= 0){
    window.location.replace("/kiosk/logoutuser");
    clearInterval(downloadTimer_trans);
  }
}, 1000);
}
function stoptimer_trans(){
  clearInterval(downloadTimer_trans);
  document.getElementById("timers").innerHTML = "";
}
function logout_user_trans(){
  window.location.replace("/kiosk/logoutuser");
}

</script>
@endsection