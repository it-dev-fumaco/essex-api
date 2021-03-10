					
				<input type="hidden" id="status_hidden" name="status_hidden" value="{{ $status }}">
				<div class="container">
				  <div class="row justify-content-center">
				    <div class="col-8">
				    <dt style="display: inline;">Notice Slip No.</dt>
				  	<dd style="display: inline;">{{ $notice_id }}</dd>
				    </div>
				  </div> 
				  <div class="row justify-content-center">
				    <div class="col-8">
				    	
				  			<h2 class="m-0"><span class="badge badge-@if($status == 'APPROVED')success @elseif($status == 'FOR APPROVAL')warning @elseif($status == 'CANCELLED')danger @elseif($status == 'DISAPPROVED')danger @elseif($status == 'DEFERRED')danger @endif">{{ $status }}</span></h2>
				  
				    </div>
				  </div>
				</div>
				  	

					<div class="row justify-content-center" style="margin-top: 20px">
					    <div class="col-4">
					    	<dt class="col-md-2" style="display: inline;">From Date :</dt>
							<dd class="col-md-4" style="display: inline;">{{ $datefrom }} {{ $timefrom }}
					    </div>
					    <div class="col-4">
					    	<dt class="col-md-2" style="display: inline;">To Date :</dt>
							<dd class="col-md-4" style="display: inline;">{{ $dateto }}  {{ $timeto }}</dd>
					    </div>
					</div>
					<div class="container" style="padding-top: 2%;">
					  <div class="row justify-content-md-center">
					    <div class="col col-lg-2">
					    	<dt>Absence Type</dt>
							<dd>{{ $absence_type }}</dd>
					    </div>
					    <div class="col-12 col-md-auto">
					    	<dt>Duration</dt>
							<dd>{{ $duration }} Day(s)</dd>
					    </div>
					    <div class="col col-lg-2">
					    	<dt>Reason</dt>
							<dd>{{ $reason }}</dd>
					    </div>
					  </div>
					</div>



