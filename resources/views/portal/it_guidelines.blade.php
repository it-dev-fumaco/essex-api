@extends('portal.app')

@section('content')

	

<div class="main-container">
	<div class="section">
		<div class="container">
			<h1 class="title-2 center" style="margin: -40px 0 0 0;">IT Guidelines and Policy</h1>
			<div class="row">
				<div class="col-md-12">
					<div class="blog-post">
						<div class="feature-inner">
							<div class="embed-responsive embed-responsive-16by9">
								<video width="320" height="240" controls poster="{{ asset('storage/videos/poster/it_guidelines.png') }}">
									<source src="{{ asset('storage/videos/IT-Guidelines-and-Policy-09-20-2017.mp4') }}" type="video/mp4">
								</video>
							</div>
						</div>
						<div class="post-content">
							<h3 class="post-title">IT Guidelines and Policies </h3>
							<h4 class="post-title"><p>Our IT guidelines and policies have been crafted to give the company security, reliability, usability, and consistency of all workstations and communications systems, while keeping energy efficiency in mind.</p> </h3>

							<div class="meta">
								<span class="meta-part"><i class="icon-user"></i> IT Department</span>
								<span class="meta-part"><i class="icon-calendar"></i> September 20, 2017</span>
							</div>
							<div class="col-md-6">
								<p>
									<span class="spantext"><b>Please read and review all policies carefully as they shall be strictly implemented.</b></span>
									<span class="spantext"><strong>1. Usernames and passwords. </strong></span> 
									<span class="spantext"><li> Each user who is granted access to the network shall have their own username and password </li></span>
									<span class="spantext"><li> Sharing User names and passwords are strictly prohibited.</li><br><li> Under no circumstances should user names and passwords be shared.</li></span>
	    						    <span class="spantext"><li> Managers and subordinates alike are bound by the same rules. Therefore, managers, heads and supervisors, and the IT dept are not allowed to ask for anyone's usernames or passwords.</li></span>
	   						        <span class="spantext"><li>Allowing other users to your own account is strictly prohibited.</li></span>
	   						        <br> 
									<span class="spantext"><strong>2. Workstation usage and restrictions</strong></span>
									<span class="spantext"><li>All users are allowed to move to other workstations</li></span>
									<span class="spantext"><li>Users from ortigas can login and use computers at the plant, and vice versa.</li></span>
									<span class="spantext"><li>Computers at the accounting and HR department are to be strictly used by their respective users only.</li></span>
									<span class="spantext"><li>Computers and laptops of managers are restricted to their specific users or managers only.</li></span>
									<span class="spantext"><li>Login and use only one workstation.  Do not login multiple times, and allow multiple people to use your account.</li></span>
									<span class="spantext"><li>Login once and be polite!  Using multiple workstations prevent other people from using computers already logged on to.</li></span><br>

									<span class="spantext"><strong>3. Password Complexity Rules[1]. Passwords must meet the following rules
									</strong></span>
									<span class="spantext"><li>Minimum of at least 7 characters</li></span>
									<span class="spantext"><li>Should not use your previous 24 passwords.</li></span>
									<span class="spantext"><li>Passwords will expire every 42 Days, and should be changed[2]</li></span>
									<span class="spantext"><li>Not contain the user's account name or parts of the user's full name that exceed two consecutive characters</li></span>
									<span class="spantext"><li>Contain characters from three of the following four categories:</li></span>
									<span class="spantext">-English uppercase characters (A through Z)</span>
									<span class="spantext">-English lowercase characters (a through z)</span>
									<span class="spantext">-Base 10 digits (0 through 9)</span>
									<span class="spantext">-Non-alphabetic characters (for example, !, $, #, %)</span>
									<span class="spantext"><li>Account Lockout.  If you have 4 invalid login attempts, your account will be locked out and unusable for up to 60 minutes</li></span>
									<span class="spantext">10.0.0.*;192.168.1.*;*.local;*.fumaco.local;*.fumaco.com</span>
									<br>
								</p>
							</div>
							<div class="col-md-6">
								<p>
									
									<span class="spantext"><strong>4. Personal Devices. All personal laptops, computers and storage devices including USBs, hard drives and etc. are prohibited from connnecting to the network.</strong></span>
									<span class="spantext"><li>Users are granted specific access.  Access to USB drives, the internet and certain files are granted on a per user basis.</li></span>
									<span class="spantext"><li>Users should not use USB ports to charge their personal devices such as phones, tablets, flashlights, and fans.</li></span>
									<span class="spantext"><li>Only Company issued USB storage drives and Laptops will be allowed to connect to the network or any workstation on the network[3].</li></span><br>

									<span class="spantext"><strong>5. Emails.</strong></span>
									<span class="spantext"><li>The company has two email servers to provide local intranet email and internet email.</li></span>
									<span class="spantext"><li>For Local Emails (fumaco.local accounts)</li></span>
									<span class="spantext">-The servers will provide unlimited storage to all accounts registered</span>
									<span class="spantext">-Maximum Email Size will be limited to 100MB to facilitate large transfers between different offices[4][5]</span>
									<span class="spantext"><li>For Internet Emails(fumaco.com accounts)</li></span>
									<span class="spantext">-The servers will provide at least 1GB of email storage space</span>
									<span class="spantext">-All email sizes should not be larger than 54MB. </span><br>
									
									<span class="spantext"><strong>6. Single Sign-on.  To simplify access and prevent people from memorizing too many users and passwords, users may use their windows username and password to access the following servers</strong></span>
									<span class="spantext"><li>Zimbra (for local Intranet mail) - zimbra.fumaco.local</li></span>
									<span class="spantext"><li>AthenaERP (Inventory System) - athenaerp.fumaco.local</li></span><br>
									
									<span class="spantext"><strong>7. Save Energy.</strong></span>
									<span class="spantext"><li>Turn off all monitors and computers that are not in use, most especially during lunch time, breaks or if you are to leave the room.</li></span>
									<span class="spantext"><li>Turn off all UPS, photocopiers, printers, and airconditioning if you are the last one to leave the room.</li></span>
									
								    </span>
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


