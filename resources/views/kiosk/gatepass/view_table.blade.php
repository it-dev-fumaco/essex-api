


				<input type="hidden" id="status_hidden" name="status_hidden" value="{{ $status }}">
				<div class="container">
				  <div class="row justify-content-center">
				    <div class="col-8">
				    <dt style="display: inline;">Gatepass No.</dt>
				  	<dd style="display: inline;">{{ $gatepass_id }}</dd>
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
					    	<dt class="col-md-2" style="display: inline;">Return On:</dt>
							<dd class="col-md-4" style="display: inline;">{{ $returned_on }}</dd>
					    </div>
					    <div class="col-4">
					    	<dt class="col-md-2" style="display: inline;">Item(s):</dt>
							<dd class="col-md-4" style="display: inline;">{{ $items }}</dd>
					    </div>
					</div>
					<div class="row justify-content-center">
					    <div class="col-4">
					    	<dt class="col-md-2" style="display: inline;">Purpose Type:</dt>
							<dd class="col-md-4" style="display: inline;">{{ $purpose_type }}</dd>
					    </div>
					    <div class="col-4">
					    	<dt class="col-md-2" style="display: inline;">Purpose Details:</dt>
							<dd class="col-md-4" style="display: inline;">{{ $purpose }}</dd>
					    </div>
					</div>








