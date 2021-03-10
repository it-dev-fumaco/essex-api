@extends('kiosk.app')
@section('metawebapp')
<meta name="apple-mobile-web-app-capable" content="yes">
@stop
@section('content')
<div class="col-md-12 slideInLeft">
	<div class="card mt-3" style="height: 97%;">
		<div class="card-header h3 text-center">
			<span class="align-middle">Absent Notice Slip Details</span>
			<div class="pull-right">
				<a href="#" onclick="loadviewtable()" id="refresh">
        				<img src="{{ asset('storage/refresh.png') }}"  width="40" height="40"/>
        		</a>
				<a href="/kiosk/home">
					<img src="{{ asset('storage/kiosk/home-512.png') }}"  width="40" height="40"/>
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<h4 class="alert-heading">Request sent to Managers!</h4>
						<p class="mb-0">Please see below details of your filed notice slip.</p>
				  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    		<span aria-hidden="true">&times;</span>
				  		</button>
					</div>
				</div>
				<div class="col-md-12">
				
				
				<div id="notice_view_table" class="text-center"></div>
				<div class="row justify-content-center" style="margin-top: -20px;">
				    <div id="wait_gif">
				    <img src="{{ asset('storage/wait.gif') }}"  width="200" height="150"/>
					</div>
					<div id="approve_gif">
				    <img src="{{ asset('storage/approve.gif') }}"  width="200" height="150"/>
					</div>
					<div id="cancel_gif">
				    <img src="{{ asset('storage/disapproved.gif') }}"  width="130" height="150"/>
					</div>
				</div> 
				<div class="col-md-12 text-center pt-5" style="margin-top: -30px;">
					
					
				<div class="btn-group-sm" aria-label="Basic example">
					<button type="button" id="cancelbtn" class="btn btn-danger" data-toggle="modal" data-target="#confirmBack">
						<i class="fa fa-ban mr-1"></i>Cancel Absent Slip
					</button>
				</div>
				</div>

			</div>
			
		</div>
		</div>
	</div>
</div>
<div class="modal fade" id="confirmBack" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

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
        		<h5>Cancel absent notice slip?</h5>
      		</div>
      		<div class="modal-footer">
        		<a href="#" onclick="cancelnotice()" class="btn btn-primary">Yes</a>
        		<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      		</div>
    	</div>
  	</div>
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
		$('#wait_gif').hide();
		$('#approve_gif').hide();
		$('#cancel_gif').hide();
		loadviewtable();
		var idleInterval = setInterval(anotherTransaction, 2000);
	});
</script>
<script type="text/javascript">
	function loadviewtable(page){

		$.ajax({
			url: "/kiosk/notice/load_view_table",
			success: function(data){
				$('#notice_view_table').html(data);
				var status = $('#status_hidden').val();
				if(status == 'APPROVED') {
				$('#cancelbtn').hide();
				$('#wait_gif').hide();
				$('#cancel_gif').hide();
				$('#approve_gif').show();
				}
				else if(status == 'CANCELLED') {
				$('#cancelbtn').hide();
				$('#wait_gif').hide();
				$('#approve_gif').hide();
				$('#cancel_gif').show();
				}
				else if(status == 'DISAPPROVED') {
				$('#cancelbtn').hide();
				$('#wait_gif').hide();
				$('#approve_gif').hide();
				$('#cancel_gif').show();
				}
				else{
					$('#cancelbtn').show();
					$('#approve_gif').hide();
					$('#cancel_gif').hide();
					$('#wait_gif').show();
				}
			}
		});
	}
	function cancelnotice(){
		$.ajax({
			url: "/kiosk/notice/cancel_slip",
			success: function(data){
				// $('#notice_view_table').html(data);
				$('#confirmBack').modal('hide');
				loadviewtable();
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