<header class="main-header " id="navbar">
	<div class="site-container">
		<div class="logo" id="logo">
			<a href="{{ url('/') }}" title="Anyday Money"><img src="{{ asset('assets/images/anyday-logo.svg') }}" title="Anyday Money" alt="Anyday Money"></a>
		</div>
		<!-- end of logo -->
		<div class="container-wrap" onclick="myFunction(this)">
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		  <div class="bar3"></div>
		</div>
		<div class="nav-cover">
			<ul>
				<li><a href="javascript:void();" title="home">Products</a>
					<ul class="dropmenu">
						<li class="personal-loan"><a href="{{ url('personal-loan') }}" title="Personall Loan">Personal Loan</a></li>
						<li class="business-loan"><a href="{{ url('business-loan') }}" title="Business Loan">Business Loan</a></li>
						<li class="medical-loan"><a href="{{ url('medical-loan') }}" title="Medical Loan">Medical Loan</a></li>
						<li class="education-loan"><a href="{{ url('education-loan') }}" title="Education Loan">Education Loan</a></li>
					</ul>
				</li>
				<li><a href="{{ url('about') }}" title="About Us">About Us</a></li>
				<li><a href="index.html#howapply" title="How it Works">How it Works</a></li>
				<li><a href="partner-withus.html" title="Partner with us">Partner with us</a></li>
				<li><a href="{{ url('contact-us') }}" title="Contact Us">Contact Us</a></li>
			</ul>			
		</div>
		<!-- end of nav-cover -->
		<div class="login-option">
			<a href="{{ url('apply-now') }}" class="ragister" title="Register">
				<span>Apply Now</span>
			</a>
		</div>
		@if(session()->has('user_detail'))
		<div class="login-profile">
		    <span class="username">{{ (session()->has('user_detail'))?Session::get('user_detail')['first_name']:"" }}</span>
		    <div class="profile-pop" style="display:none">
		        <a href="#" title="Profile">Profile</a>
		        <a href="{{ url('logout') }}" title="Logout">Logout</a>
		    </div>
		    
		    
		</div>
		@endif
		<!-- end of login-profile -->
	</div><!-- end of login-pop -->

	<div class="ragisterpage smallpop">
		<div class="inner-popup">
			
			<form method="post" name="loginform" id="login-form">
			<div class="form-box">
				<input type="text" title="Full Name" name="username" placeholder="Full Name" />
			</div>
			<div class="form-box">
				
				<input type="text" title="Email" name="email" placeholder="Email" />
			</div>
			<div class="form-box">
			
				<input type="text" title="Enetr Phone Number" name="Phone" placeholder="Enter Phone Number" />
			</div>
			<div class="form-box">	
			<span class="drop-arrow"></span>						
				<input type="text" title="Select loan Type" name="loan-type" placeholder="Select Loan Type" />

				<ul class="dropmenu">
			<li class="personal-loan"><a href="{{ url('personal-loan') }}">Personal Loan</a></li>
			<li class="business-loan"><a href="{{ url('business-loan') }}">Business Loan</a></li>
			<li class="medical-loan"><a href="{{ url('medical-loan') }}">Medical Loan</a></li>
			<li class="education-loan"><a href="{{ url('education-loan') }}">Education Loan</a></li>
		</ul>
			</div>
			<div class="form-box">							
				<input type="text" title="City" name="city" placeholder="City" />
			</div>
			<div class="form-box">							
				<input type="text" title="State" name="state" placeholder="State" />
			</div>
			<div class="form-action">
				<input type="button" title="Submit" name="submit" value="Submit" />
			</div>
			</form>
			
		</div>
		<!-- end of inner-popup -->
	</div>
	<div class="popbg"></div>
	
	<script>
	    $(document).ready(function(){
	        $('.login-profile').click(function(){
	            $('.profile-pop').slideToggle();
	        });
	    });
	</script>
</header>