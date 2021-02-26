<div class="admin-wrapper">
	<div class="left-sidebar">
		<div class="logo-sec">
			<a href="{{ url('dashboard') }}" title="Anyday Money"><img src="{{ asset('assets/dashboard/images/anyday-logo.svg') }}" title="Anyday Money" alt="Anyday Money"></a>
		</div>

		<div class="user-panel">
	        <div class="image">
	            <img src="{{ asset('assets/dashboard/images/user-img.jpg') }}" class="" alt="user image" />
	        </div>
	        <div class="info">
	                <a href="#" class="d-block">Hello, {{ (session()->has('user_detail'))?Session::get('user_detail')['name']:"" }}</a>
	        </div>


      </div>
      <!-- end of user-panel -->

      <nav class="main-menu">
	        	<ul class="menu-sec">
	        		<!--<li><a href="profile.html"><span class="menu-icon"><img src="{{ asset('assets/dashboard/images/login-img.png') }}" title="loan" alt="loan" style="height:24px; "></span>Profile</a>-->
	        		<!--</li>-->
	        		<li><a href="{{ url('dashboard/') }}"><span class="menu-icon"><img src="{{ asset('assets/dashboard/images/loan-img.png') }}" title="loan" alt="loan" style="height:20px; "></span>Loan status</a></li>
	        		<!--<li><a href="#"><span class="menu-icon"><img src="{{ asset('assets/dashboard/images/service-icon.png') }}" title="loan" alt="loan" style="height:24px; "></span>Top-up loan</a></li>-->
	        		<li><a href="{{ url('products/') }}"><span class="menu-icon"><img src="{{ asset('assets/dashboard/images/more-img.png') }}" title="loan" alt="loan" style="height:24px; "></span>Products</a></li>
	        		<!--<li><a href="services.html"><span class="menu-icon"><img src="{{ asset('assets/dashboard/images/services-icon.png') }}" title="services-icon" alt="services-icon" style="height:18px; "></span>Services</a></li>-->
	        	</ul>
	        </nav>
	          <!-- end of main-menu -->
	</div>
	<!-- end of left-siebar -->
	<div class="main-content">
		<div class="content-header">
			<div class="toggle-menu">
				<a class="nav-link" href="#" >
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
			<ul class="top-right">
				<!--<li><a href="#"><img src="{{ asset('assets/dashboard/images/notification.png') }}" title="Notification" alt="ANotification" style="height:24px; "></a><span class="notify">12</span></li>-->
				<li><a href="#"><img src="{{ asset('assets/dashboard/images/login-img.png') }}" title="Logout" alt="Logout"></a>

					<ul class="rightdrop">
						<li><a href="{{ url('logout') }}" title="logout">Logout</a></li>
						<!--<li><a href="#" title="logout">Profile</a></li>-->
					</ul>
				</li>
			</ul>
		</div>
		<!-- end of content-header -->
		<!--<img src="{{ asset('assets/dashboard/images/admin-banner.jpg') }}" title="Anyday Money" alt="Anyday Money">-->
		<!--<h1 class="main-title">Dashboard</h1>-->

		<div class="data-content">