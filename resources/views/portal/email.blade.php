@extends('portal.app')

@section('content')

	

<div class="main-container">
	<div class="section">
		<div class="container">
			<h1 class="title-2 center" style="margin: -40px 0 0 0;">Email Services</h1>
			<div class="row">
				<div class="col-md-12">
					<div class="blog-post">
						<div class="feature-inner">
							
						</div>
						<div class="post-content">
							<h3 class="post-title"><strong>Local and Internet Email</strong></h3>
                            <span class="spantext"><b>Guidelines and Instructions on Email Access and Use.</b></span>
							<div class="meta">
								<span class="meta-part"><i class="icon-user"></i> IT Department</span>
								<span class="meta-part"><i class="icon-calendar"></i> March 3, 2021</span>
							</div>
							<div class="col-md-6">
								<p>
                                <h3 class="post-title">Intranet Email (.local)</h3>
									<span class="spantext">All company personnel who have access to computer facilities inside the company are given intranet email addresses</span>
									<span class="spantext">All intranet email addresses AND usernames are in the format of : <br>           
                                    <i>firstname.lastname@fumaco.local</i></span>
									<span class="spantext">Passwords are based on the Windows Login Password.</span>
                                    <p>
                                <h3 class="post-title">To Access Intranet Email</h3>
									<span class="spantext">you can log on to <b><a href="https://zimbra.fumaco.local"> zimbra.fumaco.local </a></b> on Mozilla Firefox</span>
									<span class="spantext">All intranet email addresses AND usernames are in the format of : <br>
                                    <i>firstname.lastname@fumaco.local</i></span>
									<span class="spantext">Passwords are based on the Windows Login Password.</span><br>

                                    <span class="spantext">Username: (your email) Format: firstname.lastname@fumaco.local</span>
								</p>
							</div>
							<div class="col-md-6">
								<p>
                                <h3 class="post-title">Internet Email (.com)</h3>
									<span class="spantext">Official company emails are given on a personnel basis and department basis. Existing email addresses per department are the following:</span>
									<span class="spantext">Sales Department - sales@fumaco.com</span>
									<span class="spantext">Marketing Department -marketing@fumaco.com</span>
									<span class="spantext">Accounting Department -accounting@fumaco.com</span>
									<span class="spantext">IT - it@fumaco.com</span> <br>
									<span class="spantext">Additional Emails may be requested</span>
									<h3 class="post-title">To Access Internet Email (.com)</h3>
                                    <span class="spantext">You can log on webmail.fumaco.com using mozilla firefox browser or using thunderbird email client</span>
									<span class="spantext">Username: (your email addres)</span>
									<span class="spantext">Password: either it is given to you or your managers will input it for you</span><br>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog-post">
						<div class="feature-inner">
							
						</div>
						<div class="post-content">
							<h3 class="post-title"><strong>Email Client Setup</strong></h3>
                            <span class="spantext"><b>Instructions on how to setup and configure email client using Thunderbird.</b></span><br>
							<div class="col-md-6">
								<p>
                                <h3 class="post-title">FOR INTRANET: when prompted for the following infomation, please use the following: (.local)</h3>
									<span class="spantext">All company personnel who have access to computer facilities inside the company are given intranet email addresses</span>
									<span class="spantext"><b>Incoming Mail Server:</b> zimbra.fumaco.local</span>
									<span class="spantext"><b>Port</b> 143</span>
                                    <span class="spantext"><b>Outgoing Mail Server:</b> zimbra.fumaco.local</span>
									<span class="spantext"><b>Type of Outgoing Mail Server:</b> SMTP</span>
                                    <span class="spantext"><b>Port:</b> 25</span> <br>

                                    <h3 class="post-title">Intranet Email Restrictions and Limits</h3>
                                    <span class="spantext">Intranet or local email services will provide UNLIMITED storage space to all users and departments.</span>
                                    <span class="spantext">Attachments will be limited to a maximum of 200MB per mail transaction.</span> <br>
								</p>
							</div>
							<div class="col-md-6">
								<p>
                                <h3 class="post-title">FOR INTERNET: when prompted for the following infomation, please use the following:</h3>
									<span class="spantext"><b>Incoming Mail Server:</b>mail.fumaco.com</span>
									<span class="spantext"><b>Type of Incoming Mail Server:</b> POP</span>
									<span class="spantext"><b>Port</b>143</span>
                                    <span class="spantext"><b>Outgoing Mail Server:</b> mail.fumaco.com</span>
                                    <span class="spantext"><b>Type of Outgoing Mail Server:</b> SMTP</span>
                                    <span class="spantext"><b>Port:</b> 25</span> <br>

                                    <h3 class="post-title">Internet Email Restrictions and Limits</h3>
                                    <span class="spantext">There are limits to the size of attachments you can send to Email accounts out of the company:</span>
                                    <span class="spantext"> - Yahoo! Mail Microsoft/MSN/Hotmail 10MB </span>
                                    <span class="spantext"> - Gmail Accounts 20MB </span> <br>


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


