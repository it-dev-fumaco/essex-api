@extends('portal.app')

@section('content')

	

<div class="main-container">
	<div class="section">
		<div class="container">
			<h1 class="title-2 center" style="margin: -40px 0 0 0;">Internet Services</h1>
			<div class="row">
				<div class="col-md-12">
					<div class="blog-post">
						<div class="feature-inner">
							<div class="embed-responsive embed-responsive-16by9">
								<video width="320" height="240" controls poster="{{ asset('storage/videos/poster/internet_services.png') }}">
									<source src="{{ asset('storage/videos/Internet-Services-Proxy-Server-Configuration 09-20-2017.mp4') }}" type="video/mp4">
								</video>
							</div>
						</div>
						<div class="post-content">
							<h3 class="post-title">Instructions to acquire interenet access</h3>
							<div class="meta">
								<span class="meta-part"><i class="icon-user"></i> IT Department</span>
								<span class="meta-part"><i class="icon-calendar"></i> September 20, 2017</span>
							</div>
							<div class="col-md-6">
								<p>
									<span class="spantext"><b>Please use the following instructions to acquire internet access.</b></span>
									<span class="spantext">1. Open Internet Explorer and click  Internet Options > Connections > LAN Settings</span>
									<span class="spantext">2. Check use proxy server for you LAN</span>
									<span class="spantext">3. Fill in the appropriate details based on <u>location</u></span>
									<span class="spantext">&nbsp;&nbsp;&nbsp;&nbsp;If you are in FUMACO - Ortigas</span>
									<span class="spantext">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address: 192.168.1.70&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Port: 8080</span>
									<span class="spantext">&nbsp;&nbsp;&nbsp;&nbsp;If you are in FUMACO/FILUNITED - Plant</span>
									<span class="spantext">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address: 10.0.0.72&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Port: 8080</span>
								</p>
							</div>
							<div class="col-md-6">
								<p>
									<span class="spantext">4. Check Also bypass proxy for local address</span>
									<span class="spantext">Enter Advanced Tab > Under Exceptions, put in</span>
									<span class="spantext">10.0.0.*;192.168.1.*;*.local;*.fumaco.local;*.fumaco.com</span>
									<span class="spantext">5. On Mozilla Firefox Go to Options>Advanced>Network Settings</span>
									<span class="spantext">Under Connection Settings Tab</span>
									<span class="spantext">Check Use System Proxy Settings and Click Ok</span>
									<span class="spantext">6.  Under Mozilla Thunderbird (Optional if you are using It),</span>
									<span class="spantext">Under Options > Advanced > Network & Disk Space > Settings</span>
									<span class="spantext">Under the settings tab Click No Proxy.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.spantext{
		display: block;
		padding-bottom: 10px;

	}
</style>
	
@endsection

@section('script')
<script>
$(document).ready(function(){

});
</script>
@endsection


